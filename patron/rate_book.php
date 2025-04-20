<?php
require_once('dbcon.php'); // 引入数据库连接
require_once('BookRecommender.php'); // 引入 BookRecommender 类

session_start();

if (!isset($_SESSION['libraryCardID'])) {
    header("Location: signup.php");
    exit();
}

$libraryCardID = $_SESSION['libraryCardID'];

// 获取并验证用户评分
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['book_id'];
    $rating = $_POST['rating'];

    // 插入评分数据
    $query = "INSERT INTO rating (book_id, libraryCardID, rating, rated_at) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $book_id, $libraryCardID, $rating);

    if ($stmt->execute()) {
        // 评分成功后获取书籍推荐
        $bookRecommender = new BookRecommender($conn);
        $recommendations = $bookRecommender->getRecommendations($libraryCardID);

        // 将推荐数据保存到 session
        $_SESSION['recommendations'] = $recommendations;

        // 跳转到用户仪表盘
        header("Location: patron_dashboard.php");
        exit();
    } else {
        // 评分失败，保存错误信息
        $_SESSION['rating_error'] = "评分失败，请重试。";
        header("Location: patron_dashboard.php");
        exit();
    }
}
?>

<!-- rate_book.php 中的评分表单 -->
<form method="POST" action="">
    <input type="hidden" name="book_id" value="<?php echo isset($book_id) ? htmlspecialchars($book_id) : ''; ?>">
    <label for="rating">评分：</label>
    <select name="rating" id="rating" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <button type="submit">提交评分</button>
</form>
