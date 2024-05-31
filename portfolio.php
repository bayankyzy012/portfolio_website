<?php
include('server.php');
if (!isset($_SESSION['user'])) {
    
    exit();
}

$userData = getUserData($_SESSION['user']['id']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU Dashboard</title>
    <link rel="shortcut icon" href="//resources.satbayev.university/images/favicons/favicon16.png">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <!-- Header Section -->
        <div class="section1">
            <div class="header">
                <div class="breadcrumbs">
                    <span><a href="index.php">Главная</a></span> &gt;
                    <span>Мой статус</span>
                </div>
                <div class="user-info">
                    
                    <span>
                        <button onclick="setLanguage('kz')">Каз</button>
                        <button onclick="setLanguage('ru')">Рус</button>
                        <button onclick="setLanguage('en')">Eng</button>
                    </span>
                    <?php if(isset($_COOKIE['user'])): ?>
                    <div class="dropdown">
                        <span class="dropdown-toggle" onclick="toggleDropdown()"><?= $_SESSION['user']['name'] ?></span>
                        <div class="dropdown-menu" id="dropdown-menu">
                            <a href="portfolio.php">Портфолио</a>
                            <a href="exit.php" data-key="logout">Выход</a>
                        </div>
                    </div>
                    <?php else: ?>
                        <a href="login.php">Войти</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="notification">  
                <span id="current-date-time"></span>
                <span data-key="noNewNotifications">У Вас нет новых уведомлений: 0</span>
            </div>

            <div class="content2">
                <div class="header1">
                    <?php if (!empty($userData['profile_image'])): ?>
                        <img src="<?= htmlspecialchars(urldecode($userData['profile_image'])) ?>" alt="Teacher Photo">
                    <?php else: ?>
                        <img src="path/to/default-photo.jpg" alt="Default Photo">
                    <?php endif; ?>
                    <div>
                        <h1><?php echo htmlspecialchars($userData['name']); ?></h1>
                        <p><?php echo htmlspecialchars($userData['workplace']); ?> | <?php echo htmlspecialchars($userData['position']); ?></p>
                        <p><?php echo htmlspecialchars($userData['education']); ?></p>
                    </div>
                </div>

                <div class="profile-details">
                    <h2>Портфолио</h2>
                    <p><strong>ФИО:</strong> <span><?php echo htmlspecialchars($userData['name']); ?></span></p>
                    <p><strong>Место работы:</strong> <span><?php echo htmlspecialchars($userData['workplace']); ?></span></p>
                    <p><strong>Должность:</strong> <span><?php echo htmlspecialchars($userData['position']); ?></span></p>
                    <p><strong>Образование:</strong> <span><?php echo htmlspecialchars($userData['education']); ?></span></p>
                    <p><strong>Опыт работы:</strong> <span><?php echo htmlspecialchars($userData['experience']); ?></span></p>
                    <p><strong>Публикации:</strong> <span><?php echo htmlspecialchars($userData['publications']); ?></span></p>
                    <p><strong>Проекты:</strong> <span><?php echo htmlspecialchars($userData['projects']); ?></span></p>
                    <p><strong>Патенты:</strong> <span><?php echo htmlspecialchars($userData['patents']); ?></span></p>
                </div>

                <div class="profile-actions">
                    <a href="status.php">Редактировать профиль</a>
                </div>
            </div>

            

        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
