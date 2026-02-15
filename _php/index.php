<?php
include 'data.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($siteData['site_title']) ?></title>
    
    <link rel="icon" type="image/png" href="images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="images/favicon/favicon.svg" />
    <link rel="shortcut icon" href="images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="images/favicon/site.webmanifest" />

    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SEO -->
    <meta name="description" content="<?= htmlspecialchars($siteData['seo']['description']) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($siteData['seo']['keywords']) ?>">

    <!-- Open Graph / Соцсети -->
    <meta property="og:title" content="<?= htmlspecialchars($siteData['seo']['og_title']) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($siteData['seo']['og_description']) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($siteData['seo']['og_image']) ?>">
    <meta property="og:type" content="website">
    <?php
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        $currentUrl = $scheme . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        ?>
    <meta property="og:url" content="<?= htmlspecialchars($currentUrl) ?>">
</head>

<body>

<nav>
    <a href="#about">Обо мне</a>
    <a href="#directions">Направления</a>
    <a href="#prices">Цены</a>
    <a href="#contacts">Контакты</a>
</nav>

<header id="top">
    <h1><?= htmlspecialchars($siteData['site_title']) ?></h1>
    <div class="photo-container">
    <?php
    $photoPath = 'images/psychologist.jpg';
    if (file_exists($photoPath)) {
        echo '<img src="' . $photoPath . '" alt="Фото психолога">';
    } else {
        echo '<div class="photo-placeholder">Фото психолога</div>';
    }
    ?>
    </div>
    <div class="photo-caption">
        <p>Здесь вас услышат, поддержат и помогут найти гармонию в жизни.</p>
    </div>
</header>
<section id="about" class="fade-in-left">
    <h2><?= htmlspecialchars($siteData['about']['title']) ?></h2>

    <div class="about-gallery">
        <?php foreach ($siteData['about']['gallery'] as $index => $photo): ?>
            <div class="about-item <?= $index % 2 == 0 ? 'left' : 'right' ?>">
                <div class="about-photo">
                    <img src="<?= htmlspecialchars($photo) ?>" alt="Фото психолога">
                </div>
                <div class="about-text">
                    <p><?= htmlspecialchars($siteData['about']['texts'][$index] ?? '') ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="directions" class="directions-section fade-in-right">
    <h2><?= htmlspecialchars($siteData['directions']['title']) ?></h2>
    <div class="directions-list">
        <?php foreach ($siteData['directions']['items'] as $item): ?>
            <div class="direction-item">
                <div class="direction-icon"><?= htmlspecialchars($item['icon']) ?></div>
                <div class="direction-text">
                    <h3><?= htmlspecialchars($item['title']) ?></h3>
                    <p><?= htmlspecialchars($item['description']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="prices" class="fade-in-left">
    <h2>Цены на услуги</h2>
    <div class="price-cards">
        <?php foreach ($siteData['prices']['items'] as $item): ?>
            <div class="price-card">
                <h3><?= htmlspecialchars($item['icon']) ?> <?= htmlspecialchars($item['title']) ?></h3>
                <p><?= htmlspecialchars($item['duration']) ?> — <?= htmlspecialchars($item['price']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="consultation-roadmap">
    <h2>Как проходит консультация</h2>
    <div class="step">
        <div class="step-number">1</div>
        <div class="step-text">
            Первая встреча — знакомство и понимание запроса
        </div>
    </div>
    <div class="step">
        <div class="step-number">2</div>
        <div class="step-text">
            Определение целей и ожиданий
        </div>
    </div>
    <div class="step">
        <div class="step-number">3</div>
        <div class="step-text">
            Пошаговая поддержка в процессе изменений
        </div>
    </div>
</section>

<section id="contacts" class="fade-in-right">
    <h2><?= htmlspecialchars($siteData['contacts']['title']) ?></h2>

    <div class="contact-buttons">
        <a href="tel:<?= htmlspecialchars($siteData['contacts']['phone']) ?>" class="contact-button call-button">Позвонить</a>
    </div>
    <div class="mt-4 space-x-4">
        <a href="<?= htmlspecialchars($siteData['telegram_link']); ?>" target="_blank" class="text-green-500 hover:text-green-700">
            <i class="fab fa-whatsapp fa-2x"></i> WhatsApp
        </a>
        <a href="<?=htmlspecialchars($siteData['telegram_link']); ?>" target="_blank" class="text-blue-500 hover:text-blue-700">
            <i class="fab fa-telegram-plane fa-2x"></i> Telegram
        </a>
    </div>
</section>

<footer>
    <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($siteData['site_title']) ?>. Все права защищены.</p>
</footer>

<!-- Кнопка вверх -->
<button class="scroll-top" id="scrollTopBtn">&#8679;</button>

<!-- Ссылка на Телеграм -->
<a class="telegram-link" href="<?= htmlspecialchars($siteData['telegram_link']) ?>" target="_blank">&#128172;</a>

<script>
// Плавное появление секций при скролле
const sections = document.querySelectorAll('section');

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, {
    threshold: 0.2
});

sections.forEach(section => {
    observer.observe(section);
});

// Появление кнопки "Вверх"
const scrollTopBtn = document.getElementById('scrollTopBtn');

window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
        scrollTopBtn.style.display = 'block';
    } else {
        scrollTopBtn.style.display = 'none';
    }
});

scrollTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });

    // Убираем #hash из URL
    if (window.location.hash) {
        history.replaceState(null, null, window.location.pathname);
    }
});
</script>

<!-- <script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.2
    });

    document.querySelectorAll('.fade-in-left, .fade-in-right').forEach(el => observer.observe(el));
</script> -->
</body>
</html>
