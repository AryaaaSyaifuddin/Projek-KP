<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- base:css -->
    <link rel="stylesheet" href="vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome (untuk ikon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .stamp {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-55deg);
        font-size: 7em;
        color: rgba(255, 0, 0, 0.2); /* Contoh: warna merah dengan transparansi */
        pointer-events: none;  /* Agar stamp tidak mengganggu interaksi modal */
        white-space: nowrap;
        z-index: 9999;
        border: solid;
        padding: 14px 50px;
        }

        /* Container tabel dengan overflow horizontal */
        .table-container {
        overflow-x: auto;
        position: relative;
        border: 1px solid #ddd;
        padding: 10px;
        }

        /* Tombol scroll */
        .scroll-button {
        margin-top: 10px;
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

    </style>
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="img/favicon.jpg" />
  </head>
  <body>
    @if (session('error'))
   <script>
      Swal.fire({
         title: 'Error!',
         text: '{{ session("error") }}',
         icon: 'error',
         confirmButtonText: 'OK',
         timer: 3000,
         timerProgressBar: true,
      });
   </script>
   @endif

   @if (session('success'))
   <script>
      Swal.fire({
         title: 'Success!',
         text: '{{ session("success") }}',
         icon: 'success',
         confirmButtonText: 'OK',
         timer: 3000,
         timerProgressBar: true,
      });
   </script>
   @endif
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="img/favicon.jpg" alt="logo" style="width:100%"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="img/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-flex  mr-2">
              <a class="nav-link" href="#">
                Help
              </a>
            </li>
            <li class="nav-item dropdown d-flex">
              <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                <i class="typcn typcn-message-typing"></i>
                <span class="count bg-success">2</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="img/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                    </h6>
                    <p class="font-weight-light small-text mb-0">
                      The meeting is cancelled
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="img/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                    </h6>
                    <p class="font-weight-light small-text mb-0">
                      New product launch
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="img/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                    </h6>
                    <p class="font-weight-light small-text mb-0">
                      Upcoming board meeting
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown  d-flex">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="typcn typcn-bell mr-0"></i>
                <span class="count bg-danger">2</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-info-large mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                    <p class="font-weight-light small-text mb-0">
                      Just now
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="typcn typcn-cog mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                    <p class="font-weight-light small-text mb-0">
                      Private message
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="typcn typcn-user-outline mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                    <p class="font-weight-light small-text mb-0">
                      2 days ago
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                <i class="typcn typcn-user-outline mr-0"></i>
                <span class="nav-profile-name">{{ Auth::user()->nama ?? 'Anonim' }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="typcn typcn-power text-primary"></i>
                        Logout
                    </button>
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>
              Light
            </div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>
              Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles primary"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default border"></div>
            </div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <img src="img/me.jpg" alt="image">
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
                    {{ Auth::user()->nama ?? 'Anonim' }}
                </p>
                <p class="sidebar-designation">
                  Welcome
                </p>
              </div>
            </div>
            <div class="nav-search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Type to search..." aria-label="search" aria-describedby="search">
                <div class="input-group-append">
                  <span class="input-group-text" id="search">
                    <i class="typcn typcn-zoom"></i>
                  </span>
                </div>
              </div>
            </div>
            <p class="sidebar-menu-title">Dashboard menu</p>
          </li>
          @if(Auth::user()->role === 'admin')
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dokter" aria-expanded="false" aria-controls="dokter">
                <i class="fas fa-user-md menu-icon"></i> <!-- Ikon dokter -->
                <span class="menu-title">Dokter</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dokter">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/dokter">Data Dokter</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Jadwal Perawat</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#perawat" aria-expanded="false" aria-controls="perawat">
                <i class="fas fa-user-nurse menu-icon"></i> <!-- Ikon perawat medis -->
                <span class="menu-title">Perawat</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="perawat">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/perawat">Data Perawat</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/charts/chartjs.html">Jadwal Perawat</a></li>
                </ul>
            </div>
        </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="akun">
              <i class="fas fa-user-circle menu-icon"></i>
              <span class="menu-title">Account</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/akun"> Data Account </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fas fa-user-injured menu-icon"></i>
              <span class="menu-title">Pasien</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pasien">Data Pasien</a></li>
                <li class="nav-item"> <a class="nav-link" href="/jadwal-pemeriksaan">Detail Jadwal</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="hasil_pemeriksaan">
              <i class="fas fa-file-medical menu-icon"></i>
              <span class="menu-title">Hasil Pemeriksaan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="hasil_pemeriksaan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/hasil-pemeriksaan">Hasil Pemeriksaan</a></li>
                <li class="nav-item"> <a class="nav-link" href="/persetujuan_hasil_pemeriksaan">Status Hasil Pemeriksaan</a></li>
                <li class="nav-item"> <a class="nav-link" href="/rekomendasi_medis">Rekomendasi Medis</a></li>
              </ul>
            </div>
          </li>
        @endif

        @if (Auth::user()->role === 'perawat')
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fas fa-user-injured menu-icon"></i>
              <span class="menu-title">Pasien</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pasien">Data Pasien</a></li>
                <li class="nav-item"> <a class="nav-link" href="/jadwal-pemeriksaan">Detail Jadwal</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="hasil_pemeriksaan">
              <i class="fas fa-file-medical menu-icon"></i>
              <span class="menu-title">Hasil Pemeriksaan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/hasil-pemeriksaan">Hasil Pemeriksaan</a></li>
              </ul>
            </div>
          </li>
          @endif

          @if (Auth::user()->role === 'dokter')
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fas fa-user-injured menu-icon"></i>
              <span class="menu-title">Pasien</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pasien">Data Pasien</a></li>
                <li class="nav-item"> <a class="nav-link" href="/jadwal-pemeriksaan">Detail Jadwal</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="hasil_pemeriksaan">
              <i class="fas fa-file-medical menu-icon"></i>
              <span class="menu-title">Hasil Pemeriksaan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/hasil-pemeriksaan">Hasil Pemeriksaan</a></li>
                <li class="nav-item"> <a class="nav-link" href="/persetujuan_hasil_pemeriksaan">Status Hasil Pemeriksaan</a></li>
                <li class="nav-item"> <a class="nav-link" href="/rekomendasi_medis">Rekomendasi Medis</a></li>
              </ul>
            </div>
          </li>
          @endif

      </nav>
      @if (session('success'))
                <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session("success") }}',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    timer: 3000,
                    timerProgressBar: true,
                });
                </script>
            @endif
      </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0 font-weight-bold">{{ Auth::user()->nama ?? 'Anonim' }}</h3>
                <p>Selamat satang di Sistem Manajemen Check Up</p>
              </div>
            </div>
            @php
                // Variabel kontrol untuk menampilkan form atau tabel
                $showForm = session('showForm', true); // Default true (form create)
                $pasien = session('pasien', null); // Data pasien untuk edit
            @endphp

        @if($showForm === true)
            <!-- Tombol Create -->
            <div class="button-action">

                {{-- <button
                type="button"
                class="btn btn-outline-primary btn-icon-text"
                style="padding: 8px 15px;"
                onclick="window.location='{{ route('showCreateForm') }}'">
                Create
                <i class="typcn typcn-folder btn-icon-prepend"></i>
                </button> --}}

                <!-- Tabel -->
                <div class="form-group" style="margin: 20px 0; display: flex; justify-content: space-between;">
                    <input
                    type="text"
                    id="searchInput"
                    class="form-control"
                    style="max-width: 40%;"
                    placeholder="Cari pasien berdasarkan nama, nomor HP, atau lainnya..."
                    onkeyup="filterTable()">
                </div>

        </div>
            <div class="col-lg-12 grid-margin stretch-card" style="padding: 15px 0px">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Rekam Medis Pasien</h4>

                        <button class="scroll-button" onclick="scrollRight()" style="border-radius: 25px;">Scroll Right</button>

                        <!-- Modal Detail Hasil Pemeriksaan -->
                        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px;">
                            <!-- Kontainer modal-content diberi posisi relative agar stamp dapat diposisikan absolut di dalamnya -->
                            <div class="modal-content shadow-lg border-0" style="font-family: monospace; position: relative;">

                                <!-- Stempel Besar (Stamp) -->
                                <div id="stampResult" class="stamp"></div>

                                <!-- Header Modal -->
                                <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="detailModalLabel">
                                    <i class="fas fa-notes-medical"></i> Detail Hasil Pemeriksaan
                                </h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>

                                <!-- Body Modal -->
                                <div class="modal-body">
                                    <!-- 1. Identitas & Data Demografis -->
                                    <div class="mb-3">
                                        <div style="font-weight: bold;">Identitas & Data Demografis</div>
                                        <div id="modalIdentitas"></div>
                                    </div>
                                    <!-- 2. Tanda Vital & Antropometri -->
                                    <div class="mb-3">
                                        <div style="font-weight: bold;">Tanda Vital & Antropometri</div>
                                        <div id="modalVital"></div>
                                    </div>
                                    <!-- 3. Riwayat Penyakit / Komorbiditas -->
                                    <div class="mb-3">
                                        <div style="font-weight: bold;">Riwayat Penyakit / Komorbiditas</div>
                                        <div id="modalRiwayat"></div>
                                    </div>
                                    <!-- 4. Tes Fungsional / Imaging -->
                                    <div class="mb-3">
                                        <div style="font-weight: bold;">Tes Fungsional / Imaging</div>
                                        <div id="modalFungsional"></div>
                                    </div>
                                    <!-- 5. Pemeriksaan Fisik Tambahan -->
                                    <div class="mb-3">
                                        <div style="font-weight: bold;">Pemeriksaan Fisik Tambahan</div>
                                        <div id="modalPemeriksaanFisik"></div>
                                    </div>
                                    <!-- 6. Pemeriksaan Darah (Hematologi & Biokimia) -->
                                    <div class="mb-3">
                                        <div style="font-weight: bold;">Pemeriksaan Darah (Hematologi & Biokimia)</div>
                                        <div id="modalDarah"></div>
                                    </div>
                                    <!-- 7. Pemeriksaan Urine -->
                                    <div class="mb-3">
                                        <div style="font-weight: bold;">Pemeriksaan Urine</div>
                                        <div id="modalUrine"></div>
                                    </div>
                                    </div>

                                    <!-- Footer Modal -->
                                    <div class="modal-footer border-top-0">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                        <i class="fas fa-times-circle"></i> Tutup
                                    </button>
                                    </div>

                                </div>
                            </div>
                        </div>




                        <div class="table-responsive pt-3" id="scrollable-container">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <!-- Baris header pengelompokkan -->
                                    <tr>
                                        <tr>
                                            <th colspan="4" class="text-center text-white" style="background-color: rgba(13,110,253, 0.7);">
                                                Identitas &amp; Data Demografis
                                            </th>
                                            <th colspan="10" class="text-center text-white" style="background-color: rgba(25,135,84, 0.7);">
                                                Tanda Vital &amp; Antropometri
                                            </th>
                                            <th colspan="7" class="text-center text-dark" style="background-color: rgba(255,193,7, 0.7);">
                                                Riwayat Penyakit / Komorbiditas
                                            </th>
                                            <th colspan="4" class="text-center text-white" style="background-color: rgba(13,202,240, 0.7);">
                                                Tes Fungsional / Imaging
                                            </th>
                                            <th colspan="2" class="text-center text-white" style="background-color: rgba(108,117,125, 0.7);">
                                                Pemeriksaan Fisik Tambahan
                                            </th>
                                            <th colspan="25" class="text-center text-white" style="background-color: rgba(33,37,41, 0.7);">
                                                Pemeriksaan Darah (Hematologi &amp; Biokimia)
                                            </th>
                                            <th colspan="14" class="text-center text-dark" style="background-color: rgba(248,249,250, 0.7);">
                                                Pemeriksaan Urine
                                            </th>
                                            <th colspan="4" class="text-center text-white" style="background-color: rgba(220,53,69, 0.7);">
                                                Lainnya
                                            </th>
                                        </tr>
                                    </tr>
                                    <!-- Baris header nama field -->
                                    <tr>
                                        <!-- Group 1: Identitas & Data Demografis -->
                                        <th style="min-width: 130px;">ID</th>
                                        <th style="min-width: 130px;">ID Pasien</th>
                                        <th style="min-width: 130px;">Gender</th>
                                        <th style="min-width: 130px;">Age</th>
                                        <!-- Group 2: Tanda Vital & Antropometri -->
                                        <th style="min-width: 130px;">Height</th>
                                        <th style="min-width: 130px;">Weight</th>
                                        <th style="min-width: 130px;">BMI</th>
                                        <th style="min-width: 130px;">BMICat</th>
                                        <th style="min-width: 130px;">Hipertensi Kategori</th>
                                        <th style="min-width: 130px;">Sistolik</th>
                                        <th style="min-width: 130px;">Diastolik</th>
                                        <th style="min-width: 130px;">Nadi (kali/menit)</th>
                                        <th style="min-width: 130px;">Frekuensi Napas (kali/menit)</th>
                                        <th style="min-width: 130px;">Tingkatan Kesadaran</th>
                                        <!-- Group 3: Riwayat Penyakit / Komorbiditas -->
                                        <th style="min-width: 130px;">Tuberkulosis</th>
                                        <th style="min-width: 130px;">Penyakit Jantung</th>
                                        <th style="min-width: 130px;">Hipertensi</th>
                                        <th style="min-width: 130px;">Diabetes Melitus</th>
                                        <th style="min-width: 130px;">Gangguan Jiwa</th>
                                        <th style="min-width: 130px;">Trauma pada Kepala</th>
                                        <th style="min-width: 130px;">Hepatitis</th>
                                        <!-- Group 4: Tes Fungsional / Imaging -->
                                        <th style="min-width: 130px;">Spirometri</th>
                                        <th style="min-width: 130px;">Treadmil</th>
                                        <th style="min-width: 130px;">Audiometri</th>
                                        <th style="min-width: 130px;">Foto Thorax</th>
                                        <!-- Group 5: Pemeriksaan Fisik Tambahan -->
                                        <th style="min-width: 130px;">Buta Warna</th>
                                        <th style="min-width: 130px;">Jantung</th>
                                        <!-- Group 6: Pemeriksaan Darah (Hematologi & Biokimia) -->
                                        <th style="min-width: 130px;">Hemoglobin</th>
                                        <th style="min-width: 130px;">Leukosit</th>
                                        <th style="min-width: 130px;">Eritrosit</th>
                                        <th style="min-width: 130px;">LED</th>
                                        <th style="min-width: 130px;">Eosinofil</th>
                                        <th style="min-width: 130px;">Basofil</th>
                                        <th style="min-width: 130px;">Neutrofil</th>
                                        <th style="min-width: 130px;">Lymphosit</th>
                                        <th style="min-width: 130px;">Monosit</th>
                                        <th style="min-width: 130px;">Trombosit</th>
                                        <th style="min-width: 130px;">Hematokrit</th>
                                        <th style="min-width: 130px;">MCV</th>
                                        <th style="min-width: 130px;">SGOT</th>
                                        <th style="min-width: 130px;">SGPT</th>
                                        <th style="min-width: 130px;">BUN</th>
                                        <th style="min-width: 130px;">Kreatinin</th>
                                        <th style="min-width: 130px;">Asam Urat</th>
                                        <th style="min-width: 130px;">Kolesterol Total</th>
                                        <th style="min-width: 130px;">Trigliserida</th>
                                        <th style="min-width: 130px;">Kolesterol HDL (Direct)</th>
                                        <th style="min-width: 130px;">Kolesterol LDL (Direct)</th>
                                        <th style="min-width: 130px;">Gula Darah Puasa</th>
                                        <th style="min-width: 130px;">Gula Darah 2 Jam PP</th>
                                        <th style="min-width: 130px;">Anti HBs Ag</th>
                                        <th style="min-width: 130px;">HBs Ag Kuantitatif</th>
                                        <!-- Group 7: Pemeriksaan Urine -->
                                        <th style="min-width: 130px;">pH pada Urine</th>
                                        <th style="min-width: 130px;">Berat Jenis pada Urine</th>
                                        <th style="min-width: 130px;">Nitrite pada Urine</th>
                                        <th style="min-width: 130px;">Protein pada Urine</th>
                                        <th style="min-width: 130px;">Reduksi pada Urine</th>
                                        <th style="min-width: 130px;">Keton pada Urine</th>
                                        <th style="min-width: 130px;">Urobilinogen pada Urine</th>
                                        <th style="min-width: 130px;">Billirubin pada Urine</th>
                                        <th style="min-width: 130px;">Eritrosit pada Urine</th>
                                        <th style="min-width: 130px;">Leukosit pada Urine</th>
                                        <th style="min-width: 130px;">Silinder pada Urine</th>
                                        <th style="min-width: 130px;">Kristal pada Urine</th>
                                        <th style="min-width: 130px;">Yeast pada Urine</th>
                                        <th style="min-width: 130px;">Bakteri pada Urine</th>
                                        <!-- Group 8: Lainnya -->
                                        <th style="min-width: 130px;">Hasil</th>
                                        <th style="min-width: 130px;">Status</th>
                                        <th style="min-width: 130px;">Action</th>
                                        <th style="min-width: 200px;">Detail</th>
                                    </tr>
                                </thead>
                                <!-- Sesuaikan urutan kolom pada <tbody> dengan urutan header di atas -->
                                <tbody>
                                    @foreach ($hasilPemeriksaan as $hasil)
                                        <tr>
                                            <!-- Group 1 -->
                                            <td>{{ $hasil->id }}</td>
                                            <td>{{ $hasil->id_pasien }}</td>
                                            <td>{{ $hasil->gender }}</td>
                                            <td>{{ $hasil->Age }}</td>
                                            <!-- Group 2 -->
                                            <td>{{ $hasil->height }}</td>
                                            <td>{{ $hasil->weight }}</td>
                                            <td>{{ $hasil->BMI }}</td>
                                            <td>{{ $hasil->BMICat }}</td>
                                            <td>{{ $hasil->Hipertensi_Kategori }}</td>
                                            <td>{{ $hasil->Sistolik }}</td>
                                            <td>{{ $hasil->Diastolik }}</td>
                                            <td>{{ $hasil->{'Nadi(kali/menit)'} }}</td>
                                            <td>{{ $hasil->{'FrekuensiNapas(kali/menit)'} }}</td>
                                            <td>{{ $hasil->Tingkatan_Kesadaran }}</td>
                                            <!-- Group 3 -->
                                            <td>{{ $hasil->tuberkulosis ? 'Tidak' : 'Ya' }}</td>
                                            <td>{{ $hasil->penyakit_jantung ? 'Tidak' : 'Ya' }}</td>
                                            <td>{{ $hasil->hipertensi ? 'Tidak' : 'Ya' }}</td>
                                            <td>{{ $hasil->diabetes_melitus ? 'Tidak' : 'Ya' }}</td>
                                            <td>{{ $hasil->gangguan_jiwa ? 'Tidak' : 'Ya' }}</td>
                                            <td>{{ $hasil->trauma_pada_kepala ? 'Tidak' : 'Ya' }}</td>
                                            <td>{{ $hasil->hepatitis ? 'Tidak' : 'Ya' }}</td>
                                            <!-- Group 4 -->
                                            <td>{{ $hasil->Spirometri ? 'Tidak Normal' : 'Normal' }}</td>
                                            <td>{{ $hasil->Treadmil ? 'Tidak Normal' : 'Normal' }}</td>
                                            <td>{{ $hasil->Audiometri ? 'Tidak Normal' : 'Normal' }}</td>
                                            <td>{{ $hasil->foto_thorax ? 'Tidak Normal' : 'Normal' }}</td>
                                            <!-- Group 5 -->
                                            <td>{{ $hasil->Buta_Warna ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->Jantung ? 'Ya' : 'Tidak' }}</td>
                                            <!-- Group 6 -->
                                            <td>{{ $hasil->hemoglobin }}</td>
                                            <td>{{ $hasil->leukosit }}</td>
                                            <td>{{ $hasil->eritrosit }}</td>
                                            <td>{{ $hasil->LED }}</td>
                                            <td>{{ $hasil->eosinofil }}</td>
                                            <td>{{ $hasil->basofil }}</td>
                                            <td>{{ $hasil->neutrofil }}</td>
                                            <td>{{ $hasil->lymphosit }}</td>
                                            <td>{{ $hasil->monosit }}</td>
                                            <td>{{ $hasil->trombosit }}</td>
                                            <td>{{ $hasil->hematokrit }}</td>
                                            <td>{{ $hasil->MCV }}</td>
                                            <td>{{ $hasil->SGOT }}</td>
                                            <td>{{ $hasil->SGPT }}</td>
                                            <td>{{ $hasil->BUN }}</td>
                                            <td>{{ $hasil->kreatinin }}</td>
                                            <td>{{ $hasil->asam_urat }}</td>
                                            <td>{{ $hasil->kolestrol_total }}</td>
                                            <td>{{ $hasil->trigliserida }}</td>
                                            <td>{{ $hasil->{'kolestrol_HDL_(direct)'} }}</td>
                                            <td>{{ $hasil->{'kolestrol_LDL_(direct)'} }}</td>
                                            <td>{{ $hasil->gula_darah_puasa }}</td>
                                            <td>{{ $hasil->gula_darah_2_jam_pp }}</td>
                                            <td>{{ $hasil->anti_HBs ? 'Positif' : 'Negatif' }}</td>
                                            <td>{{ $hasil->HBs_Ag_Kuantitatif ? 'Positif' : 'Negatif' }}</td>
                                            <!-- Group 7 -->
                                            <td>{{ $hasil->pH_pada_urine }}</td>
                                            <td>{{ $hasil->berat_jenis_pada_urine }}</td>
                                            <td>{{ $hasil->nitrite_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->protein_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->reduksi_pada_urine }}</td>
                                            <td>{{ $hasil->ketone_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->urobilinogen_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->billirubin_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->eritrosit_pada_urine }}</td>
                                            <td>{{ $hasil->lekosit_pada_urine }}</td>
                                            <td>{{ $hasil->silinder_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->kristal_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->yeast_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->bakteri_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <!-- Group 8 -->
                                            <td>
                                                @php
                                                    $hasilPemeriksaan = $hasilPrediksi->where('id_rekammedis', $hasil->id)->first();
                                                @endphp
                                                {{ $hasilPemeriksaan ? $hasilPemeriksaan->hasil_pemeriksaan : '-' }}
                                            </td>
                                            <td>{{ $hasil->statusPemeriksaan->status ?? 'Not available' }}</td>
                                            <td>
                                                <a href="{{ route('edit.hasil.pemeriksaan', $hasil->id) }}" class="btn btn-outline-secondary btn-icon-text" style="border-radius: 7px; padding: 8px; min-width: 100%; margin-bottom: 7px;">
                                                    Edit
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </a>
                                                @if($hasilPemeriksaan)
                                                    <a href="{{ route('edit.hasil.prediksi', $hasilPemeriksaan->id) }}" class="btn btn-outline-secondary btn-icon-text" style="border-radius: 7px; padding: 8px; min-width: 100%; margin-bottom: 7px;">
                                                        Edit &amp; Delete Hasil
                                                        <i class="typcn typcn-edit btn-icon-append"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('hasilPemeriksaan.predict', $hasil->id) }}" class="btn btn-outline-secondary btn-icon-text" style="border-radius: 7px; padding: 8px; min-width: 100%;">
                                                        Prediction
                                                        <i class="fa-solid fa-chart-bar btn-icon-append"></i>
                                                    </a>
                                                @endif
                                                <form action="{{ route('hasil-pemeriksaan.destroy', $hasil->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus hasil pemeriksaan ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-icon-text" style="border-radius: 7px; padding: 8px; min-width: 169px;">
                                                        Delete
                                                        <i class="typcn typcn-trash btn-icon-append"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-icon-text" style="border-radius: 7px; margin-bottom: 7px; min-width: 100%;padding: 9px" onclick="viewDetail({{ $hasil->id }})">
                                                    View Detail
                                                    <i class="typcn typcn-eye btn-icon-append"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                        </div>
                    </div>
                </div>
        @else
            @if (session('success'))
                <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session("success") }}',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    timer: 3000,
                    timerProgressBar: true,
                });
                </script>
            @endif
        @endif

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">Team Kerja Praktik</a> 2025</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script>
        function filterTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('dataTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) { // Mulai dari 1 untuk melewati header
                const cells = rows[i].getElementsByTagName('td');
                let match = false;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        const text = cells[j].textContent || cells[j].innerText;
                        if (text.toLowerCase().includes(filter)) {
                            match = true;
                            break;
                        }
                    }
                }

                rows[i].style.display = match ? '' : 'none';
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-outline-danger');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    <script>
        function viewDetail(id) {
        // Bersihkan konten modal dan stamp
        $('#modalIdentitas, #modalVital, #modalRiwayat, #modalFungsional, #modalPemeriksaanFisik, #modalDarah, #modalUrine').html('');
        $('#stampResult').text(''); // reset stamp

        $.ajax({
            url: '/hasilpemeriksaan/detail/' + id, // Pastikan route ini sudah didefinisikan di backend
            type: 'GET',
            dataType: 'json',
            success: function(response) {
            if(response.success) {
                var data = response.data;

                // 1. Identitas & Data Demografis
                var identitas = 'ID: ' + data.id + '<br>' +
                                'ID Pasien: ' + data.id_pasien + '<br>' +
                                'Gender: ' + data.gender + '<br>' +
                                'Age: ' + data.Age;
                $('#modalIdentitas').html(identitas);

                // 2. Tanda Vital & Antropometri
                var vital = 'Height: ' + data.height + '<br>' +
                            'Weight: ' + data.weight + '<br>' +
                            'BMI: ' + data.BMI + ' (' + data.BMICat + ')<br>' +
                            'Hipertensi Kategori: ' + data.Hipertensi_Kategori + '<br>' +
                            'Sistolik: ' + data.Sistolik + ' - Diastolik: ' + data.Diastolik + '<br>' +
                            'Nadi: ' + data['Nadi(kali/menit)'] + '<br>' +
                            'Frekuensi Napas: ' + data['FrekuensiNapas(kali/menit)'] + '<br>' +
                            'Tingkatan Kesadaran: ' + data.Tingkatan_Kesadaran;
                $('#modalVital').html(vital);

                // 3. Riwayat Penyakit / Komorbiditas
                var riwayat = 'Tuberkulosis: ' + (data.tuberkulosis ? 'Tidak' : 'Ya') + '<br>' +
                            'Penyakit Jantung: ' + (data.penyakit_jantung ? 'Tidak' : 'Ya') + '<br>' +
                            'Hipertensi: ' + (data.hipertensi ? 'Tidak' : 'Ya') + '<br>' +
                            'Diabetes Melitus: ' + (data.diabetes_melitus ? 'Tidak' : 'Ya') + '<br>' +
                            'Gangguan Jiwa: ' + (data.gangguan_jiwa ? 'Tidak' : 'Ya') + '<br>' +
                            'Trauma pada Kepala: ' + (data.trauma_pada_kepala ? 'Tidak' : 'Ya') + '<br>' +
                            'Hepatitis: ' + (data.hepatitis ? 'Tidak' : 'Ya');
                $('#modalRiwayat').html(riwayat);

                // 4. Tes Fungsional / Imaging
                var fungsional = 'Spirometri: ' + (data.Spirometri ? 'Tidak Normal' : 'Normal') + '<br>' +
                                'Treadmil: ' + (data.Treadmil ? 'Tidak Normal' : 'Normal') + '<br>' +
                                'Audiometri: ' + (data.Audiometri ? 'Tidak Normal' : 'Normal') + '<br>' +
                                'Foto Thorax: ' + (data.foto_thorax ? 'Tidak Normal' : 'Normal');
                $('#modalFungsional').html(fungsional);

                // 5. Pemeriksaan Fisik Tambahan
                var fisik = 'Buta Warna: ' + (data.Buta_Warna ? 'Ya' : 'Tidak') + '<br>' +
                            'Jantung: ' + (data.Jantung ? 'Ya' : 'Tidak');
                $('#modalPemeriksaanFisik').html(fisik);

                // 6. Pemeriksaan Darah (Hematologi & Biokimia)
                var darah = 'Hemoglobin: ' + data.hemoglobin + '<br>' +
                            'Leukosit: ' + data.leukosit + '<br>' +
                            'Eritrosit: ' + data.eritrosit + '<br>' +
                            'LED: ' + data.LED + '<br>' +
                            'Eosinofil: ' + data.eosinofil + '<br>' +
                            'Basofil: ' + data.basofil + '<br>' +
                            'Neutrofil: ' + data.neutrofil + '<br>' +
                            'Lymphosit: ' + data.lymphosit + '<br>' +
                            'Monosit: ' + data.monosit + '<br>' +
                            'Trombosit: ' + data.trombosit + '<br>' +
                            'Hematokrit: ' + data.hematokrit + '<br>' +
                            'MCV: ' + data.MCV + '<br>' +
                            'SGOT: ' + data.SGOT + '<br>' +
                            'SGPT: ' + data.SGPT + '<br>' +
                            'BUN: ' + data.BUN + '<br>' +
                            'Kreatinin: ' + data.kreatinin + '<br>' +
                            'Asam Urat: ' + data.asam_urat + '<br>' +
                            'Kolestrol Total: ' + data.kolestrol_total + '<br>' +
                            'Trigliserida: ' + data.trigliserida + '<br>' +
                            'Kolestrol HDL (Direct): ' + data['kolestrol_HDL_(direct)'] + '<br>' +
                            'Kolestrol LDL (Direct): ' + data['kolestrol_LDL_(direct)'] + '<br>' +
                            'Gula Darah Puasa: ' + data.gula_darah_puasa + '<br>' +
                            'Gula Darah 2 Jam PP: ' + data.gula_darah_2_jam_pp + '<br>' +
                            'Anti HBs: ' + (data.anti_HBs ? 'Positif' : 'Negatif') + '<br>' +
                            'HBs Ag Kuantitatif: ' + (data.HBs_Ag_Kuantitatif ? 'Positif' : 'Negatif');
                $('#modalDarah').html(darah);

                // 7. Pemeriksaan Urine
                var urine = 'pH pada Urine: ' + data.pH_pada_urine + '<br>' +
                            'Berat Jenis pada Urine: ' + data.berat_jenis_pada_urine + '<br>' +
                            'Nitrite pada Urine: ' + (data.nitrite_pada_urine ? 'Ya' : 'Tidak') + '<br>' +
                            'Protein pada Urine: ' + (data.protein_pada_urine ? 'Ya' : 'Tidak') + '<br>' +
                            'Reduksi pada Urine: ' + data.reduksi_pada_urine + '<br>' +
                            'Keton pada Urine: ' + (data.ketone_pada_urine ? 'Ya' : 'Tidak') + '<br>' +
                            'Urobilinogen pada Urine: ' + (data.urobilinogen_pada_urine ? 'Ya' : 'Tidak') + '<br>' +
                            'Billirubin pada Urine: ' + (data.billirubin_pada_urine ? 'Ya' : 'Tidak') + '<br>' +
                            'Eritrosit pada Urine: ' + data.eritrosit_pada_urine + '<br>' +
                            'Lekosit pada Urine: ' + data.lekosit_pada_urine + '<br>' +
                            'Silinder pada Urine: ' + (data.silinder_pada_urine ? 'Ya' : 'Tidak') + '<br>' +
                            'Kristal pada Urine: ' + (data.kristal_pada_urine ? 'Ya' : 'Tidak') + '<br>' +
                            'Yeast pada Urine: ' + (data.yeast_pada_urine ? 'Ya' : 'Tidak') + '<br>' +
                            'Bakteri pada Urine: ' + (data.bakteri_pada_urine ? 'Ya' : 'Tidak');
                $('#modalUrine').html(urine);

                // Contoh potongan script AJAX
                if (response.hasil_pemeriksaan && response.hasil_pemeriksaan !== '-') {
                $('#stampResult').text(response.hasil_pemeriksaan);
                } else {
                $('#stampResult').text('Belum Ada Hasil');
                }

            } else {
                $('#modalIdentitas, #modalVital, #modalRiwayat, #modalFungsional, #modalPemeriksaanFisik, #modalDarah, #modalUrine').html('Data tidak ditemukan');
                $('#stampResult').text('');
            }
            // Tampilkan modal setelah data diisi
            $('#detailModal').modal('show');
            },
            error: function(xhr, status, error) {
            console.error('Error fetching detail:', error);
            $('#modalIdentitas, #modalVital, #modalRiwayat, #modalFungsional, #modalPemeriksaanFisik, #modalDarah, #modalUrine').html('Error fetching data');
            $('#stampResult').text('');
            $('#detailModal').modal('show');
            }
        });
        }
    </script>
    <script>
        function scrollRight() {
          // Mendapatkan elemen container tabel
          var container = document.getElementById('scrollable-container');

          container.scrollBy({
            left: 8000,
            behavior: 'smooth'
          });
        }
    </script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="vendors/progressbar.js/progressbar.min.js"></script>
    <script src="vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
