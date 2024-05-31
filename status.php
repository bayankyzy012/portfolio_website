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
                    <span>Мое Портфолио</span>
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

            <!-- Main Content -->
            <div class="content">
                <div class="student-status">
                <?php if(isset($_COOKIE['user'])): ?>
                    <?php if (!empty($userData['profile_image'])): ?>
                        <!-- Assuming $userData['profile_image'] contains the path to the image -->
                        <img src="<?= htmlspecialchars($userData['profile_image']) ?>" alt="Teacher Photo">
                    <?php else: ?>
                        <!-- If no profile image is available, show a default photo -->
                        <img src="path/to/default-photo.jpg" alt="Default Photo">
                    <?php endif; ?>
                    <div class="status-info">
                        <form method="post" enctype="multipart/form-data">
                            <input class="in" type="text" name="workplace" value="<?= htmlspecialchars($userData['workplace'] ?? '') ?>" placeholder="Место работы" required> 
                            <input class="in" type="text" name="position" value="<?= htmlspecialchars($userData['position'] ?? '') ?>" placeholder="Должность" required>
                            <input class="in" type="text" name="education" value="<?= htmlspecialchars($userData['education'] ?? '') ?>" placeholder="Образование" required>
                            <input class="in" type="text" name="experience" value="<?= htmlspecialchars($userData['experience'] ?? '') ?>" placeholder="Опыт работы" required>
                            <input class="in" type="text" name="publications" value="<?= htmlspecialchars($userData['publications'] ?? '') ?>" placeholder="Публикации" required>
                            <input class="in" type="text" name="projects" value="<?= htmlspecialchars($userData['projects'] ?? '') ?>" placeholder="Проекты" required>
                            <input class="in" type="text" name="patents" value="<?= htmlspecialchars($userData['patents'] ?? '') ?>" placeholder="Патенты" required>
                            <input class="file-input" type="file" name="profile_image" accept="image/*" id="file-input" required>
                            <label for="file-input" class="file-label btn">Выбрать файл</label>
                            
                            <button class="btn" type="submit" name="save_profile">Сохранить</button>
                        </form>
                        <a class="aa" href="portfolio.php">Просмотр портфолио</a>
                    </div>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>