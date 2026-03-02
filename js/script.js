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

if (scrollTopBtn) {
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

        if (window.location.hash) {
            history.replaceState(null, null, window.location.pathname);
        }
    });
}

// Мобильное меню
const mobileMenu = document.getElementById('mobile-menu');
const navMenu = document.getElementById('nav-menu');

if (mobileMenu) {
    mobileMenu.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    // Закрыть меню при клике на ссылку
    document.querySelectorAll('.nav-menu a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });
}

// Функция для статей
function toggleArticle(btn) {
    const articleContent = btn.previousElementSibling;
    if (articleContent.style.display === 'none' || !articleContent.style.display) {
        articleContent.style.display = 'block';
        btn.textContent = 'Скрыть';
    } else {
        articleContent.style.display = 'none';
        btn.textContent = 'Читать далее';
    }
}