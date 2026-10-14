<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading - <?= esc($app_name) ?></title>
    <!-- Font Inter untuk kesan Clean & Minimalist -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reset & Base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8fafc; /* Abu-abu sangat terang / Putih tulang */
            overflow: hidden;
            position: relative;
        }

        /* Subtle Background Animation (Animasi Kecil di Latar) */
        .bg-pattern {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 0.5;
            z-index: 0;
            animation: panBackground 20s linear infinite;
        }

        @keyframes panBackground {
            0% { background-position: 0 0; }
            100% { background-position: 40px 40px; }
        }

        /* Main Container Minimalist */
        .landing-wrapper {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 40px;
            max-width: 600px;
            animation: fadeUp 1s ease-out forwards;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Logo Configuration */
        .logo-box {
            margin-bottom: 30px;
            display: inline-block;
            position: relative;
        }

        .logo-box img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border-radius: 50%;
            background: #ffffff;
            padding: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            animation: subtleBounce 3s ease-in-out infinite;
        }

        /* Fallback logo jika gambar tidak ada */
        .logo-fallback {
            width: 80px; height: 80px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            animation: subtleBounce 3s ease-in-out infinite;
        }

        @keyframes subtleBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        /* Robot Waving Animation */
        .greeting-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .robot-hand {
            width: 40px;
            height: 40px;
            transform-origin: bottom right;
            animation: waveRobot 2.5s infinite;
        }

        @keyframes waveRobot {
            0% { transform: rotate(0deg); }
            10% { transform: rotate(20deg); }
            20% { transform: rotate(-10deg); }
            30% { transform: rotate(20deg); }
            40% { transform: rotate(-10deg); }
            50% { transform: rotate(10deg); }
            60%, 100% { transform: rotate(0deg); }
        }

        /* Typography */
        .welcome-title {
            color: #1e293b; /* Slate 800 */
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .school-name {
            display: block;
            color: #3b82f6; /* Blue 500 */
            font-size: 1.8rem;
            font-weight: 700;
            margin-top: 5px;
        }

        .user-info {
            color: #64748b;
            font-size: 0.95rem;
            font-weight: 400;
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .role-badge {
            background: #e2e8f0;
            color: #475569;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Minimalist Loader (Titik-titik Animasi) */
        .loader-container {
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .dots-wrapper {
            display: flex;
            gap: 6px;
        }

        .dot {
            width: 8px;
            height: 8px;
            background-color: #cbd5e1;
            border-radius: 50%;
            animation: dotPulse 1.4s infinite ease-in-out both;
        }

        .dot:nth-child(1) { animation-delay: -0.32s; }
        .dot:nth-child(2) { animation-delay: -0.16s; }
        .dot:nth-child(3) { 
            background-color: #3b82f6; /* Accent color on last dot */
            animation-delay: 0s; 
        }

        @keyframes dotPulse {
            0%, 80%, 100% { transform: scale(0); opacity: 0.5; }
            40% { transform: scale(1); opacity: 1; }
        }

        .loading-text {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .welcome-title { font-size: 1.6rem; }
            .school-name { font-size: 1.4rem; }
            .robot-hand { width: 32px; height: 32px; }
            .logo-box img, .logo-fallback { width: 70px; height: 70px; }
        }
    </style>
</head>
<body>

    <!-- Subtle Background Pattern -->
    <div class="bg-pattern"></div>

    <div class="landing-wrapper">
        <!-- Logo -->
        <div class="logo-box">
            <?php if (file_exists(FCPATH . 'assets/uploads/logo/logo.png')): ?>
                <img src="<?= base_url('assets/uploads/logo/logo.png') ?>" alt="Logo">
            <?php else: ?>
                <div class="logo-fallback">🏫</div>
            <?php endif; ?>
        </div>

        <!-- Greeting Area -->
        <div class="greeting-header">
            <!-- SVG Animasi Tangan Robot Mekanik -->
            <svg class="robot-hand" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Telapak -->
                <rect x="7" y="10" width="10" height="10" rx="2" fill="#94a3b8"/>
                <path d="M7 15H17" stroke="#cbd5e1" stroke-width="1.5"/>
                <!-- Jari-jari robot (bentuk blocky) -->
                <rect x="7" y="4" width="2" height="5" rx="1" fill="#64748b"/>
                <rect x="11" y="2" width="2" height="7" rx="1" fill="#64748b"/>
                <rect x="15" y="4" width="2" height="5" rx="1" fill="#64748b"/>
                <rect x="3" y="11" width="3" height="2" rx="1" fill="#64748b"/>
                <!-- Sendi / Engsel -->
                <circle cx="12" cy="18" r="1.5" fill="#e2e8f0"/>
            </svg>

            <!-- Logika PHP Sesuai Permintaan -->
            <h1 class="welcome-title">
                <?php if (strtolower($role) === 'operator'): ?>
                    Selamat Datang
                <?php else: ?>
                    Selamat Datang di
                    <span class="school-name"><?= esc($app_name) ?></span>
                <?php endif; ?>
            </h1>
        </div>

        <!-- Nama User & Role -->
        <div class="user-info">
            <span><?= esc($user_name) ?></span>
            <span class="role-badge"><?= esc($role) ?></span>
        </div>

        <!-- Minimalist Loader -->
        <div class="loader-container">
            <div class="dots-wrapper">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
            <div class="loading-text">Memuat ruang kelompok 2...</div>
        </div>
    </div>

   <script>
setTimeout(function () {
    fetch("<?= base_url('landing/processLanding') ?>", {
        method: "POST",
        headers: {
            "X-Requested-With": "XMLHttpRequest"
        }
    })
    .then(response => response.json())
    .then(data => {
        window.location.href = data.redirect;
    })
    .catch(error => {
        console.error(error);
        window.location.href = "<?= base_url('admin/dashboard') ?>";
    });
}, 2500);
</script>
</body>
</html>