<?php
$conn = new mysqli("localhost", "root", "", "eb_lms");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $year = $_POST['year'] ?? '';

    
    $sql = "SELECT * FROM books WHERE 1=1";
    if (!empty($title)) $sql .= " AND title LIKE '%" . $conn->real_escape_string($title) . "%'";
    if (!empty($author)) $sql .= " AND author LIKE '%" . $conn->real_escape_string($author) . "%'";
    if (!empty($genre)) $sql .= " AND genre LIKE '%" . $conn->real_escape_string($genre) . "%'";
    if (!empty($year)) $sql .= " AND year = '" . $conn->real_escape_string($year) . "'";

    
    $query = $conn->query($sql);
    if ($query && $query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $results[] = $row;
        }
    }
}
?>


<form class="form-horizontal" method="post" action="search_form.php">
    <div class="control-group">
        <label class="control-label" for="inputTitle">Title</label>
        <div class="controls">
            <input type="text" name="title" id="inputTitle" placeholder="Enter Book Title" value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>">
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="inputAuthor">Author</label>
        <div class="controls">
            <input type="text" name="author" id="inputAuthor" placeholder="Enter Author Name" value="<?php echo isset($_POST['author']) ? htmlspecialchars($_POST['author']) : ''; ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputGenre">Genre</label>
        <div class="controls">
            <input type="text" name="genre" id="inputGenre" placeholder="Enter Book Genre" value="<?php echo isset($_POST['genre']) ? htmlspecialchars($_POST['genre']) : ''; ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputYear">Publication Year</label>
        <div class="controls">
            <input type="text" name="year" id="inputYear" placeholder="Enter Publication Year" value="<?php echo isset($_POST['year']) ? htmlspecialchars($_POST['year']) : ''; ?>">
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Search</button>
            <button type="reset" class="btn btn-secondary">Clear</button>
        </div>
    </div>
</form>


<?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <h3>Search Results:</h3>
    <?php if (!empty($results)): ?>
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th><th>Genre</th><th>Year</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $book): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['title']); ?></td>
                        <td><?php echo htmlspecialchars($book['author']); ?></td>
                        <td><?php echo htmlspecialchars($book['genre']); ?></td>
                        <td><?php echo htmlspecialchars($book['year']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
<?php endif; ?>
