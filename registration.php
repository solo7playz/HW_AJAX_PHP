<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <style>
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h2>Регистрация</h2>
    <form action="save_user.php" method="POST">
        <div>
            Логин: <br>
            <input type="text" id="login" name="login" required onblur="checkLogin(this.value)">
            <span id="loginStatus"></span>
        </div>
        <br>
        <div>
            Пароль: <br>
            <input type="password" name="pass" required>
        </div>
        <br>
        <button type="submit" id="submitBtn">Зарегистрироваться</button>
    </form>

    <script>
    function checkLogin(login) {
        let statusSpan = document.getElementById('loginStatus');
        let btn = document.getElementById('submitBtn');

        if (login.length < 2) {
            statusSpan.innerHTML = "";
            return;
        }

        fetch('check_login.php?login=' + encodeURIComponent(login))
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    statusSpan.innerHTML = "✖ Логин занят!";
                    statusSpan.className = "error";
                    btn.disabled = true; 
                } else {
                    statusSpan.innerHTML = "✔ Свободен";
                    statusSpan.className = "success";
                    btn.disabled = false; 
                }
            });
    }
    </script>
</body>
</html>
