<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? htmlspecialchars($title) : 'Fermeri i Mençur'; ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        body {
            background: linear-gradient(135deg, #e8f5e9 0%, #fffde7 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #355e3b;
            margin: 0;
            padding: 0;
        }
        header {
            background: #a5d6a7;
            box-shadow: 0 2px 8px rgba(53,94,59,0.08);
            padding: 1.5rem 0 1rem 0;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }
        header h1 a {
            font-family: 'Pacifico', cursive, Arial, sans-serif;
            font-size: 2.2rem;
            letter-spacing: 2px;
            color: #355e3b;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin: 1rem 0 0 0;
            padding: 0;
        }
        nav ul li a {
            text-decoration: none;
            color: #355e3b;
            font-weight: 500;
            padding: 0.5rem 1.2rem;
            border-radius: 20px;
            transition: background 0.2s, color 0.2s;
        }
        nav ul li a.active,
        nav ul li a:hover {
            background: #81c784;
            color: #fff;
        }
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/1f33e.png') no-repeat right 2% bottom 2%;
            background-size: 80px 80px;
            opacity: 0.07;
            pointer-events: none;
            z-index: 0;
        }
        header, nav, h1, ul, li, a {
            position: relative;
            z-index: 1;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1><a href="index.php" style="text-decoration:none; color:inherit;">Fermeri i Mençur</a></h1>
        <nav>
            <ul>
                <li><a href="index.php"<?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo ' class="active"'; ?>>Kreu</a></li>
                <li><a href="weather.php"<?php if(basename($_SERVER['PHP_SELF']) == 'weather.php') echo ' class="active"'; ?>>Moti</a></li>
                <li><a href="market.php"<?php if(basename($_SERVER['PHP_SELF']) == 'market.php') echo ' class="active"'; ?>>Tregu</a></li>
                <li><a href="blog.php"<?php if(basename($_SERVER['PHP_SELF']) == 'blog.php') echo ' class="active"'; ?>>Blog</a></li>
            </ul>
        </nav>
    </header>
