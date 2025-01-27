<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- base:css -->
    <link rel="stylesheet" href="vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="{{ asset('vendors/typicons.font/font/typicons.css') }}">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.jpg') }}">
    <link rel="shortcut icon" href="img/favicon.jpg" />

    <style>
        select.form-control {
            min-height: 45px;
        }
    </style>
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
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('img/favicon.jpg') }}" alt="logo" style="width:100%"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('img/logo-mini.svg') }}" alt="logo"/></a>
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
                <img src="{{ asset('img/me.jpg') }}" alt="image">
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
                    <li class="nav-item"> <a class="nav-link" href="../../pages/charts/chartjs.html">Jadwal Dokter</a></li>
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
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/hasil-pemeriksaan">Hasil Pemeriksaan</a></li>
                <li class="nav-item"> <a class="nav-link" href="/sama-saja">Detail Jadwal</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="/sama-saja">Detail Jadwal</a></li>
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

            <form action="/predict" method="POST" >
                @csrf
                <!-- Personal Information -->
                <div class="form-group">
                    <label for="id">id:</label>
                    <input type="number" id="id" name="id" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" required>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="height">tinggi badan:</label>
                    <input type="number" id="height" name="height" required>
                </div>
                <div class="form-group">
                    <label for="weight">berat badan:</label>
                    <input type="number" step="0.1" id="weight" name="weight" required>
                </div>
                <div class="form-group">
                    <label for="Sistolik">Sistolik:</label>
                    <input type="number" id="Sistolik" name="Sistolik" required>
                </div>

                <div class="form-group">
                    <label for="Diastolik">Diastolik:</label>
                    <input type="number" id="Diastolik" name="Diastolik" required>
                </div>
                <div class="form-group">
                    <label for="Age">umur:</label>
                    <input type="number" id="Age" name="Age" required>
                </div>
                <div class="form-group">
                    <label for="BMI">Body Mass Index (BMI):</label>
                    <input type="number" step="0.1" id="BMI" name="BMI" required>
                </div>
                <div class="form-group">
                    <label for="BMICat">Kategori BMI:</label>
                    <select name="BMICat" id="BMICat" required>
                        <option value="0">Normal</option>
                        <option value="1">Obesitas I</option>
                        <option value="2">Obesitas II</option>
                        <option value="3">Over Weight</option>
                        <option value="4">Under Weight</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Hipertensi_Kategori">Kategori Hipertensi:</label>
                    <select name="Hipertensi_Kategori" id="Hipertensi_Kategori" required>
                        <option value="0">Hipertensi Tingkat 1</option>
                        <option value="1">Hipertensi Tingkat 2</option>
                        <option value="2">Normal</option>
                        <option value="3">Pra-hipertensi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tuberkulosis">tuberkulosis:</label>
                    <select name="tuberkulosis" id="tuberkulosis" required>
                        <option value="0">ada</option>
                        <option value="1">tidak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="penyakit_jantung">penyakit jantung:</label>
                    <select name="penyakit_jantung" id="penyakit_jantung" required>
                        <option value="0">ada</option>
                        <option value="1">tidak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="hipertensi">hipertensi:</label>
                    <select name="hipertensi" id="hipertensi" required>
                        <option value="0">ada</option>
                        <option value="1">tidak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="diabetes_melitus">diabetes melitus:</label>
                    <select name="diabetes_melitus" id="diabetes_melitus" required>
                        <option value="0">ada</option>
                        <option value="1">tidak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gangguan_jiwa">gangguan jiwa:</label>
                    <select name="gangguan_jiwa" id="gangguan_jiwa" required>
                        <option value="0">ada</option>
                        <option value="1">tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="trauma_pada_kepala">trauma pada kepala:</label>
                    <select name="trauma_pada_kepala" id="trauma_pada_kepala" required>
                        <option value="0">ada</option>
                        <option value="1">tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hepatitis">hepatitis:</label>
                    <select name="hepatitis" id="hepatitis" required>
                        <option value="0">ada</option>
                        <option value="1">tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Spirometri">Spirometri:</label>
                    <select name="Spirometri" id="Spirometri" required>
                        <option value="0">normal</option>
                        <option value="1">tidak normal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Treadmil">Treadmil:</label>
                    <select name="Treadmil" id="Treadmil" required>
                        <option value="0">normal</option>
                        <option value="1">tidak normal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Audiometri">Audiometri:</label>
                    <select name="Audiometri" id="Audiometri" required>
                        <option value="0">normal</option>
                        <option value="1">tidak normal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto_thorax">foto thorax:</label>
                    <select name="foto_thorax" id="foto_thorax" required>
                        <option value="0">normal</option>
                        <option value="1">tidak normal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Nadi(kali/menit)">Nadi (kali/menit):</label>
                    <input type="number" id="Nadi(kali/menit)" name="Nadi(kali/menit)" required>
                </div>
                <div class="form-group">
                    <label for="FrekuensiNapas(kali/menit)">Frekuensi Napas (kali/menit):</label>
                    <input type="number" id="FrekuensiNapas(kali/menit)" name="FrekuensiNapas(kali/menit)" required>
                </div>
                <!-- Medical History -->
                <div class="form-group">
                    <label for="Tingkatan_Kesadaran">Tingkatan Kesadaran:</label>
                    <select name="Tingkatan_Kesadaran" id="Tingkatan_Kesadaran" required>
                        <option value="1">compos mentis</option>
                        <option value="0">apatis</option>
                        <option value="2">delirium</option>
                        <option value="3">koma</option>
                        <option value="4">semi koma</option>
                        <option value="5">somnolen</option>
                        <option value="6">sopor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Buta_Warna">Buta Warna:</label>
                    <select name="Buta_Warna" id="Buta_Warna" required>
                        <option value="0">tidak</option>
                        <option value="1">ya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Jantung">Jantung:</label>
                    <select name="Jantung" id="Jantung" required>
                        <option value="0">normal</option>
                        <option value="1">tidak normal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hemoglobin">hemoglobin:</label>
                    <input type="number" id="hemoglobin" name="hemoglobin" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="leukosit">leukosit:</label>
                    <input type="number" id="leukosit" name="leukosit" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="eritrosit">eritrosit:</label>
                    <input type="number" id="eritrosit" name="eritrosit" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="LED">LED:</label>
                    <input type="number" id="LED" name="LED" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="eosinofil">eosinofil:</label>
                    <input type="number" id="eosinofil" name="eosinofil"step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="basofil">basofil:</label>
                    <input type="number" id="basofil" name="basofil" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="neutrofil">neutrofil:</label>
                    <input type="number" id="neutrofil" name="neutrofil" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="lymphosit">lymphosit:</label>
                    <input type="number" id="lymphosit" name="lymphosit" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="monosit">monosit:</label>
                    <input type="number" id="monosit" name="monosit"step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="trombosit">trombosit:</label>
                    <input type="number" id="trombosit" name="trombosit" required>
                </div>
                <div class="form-group">
                    <label for="hematokrit">hematokrit:</label>
                    <input type="number" id="hematokrit" name="hematokrit"step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="MCV">MCV:</label>
                    <input type="number" id="MCV" name="MCV"step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="SGOT">S G O T:</label>
                    <input type="number" id="SGOT" name="SGOT" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="SGPT">S G P T:</label>
                    <input type="number" id="SGPT" name="SGPT" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="BUN">B U N:</label>
                    <input type="number" id="BUN" name="BUN" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="kreatinin">kreatinin:</label>
                    <input type="number" id="kreatinin" name="kreatinin"step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="asam_urat">asam urat:</label>
                    <input type="number" id="asam_urat" name="asam_urat" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="kolestrol_total">kolestrol total:</label>
                    <input type="number" id="kolestrol_total" name="kolestrol_total" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="trigliserida">trigliserida:</label>
                    <input type="number" id="trigliserida" name="trigliserida"step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="kolestrol_HDL_(direct)">kolestrol HDL (direct):</label>
                    <input type="number" id="kolestrol_HDL_(direct)" name="kolestrol_HDL_(direct)"step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="kolestrol_LDL_(direct)">kolestrol LDL (direct):</label>
                    <input type="number" id="kolestrol_LDL_(direct)" name="kolestrol_LDL_(direct)" step="0.01"required>
                </div>
                <div class="form-group">
                    <label for="HBs_Ag_Kuantitatif">HBs Ag Kuantitatif:</label>
                    <select name="HBs_Ag_Kuantitatif" id="HBs_Ag_Kuantitatif" required>
                        <option value="0">negatif</option>
                        <option value="1">positif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pH_pada_urine">pH pada urine:</label>
                    <input type="number" id="pH_pada_urine" name="pH_pada_urine" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="nitrite_pada_urine">nitrite pada urine:</label>
                    <select name="nitrite_pada_urine" id="nitrite_pada_urine" required>
                        <option value="0">negatif</option>
                        <option value="1">positif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="protein_pada_urine">protein pada urine:</label>
                    <select name="protein_pada_urine" id="protein_pada_urine" required>
                        <option value="0">negatif</option>
                        <option value="1">positif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reduksi_pada_urine">reduksi pada urine:</label>
                    <select name="reduksi_pada_urine" id="reduksi_pada_urine" required>
                        <option value="0">negatif</option>
                        <option value="1">positif 1</option>
                        <option value="2">positif 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ketone_pada_urine">ketone pada urine:</label>
                    <select name="ketone_pada_urine" id="ketone_pada_urine" required>
                        <option value="0">negatif</option>
                        <option value="1">positif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="urobilinogen_pada_urine">urobilinogen pada urine:</label>
                    <select name="urobilinogen_pada_urine" id="urobilinogen_pada_urine" required>
                        <option value="0">negatif</option>
                        <option value="1">positif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="billirubin_pada_urine">billirubin pada urine:</label>
                    <select name="billirubin_pada_urine" id="billirubin_pada_urine" required>
                        <option value="0">negatif</option>
                        <option value="1">positif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="silinder_pada_urine">silinder pada urine:</label>
                    <select name="silinder_pada_urine" id="silinder_pada_urine" required>
                        <option value="0">negatif</option>
                        <option value="1">positif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kristal_pada_urine">kristal pada urine:</label>
                    <select name="kristal_pada_urine" id="kristal_pada_urine" required>
                        <option value="0">negatif</option>
                        <option value="1">positif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="yeast_pada_urine">yeast pada urine:</label>
                    <select name="yeast_pada_urine" id="yeast_pada_urine" required>
                        <option value="0">negatif</option>
                        <option value="1">positif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bakteri_pada_urine">bakteri pada urine:</label>
                    <select name="bakteri_pada_urine" id="bakteri_pada_urine" required>
                        <option value="0">negatif</option>
                        <option value="1">positif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="berat_jenis_pada_urine">Berat Jenis pada Urine:</label>
                    <input type="number" id="berat_jenis_pada_urine" name="berat_jenis_pada_urine" step="0.001" required>
                </div>
                <div class="form-group">
                    <label for="eritrosit_pada_urine">Eritrosit pada Urine:</label>
                    <input type="number" id="eritrosit_pada_urine" name="eritrosit_pada_urine" required>
                </div>
                <div class="form-group">
                    <label for="lekosit_pada_urine">Lekosit pada Urine:</label>
                    <input type="number" id="lekosit_pada_urine" name="lekosit_pada_urine" required>
                </div>
                <div class="form-group">
                    <label for="gula_darah_puasa">Gula Darah Puasa:</label>
                    <input type="number" id="gula_darah_puasa" name="gula_darah_puasa" required>
                </div>
                <div class="form-group">
                    <label for="gula_darah_2_jam_pp">Gula Darah 2 Jam PP:</label>
                    <input type="number" id="gula_darah_2_jam_pp" name="gula_darah_2_jam_pp" required>
                </div>
                <!-- Tombol Submit -->
                <button type="submit" name="action" class="btn btn-primary">Predict</button>
            </form>

            <!-- Bagian Hasil Pemeriksaan -->
            @if (session('success'))
            <div class="form-group row">
                <label for="hasil_pemeriksaan" class="col-sm-4 col-form-label">Hasil Pemeriksaan:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="hasil_pemeriksaan" name="hasil_pemeriksaan"
                               placeholder="Hasil akan muncul di sini" value="{{ session('success') }}" readonly>
                    </div>
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

            {{-- <form method="POST" action="/predict">
                @csrf
                <div class="row">
                    <!-- Personal Information -->
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="id" class="col-sm-4 col-form-label">ID:</label>
                            <div class="col-sm-8">
                                <input type="number" id="id" name="id" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-form-label">Gender:</label>
                            <div class="col-sm-8">
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="height" class="col-sm-4 col-form-label">Tinggi Badan:</label>
                            <div class="col-sm-8">
                                <input type="number" id="height" name="height" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="weight" class="col-sm-4 col-form-label">Berat Badan:</label>
                            <div class="col-sm-8">
                                <input type="number" step="0.1" id="weight" name="weight" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Sistolik" class="col-sm-4 col-form-label">Sistolik:</label>
                            <div class="col-sm-8">
                                <input type="number" id="Sistolik" name="Sistolik" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Diastolik" class="col-sm-4 col-form-label">Diastolik:</label>
                            <div class="col-sm-8">
                                <input type="number" id="Diastolik" name="Diastolik" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Age" class="col-sm-4 col-form-label">Umur:</label>
                            <div class="col-sm-8">
                                <input type="number" id="Age" name="Age" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="BMI" class="col-sm-4 col-form-label">Body Mass Index (BMI):</label>
                            <div class="col-sm-8">
                                <input type="number" step="0.1" id="BMI" name="BMI" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="BMICat" class="col-sm-4 col-form-label">Kategori BMI:</label>
                            <div class="col-sm-8">
                                <select name="BMICat" id="BMICat" class="form-control" required>
                                    <option value="0">Normal</option>
                                    <option value="1">Obesitas I</option>
                                    <option value="2">Obesitas II</option>
                                    <option value="3">Over Weight</option>
                                    <option value="4">Under Weight</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Hipertensi_Kategori" class="col-sm-4 col-form-label">Kategori Hipertensi:</label>
                            <div class="col-sm-8">
                                <select name="Hipertensi_Kategori" id="Hipertensi_Kategori" class="form-control" required>
                                    <option value="0">Hipertensi Tingkat 1</option>
                                    <option value="1">Hipertensi Tingkat 2</option>
                                    <option value="2">Normal</option>
                                    <option value="3">Pra-hipertensi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tuberkulosis" class="col-sm-4 col-form-label">Tuberkulosis:</label>
                            <div class="col-sm-8">
                                <select name="tuberkulosis" id="tuberkulosis" class="form-control" required>
                                    <option value="0">Ada</option>
                                    <option value="1">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penyakit_jantung" class="col-sm-4 col-form-label">Penyakit jantung:</label>
                            <div class="col-sm-8">
                                <select name="penyakit_jantung" id="penyakit_jantung" class="form-control" required>
                                    <option value="0">ada</option>
                                    <option value="1">tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hipertensi" class="col-sm-4 col-form-label">hipertensi:</label>
                            <div class="col-sm-8">
                                <select name="hipertensi" id="hipertensi" class="form-control" required>
                                    <option value="0">ada</option>
                                    <option value="1">tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="diabetes_melitus" class="col-sm-4 col-form-label">diabetes_melitus:</label>
                            <div class="col-sm-8">
                                <select name="diabetes_melitus" id="diabetes_melitus" class="form-control" required>
                                    <option value="0">ada</option>
                                    <option value="1">tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gangguan_jiwa" class="col-sm-4 col-form-label">gangguan_jiwa:</label>
                            <div class="col-sm-8">
                                <select name="gangguan_jiwa" id="gangguan_jiwa" class="form-control" required>
                                    <option value="0">ada</option>
                                    <option value="1">tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trauma_pada_kepala" class="col-sm-4 col-form-label">trauma_pada_kepala:</label>
                            <div class="col-sm-8">
                                <select name="trauma_pada_kepala" id="trauma_pada_kepala" class="form-control" required>
                                    <option value="0">ada</option>
                                    <option value="1">tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hepatitis" class="col-sm-4 col-form-label">hepatitis:</label>
                            <div class="col-sm-8">
                                <select name="hepatitis" id="hepatitis" class="form-control" required>
                                    <option value="0">normal</option>
                                    <option value="1">tidak normal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Spirometri" class="col-sm-4 col-form-label">Spirometri:</label>
                            <div class="col-sm-8">
                                <select name="Spirometri" id="Spirometri" class="form-control" required>
                                    <option value="0">normal</option>
                                    <option value="1">tidak normal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Treadmil" class="col-sm-4 col-form-label">Treadmil:</label>
                            <div class="col-sm-8">
                                <select name="Treadmil" id="Treadmil" class="form-control" required>
                                    <option value="0">normal</option>
                                    <option value="1">tidak normal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Audiometri" class="col-sm-4 col-form-label">Audiometri:</label>
                            <div class="col-sm-8">
                                <select name="Audiometri" id="Audiometri" class="form-control" required>
                                    <option value="0">normal</option>
                                    <option value="1">tidak normal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_thorax" class="col-sm-4 col-form-label">foto_thorax:</label>
                            <div class="col-sm-8">
                                <select name="foto_thorax" id="foto_thorax" class="form-control" required>
                                    <option value="0">normal</option>
                                    <option value="1">tidak normal</option>
                                </select>
                            </div>
                        </div>

                            <div class="form-group row">
                                <label for="Nadi(kali/menit)" class="col-sm-4 col-form-label">Nadi(kali/menit):</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="Nadi(kali/menit)" name="Nadi(kali/menit)" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="FrekuensiNapas(kali/menit)" class="col-sm-4 col-form-label">FrekuensiNapas(kali/menit):</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="FrekuensiNapas(kali/menit)" name="FrekuensiNapas(kali/menit)" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Tingkatan_Kesadaran" class="col-sm-4 col-form-label">Tingkatan_Kesadaran:</label>
                                <div class="col-sm-8">
                                    <select name="Tingkatan_Kesadaran" id="Tingkatan_Kesadaran" class="form-control" required>
                                        <option value="1">compos mentis</option>
                                        <option value="0">apatis</option>
                                        <option value="2">delirium</option>
                                        <option value="3">koma</option>
                                        <option value="4">semi koma</option>
                                        <option value="5">somnolen</option>
                                        <option value="6">sopor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Buta_Warna" class="col-sm-4 col-form-label">Buta_Warna:</label>
                                <div class="col-sm-8">
                                    <select name="Buta_Warna" id="Buta_Warna" class="form-control" required>
                                        <option value="0">tidak</option>
                                        <option value="1">ada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Jantung" class="col-sm-4 col-form-label">jantung:</label>
                                <div class="col-sm-8">
                                    <select name="Jantung" id="Jantung" class="form-control" required>
                                        <option value="0">normal</option>
                                        <option value="1">tidak normal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hemoglobin" class="col-sm-4 col-form-label">hemoglobin:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="hemoglobin" name="hemoglobin" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="leukosit" class="col-sm-4 col-form-label">leukosit:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="leukosit" name="leukosit" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eritrosit" class="col-sm-4 col-form-label">eritrosit:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="eritrosit" name="eritrosit" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="LED" class="col-sm-4 col-form-label">LED:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="LED" name="LED" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eosinofil" class="col-sm-4 col-form-label">eosinofil:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="eosinofil" name="eosinofil" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="basofil" class="col-sm-4 col-form-label">basofil:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="basofil" name="basofil" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="neutrofil" class="col-sm-4 col-form-label">neutrofil:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="neutrofil" name="neutrofil" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lymphosit" class="col-sm-4 col-form-label">lymphosit:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="lymphosit" name="lymphosit" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="monosit" class="col-sm-4 col-form-label">monosit:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="monosit" name="monosit" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="trombosit" class="col-sm-4 col-form-label">trombosit:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="trombosit" name="trombosit" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hematokrit" class="col-sm-4 col-form-label">hematokrit:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="hematokrit" name="hematokrit" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="MCV" class="col-sm-4 col-form-label">MCV:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="MCV" name="MCV" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="SGOT" class="col-sm-4 col-form-label">SGOT:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="SGOT" name="SGOT" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="SGPT" class="col-sm-4 col-form-label">SGPT:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="SGPT" name="SGPT" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="BUN" class="col-sm-4 col-form-label">BUN:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="BUN" name="BUN" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kreatinin" class="col-sm-4 col-form-label">kreatinin:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="kreatinin" name="kreatinin" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="asam_urat" class="col-sm-4 col-form-label">asam_urat:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="asam_urat" name="asam_urat" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kolestrol_total" class="col-sm-4 col-form-label">kolestrol_total:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="kolestrol_total" name="kolestrol_total" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="trigliserida" class="col-sm-4 col-form-label">trigliserida:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="trigliserida" name="trigliserida" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kolestrol_HDL_(direct)" class="col-sm-4 col-form-label">kolestrol_HDL_(direct):</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="kolestrol_HDL_(direct)" name="kolestrol_HDL_(direct)" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kolestrol_LDL_(direct)" class="col-sm-4 col-form-label">kolestrol_LDL_(direct):</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="kolestrol_LDL_(direct)" name="kolestrol_LDL_(direct)" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="HBs_Ag_Kuantitatif" class="col-sm-4 col-form-label">HBs_Ag_Kuantitatif:</label>
                                <div class="col-sm-8">
                                    <select name="HBs_Ag_Kuantitatif" id="HBs_Ag_Kuantitatif" class="form-control" required>
                                        <option value="0">negatif</option>
                                        <option value="1">positif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pH_pada_urine" class="col-sm-4 col-form-label">pH_pada_urine:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="pH_pada_urine" name="pH_pada_urine" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nitrite_pada_urine" class="col-sm-4 col-form-label">Nitrite pada urine:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="nitrite_pada_urine" name="nitrite_pada_urine" required>
                                        <option value="0">Negatif</option>
                                        <option value="1">Positif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="protein_pada_urine" class="col-sm-4 col-form-label">Protein pada urine:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="protein_pada_urine" name="protein_pada_urine" required>
                                        <option value="0">Negatif</option>
                                        <option value="1">Positif</option>
                                    </select>
                                </div>
                            </div>

                                <div class="form-group row">
                                <label for="reduksi_pada_urine" class="col-sm-4 col-form-label">Reduksi pada urine:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="reduksi_pada_urine" name="reduksi_pada_urine" required>
                                        <option value="0">Negatif</option>
                                        <option value="1">Positif 1</option>
                                        <option value="2">Positif 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ketone_pada_urine" class="col-sm-4 col-form-label">Ketone pada urine:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="ketone_pada_urine" name="ketone_pada_urine" required>
                                        <option value="0">Negatif</option>
                                        <option value="1">Positif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="urobilinogen_pada_urine" class="col-sm-4 col-form-label">Urobilinogen pada urine:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="urobilinogen_pada_urine" name="urobilinogen_pada_urine" required>
                                        <option value="0">Negatif</option>
                                        <option value="1">Positif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="billirubin_pada_urine" class="col-sm-4 col-form-label">Billirubin pada urine:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="billirubin_pada_urine" name="billirubin_pada_urine" required>
                                        <option value="0">Negatif</option>
                                        <option value="1">Positif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="silinder_pada_urine" class="col-sm-4 col-form-label">Silinder pada urine:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="silinder_pada_urine" name="silinder_pada_urine" required>
                                        <option value="0">Negatif</option>
                                        <option value="1">Positif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kristal_pada_urine" class="col-sm-4 col-form-label">kristal_pada_urine:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="kristal_pada_urine" name="kristal_pada_urine" required>
                                        <option value="0">Negatif</option>
                                        <option value="1">Positif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="yeast_pada_urine" class="col-sm-4 col-form-label">yeast_pada_urine:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="yeast_pada_urine" name="yeast_pada_urine" required>
                                        <option value="0">Negatif</option>
                                        <option value="1">Positif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bakteri_pada_urine" class="col-sm-4 col-form-label">Bakteri pada urine:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="bakteri_pada_urine" name="bakteri_pada_urine" required>
                                        <option value="0">Negatif</option>
                                        <option value="1">Positif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="berat_jenis_urine" class="col-sm-4 col-form-label">Berat jenis urine:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.001" class="form-control" id="berat_jenis_urine" name="berat_jenis_urine" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eritrosit_pada_urine" class="col-sm-4 col-form-label">eritrosit_pada_urine:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="eritrosit_pada_urine" name="eritrosit_pada_urine" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lekosit_pada_urine" class="col-sm-4 col-form-label">lekosit_pada_urine:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="lekosit_pada_urine" name="lekosit_pada_urine" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gula_darah_puasa" class="col-sm-4 col-form-label">gula_darah_puasa:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="gula_darah_puasa" name="gula_darah_puasa" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gula_darah_puasa_2_jam_pp" class="col-sm-4 col-form-label">Gula Darah Puasa 2 Jam PP:</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" class="form-control" id="gula_darah_puasa_2_jam_pp" name="gula_darah_puasa_2_jam_pp" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hasil_pemeriksaan" class="col-sm-4 col-form-label">Hasil Pemeriksaan:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="hasil_pemeriksaan" name="hasil_pemeriksaan"
                                           placeholder="Hasil akan muncul di sini" value="{{ $result ?? '' }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" name="action" value="predict" class="btn btn-primary">Predict</button>
                                    <button type="submit" name="action" value="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
            </form> --}}


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
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- base:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
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