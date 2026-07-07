<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $sekolah['nama_sekolah'] ?? 'Detail Sekolah'; ?></title>

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        /* ============================================
           GLOBAL & RESET
           ============================================ */
        :root {
            --primary: #2563eb;
            --primary-glow: rgba(37, 99, 235, 0.4);
            --accent: #f59e0b;
            --dark: #0f172a;
            --glass-bg: rgba(255, 255, 255, 0.65);
            --glass-border: rgba(255, 255, 255, 0.8);
            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 40px -10px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 30px 60px -15px var(--primary-glow);
            --bezier-smooth: cubic-bezier(0.22, 1, 0.36, 1);
            --bezier-bouncy: cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #e2e8f0;
            color: #334155;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* ============================================
           AMBIENT BACKGROUND
           ============================================ */
        .ambient-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            overflow: hidden;
            background: #f1f5f9;
        }

        .ambient-blob {
            position: absolute;
            filter: blur(100px);
            opacity: 0.5;
            border-radius: 50%;
            animation: drift 25s infinite alternate var(--bezier-smooth);
            transform-origin: center;
        }

        .blob-1 {
            top: -10%;
            left: -10%;
            width: 55vw;
            height: 55vw;
            background: rgba(56, 189, 248, 0.35);
        }

        .blob-2 {
            bottom: -10%;
            right: -10%;
            width: 65vw;
            height: 65vw;
            background: rgba(129, 140, 248, 0.35);
            animation-delay: -5s;
        }

        .blob-3 {
            top: 40%;
            left: 30%;
            width: 45vw;
            height: 45vw;
            background: rgba(250, 204, 21, 0.2);
            animation-delay: -10s;
        }

        @keyframes drift {
            0% {
                transform: translate(0, 0) scale(1) rotate(0deg);
            }

            50% {
                transform: translate(5%, 10%) scale(1.05) rotate(45deg);
            }

            100% {
                transform: translate(-5%, 15%) scale(1.1) rotate(90deg);
            }
        }

        /* ============================================
           BUTTON BACK
           ============================================ */
        .btn-back {
            position: absolute;
            top: 30px;
            left: 30px;
            z-index: 999;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.6s var(--bezier-bouncy);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .btn-back i {
            font-size: 18px;
            transition: transform 0.4s var(--bezier-smooth);
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.95);
            color: var(--primary);
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border-color: #fff;
        }

        .btn-back:hover i {
            transform: translateX(-6px);
        }

        /* ============================================
           HERO SECTION - TRANSISI SMOOTH
           ============================================ */
        .hero-section {
            position: relative;
            height: 520px;
            border-radius: 0 0 50px 50px;
            overflow: hidden;
            margin-bottom: 50px;
            background: var(--dark);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .hero-section .hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            animation: kenBurns 25s infinite alternate ease-in-out;
            transform-origin: center;
            transition: transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }

        @keyframes kenBurns {
            0% {
                transform: scale(1) rotate(0deg);
            }

            50% {
                transform: scale(1.08) rotate(1deg);
            }

            100% {
                transform: scale(1.15) rotate(-1deg);
            }
        }

        .hero-section .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg,
                    rgba(15, 23, 42, 0.2) 0%,
                    rgba(15, 23, 42, 0.5) 40%,
                    rgba(15, 23, 42, 0.95) 100%);
            backdrop-filter: blur(3px);
            transition: opacity 0.8s ease;
        }

        .hero-section .hero-content {
            position: absolute;
            bottom: 60px;
            left: 60px;
            right: 60px;
            display: flex;
            align-items: flex-end;
            gap: 40px;
            z-index: 10;
            will-change: transform;
            transition: transform 0.1s linear;
        }

        .hero-logo-wrapper {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        .hero-section .hero-logo {
            width: 140px;
            height: 140px;
            border-radius: 32px;
            background: rgba(255, 255, 255, 0.95);
            padding: 18px;
            object-fit: contain;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), inset 0 0 0 2px rgba(255, 255, 255, 0.9);
            transition: all 0.6s var(--bezier-bouncy);
        }

        .hero-section .hero-logo:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 30px 50px rgba(0, 0, 0, 0.5);
        }

        .hero-section .hero-text {
            color: #fff;
            flex: 1;
        }

        .hero-section .hero-text h1 {
            font-weight: 800;
            font-size: 3.5rem;
            letter-spacing: -0.04em;
            margin-bottom: 12px;
            line-height: 1.1;
            background: linear-gradient(to right, #ffffff, #cbd5e1, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .hero-section .hero-text .subtitle {
            font-size: 1.15rem;
            font-weight: 400;
            color: #e2e8f0;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 8px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .hero-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.4s var(--bezier-smooth);
        }

        .hero-badge:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.2);
        }

        .hero-badge.akreditasi {
            background: rgba(251, 191, 36, 0.15);
            border-color: rgba(251, 191, 36, 0.4);
            color: #fde68a;
        }

        .hero-badge.status-negeri {
            background: rgba(52, 211, 153, 0.15);
            border-color: rgba(52, 211, 153, 0.4);
            color: #a7f3d0;
        }

        .hero-badge.status-swasta {
            background: rgba(96, 165, 250, 0.15);
            border-color: rgba(96, 165, 250, 0.4);
            color: #bfdbfe;
        }

        /* ============================================
           CARDS PREMIUM
           ============================================ */
        .premium-card {
            background: var(--glass-bg);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid var(--glass-border);
            border-radius: 36px;
            padding: 40px;
            box-shadow: var(--shadow-lg), inset 0 0 0 1px rgba(255, 255, 255, 0.5);
            margin-bottom: 32px;
            transition: all 0.6s var(--bezier-smooth);
            overflow: hidden;
        }

        .premium-card:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: var(--shadow-hover), 0 20px 40px rgba(0, 0, 0, 0.06);
            background: rgba(255, 255, 255, 0.85);
            border-color: rgba(255, 255, 255, 1);
        }

        .premium-card .card-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
            padding-bottom: 18px;
            border-bottom: 1px dashed rgba(0, 0, 0, 0.15);
        }

        .premium-card .card-title i {
            color: var(--primary);
            font-size: 1.6rem;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.15), rgba(37, 99, 235, 0.05));
            padding: 10px;
            border-radius: 14px;
            box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.5);
        }

        /* ============================================
           GRID & TABLES
           ============================================ */
        .detail-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 32px;
            margin-bottom: 32px;
        }

        .profil-table {
            width: 100%;
            border-collapse: collapse;
        }

        .profil-table tr {
            transition: all 0.4s ease;
            border-radius: 12px;
        }

        .profil-table tr:hover {
            background: rgba(37, 99, 235, 0.04);
            transform: scale(1.02);
        }

        .profil-table td {
            padding: 16px 14px;
            font-size: 1.05rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        }

        .profil-table tr:last-child td {
            border-bottom: none;
        }

        .profil-table td:first-child {
            font-weight: 700;
            color: #64748b;
            width: 35%;
        }

        .profil-table td:last-child {
            color: var(--dark);
            font-weight: 600;
        }

        /* ============================================
           FOTO SEKOLAH
           ============================================ */
        .foto-sekolah-wrapper {
            position: relative;
            border-radius: 28px;
            overflow: hidden;
            height: 340px;
            background: #e2e8f0;
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.05), 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .foto-sekolah-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1.2s var(--bezier-smooth);
        }

        .premium-card:hover .foto-sekolah-wrapper img {
            transform: scale(1.08);
        }

        /* ============================================
           KEPALA SEKOLAH
           ============================================ */
        .kepala-card {
            display: flex;
            align-items: center;
            gap: 48px;
        }

        .foto-kepala-wrap {
            position: relative;
        }

        .foto-kepala-wrap::after {
            content: '';
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            z-index: -1;
            opacity: 0.6;
            filter: blur(15px);
            transition: all 0.6s var(--bezier-smooth);
        }

        .premium-card:hover .foto-kepala-wrap::after {
            opacity: 0.9;
            filter: blur(20px);
            transform: scale(1.05);
        }

        .foto-kepala {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 6px solid #fff;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            transition: transform 0.6s var(--bezier-bouncy);
        }

        .premium-card:hover .foto-kepala {
            transform: scale(1.05) rotate(-3deg);
        }

        .info-kepala h3 {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .info-kepala .nip {
            font-size: 0.95rem;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 18px;
            letter-spacing: 0.5px;
            background: rgba(37, 99, 235, 0.1);
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
        }

        .info-kepala .sambutan {
            color: #475569;
            line-height: 1.9;
            font-size: 1.1rem;
            font-style: italic;
        }

        /* ============================================
           MAP + GOOGLE MAPS BUTTON
           ============================================ */
        #map {
            height: 420px;
            border-radius: 28px;
            z-index: 1;
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.6s var(--bezier-smooth);
        }

        .premium-card:hover #map {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .map-controls {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .google-maps-btn,
        .center-map-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.4s var(--bezier-bouncy);
            border: none;
            cursor: pointer;
        }

        .google-maps-btn {
            background: #ea4335;
            color: #fff;
            box-shadow: 0 8px 20px rgba(234, 67, 53, 0.3);
        }

        .google-maps-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 30px rgba(234, 67, 53, 0.4);
            background: #d33426;
            color: #fff;
        }

        .google-maps-btn i {
            font-size: 1.4rem;
        }

        .center-map-btn {
            background: var(--dark);
            color: #fff;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.2);
        }

        .center-map-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.3);
            background: var(--primary);
            color: #fff;
        }

        .center-map-btn i {
            font-size: 1.2rem;
        }

        /* ============================================
           SEKOLAH TERDEKAT - CAROUSEL
           ============================================ */
        .sekolah-terdekat-section {
            margin: 80px 0 60px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 40px;
        }

        .section-header .header-left h2 {
            font-weight: 800;
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 4px;
            letter-spacing: -0.02em;
        }

        .section-header .header-left .subtitle {
            color: #64748b;
            font-size: 1.05rem;
            font-weight: 400;
        }

        .section-header .header-right .btn-outline-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 24px;
            border-radius: 50px;
            border: 1.5px solid var(--primary);
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s var(--bezier-smooth);
        }

        .section-header .header-right .btn-outline-primary:hover {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
            transform: translateY(-2px);
        }

        .carousel-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .carousel-container {
            overflow: hidden;
            width: 100%;
            border-radius: 28px;
        }

        .carousel-track {
            display: flex;
            gap: 24px;
            transition: transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
            will-change: transform;
        }

        .sekolah-card {
            flex: 0 0 280px;
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: all 0.5s var(--bezier-bouncy);
            display: flex;
            flex-direction: column;
            text-decoration: none;
        }

        .sekolah-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: var(--shadow-hover);
            border-color: #fff;
        }

        .sekolah-card .card-cover {
            position: relative;
            height: 180px;
            overflow: hidden;
            background: #e2e8f0;
        }

        .sekolah-card .card-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s var(--bezier-smooth);
        }

        .sekolah-card:hover .card-cover img {
            transform: scale(1.12);
        }

        .sekolah-card .card-cover .cover-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.7) 0%, transparent 60%);
        }

        .sekolah-card .card-cover .nama-sekolah {
            position: absolute;
            bottom: 20px;
            left: 24px;
            right: 24px;
            color: #fff;
            font-weight: 800;
            font-size: 1.1rem;
            line-height: 1.3;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            transition: transform 0.4s var(--bezier-smooth);
        }

        .sekolah-card:hover .card-cover .nama-sekolah {
            transform: translateY(-4px);
        }

        .sekolah-card .badge-status {
            position: absolute;
            top: 16px;
            right: 16px;
            padding: 4px 14px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .badge-status.badge-negeri {
            background: rgba(52, 211, 153, 0.25);
            border-color: rgba(52, 211, 153, 0.5);
            color: #a7f3d0;
        }

        .badge-status.badge-swasta {
            background: rgba(96, 165, 250, 0.25);
            border-color: rgba(96, 165, 250, 0.5);
            color: #bfdbfe;
        }

        .sekolah-card .card-body {
            padding: 20px 22px 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .sekolah-card .card-body .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: #475569;
            margin-bottom: 6px;
        }

        .sekolah-card .card-body .info-item i {
            color: var(--primary);
            font-size: 1rem;
            width: 18px;
            text-align: center;
        }

        .sekolah-card .card-body .info-item .dot {
            color: #cbd5e1;
            margin: 0 4px;
        }

        .sekolah-card .card-body .info-item .akreditasi-badge {
            background: rgba(251, 191, 36, 0.12);
            padding: 2px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
            color: #b45309;
        }

        .sekolah-card .card-body .distance {
            margin-top: 6px;
            font-weight: 600;
            color: var(--primary);
        }

        .sekolah-card .card-body .btn-detail {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 16px;
            padding: 10px 20px;
            border-radius: 50px;
            background: var(--dark);
            color: #fff;
            font-weight: 700;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.4s var(--bezier-bouncy);
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .sekolah-card .card-body .btn-detail:hover {
            background: var(--primary);
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.3);
        }

        .sekolah-card .card-body .btn-detail i {
            transition: transform 0.3s;
        }

        .sekolah-card .card-body .btn-detail:hover i {
            transform: translateX(4px);
        }

        .carousel-btn {
            position: relative;
            z-index: 5;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            color: var(--dark);
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.4s var(--bezier-smooth);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            flex-shrink: 0;
        }

        .carousel-btn:hover {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.25);
            transform: scale(1.05);
        }

        .carousel-btn:active {
            transform: scale(0.92);
        }

        .empty-nearby {
            text-align: center;
            padding: 60px 20px;
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            border-radius: 32px;
            border: 1px solid var(--glass-border);
        }

        .empty-nearby i {
            font-size: 4rem;
            color: #94a3b8;
            margin-bottom: 16px;
        }

        .empty-nearby h4 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .empty-nearby p {
            color: #64748b;
        }

        .btn-lihat-semua {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-top: 50px;
            padding: 18px 48px;
            border-radius: 50px;
            background: var(--dark);
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.5s var(--bezier-bouncy);
            text-decoration: none;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.2);
            overflow: hidden;
            position: relative;
        }

        .btn-lihat-semua::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.6s ease;
        }

        .btn-lihat-semua:hover::before {
            left: 100%;
        }

        .btn-lihat-semua:hover {
            background: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.4);
            color: #fff;
        }

        .btn-lihat-semua i {
            transition: transform 0.4s;
        }

        .btn-lihat-semua:hover i {
            transform: translateX(5px);
        }

        /* ============================================
           ANIMASI REVEAL
           ============================================ */
        .reveal-waw {
            opacity: 0;
            transform: translateY(80px) scale(0.92);
            filter: blur(15px);
            transition: all 1.2s var(--bezier-smooth);
            will-change: opacity, transform, filter;
        }

        .reveal-waw.active {
            opacity: 1;
            transform: translateY(0) scale(1);
            filter: blur(0);
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 992px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .hero-section {
                height: 450px;
            }

            .hero-section .hero-text h1 {
                font-size: 2.8rem;
            }

            .kepala-card {
                flex-direction: column;
                text-align: center;
                gap: 32px;
            }

            .info-kepala .nip {
                margin: 0 auto 16px auto;
            }

            .sekolah-card {
                flex: 0 0 240px;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 380px;
                border-radius: 0 0 40px 40px;
            }

            .hero-section .hero-content {
                left: 30px;
                right: 30px;
                bottom: 40px;
                flex-wrap: wrap;
                gap: 24px;
            }

            .hero-section .hero-logo {
                width: 100px;
                height: 100px;
                padding: 12px;
            }

            .hero-section .hero-text h1 {
                font-size: 2.2rem;
            }

            .premium-card {
                padding: 30px;
                border-radius: 28px;
            }

            .foto-sekolah-wrapper {
                height: 260px;
            }

            .btn-back {
                padding: 10px 18px;
                top: 20px;
                left: 20px;
                font-size: 13px;
            }

            .sekolah-card {
                flex: 0 0 220px;
            }

            .carousel-btn {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .google-maps-btn,
            .center-map-btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                height: 340px;
                border-radius: 0 0 32px 32px;
            }

            .hero-section .hero-content {
                left: 20px;
                right: 20px;
                bottom: 24px;
                gap: 16px;
            }

            .hero-section .hero-text h1 {
                font-size: 1.6rem;
            }

            .hero-section .hero-text .subtitle {
                font-size: 0.9rem;
                margin-bottom: 12px;
            }

            .hero-badge {
                padding: 6px 14px;
                font-size: 0.7rem;
            }

            .btn-back span {
                display: none;
            }

            .btn-back i {
                margin: 0;
                font-size: 20px;
            }

            .btn-back {
                padding: 10px 12px;
            }

            .premium-card {
                padding: 20px;
                border-radius: 24px;
            }

            .premium-card .card-title {
                font-size: 1.1rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            #map {
                height: 280px;
            }

            .foto-kepala {
                width: 130px;
                height: 130px;
            }

            .foto-sekolah-wrapper {
                height: 200px;
            }

            .sekolah-card {
                flex: 0 0 280px;
                width: 280px;
            }

            .carousel-btn {
                display: none;
            }

            .btn-lihat-semua {
                width: 100%;
                justify-content: center;
                padding: 16px 24px;
                font-size: 1rem;
            }

            .section-header .header-right .btn-outline-primary {
                width: 100%;
                justify-content: center;
            }

            .map-controls {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>

    <!-- Ambient Background -->
    <div class="ambient-bg">
        <div class="ambient-blob blob-1"></div>
        <div class="ambient-blob blob-2"></div>
        <div class="ambient-blob blob-3"></div>
    </div>

    <!-- ============================================
    HERO SECTION
    ============================================ -->
    <section class="hero-section" id="hero">
        <?php
        $coverPath = $sekolah['cover'] ?? '';
        $coverSrc = !empty($coverPath) ? base_url('uploads/cover/' . $coverPath) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1400&q=80';
        ?>
        <img class="hero-bg" src="<?= $coverSrc; ?>" alt="Cover Sekolah">
        <div class="hero-overlay"></div>

<!-- ======== PERBAIKAN TOMBOL KEMBALI ======== -->
<?php
$role = strtolower(session()->get('role') ?? '');

$from = $_GET['from'] ?? '';

if ($role == 'super_admin') {

    $backUrl = base_url('superadmin/data-sekolah');

} elseif ($role == 'admin' || $role == 'operator') {

    $backUrl = base_url('admin/data-sekolah');

} else {

    if ($from == 'detail-peta') {

        $backUrl = base_url('detail-peta');

    } elseif ($from == 'data-sekolah') {

        $backUrl = base_url('data-sekolah');

    } else {

        $backUrl = base_url('/');

    }

}
?>

        <a href="<?= esc($backUrl) ?>" class="btn-back">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

        <div class="hero-content reveal-waw active" id="hero-content">
            <?php
            $logoPath = $sekolah['logo'] ?? '';
            $logoSrc = !empty($logoPath) ? base_url('uploads/logo/' . $logoPath) : 'https://cdn-icons-png.flaticon.com/512/3135/3135755.png';
            ?>
            <div class="hero-logo-wrapper">
                <img class="hero-logo" src="<?= $logoSrc; ?>" alt="Logo Sekolah">
            </div>

            <div class="hero-text">
                <h1><?= $sekolah['nama_sekolah'] ?? 'Sekolah Anda'; ?></h1>
                <div class="subtitle"><i class="bi bi-geo-alt-fill text-danger"></i>
                    <?= $sekolah['alamat'] ?? 'Alamat belum diisi'; ?></div>
                <div class="hero-badges">
                    <span class="hero-badge"><i class="bi bi-building"></i>
                        <?= $sekolah['jenjang'] ?? 'Jenjang'; ?></span>
                    <?php
                    $status = strtolower($sekolah['status_sekolah'] ?? '');
                    $statusClass = ($status === 'negeri') ? 'status-negeri' : 'status-swasta';
                    ?>
                    <span class="hero-badge <?= $statusClass; ?>">
                        <i class="bi bi-<?= ($status === 'negeri') ? 'shield-fill-check' : 'shield-fill'; ?>"></i>
                        <?= $sekolah['status_sekolah'] ?? 'Status'; ?>
                    </span>
                    <?php if (!empty($sekolah['akreditasi'])): ?>
                        <span class="hero-badge akreditasi"><i class="bi bi-award-fill"></i> Akreditasi
                            <?= $sekolah['akreditasi']; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
    MAIN CONTENT
    ============================================ -->
    <div class="container-custom" style="max-width:1280px;margin:0 auto;padding:0 24px;">

        <!-- GRID: Profil + Foto -->
        <div class="detail-grid">
            <div class="premium-card reveal-waw" style="transition-delay: 0.1s;">
                <div class="card-title"><i class="bi bi-info-circle-fill"></i> Informasi Utama</div>
                <table class="profil-table">
                    <tr>
                        <td>NPSN</td>
                        <td><?= $sekolah['npsn'] ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td>Jenjang</td>
                        <td><?= $sekolah['jenjang'] ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?= $sekolah['status_sekolah'] ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td>Akreditasi</td>
                        <td><?= $sekolah['akreditasi'] ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td>Kurikulum</td>
                        <td><?= $sekolah['kurikulum'] ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td><a href="<?= $sekolah['website'] ?? '#'; ?>"
                                style="color:var(--primary);text-decoration:none;font-weight:700;"><?= $sekolah['website'] ?? '-'; ?></a>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="premium-card reveal-waw" style="transition-delay: 0.2s;">
                <div class="card-title"><i class="bi bi-camera-fill"></i> Foto Sekolah</div>
                <div class="foto-sekolah-wrapper">
                    <?php
                    $fotoPath = $sekolah['foto'] ?? '';
                    $fotoSrc = !empty($fotoPath) ? base_url('uploads/sekolah/' . $fotoPath) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800&q=80';
                    ?>
                    <img src="<?= $fotoSrc; ?>" alt="Foto Sekolah">
                </div>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="detail-grid">
            <div class="premium-card reveal-waw" style="transition-delay: 0.1s;">
                <div class="card-title"><i class="bi bi-eye-fill"></i> Visi</div>
                <p style="color:#475569;line-height:1.9;font-size:1.05rem;">
                    <?= nl2br($sekolah['visi'] ?? 'Visi sekolah belum diisi.'); ?>
                </p>
            </div>
            <div class="premium-card reveal-waw" style="transition-delay: 0.2s;">
                <div class="card-title"><i class="bi bi-list-stars"></i> Misi</div>
                <p style="color:#475569;line-height:1.9;font-size:1.05rem;">
                    <?= nl2br($sekolah['misi'] ?? 'Misi sekolah belum diisi.'); ?>
                </p>
            </div>
        </div>

        <!-- Kepala Sekolah -->
        <div class="premium-card reveal-waw kepala-card" style="transition-delay: 0.1s;">
            <div class="foto-kepala-wrap">
                <?php
                $fotoKepalaPath = $sekolah['foto_kepala'] ?? '';
                $fotoKepalaSrc = !empty($fotoKepalaPath) ? base_url('uploads/kepala/' . $fotoKepalaPath) : 'https://ui-avatars.com/api/?name=Kepala+Sekolah&background=2563eb&color=fff&size=250';
                ?>
                <img class="foto-kepala" src="<?= $fotoKepalaSrc; ?>" alt="Kepala Sekolah">
            </div>
            <div class="info-kepala">
                <h3><?= $sekolah['kepala_sekolah'] ?? 'Nama Kepala Sekolah'; ?></h3>
                <div class="nip">NIP. <?= $sekolah['nip_kepala'] ?? '-'; ?></div>
                <div class="sambutan">
                    "<?= nl2br($sekolah['sambutan'] ?? 'Sambutan kepala sekolah belum diisi.'); ?>"
                </div>
            </div>
        </div>

        <!-- Lokasi Sekolah + Google Maps + Pusatkan -->
        <div class="premium-card reveal-waw" style="padding-bottom:40px; transition-delay: 0.2s;">
            <div class="card-title"><i class="bi bi-pin-map-fill"></i> Peta Lokasi</div>
            <div id="map"></div>

            <?php
            $lat = $sekolah['latitude'] ?? '-0.947083';
            $lng = $sekolah['longitude'] ?? '100.417181';
            $namaSekolah = urlencode($sekolah['nama_sekolah'] ?? 'Sekolah');
            $googleMapsUrl = "https://www.google.com/maps/search/?api=1&query={$lat},{$lng}&query_place_id={$namaSekolah}";
            ?>
            <div class="map-controls">
                <button class="center-map-btn" id="centerMapBtn">
                    <i class="bi bi-crosshair"></i> Pusatkan Lokasi
                </button>
                <a href="<?= $googleMapsUrl; ?>" target="_blank" class="google-maps-btn">
                    <i class="bi bi-google"></i> Buka di Google Maps
                </a>
            </div>
        </div>

        <!-- ============================================
        SEKOLAH TERDEKAT - CAROUSEL
        ============================================ -->
        <!-- <?php
        $sekolahTerdekat = $sekolah_terdekat ?? [];
        $sekolahTerdekat = array_slice($sekolahTerdekat, 0, 5);
        ?>

        <section class="sekolah-terdekat-section">
            <div class="section-header reveal-waw">
                <div class="header-left">
                    <h2><i class="bi bi-compass-fill text-primary me-2"></i>Sekolah Terdekat</h2>
                    <p class="subtitle">Temukan sekolah lain di sekitar lokasi ini yang mungkin juga menarik untuk Anda
                        kunjungi.</p>
                </div>
                <div class="header-right">
                    <a href="<?= base_url('sekolah'); ?>" class="btn-outline-primary">
                        Lihat Semua <i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
            </div>

            <?php if (!empty($sekolahTerdekat)): ?>
                <div class="carousel-wrapper">
                    <button class="carousel-btn prev-btn" id="prevBtn" aria-label="Geser kiri">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <div class="carousel-container" id="carouselContainer">
                        <div class="carousel-track" id="carouselTrack">
                            <?php foreach ($sekolahTerdekat as $index => $s): ?>
                                <div class="sekolah-card reveal-waw" style="transition-delay: <?= 0.05 * ($index + 1); ?>s;">
                                    <div class="card-cover">
                                        <?php
                                        $coverT = $s['cover'] ?? '';
                                        $coverSrcT = !empty($coverT) ? base_url('uploads/cover/' . $coverT) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=500&h=300&fit=crop';
                                        ?>
                                        <img src="<?= $coverSrcT; ?>" alt="<?= $s['nama_sekolah']; ?>" loading="lazy">
                                        <div class="cover-overlay"></div>
                                        <div class="nama-sekolah"><?= $s['nama_sekolah']; ?></div>
                                        <div
                                            class="badge-status <?= strtolower($s['status_sekolah'] ?? '') === 'negeri' ? 'badge-negeri' : 'badge-swasta'; ?>">
                                            <?= $s['status_sekolah'] ?? 'Status'; ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="info-item">
                                            <i class="bi bi-tag"></i>
                                            <span><?= $s['jenjang'] ?? '-'; ?></span>
                                            <span class="dot">•</span>
                                            <span class="akreditasi-badge">Akred. <?= $s['akreditasi'] ?? '-'; ?></span>
                                        </div>
                                        <div class="info-item">
                                            <i class="bi bi-geo-alt"></i>
                                            <span><?= $s['alamat'] ?? 'Alamat tidak tersedia'; ?></span>
                                        </div>
                                        <div class="info-item distance">
                                            <i class="bi bi-rulers"></i>
                                            <span>Berjarak <?= $s['jarak'] ?? '0 km'; ?></span>
                                        </div>
                                        <a href="<?= base_url('detail-sekolah/' . ($s['id'] ?? 0)); ?>" class="btn-detail">
                                            Lihat Detail <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button class="carousel-btn next-btn" id="nextBtn" aria-label="Geser kanan">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

                <div style="text-align:center;" class="reveal-waw">
                    <a href="<?= base_url('sekolah'); ?>" class="btn-lihat-semua">
                        Lihat Semua Sekolah <i class="bi bi-arrow-right-short"
                            style="font-size:1.5rem;margin-left:-5px;"></i>
                    </a>
                </div>
            <?php else: ?>
                <div class="empty-nearby reveal-waw">
                    <i class="bi bi-compass"></i>
                    <h4>Belum Ada Sekolah Lain di Sekitar</h4>
                    <p>Saat ini belum ada sekolah lain yang terdaftar di sekitar lokasi ini. <br>Jelajahi kembali nanti atau
                        tambahkan data sekolah baru.</p>
                    <a href="<?= base_url('sekolah'); ?>" class="btn-outline-primary"
                        style="display:inline-flex; align-items:center; gap:8px; margin-top:20px; padding:12px 32px; border-radius:50px; border:1.5px solid var(--primary); color:var(--primary); font-weight:600; text-decoration:none;">
                        Lihat Semua Sekolah <i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
            <?php endif; ?>
        </section>

    </div> -->

    <!-- ============================================
    FOOTER
    ============================================ -->
    <footer style="text-align:center; padding: 50px 0; color: #64748b; font-weight: 500; font-size: 1rem;">
        &copy; <?= date('Y'); ?> <?= $sekolah['nama_sekolah'] ?? 'Sekolah'; ?>. Dibuat dengan <i
            class="bi bi-heart-fill text-danger mx-1"></i> untuk masa depan.
    </footer>

    <!-- ============================================
    SCRIPTS
    ============================================ -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // 1. MAP + CENTER BUTTON
            var lat = <?= $sekolah['latitude'] ?? '-0.947083'; ?>;
            var lng = <?= $sekolah['longitude'] ?? '100.417181'; ?>;
            var map = L.map('map').setView([lat, lng], 16);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap'
            }).addTo(map);

            var customIcon = L.divIcon({
                className: 'custom-div-icon',
                html: "<div style='background-color:#2563eb; width:24px; height:24px; border-radius:50%; border:4px solid white; box-shadow:0 0 20px rgba(37,99,235,0.9); animation: pulse 2s infinite;'></div>",
                iconSize: [24, 24],
                iconAnchor: [12, 12]
            });

            var style = document.createElement('style');
            style.innerHTML =
                `@keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(37,99,235,0.7); } 70% { box-shadow: 0 0 0 15px rgba(37,99,235,0); } 100% { box-shadow: 0 0 0 0 rgba(37,99,235,0); } }`;
            document.head.appendChild(style);

            var marker = L.marker([lat, lng], { icon: customIcon }).addTo(map)
                .bindPopup(
                    '<b style="font-family:\'Plus Jakarta Sans\', sans-serif; font-size:14px;"><?= $sekolah['nama_sekolah'] ?? 'Lokasi Sekolah'; ?></b>'
                )
                .openPopup();

            // Tombol Pusatkan Lokasi
            document.getElementById('centerMapBtn').addEventListener('click', function () {
                map.setView([lat, lng], 16, {
                    animate: true,
                    duration: 1
                });
                marker.openPopup();
            });

            // 2. REVEAL ANIMATION
            const revealElements = document.querySelectorAll('.reveal-waw');

            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                threshold: 0.12,
                rootMargin: "0px 0px -50px 0px"
            });

            revealElements.forEach(el => revealObserver.observe(el));

            // 3. PARALLAX HERO
            const heroContent = document.getElementById('hero-content');
            const heroBg = document.querySelector('.hero-bg');

            window.addEventListener('scroll', function () {
                let scrollPosition = window.pageYOffset;
                if (scrollPosition < 600) {
                    // Parallax content
                    heroContent.style.transform = 'translateY(' + (scrollPosition * 0.4) + 'px)';
                    heroContent.style.opacity = 1 - (scrollPosition * 0.003);
                    // Parallax background lebih halus
                    if (heroBg) {
                        heroBg.style.transform = 'scale(' + (1 + scrollPosition * 0.0003) + ')';
                    }
                }
            });

            // 4. CAROUSEL SMOOTH
            const track = document.getElementById('carouselTrack');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const container = document.getElementById('carouselContainer');

            if (track && prevBtn && nextBtn) {
                let currentIndex = 0;
                const cardWidth = 280 + 24;
                let visibleCards = Math.floor(container.offsetWidth / cardWidth);
                const totalCards = track.children.length;

                const updateVisibleCards = () => {
                    visibleCards = Math.floor(container.offsetWidth / cardWidth);
                    if (visibleCards < 1) visibleCards = 1;
                };

                const updateCarousel = () => {
                    const maxIndex = Math.max(0, totalCards - visibleCards);
                    if (currentIndex > maxIndex) currentIndex = maxIndex;
                    const translateX = -currentIndex * cardWidth;
                    track.style.transform = 'translateX(' + translateX + 'px)';
                };

                nextBtn.addEventListener('click', function () {
                    const maxIndex = Math.max(0, totalCards - visibleCards);
                    if (currentIndex < maxIndex) {
                        currentIndex++;
                        updateCarousel();
                    }
                });

                prevBtn.addEventListener('click', function () {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateCarousel();
                    }
                });

                window.addEventListener('resize', function () {
                    updateVisibleCards();
                    updateCarousel();
                });

                // Touch support for mobile
                let touchStartX = 0;
                let touchEndX = 0;
                container.addEventListener('touchstart', function (e) {
                    touchStartX = e.changedTouches[0].screenX;
                });
                container.addEventListener('touchend', function (e) {
                    touchEndX = e.changedTouches[0].screenX;
                    const diff = touchStartX - touchEndX;
                    if (Math.abs(diff) > 50) {
                        if (diff > 0) {
                            nextBtn.click();
                        } else {
                            prevBtn.click();
                        }
                    }
                });

                updateVisibleCards();
                updateCarousel();
            }

        });
    </script>
</body>

</html>