<?php
include 'config.php';
include 'header.php';
$weatherData = [
    [
        'region' => 'Pristina',
        'temperature' => '22°C',
        'condition' => 'Sunny',
        'icon' => '☀️'
    ],
    [
        'region' => 'Peja',
        'temperature' => '19°C',
        'condition' => 'Partly Cloudy',
        'icon' => '⛅'
    ],
    [
        'region' => 'Gjakova',
        'temperature' => '20°C',
        'condition' => 'Cloudy',
        'icon' => '☁️'
    ],
    [
        'region' => 'Mitrovica',
        'temperature' => '18°C',
        'condition' => 'Rainy',
        'icon' => '🌧️'
    ],
    [
        'region' => 'Ferizaj',
        'temperature' => '21°C',
        'condition' => 'Sunny',
        'icon' => '☀️'
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather Information</title>
    <?php
    // Example: Change background color based on time of day
    $hour = date('G');
    if ($hour >= 6 && $hour < 18) {
        // Daytime
        $bgColor = "#f9f9f9";
    } else {
        // Nighttime
        $bgColor = "#222";
    }
    echo "<style>body { background: {$bgColor}; }</style>";
    ?>
    <style>
        .weather-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .weather-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            width: 180px;
            text-align: center;
            background: #f9f9f9;
        }
        .weather-icon {
            font-size: 2em;
        }
        .region {
            font-weight: bold;
            margin-bottom: 8px;
        }
        .temperature {
            font-size: 1.2em;
            margin-bottom: 4px;
        }
        .condition {
            color: #555;
        }
    </style>
</head>
<body>
    <h2>Weather by Region</h2>
    <div class="weather-container">
        <?php foreach ($weatherData as $weather): ?>
            <div class="weather-card">
                <div class="weather-icon"><?php echo $weather['icon']; ?></div>
                <div class="region"><?php echo htmlspecialchars($weather['region']); ?></div>
                <div class="temperature"><?php echo htmlspecialchars($weather['temperature']); ?></div>
                <div class="condition"><?php echo htmlspecialchars($weather['condition']); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html></style>