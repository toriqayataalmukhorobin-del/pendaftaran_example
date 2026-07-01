<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>SMK Mutuharjo</title>
    <link rel="stylesheet" href="css/js.css">
    <style>
        /* ===== PRELOADER ===== */
        /* ===== PRELOADER PREMIUM ===== */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, #1a2a5e 0%, #080f2d 100%);
            z-index: 9999999;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: opacity 1s cubic-bezier(0.4, 0, 0.2, 1), visibility 1s;
        }

        .preloader-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
            position: relative;
        }

        .logo-container {
            position: relative;
            width: 130px;
            height: 130px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-container::before {
            content: '';
            position: absolute;
            width: 170%;
            height: 170%;
            background: radial-gradient(circle, rgba(0, 113, 250, 0.15) 0%, transparent 70%);
            animation: pulse-glow 2s infinite alternate ease-in-out;
        }

        /* ===== ORBITAL RINGS ===== */
        .orbital-ring {
            position: absolute;
            border-radius: 50%;
            border: 2px solid transparent;
            z-index: 1;
        }

        .ring-outer {
            width: 180px;
            height: 180px;
            border-top: 2px solid rgba(0, 198, 255, 0.6);
            border-bottom: 2px solid rgba(0, 113, 250, 0.3);
            animation: rotate-clockwise 4s linear infinite;
            filter: drop-shadow(0 0 10px rgba(0, 198, 255, 0.4));
        }

        .ring-inner {
            width: 150px;
            height: 150px;
            border-left: 2px solid rgba(5, 230, 234, 0.5);
            border-right: 2px solid rgba(0, 113, 250, 0.5);
            animation: rotate-counter-clockwise 3s linear infinite;
        }

        @keyframes rotate-clockwise {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes rotate-counter-clockwise {
            from { transform: rotate(360deg); }
            to { transform: rotate(0deg); }
        }

        @keyframes pulse-glow {
            from { transform: scale(0.85); opacity: 0.4; }
            to { transform: scale(1.1); opacity: 0.7; }
        }

        #preloader img {
            width: 100px;
            height: auto;
            z-index: 2;
            filter: drop-shadow(0 0 15px rgba(0, 198, 255, 0.5));
            animation: float 3s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .welcome-text {
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            overflow: hidden;
        }

        .welcome-text h2 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(to right, #ffffff, #00c6ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0;
            transform: translateY(20px);
            animation: fade-up 0.8s forwards 0.5s;
        }

        .welcome-text p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-top: 8px;
            opacity: 0;
            animation: fade-in 1s forwards 1.2s;
        }

        @keyframes fade-up {
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fade-in {
            to { opacity: 1; }
        }

        .loader-bar {
            width: 200px;
            height: 3px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
        }

        .loader-progress {
            width: 0%;
            height: 100%;
            background: linear-gradient(to right, #0071fa, #05e6ea);
            box-shadow: 0 0 10px #00c6ff;
            animation: progress 2.5s ease-in-out forwards;
        }

        @keyframes progress {
            0% { width: 0%; }
            100% { width: 100%; }
        }

        body.loaded #preloader {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            opacity: 0;
            transform: scale(0.95) translateY(20px);
            transition: opacity 1s ease 0.3s, transform 1s ease 0.3s;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body.loaded .main-content {
            opacity: 1;
            transform: scale(1) translateY(0);
        }

        /* ===== HAMBURGER BUTTON ===== */
        .hamburger {
            position: fixed;
            top: max(14px, env(safe-area-inset-top));
            right: max(14px, env(safe-area-inset-right));
            z-index: 10000;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            width: clamp(44px, 11vw, 48px);
            height: clamp(44px, 11vw, 48px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            padding: 0;
            touch-action: manipulation;
        }

        .hamburger:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(1.08);
        }

        .hamburger span {
            display: block;
            width: 24px;
            height: 2.5px;
            background: #ffffff;
            border-radius: 4px;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }

        /* Animasi X saat aktif */
        .hamburger.active span:nth-child(1) {
            transform: translateY(8.5px) rotate(45deg);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        .hamburger.active span:nth-child(3) {
            transform: translateY(-8.5px) rotate(-45deg);
        }

        /* ===== NAV OVERLAY (slide dari kiri) ===== */
        .nav-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: min(300px, calc(100vw - 48px));
            height: 100%;
            height: 100dvh;
            background: rgba(10, 20, 60, 0.92);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.15);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            padding-top: max(76px, env(safe-area-inset-top, 0px) + 56px);
            padding-left: max(22px, env(safe-area-inset-left));
            padding-right: max(22px, env(safe-area-inset-right));
            padding-bottom: max(28px, env(safe-area-inset-bottom));
            box-sizing: border-box;
            transform: translateX(-100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 5px 0 30px rgba(0, 0, 0, 0.5);
            overflow-x: hidden;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        .nav-overlay.open {
            transform: translateX(0);
        }

        /* Tombol tutup (X) di dalam nav */
        .nav-close {
            position: absolute;
            top: max(14px, env(safe-area-inset-top));
            right: max(14px, env(safe-area-inset-right));
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 8px;
            width: 38px;
            height: 38px;
            font-size: 22px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
            line-height: 1;
        }

        .nav-close:hover {
            background: rgba(255, 100, 100, 0.4);
        }

        /* Label sekolah di atas nav */
        .nav-overlay::before {
            content: 'SMK Mutuharjo';
            display: block;
            color: rgba(255, 255, 255, 0.5);
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 30px;
            font-family: 'Poppins', sans-serif;
        }

        /* Link navigasi */
        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            padding: 14px 20px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.12);
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            transform: translateX(0);
        }

        .nav-links a:hover {
            background: rgba(0, 150, 255, 0.3);
            border-color: rgba(0, 200, 255, 0.5);
            transform: translateX(6px);
            box-shadow: 0 4px 20px rgba(0, 100, 255, 0.3);
        }

        /* Staggered animation untuk tiap link */
        .nav-overlay.open .nav-links a:nth-child(1) { animation: slideIn 0.4s 0.07s both; }
        .nav-overlay.open .nav-links a:nth-child(2) { animation: slideIn 0.4s 0.14s both; }
        .nav-overlay.open .nav-links a:nth-child(3) { animation: slideIn 0.4s 0.21s both; }
        .nav-overlay.open .nav-links a:nth-child(4) { animation: slideIn 0.4s 0.28s both; }
        .nav-overlay.open .nav-links a:nth-child(5) { animation: slideIn 0.4s 0.35s both; }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* ===== BACKDROP ===== */
        .nav-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.4s ease, visibility 0.4s ease;
            backdrop-filter: blur(2px);
        }

        .nav-backdrop.show {
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 360px) {
            .nav-links a {
                font-size: 14px;
                padding: 12px 16px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .nav-overlay,
            .nav-backdrop,
            .hamburger span {
                transition: none !important;
            }
            .nav-overlay.open .nav-links a {
                animation: none !important;
            }
        }
    </style>
</head>
<body class="home">
    <!-- Layar Loading Premium -->
    <div id="preloader">
        <div class="preloader-content">
            <div class="logo-container">
                <div class="orbital-ring ring-outer"></div>
                <div class="orbital-ring ring-inner"></div>
                <img src="img/logo-sekolah.webp" alt="Logo SMK Mutuharjo">
            </div>
            <div class="welcome-text">
                <h2>Selamat Datang</h2>
                <p>SMK MUTUHARJO</p>
            </div>
            <div class="loader-bar">
                <div class="loader-progress"></div>
            </div>
        </div>
    </div>

    <!-- Hamburger Button -->
    <button class="hamburger" id="hamburgerBtn" aria-label="Buka Menu">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <!-- Nav Overlay -->
    <div class="nav-overlay" id="navOverlay">
        <button class="nav-close" id="navClose" aria-label="Tutup Menu">&times;</button>
        <nav class="nav-links">
            <a href="#">🏠 Home</a>
            <a href="pages/form-daftar.php">📝 Daftar Baru</a>
            <a href="pages/info.php">ℹ️ Info</a>
            <a href="pages/galery.php">🖼️ Galeri</a>
            <a href="pages/login.php">🔒 Login Portal</a>
        </nav>
    </div>

    <!-- Backdrop -->
    <div class="nav-backdrop" id="navBackdrop"></div>

    <!-- Konten Utama -->
    <div class="main-content">
        <div class="hero">
            <img src="img/logo-sekolah.webp" alt="">
            <h3>Pendaftaran Siswa Baru</h3>
            <h1 class="typing"></h1>
        </div>
    </div>

    <script>
        // ===== HAMBURGER MENU =====
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const navOverlay = document.getElementById('navOverlay');
        const navClose = document.getElementById('navClose');
        const navBackdrop = document.getElementById('navBackdrop');

        function openNav() {
            navOverlay.classList.add('open');
            navBackdrop.classList.add('show');
            hamburgerBtn.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeNav() {
            navOverlay.classList.remove('open');
            navBackdrop.classList.remove('show');
            hamburgerBtn.classList.remove('active');
            document.body.style.overflow = '';
        }

        hamburgerBtn.addEventListener('click', function() {
            if (navOverlay.classList.contains('open')) closeNav();
            else openNav();
        });
        navClose.addEventListener('click', closeNav);
        navBackdrop.addEventListener('click', closeNav);

        // Tutup nav dengan tombol Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeNav();
        });

        // ===== TYPING EFFECT =====
        const words = [
            "SMK MUTUHARJO", "DISIPLIN, CERDAS, SUKSES",
            "MUTUHARJO BERINOVASI!", "MUTUHARJO BERAKHLAK MULIA!",
            "MUTUHARJO BERKUALITAS!", "MUTUHARJO BERKARAKTER!",
            "MUTUHARJO BERKREASI!"
        ];
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        const typingEl = document.querySelector('.typing');

        function typeEffect() {
            const currentWord = words[wordIndex];

            if (isDeleting) {
                typingEl.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typingEl.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
            }

            let typeSpeed = isDeleting ? 50 : 140;

            if (!isDeleting && charIndex === currentWord.length) {
                typeSpeed = 500;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                wordIndex = (wordIndex + 1) % words.length;
                typeSpeed = 500;
            }

            setTimeout(typeEffect, typeSpeed);
        }

        // ===== SMART PRELOADER LOGIC =====
        function initApp() {
            const preloader = document.getElementById('preloader');
            const perfEntries = performance.getEntriesByType("navigation");
            const navType = perfEntries.length > 0 ? perfEntries[0].type : "";

            // Cek apakah berasal dari internal site (referrer)
            const isInternal = document.referrer && document.referrer.includes(window.location.hostname);

            // LOGIKA: Jalankan animasi jika REFRESH atau BUKA PERTAMA (bukan dari internal)
            if (navType === "reload" || !isInternal) {
                window.addEventListener('load', function() {
                    setTimeout(function() {
                        document.body.classList.add('loaded');
                        setTimeout(typeEffect, 800);
                    }, 2500); // Durasi loading disesuaikan dengan animasi bar
                });
            } else {
                // SKIP Animasi: Langsung hilangkan preloader
                preloader.style.display = 'none';
                document.body.classList.add('loaded');
                typeEffect();
            }
        }

        initApp();
    </script>
</body>
</html>