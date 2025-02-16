<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"
        href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="/css/layout/sidebar.css">
    <link rel="stylesheet" href="/css/layout/loading.css">
    <title>RS Harmoni Kehidupan</title>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <img src="/img/logo_rs.png" class="avatar img-fluid" alt="">
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="/dokter/dokter" class="sidebar-link">
                        <i class="bi bi-bookmark"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/dokter/data" class="sidebar-link">
                        <i class="bi bi-database"></i>
                        <span>Data</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/dokter/pasien" class="sidebar-link">
                        <img src="https://cdn-icons-png.flaticon.com/256/2491/2491413.png" alt="Patients Icon"
                            class="icon">
                        <span>Pasien</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/dokter/jadwal" class="sidebar-link">
                        <i class="bi bi-calendar"></i>
                        <span>Jadwal</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/dokter/riwayat_medis" class="sidebar-link">
                        <img src="/img/rekam_medis.png" alt="Patients Icon" class="icon">
                        <span>Riwayat Medis Pasien</span>
                    </a>
                </li>
                <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li> -->
            </ul>
            <div class="sidebar-footer">
                <a href="/rs_logout" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">

                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <h3 class="fw-bold fs-4 mb-3">{{ Auth::user()->name }}, Selamat Datang!</h3>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <img src="/img/logo_rs.png" class="avatar img-fluid" alt="">
                            <div class="dropdown-menu dropdown-menu-end rounded">
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Loading overlay -->
            <div id="loadingOverlay" class="loading-overlay">
                <div class="loading-spinner"></div>
                <div class="loading-text">RS Harmoni Kehidupan</div>
            </div>

            <!-- JavaScript for loading overlay -->
            <script src="/js/loading.js"></script>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

            <!-- jQuery (required for Datepicker) -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- Bootstrap Datepicker JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>
            <script src="/js/sidebar.js"></script>
</body>

</html>
