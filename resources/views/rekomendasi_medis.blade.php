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

    <style>
        /* Styling Badge */
        .badge {
          border-radius: 25px;
          font-size: 14px;
          padding: 6px 12px;
          border-radius: 12px;
          display: inline-block;
          transition: transform 0.3s ease;
        }
        .badge-success {
          background-color: rgba(40, 167, 69, 0.7);
          color: #fff;
        }
        .badge-warning {
          background-color: rgba(255, 193, 7, 0.7);
          color: #212529;
        }
        .badge:hover {
          transform: scale(1.1);
        }

        /* Styling tombol dasar */
        .cool-btn {
          position: relative; /* untuk ripple effect */
          overflow: hidden;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          border: none;
          border-radius: 25px;
          padding: 10px 20px;
          font-size: 14px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          cursor: pointer;
          transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .cool-btn:hover {
          transform: translateY(-3px);
          box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Ripple effect */
        .ripple {
          position: absolute;
          border-radius: 50%;
          background: rgba(255, 255, 255, 0.6);
          transform: scale(0);
          animation: ripple 0.6s linear;
          pointer-events: none;
        }
        @keyframes ripple {
          to {
            transform: scale(4);
            opacity: 0;
          }
        }

        /* Tombol berdasarkan kategori aksi */
        .btn-outline-secondary {
          background-color: #fff;
          color: #fff;
        }
        .btn-info {
            background: linear-gradient(45deg, #1a167f, #0c2aa1);
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            border: none;
        }
        .btn-danger {
            background: linear-gradient(45deg, #d80939, #dd2a0a);
            color: #fff;
            border: none;
            box-shadow: 0 4px 8px rgba(220, 20, 60, 0.4);
        }

        /* Styling untuk ikon di dalam tombol */
        .btn-icon-text i {
          margin-left: 8px;
          transition: transform 0.3s ease;
        }
        .btn-icon-text:hover i {
          transform: translateX(5px);
        }

        .cool-generate-btn {
            background-color: #18572a;; /* Warna dasar gelap minimalis */
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 12px 25px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }


        .cool-generate-btn:hover {
            background-color: rgb(6, 80, 17); /* Tetap dalam nuansa abu-abu, tidak biru */
            color: #fff; /* Pastikan teks tetap putih */
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            text-decoration: none;
        }

        /* Tetap gunakan styling ripple jika diperlukan pada tombol lainnya */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }
        @keyframes ripple {
            to {
            transform: scale(4);
            opacity: 0;
            }
        }

        .search-input {
            max-width: 40%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 25px;
            outline: none;
            transition: all 0.3s ease;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Style saat input field focus */
        .search-input:focus {
            border-color: #007bff;
            box-shadow: 0 2px 10px rgba(0, 123, 255, 0.5);
            transform: scale(1.02);
        }

        /* Animasi saat hover */
        .search-input:hover {
            border-color: #007bff;
            box-shadow: 0 2px 10px rgba(0, 123, 255, 0.3);
        }

        /* Style untuk placeholder */
        .search-input::placeholder {
            color: #999;
            font-style: italic;
        }

        /* Animasi saat placeholder hilang saat focus */
        .search-input:focus::placeholder {
            opacity: 0;
            transition: opacity 0.3s ease;
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
    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Kesalahan!',
            text: '{{ $errors->first() }}', // Ambil pesan error pertama
            confirmButtonText: 'OK'
        });
    </script>
@endif
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
                <div class="form-group" style="margin: 20px 0; display: flex; justify-content: space-between;">
                    <div class="input-group" style="justify-content: end;">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <input
                        type="text"
                        id="searchInput"
                        class="form-control search-input"
                        placeholder="Cari pasien berdasarkan nama, nomor HP, atau lainnya..."
                        onkeyup="filterTable()">
                </div>
            </div>


        </div>
            <div class="col-lg-12 grid-margin stretch-card" style="padding: 15px 0px">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Rekomendasi Medis</h4>
                        <div class="table-responsive pt-3">

                            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px;">
                                    <div class="modal-content shadow-lg border-0">
                                        <form id="editForm" method="POST" action="">
                                            @csrf
                                            @method('PUT')
                                            <!-- Header Modal -->
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="modalTitle">
                                                    <i class="fas fa-notes-medical"></i> Detail Rekomendasi Medis
                                                </h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <!-- Body Modal -->
                                            <div class="modal-body">
                                                <!-- Card Diagnosa -->
                                                <div class="card mb-3">
                                                    <div class="card-header bg-primary text-white">
                                                        <i class="fas fa-stethoscope"></i> Diagnosa
                                                    </div>
                                                        <textarea class="form-control"
                                                                id="detailDiagnosis"
                                                                name="diagnosis"
                                                                rows="4"
                                                                readonly
                                                                style="resize: none; font-size: 1.1em; height: 230px; font-family: monospace; line-height: 1.4;"></textarea>

                                                </div>

                                                <!-- Card Rekomendasi Medis -->
                                                <div class="card">
                                                    <div class="card-header bg-success text-white">
                                                        <i class="fas fa-heartbeat"></i> Rekomendasi Medis
                                                    </div>
                                                        <textarea class="form-control"
                                                                id="detailRekomendasi"
                                                                name="rekomendasi"
                                                                rows="4"
                                                                readonly
                                                                style="resize: none; font-size: 1.1em; height: 230px; font-family: monospace; line-height: 1.4;"></textarea>

                                                </div>
                                            </div>

                                            <!-- Footer Modal -->
                                            <div class="modal-footer border-top-0">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                                    <i class="fas fa-times-circle"></i> Tutup
                                                </button>
                                                <button type="button" class="btn btn-warning" id="editToggleBtn">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button type="submit" class="btn btn-success" id="saveBtn" style="display: none;">
                                                    <i class="fas fa-save"></i> Simpan
                                                </button>
                                                <button type="button" class="btn btn-secondary" id="cancelBtn" style="display: none;">
                                                    <i class="fas fa-undo"></i> Batal
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Id Pasien</th>
                                        <th>Nama Pasien</th>
                                        <th>Hasil Pemeriksaan</th>
                                        <th>Status Pemeriksaan</th>
                                        <th>Rekomendasi Medis</th> <!-- Kolom baru -->
                                        <th style="width: 319px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hasilPemeriksaan as $hasil)
                                    <tr>
                                        <td>{{ $hasil->id }}</td>
                                        <td>{{ $hasil->patient->id_pasien ?? 'Not available' }}</td>
                                        <td>{{ $hasil->patient->nama_panjang ?? 'Not available' }}</td>
                                        <td>{{ $hasil->prediksi->hasil_pemeriksaan ?? 'Not available' }}</td>
                                        <td>{{ $hasil->statusPemeriksaan->status ?? 'Not available' }}</td>
                                        <td>
                                            @if($hasil->rekomMedis)
                                                @if($hasil->rekomMedis->diagnosis && $hasil->rekomMedis->rekomendasi)
                                                    <span class="badge badge-success" style="border-radius: 25px; padding: .375rem 1rem;">Sudah Diisi</span>
                                                @else
                                                    <span class="badge badge-warning" style="border-radius: 25px; padding: .375rem 1rem;">Data Tidak Lengkap</span>
                                                @endif
                                            @else
                                                <span class="badge badge-warning" style="border-radius: 25px; padding: .375rem 1rem;">Belum Diisi</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Tombol Generate Rekom Medis -->
                                            <a href="{{ route('rekomendasimedis.view', $hasil->id) }}"
                                                class="cool-generate-btn btn-icon-text"
                                                style="margin-bottom: 7px; width: 100%;">
                                                Generate Rekom Medis
                                                <i class="typcn typcn-edit"></i>
                                            </a>

                                            <!-- Tombol View Detail (Hanya muncul jika diagnosis dan rekomendasi ada) -->
                                            @if($hasil->rekomMedis && $hasil->rekomMedis->diagnosis && $hasil->rekomMedis->rekomendasi)
                                                <button type="button"
                                                        class="cool-btn btn-info btn-icon-text"
                                                        style="margin-bottom: 7px; padding: 10px 25px; width: 100%;"
                                                        onclick="viewDetail({{ $hasil->id }})">
                                                    View Detail
                                                    <i class="typcn typcn-eye"></i>
                                                </button>
                                            @endif

                                            <!-- Tombol Delete -->
                                            <form action="{{ route('rekomendasimedis.destroy', $hasil->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="cool-btn btn-danger btn-icon-text"
                                                        style="margin-bottom: 7px; padding: 10px 25px; width: 100%;"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data rekomendasi medis ini?')">
                                                    Delete
                                                    <i class="typcn typcn-delete-outline"></i>
                                                </button>
                                            </form>
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

    <script src="vendors/js/vendor.bundle.base.js"></script>

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
    function viewDetail(id) {
        // Reset konten modal sebelum diisi ulang
        $('#detailDiagnosis').text('');
        $('#detailRekomendasi').text('');

        $.ajax({
            url: '/rekomendasimedis/detail/' + id, // Pastikan route ini sudah didefinisikan
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    // Jika data berisi karakter newline (\n), style pre-line akan menampilkannya sebagai enter
                    $('#detailDiagnosis').text(response.data.diagnosis);
                    $('#detailRekomendasi').text(response.data.rekomendasi);
                } else {
                    $('#detailDiagnosis').text('Diagosa Belum Dibuat');
                    $('#detailRekomendasi').text('Rekomendasi Medis Belum Dibuat');
                }
                $('#detailModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error fetching detail:', error);
                $('#detailDiagnosis').text('Error fetching data');
                $('#detailRekomendasi').text('Error fetching data');
                $('#detailModal').modal('show');
            }
        });
    }
    </script>

    <script>
        // Tambahkan ripple effect pada setiap tombol dengan kelas .cool-btn
        document.querySelectorAll('.cool-btn').forEach(btn => {
          btn.addEventListener('click', function(e) {
            // Buat elemen ripple
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');

            // Hitung ukuran dan posisi klik
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
            ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';

            // Tambahkan ripple ke tombol
            this.appendChild(ripple);

            // Hapus ripple setelah animasi selesai
            setTimeout(() => {
              ripple.remove();
            }, 600);
          });
        });
    </script>

    <script>
    let currentEditingId = null; // Untuk menyimpan ID yang sedang diedit

    function viewDetail(id) {
        currentEditingId = id; // Simpan ID untuk digunakan saat edit

        // Reset konten modal sebelum diisi ulang
        $('#detailDiagnosis').text('');
        $('#detailRekomendasi').text('');

        $.ajax({
            url: '/rekomendasimedis/detail/' + id,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Isi data ke dalam textarea
                    $('#detailDiagnosis').val(response.data.diagnosis || 'Diagnosa Belum Dibuat');
                    $('#detailRekomendasi').val(response.data.rekomendasi || 'Rekomendasi Medis Belum Dibuat');

                    // Set action form untuk update
                    $('#editForm').attr('action', `/rekomendasimedis/${id}`);
                } else {
                    $('#detailDiagnosis').val('Diagnosa Belum Dibuat');
                    $('#detailRekomendasi').val('Rekomendasi Medis Belum Dibuat');
                }
                $('#detailModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error fetching detail:', error);
                $('#detailDiagnosis').val('Error fetching data');
                $('#detailRekomendasi').val('Error fetching data');
                $('#detailModal').modal('show');
            }
        });
    }

    // Toggle Edit Mode
    function toggleEditMode(isEdit) {
        const diagnosisField = $('#detailDiagnosis');
        const rekomendasiField = $('#detailRekomendasi');
        const editBtn = $('#editToggleBtn');
        const saveBtn = $('#saveBtn');
        const cancelBtn = $('#cancelBtn');
        const title = $('#modalTitle');

        if (isEdit) {
            diagnosisField.prop('readonly', false);
            rekomendasiField.prop('readonly', false);
            editBtn.hide();
            saveBtn.show();
            cancelBtn.show();
            title.html('<i class="fas fa-edit"></i> Edit Rekomendasi Medis');
        } else {
            diagnosisField.prop('readonly', true);
            rekomendasiField.prop('readonly', true);
            editBtn.show();
            saveBtn.hide();
            cancelBtn.hide();
            title.html('<i class="fas fa-notes-medical"></i> Detail Rekomendasi Medis');
        }
    }

    // Event Listeners
    $('#editToggleBtn').on('click', function() {
        toggleEditMode(true);
    });

    $('#cancelBtn').on('click', function() {
        toggleEditMode(false);
        viewDetail(currentEditingId); // Reload data asal
    });

    // Handle form submission
    $('#editForm').on('submit', function(e) {
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#detailModal').modal('hide');
                    window.location.reload(); // Refresh data table
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
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
