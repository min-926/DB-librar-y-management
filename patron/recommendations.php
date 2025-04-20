<?php
class recommender {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
        if (!$this->conn) {
            die("Database connection failed");
        }
    }

    public function getRecommendations($patronID, $limit = 5) {
        $favCategories = $this->getFavoriteCategories($patronID);
        $similarBooks = $this->getSimilarBooks($patronID);
        $popularInCategories = $this->getPopularInCategories($favCategories, $patronID);

        return $this->mergeRecommendations($similarBooks, $popularInCategories, $limit);
    }

    private function getFavoriteCategories($patronID) {
        $query = "SELECT c.category_id, c.classname, COUNT(*) as borrow_count
                  FROM borrow b
                  JOIN book bk ON b.book_id = bk.book_id
                  JOIN category c ON bk.category_id = c.category_id
                  WHERE b.libraryCardID = ?
                  GROUP BY c.category_id
                  ORDER BY borrow_count DESC
                  LIMIT 3";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $patronID);
        $stmt->execute();
        $result = $stmt->get_result();

        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }

        return $categories;
    }

    private function getSimilarBooks($patronID) {
        $query = "SELECT b.book_id, b.book_title, b.author, b.isbn, 
                         AVG(r.rating) as avg_rating,
                         COUNT(r.rating) as rating_count
                  FROM book b
                  JOIN rating r ON b.book_id = r.book_id
                  WHERE b.category_id IN (
                      SELECT DISTINCT bk.category_id
                      FROM rating r
                      JOIN book bk ON r.book_id = bk.book_id
                      WHERE r.libraryCardID = ? AND r.rating >= 4
                  )
                  AND b.book_id NOT IN (
                      SELECT book_id FROM borrow WHERE libraryCardID = ?
                  )
                  GROUP BY b.book_id
                  HAVING avg_rating >= 3.5
                  ORDER BY avg_rating DESC, rating_count DESC
                  LIMIT 10";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $patronID, $patronID);
        $stmt->execute();
        $result = $stmt->get_result();

        $books = [];
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }

        return $books;
    }

    private function getPopularInCategories($categories, $patronID) {
        if (empty($categories)) return [];

        $categoryIds = array_column($categories, 'category_id');
        $placeholders = implode(',', array_fill(0, count($categoryIds), '?'));

        $query = "SELECT b.book_id, b.book_title, b.author, b.isbn,
                         AVG(r.rating) as avg_rating,
                         COUNT(br.book_id) as borrow_count
                  FROM book b
                  LEFT JOIN rating r ON b.book_id = r.book_id
                  LEFT JOIN borrow br ON b.book_id = br.book_id
                  WHERE b.category_id IN ($placeholders)
                  AND b.book_id NOT IN (
                      SELECT book_id FROM borrow WHERE libraryCardID = ?
                  )
                  GROUP BY b.book_id
                  HAVING borrow_count > 0 OR avg_rating > 0
                  ORDER BY borrow_count DESC, avg_rating DESC
                  LIMIT 10";

        $stmt = $this->conn->prepare($query);
        $types = str_repeat('i', count($categoryIds)) . 'i';
        $params = array_merge($categoryIds, [$patronID]);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        $books = [];
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }

        return $books;
    }

    private function mergeRecommendations($similarBooks, $popularInCategories, $limit) {
        $allBooks = [];

        foreach ($similarBooks as $book) {
            $allBooks[$book['book_id']] = $book + ['recommendation_type' => 'similar'];
        }

        foreach ($popularInCategories as $book) {
            if (!isset($allBooks[$book['book_id']])) {
                $allBooks[$book['book_id']] = $book + ['recommendation_type' => 'popular'];
            }
        }

        // 排序：优先展示“similar”类型、评分高的书
        usort($allBooks, function($a, $b) {
            $aScore = ($a['recommendation_type'] === 'similar' ? 2 : 1) * ($a['avg_rating'] ?? 0);
            $bScore = ($b['recommendation_type'] === 'similar' ? 2 : 1) * ($b['avg_rating'] ?? 0);
            return $bScore <=> $aScore;
        });

        return array_slice($allBooks, 0, $limit);
    }
}
?>
