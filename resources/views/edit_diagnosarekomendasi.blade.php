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
    {{-- @if (session('error'))
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

      <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0 font-weight-bold">{{ Auth::user()->nama ?? 'Anonim' }}</h3>
                <p>Selamat satang di Sistem Manajemen Check Up</p>
              </div>
            </div>


            <form action="/predict" method="POST" style="margin-bottom: 40px;" >
                @csrf
                <!-- Personal Information -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="id" class="col-sm-4 col-form-label">ID:</label>
                            <div class="col-sm-8">
                                <input type="number" id="id" name="id" class="form-control" value="{{ $hasilPemeriksaan->id }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-form-label">Gender:</label>
                            <div class="col-sm-8">
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="1" {{ $hasilPemeriksaan->gender == 1 ? 'selected' : '' }}>Male</option>
                                    <option value="2" {{ $hasilPemeriksaan->gender == 2 ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="height" class="col-sm-4 col-form-label">Tinggi Badan:</label>
                            <div class="col-sm-8">
                                <input type="number" id="height" name="height" class="form-control" value="{{ $hasilPemeriksaan->height }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="weight" class="col-sm-4 col-form-label">Berat Badan:</label>
                            <div class="col-sm-8">
                                <input type="number" step="0.1" id="weight" name="weight" class="form-control" value="{{ $hasilPemeriksaan->weight }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Sistolik" class="col-sm-4 col-form-label">Sistolik:</label>
                            <div class="col-sm-8">
                                <input type="number" id="Sistolik" name="Sistolik" class="form-control" value="{{ $hasilPemeriksaan->Sistolik }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Diastolik" class="col-sm-4 col-form-label">Diastolik:</label>
                            <div class="col-sm-8">
                                <input type="number" id="Diastolik" name="Diastolik" class="form-control" value="{{ $hasilPemeriksaan->Diastolik }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Age" class="col-sm-4 col-form-label">Umur:</label>
                            <div class="col-sm-8">
                                <input type="number" id="Age" name="Age" class="form-control" value="{{ $hasilPemeriksaan->Age }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="BMI" class="col-sm-4 col-form-label">Body Mass Index (BMI):</label>
                            <div class="col-sm-8">
                                <input type="number" step="0.1" id="BMI" name="BMI" class="form-control" value="{{ $hasilPemeriksaan->BMI }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="BMICat" class="col-sm-4 col-form-label">Kategori BMI:</label>
                            <div class="col-sm-8">
                                <select name="BMICat" id="BMICat" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->BMICat == 0 ? 'selected' : '' }}>Normal</option>
                                    <option value="1" {{ $hasilPemeriksaan->BMICat == 1 ? 'selected' : '' }}>Obesitas I</option>
                                    <option value="2" {{ $hasilPemeriksaan->BMICat == 2 ? 'selected' : '' }}>Obesitas II</option>
                                    <option value="3" {{ $hasilPemeriksaan->BMICat == 3 ? 'selected' : '' }}>Over Weight</option>
                                    <option value="4" {{ $hasilPemeriksaan->BMICat == 4 ? 'selected' : '' }}>Under Weight</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Hipertensi_Kategori" class="col-sm-4 col-form-label">Kategori Hipertensi:</label>
                            <div class="col-sm-8">
                                <select name="Hipertensi_Kategori" id="Hipertensi_Kategori" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->Hipertensi_Kategori == 0 ? 'selected' : '' }}>Hipertensi Tingkat 1</option>
                                    <option value="1" {{ $hasilPemeriksaan->Hipertensi_Kategori == 1 ? 'selected' : '' }}>Hipertensi Tingkat 2</option>
                                    <option value="2" {{ $hasilPemeriksaan->Hipertensi_Kategori == 2 ? 'selected' : '' }}>Normal</option>
                                    <option value="3" {{ $hasilPemeriksaan->Hipertensi_Kategori == 3 ? 'selected' : '' }}>Pra-hipertensi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tuberkulosis" class="col-sm-4 col-form-label">Tuberkulosis:</label>
                            <div class="col-sm-8">
                                <select name="tuberkulosis" id="tuberkulosis" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->tuberkulosis == 0 ? 'selected' : '' }}>Ada</option>
                                    <option value="1" {{ $hasilPemeriksaan->tuberkulosis == 1 ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="penyakit_jantung" class="col-sm-4 col-form-label">Penyakit Jantung:</label>
                            <div class="col-sm-8">
                                <select name="penyakit_jantung" id="penyakit_jantung" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->penyakit_jantung == 0 ? 'selected' : '' }}>Ada</option>
                                    <option value="1" {{ $hasilPemeriksaan->penyakit_jantung == 1 ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hipertensi" class="col-sm-4 col-form-label">Hipertensi:</label>
                            <div class="col-sm-8">
                                <select name="hipertensi" id="hipertensi" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->hipertensi == 0 ? 'selected' : '' }}>Ada</option>
                                    <option value="1" {{ $hasilPemeriksaan->hipertensi == 1 ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="diabetes_melitus" class="col-sm-4 col-form-label">Diabetes Melitus:</label>
                            <div class="col-sm-8">
                                <select name="diabetes_melitus" id="diabetes_melitus" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->diabetes_melitus == 0 ? 'selected' : '' }}>Ada</option>
                                    <option value="1" {{ $hasilPemeriksaan->diabetes_melitus == 1 ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gangguan_jiwa" class="col-sm-4 col-form-label">Gangguan Jiwa:</label>
                            <div class="col-sm-8">
                                <select name="gangguan_jiwa" id="gangguan_jiwa" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->gangguan_jiwa == 0 ? 'selected' : '' }}>Ada</option>
                                    <option value="1" {{ $hasilPemeriksaan->gangguan_jiwa == 1 ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trauma_pada_kepala" class="col-sm-4 col-form-label">Trauma Pada Kepala:</label>
                            <div class="col-sm-8">
                                <select name="trauma_pada_kepala" id="trauma_pada_kepala" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->trauma_pada_kepala == 0 ? 'selected' : '' }}>Ada</option>
                                    <option value="1" {{ $hasilPemeriksaan->trauma_pada_kepala == 1 ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hepatitis" class="col-sm-4 col-form-label">Hepatitis:</label>
                            <div class="col-sm-8">
                                <select name="hepatitis" id="hepatitis" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->hepatitis == 0 ? 'selected' : '' }}>Ada</option>
                                    <option value="1" {{ $hasilPemeriksaan->hepatitis == 1 ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Spirometri" class="col-sm-4 col-form-label">Spirometri:</label>
                            <div class="col-sm-8">
                                <select name="Spirometri" id="Spirometri" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->Spirometri == 0 ? 'selected' : '' }}>Normal</option>
                                    <option value="1" {{ $hasilPemeriksaan->Spirometri == 1 ? 'selected' : '' }}>Tidak Normal</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Treadmil" class="col-sm-4 col-form-label">Treadmil:</label>
                            <div class="col-sm-8">
                                <select name="Treadmil" id="Treadmil" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->Treadmil == 0 ? 'selected' : '' }}>Normal</option>
                                    <option value="1" {{ $hasilPemeriksaan->Treadmil == 1 ? 'selected' : '' }}>Tidak Normal</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Audiometri" class="col-sm-4 col-form-label">Audiometri:</label>
                            <div class="col-sm-8">
                                <select name="Audiometri" id="Audiometri" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->Audiometri == 0 ? 'selected' : '' }}>Normal</option>
                                    <option value="1" {{ $hasilPemeriksaan->Audiometri == 1 ? 'selected' : '' }}>Tidak Normal</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_thorax" class="col-sm-4 col-form-label">Foto Thorax:</label>
                            <div class="col-sm-8">
                                <select name="foto_thorax" id="foto_thorax" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->foto_thorax == 0 ? 'selected' : '' }}>Normal</option>
                                    <option value="1" {{ $hasilPemeriksaan->foto_thorax == 1 ? 'selected' : '' }}>Tidak Normal</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Nadi(kali/menit)" class="col-sm-4 col-form-label">Nadi (kali/menit):</label>
                            <div class="col-sm-8">
                                <input type="number" id="Nadi(kali/menit)" name="Nadi(kali/menit)" class="form-control" value="{{ $hasilPemeriksaan->{'Nadi(kali/menit)'} }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="FrekuensiNapas(kali/menit)" class="col-sm-4 col-form-label">Frekuensi Napas (kali/menit):</label>
                            <div class="col-sm-8">
                                <input type="number" id="FrekuensiNapas(kali/menit)" name="FrekuensiNapas(kali/menit)" class="form-control" value="{{ $hasilPemeriksaan->{'FrekuensiNapas(kali/menit)'} }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Tingkatan_Kesadaran" class="col-sm-4 col-form-label">Tingkatan Kesadaran:</label>
                            <div class="col-sm-8">
                                <select name="Tingkatan_Kesadaran" id="Tingkatan_Kesadaran" class="form-control" required>
                                    <option value="1" {{ $hasilPemeriksaan->Tingkatan_Kesadaran == 1 ? 'selected' : '' }}>compos mentis</option>
                                    <option value="0" {{ $hasilPemeriksaan->Tingkatan_Kesadaran == 0 ? 'selected' : '' }}>apatis</option>
                                    <option value="2" {{ $hasilPemeriksaan->Tingkatan_Kesadaran == 2 ? 'selected' : '' }}>delirium</option>
                                    <option value="3" {{ $hasilPemeriksaan->Tingkatan_Kesadaran == 3 ? 'selected' : '' }}>koma</option>
                                    <option value="4" {{ $hasilPemeriksaan->Tingkatan_Kesadaran == 4 ? 'selected' : '' }}>semi koma</option>
                                    <option value="5" {{ $hasilPemeriksaan->Tingkatan_Kesadaran == 5 ? 'selected' : '' }}>somnolen</option>
                                    <option value="6" {{ $hasilPemeriksaan->Tingkatan_Kesadaran == 6 ? 'selected' : '' }}>sopor</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Buta_Warna" class="col-sm-4 col-form-label">Buta Warna:</label>
                            <div class="col-sm-8">
                                <select name="Buta_Warna" id="Buta_Warna" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->Buta_Warna == 0 ? 'selected' : '' }}>tidak</option>
                                    <option value="1" {{ $hasilPemeriksaan->Buta_Warna == 1 ? 'selected' : '' }}>ya</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Jantung" class="col-sm-4 col-form-label">Jantung:</label>
                            <div class="col-sm-8">
                                <select name="Jantung" id="Jantung" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->Jantung == 0 ? 'selected' : '' }}>normal</option>
                                    <option value="1" {{ $hasilPemeriksaan->Jantung == 1 ? 'selected' : '' }}>tidak normal</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hemoglobin" class="col-sm-4 col-form-label">Hemoglobin:</label>
                            <div class="col-sm-8">
                                <input type="number" id="hemoglobin" name="hemoglobin" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->hemoglobin }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="leukosit" class="col-sm-4 col-form-label">Leukosit:</label>
                            <div class="col-sm-8">
                                <input type="number" id="leukosit" name="leukosit" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->leukosit }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="eritrosit" class="col-sm-4 col-form-label">Eritrosit:</label>
                            <div class="col-sm-8">
                                <input type="number" id="eritrosit" name="eritrosit" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->eritrosit }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="LED" class="col-sm-4 col-form-label">LED:</label>
                            <div class="col-sm-8">
                                <input type="number" id="LED" name="LED" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->LED }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="eosinofil" class="col-sm-4 col-form-label">Eosinofil:</label>
                            <div class="col-sm-8">
                                <input type="number" id="eosinofil" name="eosinofil" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->eosinofil }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="basofil" class="col-sm-4 col-form-label">Basofil:</label>
                            <div class="col-sm-8">
                                <input type="number" id="basofil" name="basofil" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->basofil }}" required>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="neutrofil" class="col-sm-4 col-form-label">Neutrofil:</label>
                            <div class="col-sm-8">
                                <input type="number" id="neutrofil" name="neutrofil" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->neutrofil }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lymphosit" class="col-sm-4 col-form-label">Lymphosit:</label>
                            <div class="col-sm-8">
                                <input type="number" id="lymphosit" name="lymphosit" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->lymphosit }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="monosit" class="col-sm-4 col-form-label">Monosit:</label>
                            <div class="col-sm-8">
                                <input type="number" id="monosit" name="monosit" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->monosit }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trombosit" class="col-sm-4 col-form-label">Trombosit:</label>
                            <div class="col-sm-8">
                                <input type="number" id="trombosit" name="trombosit" class="form-control" value="{{ $hasilPemeriksaan->trombosit }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hematokrit" class="col-sm-4 col-form-label">Hematokrit:</label>
                            <div class="col-sm-8">
                                <input type="number" id="hematokrit" name="hematokrit" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->hematokrit }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="MCV" class="col-sm-4 col-form-label">MCV:</label>
                            <div class="col-sm-8">
                                <input type="number" id="MCV" name="MCV" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->MCV }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="SGOT" class="col-sm-4 col-form-label">SGOT:</label>
                            <div class="col-sm-8">
                                <input type="number" id="SGOT" name="SGOT" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->SGOT }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="SGPT" class="col-sm-4 col-form-label">SGPT:</label>
                            <div class="col-sm-8">
                                <input type="number" id="SGPT" name="SGPT" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->SGPT }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="BUN" class="col-sm-4 col-form-label">BUN:</label>
                            <div class="col-sm-8">
                                <input type="number" id="BUN" name="BUN" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->BUN }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kreatinin" class="col-sm-4 col-form-label">Kreatinin:</label>
                            <div class="col-sm-8">
                                <input type="number" id="kreatinin" name="kreatinin" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->kreatinin }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="asam_urat" class="col-sm-4 col-form-label">Asam Urat:</label>
                            <div class="col-sm-8">
                                <input type="number" id="asam_urat" name="asam_urat" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->asam_urat }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kolestrol_total" class="col-sm-4 col-form-label">Kolesterol Total:</label>
                            <div class="col-sm-8">
                                <input type="number" id="kolestrol_total" name="kolestrol_total" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->kolestrol_total }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trigliserida" class="col-sm-4 col-form-label">Trigliserida:</label>
                            <div class="col-sm-8">
                                <input type="number" id="trigliserida" name="trigliserida" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->trigliserida }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kolestrol_HDL_(direct)" class="col-sm-4 col-form-label">Kolesterol HDL (direct):</label>
                            <div class="col-sm-8">
                                <input type="number" id="kolestrol_HDL_(direct)" name="kolestrol_HDL_(direct)" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->{'kolestrol_HDL_(direct)'} }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kolestrol_LDL_(direct)" class="col-sm-4 col-form-label">Kolesterol LDL (direct):</label>
                            <div class="col-sm-8">
                                <input type="number" id="kolestrol_LDL_(direct)" name="kolestrol_LDL_(direct)" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->{'kolestrol_LDL_(direct)'} }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gula_darah_puasa" class="col-sm-4 col-form-label">Gula Darah Puasa:</label>
                            <div class="col-sm-8">
                                <input type="number" id="gula_darah_puasa" name="gula_darah_puasa" class="form-control" value="{{ $hasilPemeriksaan->gula_darah_puasa }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gula_darah_2_jam_pp" class="col-sm-4 col-form-label">Gula Darah 2 Jam PP:</label>
                            <div class="col-sm-8">
                                <input type="number" id="gula_darah_2_jam_pp" name="gula_darah_2_jam_pp" class="form-control" value="{{ $hasilPemeriksaan->gula_darah_2_jam_pp }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="anti_HBs" class="col-sm-4 col-form-label">Anti HBs:</label>
                            <div class="col-sm-8">
                                <select name="anti_HBs" id="anti_HBs" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->anti_HBs == 0 ? 'selected' : '' }}>negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->anti_HBs == 1 ? 'selected' : '' }}>positif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="HBs_Ag_Kuantitatif" class="col-sm-4 col-form-label">HBs Ag Kuantitatif:</label>
                            <div class="col-sm-8">
                                <select name="HBs_Ag_Kuantitatif" id="HBs_Ag_Kuantitatif" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->HBs_Ag_Kuantitatif == 0 ? 'selected' : '' }}>negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->HBs_Ag_Kuantitatif == 1 ? 'selected' : '' }}>positif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pH_pada_urine" class="col-sm-4 col-form-label">pH pada urine:</label>
                            <div class="col-sm-8">
                                <input type="number" id="pH_pada_urine" name="pH_pada_urine" step="0.01" class="form-control" value="{{ $hasilPemeriksaan->pH_pada_urine }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="berat_jenis_pada_urine" class="col-sm-4 col-form-label">Berat Jenis pada Urine:</label>
                            <div class="col-sm-8">
                                <input type="number" id="berat_jenis_pada_urine" name="berat_jenis_pada_urine" class="form-control" step="0.001" value="{{ $hasilPemeriksaan->berat_jenis_pada_urine }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nitrite_pada_urine" class="col-sm-4 col-form-label">Nitrite pada urine:</label>
                            <div class="col-sm-8">
                                <select name="nitrite_pada_urine" id="nitrite_pada_urine" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->nitrite_pada_urine == 0 ? 'selected' : '' }}>negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->nitrite_pada_urine == 1 ? 'selected' : '' }}>positif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="protein_pada_urine" class="col-sm-4 col-form-label">Protein pada urine:</label>
                            <div class="col-sm-8">
                                <select name="protein_pada_urine" id="protein_pada_urine" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->protein_pada_urine == 0 ? 'selected' : '' }}>negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->protein_pada_urine == 1 ? 'selected' : '' }}>positif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reduksi_pada_urine" class="col-sm-4 col-form-label">Reduksi pada urine:</label>
                            <div class="col-sm-8">
                                <select name="reduksi_pada_urine" id="reduksi_pada_urine" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->reduksi_pada_urine == 0 ? 'selected' : '' }}>negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->reduksi_pada_urine == 1 ? 'selected' : '' }}>positif 1</option>
                                    <option value="2" {{ $hasilPemeriksaan->reduksi_pada_urine == 2 ? 'selected' : '' }}>positif 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ketone_pada_urine" class="col-sm-4 col-form-label">Ketone pada Urine:</label>
                            <div class="col-sm-8">
                                <select name="ketone_pada_urine" id="ketone_pada_urine" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->ketone_pada_urine == 0 ? 'selected' : '' }}>Negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->ketone_pada_urine == 1 ? 'selected' : '' }}>Positif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="urobilinogen_pada_urine" class="col-sm-4 col-form-label">Urobilinogen pada Urine:</label>
                            <div class="col-sm-8">
                                <select name="urobilinogen_pada_urine" id="urobilinogen_pada_urine" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->urobilinogen_pada_urine == 0 ? 'selected' : '' }}>Negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->urobilinogen_pada_urine == 1 ? 'selected' : '' }}>Positif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="billirubin_pada_urine" class="col-sm-4 col-form-label">Billirubin pada Urine:</label>
                            <div class="col-sm-8">
                                <select name="billirubin_pada_urine" id="billirubin_pada_urine" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->billirubin_pada_urine == 0 ? 'selected' : '' }}>Negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->billirubin_pada_urine == 1 ? 'selected' : '' }}>Positif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="eritrosit_pada_urine" class="col-sm-4 col-form-label">Eritrosit pada Urine:</label>
                            <div class="col-sm-8">
                                <input type="number" id="eritrosit_pada_urine" name="eritrosit_pada_urine" class="form-control" value="{{ $hasilPemeriksaan->eritrosit_pada_urine }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lekosit_pada_urine" class="col-sm-4 col-form-label">Lekosit pada Urine:</label>
                            <div class="col-sm-8">
                                <input type="number" id="lekosit_pada_urine" name="lekosit_pada_urine" class="form-control" value="{{ $hasilPemeriksaan->lekosit_pada_urine }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="silinder_pada_urine" class="col-sm-4 col-form-label">Silinder pada Urine:</label>
                            <div class="col-sm-8">
                                <select name="silinder_pada_urine" id="silinder_pada_urine" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->silinder_pada_urine == 0 ? 'selected' : '' }}>Negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->silinder_pada_urine == 1 ? 'selected' : '' }}>Positif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kristal_pada_urine" class="col-sm-4 col-form-label">Kristal pada Urine:</label>
                            <div class="col-sm-8">
                                <select name="kristal_pada_urine" id="kristal_pada_urine" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->kristal_pada_urine == 0 ? 'selected' : '' }}>Negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->kristal_pada_urine == 1 ? 'selected' : '' }}>Positif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="yeast_pada_urine" class="col-sm-4 col-form-label">Yeast pada Urine:</label>
                            <div class="col-sm-8">
                                <select name="yeast_pada_urine" id="yeast_pada_urine" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->yeast_pada_urine == 0 ? 'selected' : '' }}>Negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->yeast_pada_urine == 1 ? 'selected' : '' }}>Positif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bakteri_pada_urine" class="col-sm-4 col-form-label">Bakteri pada Urine:</label>
                            <div class="col-sm-8">
                                <select name="bakteri_pada_urine" id="bakteri_pada_urine" class="form-control" required>
                                    <option value="0" {{ $hasilPemeriksaan->bakteri_pada_urine == 0 ? 'selected' : '' }}>Negatif</option>
                                    <option value="1" {{ $hasilPemeriksaan->bakteri_pada_urine == 1 ? 'selected' : '' }}>Positif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/hasil-pemeriksaan" class="btn btn-secondary">Back</a>
            </form>

            <div class="container">
                <h1>Edit Diagnosa dan Rekomendasi Medis</h1>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('rekomendasimedis.update', $rekomendasi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Field Diagnosa -->
                            <div class="form-group row">
                                <label for="diagnosa" class="col-sm-4 col-form-label">Diagnosa:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="{{ $rekomendasi->diagnosa }}" required>
                                </div>
                            </div>

                            <!-- Field Rekomendasi -->
                            <div class="form-group row">
                                <label for="rekomendasi" class="col-sm-4 col-form-label">Rekomendasi:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="rekomendasi" name="rekomendasi" rows="4" required>{{ $rekomendasi->rekomendasi }}</textarea>
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="form-group row">
                                <div class="col-sm-8 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('rekomendasimedis.view', $rekomendasi->id) }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bagian Hasil Pemeriksaan -->





            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


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
    <!-- End custom js for this page--> --}}
  </body>
</html>
