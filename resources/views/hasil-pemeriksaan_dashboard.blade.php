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
                <a class="dropdown-item">
                <i class="typcn typcn-cog text-primary"></i>
                Settings
                </a>
                <a class="dropdown-item">
                <i class="typcn typcn-power text-primary"></i>
                Logout
                </a>
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
              <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-md-end">
                  <div class="mb-3 mb-xl-0 pr-1">
                      <div class="dropdown">
                        <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="typcn typcn-calendar-outline mr-2"></i>Last 7 days
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                          <h6 class="dropdown-header">Last 14 days</h6>
                          <a class="dropdown-item" href="#">Last 21 days</a>
                          <a class="dropdown-item" href="#">Last 28 days</a>
                        </div>
                      </div>
                  </div>
                  <div class="pr-1 mb-3 mr-2 mb-xl-0">
                    <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i class="typcn typcn-arrow-forward-outline mr-2"></i>Export</button>
                  </div>
                  <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i class="typcn typcn-info-large-outline mr-2"></i>info</button>
                  </div>
                </div>
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
                        <h4 class="card-title">Data Pasien</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th style="min-width: 130px">ID Pasien</th>
                                        <th style="min-width: 130px">Gender</th>
                                        <th style="min-width: 130px">Height</th>
                                        <th style="min-width: 130px">Weight</th>
                                        <th style="min-width: 130px">Sistolik</th>
                                        <th style="min-width: 130px">Diastolik</th>
                                        <th style="min-width: 130px">Age</th>
                                        <th style="min-width: 130px">BMI</th>
                                        <th style="min-width: 130px">BMICat</th>
                                        <th style="min-width: 130px">Hipertensi Kategori</th>
                                        <th style="min-width: 130px">Tuberkulosis</th>
                                        <th style="min-width: 130px">Penyakit Jantung</th>
                                        <th style="min-width: 130px">Hipertensi</th>
                                        <th style="min-width: 130px">Diabetes Melitus</th>
                                        <th style="min-width: 130px">Gangguan Jiwa</th>
                                        <th style="min-width: 130px">Trauma pada Kepala</th>
                                        <th style="min-width: 130px">Hepatitis</th>
                                        <th style="min-width: 130px">Spirometri</th>
                                        <th style="min-width: 130px">Treadmil</th>
                                        <th style="min-width: 130px">Audiometri</th>
                                        <th style="min-width: 130px">Foto Thorax</th>
                                        <th style="min-width: 130px">Nadi (kali/menit)</th>
                                        <th style="min-width: 130px">Frekuensi Napas (kali/menit)</th>
                                        <th style="min-width: 130px">Tingkatan Kesadaran</th>
                                        <th style="min-width: 130px">Buta Warna</th>
                                        <th style="min-width: 130px">Jantung</th>
                                        <th style="min-width: 130px">Hemoglobin</th>
                                        <th style="min-width: 130px">Leukosit</th>
                                        <th style="min-width: 130px">Eritrosit</th>
                                        <th style="min-width: 130px">LED</th>
                                        <th style="min-width: 130px">Eosinofil</th>
                                        <th style="min-width: 130px">Basofil</th>
                                        <th style="min-width: 130px">Neutrofil</th>
                                        <th style="min-width: 130px">Lymphosit</th>
                                        <th style="min-width: 130px">Monosit</th>
                                        <th style="min-width: 130px">Trombosit</th>
                                        <th style="min-width: 130px">Hematokrit</th>
                                        <th style="min-width: 130px">MCV</th>
                                        <th style="min-width: 130px">SGOT</th>
                                        <th style="min-width: 130px">SGPT</th>
                                        <th style="min-width: 130px">BUN</th>
                                        <th style="min-width: 130px">Kreatinin</th>
                                        <th style="min-width: 130px">Asam Urat</th>
                                        <th style="min-width: 130px">Kolesterol Total</th>
                                        <th style="min-width: 130px">Trigliserida</th>
                                        <th style="min-width: 130px">Kolesterol HDL (Direct)</th>
                                        <th style="min-width: 130px">Kolesterol LDL (Direct)</th>
                                        <th style="min-width: 130px">HBs Ag Kuantitatif</th>
                                        <th style="min-width: 130px">pH pada Urine</th>
                                        <th style="min-width: 130px">Nitrite pada Urine</th>
                                        <th style="min-width: 130px">Protein pada Urine</th>
                                        <th style="min-width: 130px">Reduksi pada Urine</th>
                                        <th style="min-width: 130px">Keton pada Urine</th>
                                        <th style="min-width: 130px">Urobilinogen pada Urine</th>
                                        <th style="min-width: 130px">Billirubin pada Urine</th>
                                        <th style="min-width: 130px">Silinder pada Urine</th>
                                        <th style="min-width: 130px">Kristal pada Urine</th>
                                        <th style="min-width: 130px">Yeast pada Urine</th>
                                        <th style="min-width: 130px">Bakteri pada Urine</th>
                                        <th style="min-width: 130px">Berat Jenis pada Urine</th>
                                        <th style="min-width: 130px">Eritrosit pada Urine</th>
                                        <th style="min-width: 130px">Leukosit pada Urine</th>
                                        <th style="min-width: 130px">Gula Darah Puasa</th>
                                        <th style="min-width: 130px">Gula Darah 2 Jam PP</th>
                                        <th style="min-width: 130px">Hasil</th>
                                        <th style="min-width: 180px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hasilPemeriksaan as $hasil)
                                        <tr>
                                            <td>{{ $hasil->id_pasien }}</td>
                                            <td>{{ $hasil->gender }}</td>
                                            <td>{{ $hasil->height }}</td>
                                            <td>{{ $hasil->weight }}</td>
                                            <td>{{ $hasil->Sistolik }}</td>
                                            <td>{{ $hasil->Diastolik }}</td>
                                            <td>{{ $hasil->Age }}</td>
                                            <td>{{ $hasil->BMI }}</td>
                                            <td>{{ $hasil->BMICat }}</td>
                                            <td>{{ $hasil->Hipertensi_Kategori }}</td>
                                            <td>{{ $hasil->tuberkulosis ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->penyakit_jantung ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->hipertensi ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->diabetes_melitus ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->gangguan_jiwa ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->trauma_pada_kepala ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->hepatitis ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->Spirometri ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->Treadmil ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->Audiometri ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->foto_thorax ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->{'Nadi(kali/menit)'} }}</td>
                                            <td>{{ $hasil->{'FrekuensiNapas(kali/menit)'} }}</td>
                                            <td>{{ $hasil->Tingkatan_Kesadaran }}</td>
                                            <td>{{ $hasil->Buta_Warna ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->Jantung ? 'Ya' : 'Tidak' }}</td>
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
                                            <td>{{ $hasil->HBs_Ag_Kuantitatif ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->pH_pada_urine }}</td>
                                            <td>{{ $hasil->nitrite_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->protein_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->reduksi_pada_urine }}</td>
                                            <td>{{ $hasil->ketone_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->urobilinogen_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->billirubin_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->silinder_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->kristal_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->yeast_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->bakteri_pada_urine ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $hasil->berat_jenis_pada_urine }}</td>
                                            <td>{{ $hasil->eritrosit_pada_urine }}</td>
                                            <td>{{ $hasil->lekosit_pada_urine }}</td>
                                            <td>{{ $hasil->gula_darah_puasa }}</td>
                                            <td>{{ $hasil->gula_darah_2_jam_pp }}</td>
                                            <td>
                                                @php
                                                    $hasilPemeriksaan = $hasilPrediksi->where('id_rekammedis', $hasil->id)->first();
                                                @endphp
                                                {{ $hasilPemeriksaan ? $hasilPemeriksaan->hasil_pemeriksaan : '-' }}
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.hasil.pemeriksaan', $hasil->id) }}" class="btn btn-outline-secondary btn-icon-text" style="padding: 8px 8px; min-width: 100%; margin-bottom: 7px;">
                                                    Edit
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </a>

                                                @if($hasilPemeriksaan)
                                                    {{-- Tombol "Edit Hasil" hanya muncul jika sudah ada hasil prediksi --}}
                                                    <a href="{{ route('edit.hasil.prediksi', $hasilPemeriksaan->id) }}" class="btn btn-outline-secondary btn-icon-text" style="padding: 8px 8px; min-width: 100%; margin-bottom: 7px;">
                                                        Edit Hasil
                                                        <i class="typcn typcn-edit btn-icon-append"></i>
                                                    </a>

                                                    {{-- Tombol "Delete" hanya muncul jika sudah ada hasil prediksi --}}
                                                    <form action="{{ route('delete.hasil.prediksi', $hasilPemeriksaan->id) }}" method="POST" style="display: inline-block; width: 100%;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-icon-text" style="padding: 8px 8px; min-width: 100%;">
                                                            Delete
                                                            <i class="typcn typcn-trash btn-icon-append"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    {{-- Tombol "Prediction" hanya muncul jika belum ada hasil prediksi --}}
                                                    <a href="{{ route('hasilPemeriksaan.predict', $hasil->id) }}" class="btn btn-outline-secondary btn-icon-text" style="padding: 8px 8px; min-width: 100%;">
                                                        Prediction
                                                        <i class="fa-solid fa-chart-bar btn-icon-append"></i>
                                                    </a>
                                                @endif
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
            <!-- Tampilan Form Create -->
            <div class="col-12 grid-margin" style="margin-top: 15px;padding: 0px;">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Data Pasien</h4>
                        <!-- Form menggunakan method POST untuk kirim data ke server -->
                        <form method="POST" action="{{ route('pasien.store') }}" class="form-sample">
                            @csrf
                            <p class="card-description">Informasi Pasien</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_panjang" placeholder="Masukkan nama lengkap" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="tanggal_lahir" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="jenis_kelamin" required>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nomor HP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nomor_hp" placeholder="Masukkan nomor HP" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" placeholder="Masukkan email (opsional)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="pekerjaan" placeholder="Masukkan pekerjaan">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat lengkap">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nomor Identitas (NIK/KTP)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nomor_identitas" placeholder="Masukkan nomor identitas (NIK/KTP)" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Input Tanggal Pemeriksaan -->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanggal Pemeriksaan</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="tanggal_pemeriksaan" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Input Waktu Pemeriksaan -->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Waktu Pemeriksaan</label>
                                        <div class="col-sm-9">
                                            <input type="time" class="form-control" name="waktu_pemeriksaan" required>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="id_perawat" value="{{ Auth::user()->id_user }}">

                                <button type="submit" class="btn btn-primary" style="margin-right: 2%;">Simpan</button>
                                <a href="{{ route('cancelForm') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
