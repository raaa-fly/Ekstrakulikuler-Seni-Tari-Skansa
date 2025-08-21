<?php
session_start(); // Start the session to store news updates

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form input
    $title = htmlspecialchars($_POST['title']);
    $date = htmlspecialchars($_POST['date']);
    $content = htmlspecialchars($_POST['content']);
    $details = htmlspecialchars($_POST['details']);

    // Handle image upload
    $image = $_FILES['image'];
    $imagePath = 'uploads/' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $imagePath); // Move the uploaded file to the uploads directory

    // Create an associative array for the new news item
    $newNews = [
        'title' => $title,
        'date' => $date,
        'content' => $content,
        'details' => $details,
        'image' => $imagePath // Store the image path
    ];

    // Initialize the news array if it doesn't exist
    if (!isset($_SESSION['newsUpdates'])) {
        $_SESSION['newsUpdates'] = [];
    }

    // Add the new news item to the session array
    $_SESSION['newsUpdates'][] = $newNews;
}

// Retrieve news updates from session
$newsUpdates = isset($_SESSION['newsUpdates']) ? $_SESSION['newsUpdates'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">News Articles</h2>

    <?php foreach ($newsUpdates as $index => $news): ?>
        <div class="news-item mb-4">
            <h4><?php echo $news['title']; ?></h4>
 <small><?php echo $news['date']; ?></small>
            <p><?php echo $news['content']; ?></p>
            <img src="<?php echo $news['image']; ?>" alt="News Image" class="img-fluid mb-2" style="max-width: 100%; height: auto;">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newsModal<?php echo $index; ?>">Read More</button>
        </div>

        <!-- Modal for detailed news -->
        <div class="modal fade" id="newsModal<?php echo $index; ?>" tabindex="-1" aria-labelledby="newsModalLabel<?php echo $index; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newsModalLabel<?php echo $index; ?>"><?php echo $news['title']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo $news['details']; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>