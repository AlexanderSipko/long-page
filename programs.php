<?php
include 'data.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Программы - <?= htmlspecialchars($siteData['site_title']) ?></title>
    
    <link rel="icon" type="image/png" href="images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="images/favicon/favicon.svg" />
    <link rel="shortcut icon" href="images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="images/favicon/site.webmanifest" />

    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <meta name="description" content="Психологические программы и курсы">
    <meta name="keywords" content="психология, программы, курсы, тренинги">
</head>
<body>

<nav>
    <a href="index.php#about">Обо мне</a>
    <a href="index.php#directions">Направления</a>
    <a href="index.php#prices">Цены</a>
    <a href="programs.php">Программы</a>
    <a href="articles.php">Статьи</a>
    <a href="index.php#contacts">Контакты</a>
</nav>

<header>
    <h1>Психологические программы</h1>
    <div class="photo-caption">
        <p>Глубокие трансформационные программы для личностного роста</p>
    </div>
</header>

<section class="programs-list">
    <h2>Текущие программы</h2>
    
    <?php if (isset($siteData['programs']) && !empty($siteData['programs'])): ?>
        <?php foreach ($siteData['programs'] as $program): ?>
            <div class="program-card">
                <div class="program-header">
                    <span class="program-icon"><?= htmlspecialchars($program['icon']) ?></span>
                    <h3><?= htmlspecialchars($program['title']) ?></h3>
                </div>
                <p class="program-description"><?= htmlspecialchars($program['description']) ?></p>
                
                <?php if (!empty($program['details'])): ?>
                    <div class="program-details">
                        <h4>Что вас ждет:</h4>
                        <ul>
                            <?php foreach ($program['details'] as $detail): ?>
                                <li>✓ <?= htmlspecialchars($detail) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <div class="program-meta">
                    <span class="program-duration">📅 <?= htmlspecialchars($program['duration']) ?></span>
                    <span class="program-price">💰 <?= htmlspecialchars($program['price']) ?></span>
                </div>
                
                <a href="index.php#contacts" class="program-button">Записаться</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center text-gray-500">Программы скоро будут доступны</p>
    <?php endif; ?>
</section>

<section class="programs-cta">
    <h2>Индивидуальный подход</h2>
    <p>Все программы адаптируются под ваши личные запросы и особенности</p>
    <a href="index.php#contacts" class="cta-button">Связаться для консультации</a>
</section>

<footer>
    <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($siteData['site_title']) ?>. Все права защищены.</p>
</footer>

<!-- Кнопка вверх -->
<button class="scroll-top" id="scrollTopBtn">&#8679;</button>

<!-- Ссылка на Телеграм -->
<a class="telegram-link" href="<?= htmlspecialchars($siteData['telegram_link']) ?>" target="_blank">&#128172;</a>

<script src="js/scripts.js"></script>
</body>
</html>