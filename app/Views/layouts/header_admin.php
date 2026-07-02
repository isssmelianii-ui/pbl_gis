<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta nama="viewport"
          content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Dashboard Operator'; ?></title>

    <!-- FONT AWESOME -->

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- LEAFLET -->

    <link rel="stylesheet"
    href="https://unpkg.com/leaflet/dist/leaflet.css"/>

    <!-- CHART -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            background:#f8fafc;
            color:#1e293b;
        }

        a{
            text-decoration:none;
        }

        ul{
            list-style:none;
        }

        .main-content{

            margin-left:280px;

            min-height:100vh;

            padding:35px;

            background:#f8fafc;

        }

        /* ========================= */

        .page-header{

            display:flex;

            justify-content:space-between;

            align-items:center;

            margin-bottom:35px;

        }

        .page-header h1{

            font-size:32px;

            font-weight:700;

            color:#0f172a;

        }

        .page-header p{

            color:#64748b;

            margin-top:6px;

        }

        .profile{

            display:flex;

            align-items:center;

            gap:15px;

            background:white;

            padding:12px 18px;

            border-radius:18px;

            border:1px solid #e2e8f0;

            box-shadow:0 8px 25px rgba(0,0,0,.04);

        }

        .profile i{

            width:45px;

            height:45px;

            background:#2563eb;

            color:white;

            display:flex;

            justify-content:center;

            align-items:center;

            border-radius:50%;

        }

        .profile h4{

            font-size:15px;

        }

        .profile span{

            font-size:12px;

            color:#64748b;

        }

        /* ========================= */

        .cards{

            display:grid;

            grid-template-columns:repeat(4,1fr);

            gap:25px;

            margin-bottom:30px;

        }

        .card-stat{

            background:white;

            border-radius:22px;

            padding:24px;

            border:1px solid #e2e8f0;

            box-shadow:0 12px 30px rgba(0,0,0,.04);

            transition:.3s;

        }

        .card-stat:hover{

            transform:translateY(-5px);

        }

        .card-top{

            display:flex;

            justify-content:space-between;

            align-items:center;

            margin-bottom:20px;

        }

        .card-top i{

            width:55px;

            height:55px;

            border-radius:18px;

            display:flex;

            justify-content:center;

            align-items:center;

            color:white;

            font-size:22px;

        }

        .bg1{
            background:#2563eb;
        }

        .bg2{
            background:#f97316;
        }

        .bg3{
            background:#16a34a;
        }

        .bg4{
            background:#9333ea;
        }

        .card-stat h2{

            font-size:33px;

            margin-bottom:5px;

        }

        .card-stat p{

            color:#64748b;

            font-size:14px;

        }

        /* ========================= */

        .grid{

            display:grid;

            grid-template-columns:2fr 1fr;

            gap:28px;

        }

        .card{

            background:white;

            border-radius:24px;

            padding:25px;

            border:1px solid #e2e8f0;

            box-shadow:0 12px 30px rgba(0,0,0,.04);

        }

        .card-title{

            display:flex;

            justify-content:space-between;

            align-items:center;

            margin-bottom:20px;

        }

        .card-title h3{

            font-size:18px;

        }

        #map{

            height:430px;

            border-radius:18px;

        }

        .activity{

            display:flex;

            flex-direction:column;

            gap:18px;

        }

        .activity-item{

            display:flex;

            gap:15px;

            align-items:center;

        }

        .activity-icon{

            width:50px;

            height:50px;

            border-radius:15px;

            background:#dbeafe;

            color:#2563eb;

            display:flex;

            justify-content:center;

            align-items:center;

            font-size:20px;

        }

        .activity-info h4{

            font-size:15px;

        }

        .activity-info p{

            color:#64748b;

            font-size:13px;

        }

        .quick-action{

            display:grid;

            grid-template-columns:repeat(2,1fr);

            gap:15px;

        }

        .quick-btn{

            padding:22px;

            border-radius:20px;

            color:white;

            text-align:center;

            font-weight:600;

            transition:.3s;

        }

        .quick-btn:hover{

            transform:translateY(-5px);

        }

        .btn1{
            background:#2563eb;
        }

        .btn2{
            background:#16a34a;
        }

        .btn3{
            background:#9333ea;
        }

        .btn4{
            background:#ef4444;
        }

        canvas{

            width:100%!important;

        }

        @media(max-width:1100px){

            .cards{

                grid-template-columns:repeat(2,1fr);

            }

            .grid{

                grid-template-columns:1fr;

            }

        }

        @media(max-width:768px){

            .main-content{

                margin-left:0;

                padding:20px;

            }

            .cards{

                grid-template-columns:1fr;

            }

            .page-header{

                flex-direction:column;

                align-items:flex-start;

                gap:20px;

            }

        }

    </style>

</head>

<body>