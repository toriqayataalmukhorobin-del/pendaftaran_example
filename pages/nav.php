<style>
    /* ===== HAMBURGER SELF-CONTAINED CSS ===== */
    #hamburgerBtn {
        position: fixed;
        top: max(14px, env(safe-area-inset-top));
        right: max(14px, env(safe-area-inset-right));
        z-index: 10000;
        background: rgba(109, 118, 132, 0.65);
        border: 1px solid rgba(255, 255, 255, 0.35);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
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
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        touch-action: manipulation;
    }

    #hamburgerBtn:hover {
        background: rgba(100, 100, 100, 0.685);
        transform: scale(1.07);
    }

    #hamburgerBtn span {
        display: block;
        width: 24px;
        height: 2.5px;
        background: #ffffff;
        border-radius: 4px;
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        transform-origin: center;
    }

    #hamburgerBtn.active span:nth-child(1) {
        transform: translateY(8.5px) rotate(45deg);
    }

    #hamburgerBtn.active span:nth-child(2) {
        opacity: 0;
        transform: scaleX(0);
    }

    #hamburgerBtn.active span:nth-child(3) {
        transform: translateY(-8.5px) rotate(-45deg);
    }

    /* ===== NAV OVERLAY ===== */
    #navOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: min(300px, calc(100vw - 48px));
        max-width: 100vw;
        height: 100%;
        height: 100dvh;
        background: rgba(8, 15, 55, 0.95);
        backdrop-filter: blur(30px);
        -webkit-backdrop-filter: blur(30px);
        border-right: 1px solid rgba(255, 255, 255, 0.15);
        z-index: 9999;
        display: flex;
        flex-direction: column;
        padding-top: max(72px, env(safe-area-inset-top, 0px) + 56px);
        padding-left: max(20px, env(safe-area-inset-left));
        padding-right: max(20px, env(safe-area-inset-right));
        padding-bottom: max(24px, env(safe-area-inset-bottom));
        box-sizing: border-box;
        box-shadow: 6px 0 30px rgba(0, 0, 0, 0.5);
        transform: translateX(-100%);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow-x: hidden;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }

    #navOverlay.open {
        transform: translateX(0);
    }

    #navClose {
        position: absolute;
        top: max(14px, env(safe-area-inset-top));
        right: max(14px, env(safe-area-inset-right));
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        border-radius: 8px;
        width: 38px;
        height: 38px;
        font-size: 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s;
        line-height: 1;
        font-family: sans-serif;
    }

    #navClose:hover {
        background: rgba(255, 70, 70, 0.45);
    }

    .nav-brand-label {
        color: rgba(255, 255, 255, 0.4);
        font-size: 10px;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 25px;
        font-family: 'Poppins', Arial, sans-serif;
    }

    #navOverlay .nav-menu-links {
        display: flex;
        flex-direction: column;
        gap: 10px;
        list-style: none;
        margin: 0;
        padding: 0;
        text-align: left;
    }

    #navOverlay .nav-menu-links a {
        text-decoration: none;
        color: white !important;
        font-family: 'Poppins', Arial, sans-serif;
        font-size: 15px;
        font-weight: 500;
        padding: 13px 18px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.07) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        display: flex !important;
        align-items: center;
        gap: 12px;
        transition: all 0.3s ease;
        margin: 0 !important;
        box-sizing: border-box;
        transform: none !important;
        box-shadow: none;
    }

    #navOverlay .nav-menu-links a:hover {
        background: rgba(0, 120, 255, 0.35) !important;
        border-color: rgba(0, 200, 255, 0.5) !important;
        transform: translateX(6px) !important;
        box-shadow: 0 4px 20px rgba(0, 100, 255, 0.25) !important;
        color: white !important;
    }

    /* Staggered animation */
    #navOverlay.open .nav-menu-links a:nth-child(1) { animation: navIn 0.4s 0.07s both; }
    #navOverlay.open .nav-menu-links a:nth-child(2) { animation: navIn 0.4s 0.14s both; }
    #navOverlay.open .nav-menu-links a:nth-child(3) { animation: navIn 0.4s 0.21s both; }
    #navOverlay.open .nav-menu-links a:nth-child(4) { animation: navIn 0.4s 0.28s both; }
    #navOverlay.open .nav-menu-links a:nth-child(5) { animation: navIn 0.4s 0.35s both; }

    @keyframes navIn {
        from { opacity: 0; transform: translateX(-18px); }
        to { opacity: 1; transform: translateX(0); }
    }

    /* ===== BACKDROP ===== */
    #navBackdrop {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 15, 0.55);
        z-index: 9998;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.4s ease, visibility 0.4s ease;
        backdrop-filter: blur(2px);
        -webkit-backdrop-filter: blur(2px);
    }

    #navBackdrop.show {
        opacity: 1;
        visibility: visible;
    }

    @media (max-width: 360px) {
        #navOverlay .nav-menu-links a {
            font-size: 14px;
            padding: 12px 14px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        #navOverlay,
        #navBackdrop,
        #hamburgerBtn span {
            transition: none !important;
        }
        #navOverlay.open .nav-menu-links a {
            animation: none !important;
        }
    }

    /* ===== TOAST NOTIFICATION ===== */
    #toastContainer {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 99999;
        display: flex;
        flex-direction: column;
        gap: 12px;
        pointer-events: none;
    }

    .toast-item {
        pointer-events: auto;
        min-width: 280px;
        max-width: 350px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        padding: 16px 20px;
        color: white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        gap: 15px;
        transform: translateX(120%);
        transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .toast-item.show {
        transform: translateX(0);
    }

    .toast-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 6px;
    }

    .toast-item.success::before { background: #00ff88; }
    .toast-item.error::before { background: #ff4444; }
    .toast-item.info::before { background: #00c6ff; }

    .toast-icon {
        font-size: 24px;
        flex-shrink: 0;
    }

    .toast-content {
        flex-grow: 1;
    }

    .toast-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 15px;
        margin-bottom: 2px;
        display: block;
    }

    .toast-message {
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        opacity: 0.8;
        display: block;
    }

    .toast-close {
        cursor: pointer;
        opacity: 0.5;
        transition: 0.3s;
        font-size: 18px;
    }

    .toast-close:hover {
        opacity: 1;
    }

    @keyframes toastProgress {
        from { width: 100%; }
        to { width: 0%; }
    }

    .toast-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        background: rgba(255, 255, 255, 0.3);
        animation: toastProgress 4s linear forwards;
    }
</style>

<!-- Hamburger Button -->
<button id="hamburgerBtn" aria-label="Buka Menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<!-- Nav Overlay -->
<div id="navOverlay">
    <button id="navClose" aria-label="Tutup Menu">&times;</button>
    <div class="nav-brand-label">SMK Mutuharjo</div>
    <nav class="nav-menu-links">
        <a href="../index.php">🏠 Home</a>
        <a href="form-daftar.php">📝 Daftar Baru</a>
        <a href="info.php">ℹ️ Informasi</a>
        <a href="https://smkmuh1-skh.sch.id/" target="_blank" rel="noopener noreferrer">🌐 Situs Resmi</a>
        <a href="galery.php">🖼️ Galeri</a>
        <a href="login.php">🔒 Login Portal</a>
    </nav>
</div>

<!-- Backdrop -->
<div id="navBackdrop"></div>

<!-- Toast Container -->
<div id="toastContainer"></div>

<script>
    (function() {
        var btn = document.getElementById('hamburgerBtn');
        var overlay = document.getElementById('navOverlay');
        var closeBtn = document.getElementById('navClose');
        var backdrop = document.getElementById('navBackdrop');

        function openNav() {
            overlay.classList.add('open');
            backdrop.classList.add('show');
            btn.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeNav() {
            overlay.classList.remove('open');
            backdrop.classList.remove('show');
            btn.classList.remove('active');
            document.body.style.overflow = '';
        }

        btn.addEventListener('click', function() {
            if (overlay.classList.contains('open')) closeNav();
            else openNav();
        });
        closeBtn.addEventListener('click', closeNav);
        backdrop.addEventListener('click', closeNav);
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeNav();
        });

        // ===== TOAST SYSTEM =====
        window.showToast = function(title, message, type = 'success') {
            var container = document.getElementById('toastContainer');
            var toast = document.createElement('div');
            toast.className = 'toast-item ' + type;

            var icon = '🔔';
            if (type === 'success') icon = '✅';
            if (type === 'error') icon = '❌';
            if (type === 'info') icon = 'ℹ️';

            toast.innerHTML = `
            <div class="toast-icon">${icon}</div>
            <div class="toast-content">
                <strong class="toast-title">${title}</strong>
                <span class="toast-message">${message}</span>
            </div>
            <div class="toast-close">&times;</div>
            <div class="toast-progress"></div>
        `;

            container.appendChild(toast);

            // Trigger animation
            setTimeout(() => toast.classList.add('show'), 10);

            // Auto remove
            var timer = setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 500);
            }, 4000);

            toast.querySelector('.toast-close').onclick = function() {
                clearTimeout(timer);
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 500);
            };
        };

        // Auto-detect status from URL
        window.addEventListener('DOMContentLoaded', function() {
            var params = new URLSearchParams(window.location.search);

            // Pendaftaran
            if (params.get('status') === 'sukses') {
                showToast('Berhasil!', 'Data pendaftaran telah tersimpan.', 'success');
            } else if (params.get('status') === 'gagal') {
                showToast('Gagal!', 'Terjadi kesalahan saat mendaftar.', 'error');
            }

            // Login
            if (params.get('login') === 'berhasil') {
                showToast('Selamat Datang!', 'Anda berhasil login ke portal.', 'success');
            } else if (params.get('login') === 'gagal') {
                showToast('Login Gagal!', 'Username atau password salah.', 'error');
            }

            // Edit/Hapus
            if (params.get('edit') === 'berhasil') {
                showToast('Update Berhasil!', 'Data siswa telah diperbarui.', 'success');
            }
            if (params.get('hapus') === 'berhasil') {
                showToast('Terhapus!', 'Data siswa telah dihapus dari sistem.', 'info');
            }
        });
    })();
</script>
