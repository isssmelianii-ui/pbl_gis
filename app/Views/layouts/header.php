<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Dashboard — GeoSchool GIS</title>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>

        :root{
            --navy-950:#0a1d33;
            --navy-900:#0e2a47;
            --navy-800:#153a5f;
            --gold-500:#c08a28;
            --gold-400:#d6a445;
            --ink-900:#1c2733;
            --ink-600:#54626f;
            --bg:#f1f5f9;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Plus Jakarta Sans',sans-serif;
        }

        body{
            background:var(--bg);
            overflow-x:hidden;
            color:var(--ink-900);
        }

        .main-content{
            margin-left:280px;
            padding:32px;
            transition:margin-left 0.3s ease;
        }

        /* TOGGLE BUTTON */

        .mobile-toggle{
            display:none;
            position:fixed;
            top:20px;
            left:20px;
            width:48px;
            height:48px;
            border:none;
            border-radius:13px;
            background:var(--navy-900);
            color:var(--gold-400);
            font-size:18px;
            z-index:99999;
            cursor:pointer;
            box-shadow:0 12px 28px rgba(14,42,71,0.28);
            transition:background 0.15s ease;
        }

        .mobile-toggle:hover{
            background:var(--navy-800);
        }

        .mobile-toggle:focus-visible{
            outline:2.5px solid var(--gold-500);
            outline-offset:2px;
        }

        /* OVERLAY */

        .sidebar-overlay{
            position:fixed;
            inset:0;
            background:rgba(10,29,51,0.55);
            backdrop-filter:blur(2px);
            z-index:9998;
            opacity:0;
            visibility:hidden;
            transition:opacity 0.3s ease, visibility 0.3s ease;
        }

        .sidebar-overlay.active{
            opacity:1;
            visibility:visible;
        }

        /* RESPONSIVE */

        @media(max-width:992px){

            .main-content{
                margin-left:0;
                padding:88px 20px 20px;
            }

            .mobile-toggle{
                display:flex;
                justify-content:center;
                align-items:center;
            }

        }

    </style>

</head>

<body>

<!-- TOGGLE -->

<button class="mobile-toggle"
onclick="toggleSidebar()">

    <i class="fa-solid fa-bars"></i>

</button>

<!-- OVERLAY -->

<div class="sidebar-overlay"
id="sidebarOverlay"
onclick="closeSidebar()"></div>

<script>

    function toggleSidebar(){

        document.querySelector('.sidebar')
        .classList.toggle('active');

        document.getElementById('sidebarOverlay')
        .classList.toggle('active');

    }

    function closeSidebar(){

        document.querySelector('.sidebar')
        .classList.remove('active');

        document.getElementById('sidebarOverlay')
        .classList.remove('active');

    }

</script>