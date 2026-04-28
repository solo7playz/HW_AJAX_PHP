<?php
// Подключение к БД (используем ранее созданную логику)
$pdo = new PDO("mysql:host=localhost;dbname=my_site;charset=utf8", "root", "");
$countries = $pdo->query("SELECT * FROM Countries")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список городов</title>
</head>
<body>
    <h2>Выберите страну:</h2>
    <select id="countrySelect" onchange="loadCities(this.value)">
        <option value="">-- Выберите страну --</option>
        <?php foreach ($countries as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['country'] ?></option>
        <?php endforeach; ?>
    </select>

    <div id="citiesTableContainer" style="margin-top: 20px;">
        <!-- Сюда AJAX подставит таблицу -->
    </div>

    <script>
    function loadCities(countryId) {
        if (!countryId) {
            document.getElementById('citiesTableContainer').innerHTML = '';
            return;
        }

        // Используем современный Fetch API вместо старого XMLHttpRequest
        fetch('get_cities.php?countryid=' + countryId)
            .then(response => response.text())
            .then(data => {
                document.getElementById('citiesTableContainer').innerHTML = data;
            })
            .catch(error => console.error('Ошибка:', error));
    }
    </script>
</body>
</html>