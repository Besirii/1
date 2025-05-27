<?php
include 'config.php';
include 'header.php';

// Fetch blog posts from the database
$blogs = [];
$sql = "SELECT title, author, date, content FROM blogs ORDER BY date DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }
}
$blogs = [
    [
        'title' => 'Welcome to SmartFarmer!',
        'author' => 'Admin',
        'date' => '2024-06-01',
        'content' => 'This is our first blog post. Stay tuned for updates!'
    ],
    [
        'title' => 'How to Start Organic Farming',
        'author' => 'Jane Doe',
        'date' => '2024-06-05',
        'content' => 'Organic farming is a great way to produce healthy food...'
    ],
    [
        'title' => 'Tips for Water Conservation',
        'author' => 'John Smith',
        'date' => '2024-06-10',
        'content' => 'Water conservation is essential for sustainable farming. Here are some tips...'
    ],
    [
        'title' => 'Best Crops for Summer',
        'author' => 'Emily Green',
        'date' => '2024-06-12',
        'content' => 'Summer is the perfect time to grow tomatoes, peppers, and cucumbers...'
    ],
    [
        'title' => 'Pest Control Without Chemicals',
        'author' => 'Michael Brown',
        'date' => '2024-06-15',
        'content' => 'Learn how to manage pests naturally using companion planting and other methods.'
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blogs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #2e7d32;
            margin-top: 30px;
        }
        .blog-post {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
            margin: 30px auto;
            max-width: 600px;
            padding: 24px 32px;
        }
        .blog-post h2 {
            color: #388e3c;
            margin-top: 0;
        }
        .blog-post p {
            color: #444;
            line-height: 1.6;
        }
        .blog-post em {
            color: #888;
            font-size: 0.95em;
        }
        hr {
            border: none;
            border-top: 1px solid #e0e0e0;
            margin: 24px 0 0 0;
        }
    </style>
</head>
<body>
    <h1>Blog Posts</h1>
    <?php foreach ($blogs as $blog): ?>
        <div class="blog-post">
            <h2><?php echo htmlspecialchars($blog['title']); ?></h2>
            <p><em>By <?php echo htmlspecialchars($blog['author']); ?> on <?php echo htmlspecialchars($blog['date']); ?></em></p>
            <p><?php echo nl2br(htmlspecialchars($blog['content'])); ?></p>
            <hr>
        </div>
    <?php endforeach; ?>
</body>
</html>