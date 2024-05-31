<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satbayev University Login</title>
    <link rel="shortcut icon" href="//resources.satbayev.university/images/favicons/favicon16.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="sulogo.png" alt="Satbayev University Logo">
        </div>
        <div class="language-toggle">
            <button class="lang-btn" onclick="setLanguage('kz')">Қаз</button>
            <button class="lang-btn active" onclick="setLanguage('ru')">Рус</button>
            <button class="lang-btn" onclick="setLanguage('en')">Eng</button>
        </div>
        <form method="post" action="login.php">
            <div class="login-box">
                <h2 id="system-label" data-key="myStatus">Мое Портфолио</h2>
                <div class="input-group">
                    <input type="text" name="name" placeholder="Логин" id="login-input" required>
                    <span id="domain">@satbayev.university</span>
                </div>
                <div class="input-group">
                    <input type="password" id="password-input" placeholder="Введите пароль" name="password" required>
                    <a href="#" class="password-control"></a>
                </div>
                <button type="submit" name="login_user" id="login-button" data-key="home">войти</button>    
                <?php if (isset($errors) && count($errors) > 0): ?>
                    <div class="error">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <a href="reset_password.php" class="reset-password" id="reset-password" data-key="resetPassword">Изменить пароль</a>
            </div>
        </form>

    </div>
    <script src="scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
