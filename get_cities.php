<?php
if (isset($_GET['countryid'])) {
    $countryId = (int)$_GET['countryid'];
    $pdo = new PDO("mysql:host=localhost;dbname=my_site;charset=utf8", "root", "");
    
    $stmt = $pdo->prepare("SELECT city FROM Cities WHERE countryid = ?");
    $stmt->execute([$countryId]);
    $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($cities) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Города</th></tr>";
        foreach ($cities as $c) {
            echo "<tr><td>" . htmlspecialchars($c['city']) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Городов для этой страны не найдено.";
    }
}