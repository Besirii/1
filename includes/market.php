<?php
// Sample products array (replace with database in real app)
include 'config.php';
include 'header.php';
$products = [
    [
        'id' => 1,
        'name' => 'Fresh Tomatoes',
        'price' => 2.99,
        'image' => '#'
    ],
    [
        'id' => 2,
        'name' => 'Organic Carrots',
        'price' => 1.49,
        'image' => '#'
    ],
    [
        'id' => 3,
        'name' => 'Green Lettuce',
        'price' => 1.99,
        'image' => '#'
    ]
];

// Start session for cart
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $pid = (int)$_POST['product_id'];
    if (!isset($_SESSION['cart'][$pid])) {
        $_SESSION['cart'][$pid] = 1;
    } else {
        $_SESSION['cart'][$pid]++;
    }
    header("Location: market.php");
    exit;
}

// Get cart items
$cart_items = [];
$total = 0;
foreach ($_SESSION['cart'] as $pid => $qty) {
    foreach ($products as $product) {
        if ($product['id'] == $pid) {
            $product['qty'] = $qty;
            $product['subtotal'] = $qty * $product['price'];
            $cart_items[] = $product;
            $total += $product['subtotal'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartFarmer Market</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f8fb;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }
        h1 {
            text-align: center;
            color: #2d6a4f;
            margin-bottom: 32px;
        }
        .products {
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .product-card {
            background: #f9fafb;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.07);
            width: 260px;
            padding: 18px;
            text-align: center;
            transition: box-shadow 0.2s;
        }
        .product-card:hover {
            box-shadow: 0 6px 20px rgba(44, 62, 80, 0.13);
        }
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 14px;
        }
        .product-card h2 {
            font-size: 1.2rem;
            color: #264653;
            margin: 10px 0 6px 0;
        }
        .product-card p {
            color: #457b9d;
            font-weight: bold;
            margin-bottom: 12px;
        }
        .product-card form button {
            background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .product-card form button:hover {
            background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);
        }
        .cart {
            margin-top: 40px;
            background: #e9f5ee;
            border-radius: 12px;
            padding: 24px;
        }
        .cart h3 {
            margin-top: 0;
            color: #2d6a4f;
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }
        .cart-table th, .cart-table td {
            padding: 10px 8px;
            text-align: left;
        }
        .cart-table th {
            background: #b7e4c7;
        }
        .cart-table tr:nth-child(even) {
            background: #f1faee;
        }
        .cart-total {
            text-align: right;
            font-size: 1.1rem;
            font-weight: bold;
            color: #1b4332;
            margin-top: 12px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>SmartFarmer Market</h1>
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <h2><?= htmlspecialchars($product['name']) ?></h2>
                <p>$<?= number_format($product['price'], 2) ?></p>
                <form method="post">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="cart">
        <h3>Your Cart</h3>
        <?php if (count($cart_items) > 0): ?>
            <table class="cart-table">
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td>$<?= number_format($item['subtotal'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="cart-total">Total: $<?= number_format($total, 2) ?></div>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>