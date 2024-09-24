<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/layout/loading.css">
    <link rel="stylesheet" href="/css/layout/sidebar_apoteker.css">
    <title>Obatin Aja</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <img src="/img/logo_apotek.png" class="avatar" alt="Logo Apotek">
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <div class="nav_logo">
                    <i class="bi bi-capsule nav_logo-icon"></i>
                    <span class="nav_logo-name">Obatin Aja</span>
                </div>
                <div class="nav_list">
                    <a href="/apoteker/apoteker"
                        class="nav_link {{ Request::is('apoteker/apoteker') ? 'active' : '' }}">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="/apoteker/data" class="nav_link {{ Request::is('apoteker/data') ? 'active' : '' }}">
                        <i class="bi bi-clipboard-data nav_icon"></i>
                        <span class="nav_name">Data</span>
                    </a>
                    <a href="/apoteker/pasien" class="nav_link {{ Request::is('apoteker/pasien') ? 'active' : '' }}">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Pasien</span>
                    </a>
                    <a href="/apoteker/pembayaran"
                        class="nav_link {{ Request::is('apoteker/pembayaran') ? 'active' : '' }}">
                        <i class="bi bi-currency-dollar nav_icon"></i>
                        <span class="nav_name">Pembayaran</span>
                    </a>
                </div>
            </div>
            <a href="/rs_logout" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">Logout</span>
            </a>
        </nav>
    </div>

    <!--Container Main start-->
    {{-- <div class="height-100 bg-light">
        <h4>Main Components</h4>
    </div> --}}
    <!--Container Main end-->

    <!-- Loading overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <div class="loading-spinner"></div>
        <div class="loading-text">RS Harmoni Kehidupan</div>
    </div>
    <!-- JavaScript for loading overlay -->
    <script src="/js/loading.js"></script>

    <script src="/js/sidebar_apoteker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
