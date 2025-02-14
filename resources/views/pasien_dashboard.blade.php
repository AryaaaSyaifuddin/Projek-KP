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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Style dasar untuk semua tombol */
        .btn-outline-secondary, .btn-outline-danger, .btn-outline-success, .btn-success {
            border: none;
            border-radius: 7px;
            padding: 8px 15px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            margin-bottom: 4px;
        }

        /* Tombol Edit */
        .btn-outline-secondary {
            background-color: #2575fc;
            color: #fff;
            box-shadow: 0 4px 8px rgba(37, 117, 252, 0.2);
        }

        .btn-outline-secondary:hover {
            background-color: #1a5bbf;
            box-shadow: 0 6px 12px rgba(37, 117, 252, 0.3);
        }

        /* Tombol Delete */
        .btn-outline-danger {
            background-color: #ff4b2b;
            color: #fff;
            box-shadow: 0 4px 8px rgba(255, 75, 43, 0.2);
        }

        .btn-outline-danger:hover {
            background-color: #e03a1d;
            box-shadow: 0 6px 12px rgba(255, 75, 43, 0.3);
        }

        /* Tombol Rekam Medis */
        .btn-outline-success {
            background-color: #28a745;
            color: #fff;
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.2);
        }

        .btn-outline-success:hover {
            background-color: #218838;
            box-shadow: 0 6px 12px rgba(40, 167, 69, 0.3);
        }

        /* Tombol Export PDF */
        .btn-success {
            background-color: #17a2b8;
            color: #fff;
            box-shadow: 0 4px 8px rgba(23, 162, 184, 0.2);
        }

        .btn-success:hover {
            background-color: #138496;
            box-shadow: 0 6px 12px rgba(23, 162, 184, 0.3);
        }

        /* Efek hover untuk ikon */
        .btn-icon-append {
            transition: transform 0.3s ease;
        }

        .btn-outline-secondary:hover .btn-icon-append,
        .btn-outline-danger:hover .btn-icon-append,
        .btn-outline-success:hover .btn-icon-append,
        .btn-success:hover .btn-icon-append {
            transform: translateX(5px); /* Ikon bergeser sedikit ke kanan saat hover */
        }

        /* Style dasar untuk input field */
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
                    <button
                        type="button"
                        class="btn btn-outline-primary btn-icon-text"
                        style="padding: 8px 15px; min-width: 8%;"
                        onclick="window.location='{{ route('showCreateForm') }}'">
                        Create
                        <i class="typcn typcn-folder btn-icon-prepend"></i>
                    </button>
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
                        <h4 class="card-title">Data Pasien</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor HP</th>
                                        <th>Email</th>
                                        <th>Pekerjaan</th>
                                        <th>Alamat</th>
                                        <th>Nomor Identitas</th>
                                        <th>Perawat</th>
                                        <th>Dokter</th>
                                        <th>Jadwal Pemeriksaan</th>
                                        <th style="min-width: 250px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPasien as $index => $pasien)
                                        <tr>
                                            <td>{{ $pasien->id_pasien }}</td>
                                            <td>{{ $pasien->nama_panjang }}</td>
                                            <td>{{ $pasien->tanggal_lahir }}</td>
                                            <td>{{ $pasien->jenis_kelamin }}</td>
                                            <td>{{ $pasien->nomor_hp }}</td>
                                            <td>{{ $pasien->email }}</td>
                                            <td>{{ $pasien->pekerjaan }}</td>
                                            <td>{{ $pasien->alamat }}</td>
                                            <td>{{ $pasien->nomor_identitas }}</td>
                                            <td>
                                                {{ $pasien->nama_perawat ?? 'Tidak Diketahui' }}
                                            </td>
                                            <td>
                                                {{ $pasien->nama_dokter ?? 'Tidak Diketahui' }}
                                            </td>
                                            <td>
                                                @php
                                                    $tanggalPemeriksaan = \Carbon\Carbon::parse($pasien->tanggal_pemeriksaan . ' ' . $pasien->waktu_pemeriksaan);
                                                    $isLate = $tanggalPemeriksaan->isPast(); // Cek apakah sudah lewat
                                                    $diffMinutes = $tanggalPemeriksaan->diffInMinutes(now(), false); // Selisih waktu dalam menit (bisa negatif jika belum lewat)

                                                    // Tentukan background color berdasarkan kondisi
                                                    $bgColor = '';
                                                    if ($diffMinutes > 0 && $diffMinutes <= 30) {
                                                        $bgColor = 'color: green;'; // Background hijau jika masih dalam 30 menit terakhir
                                                    } elseif ($isLate) {
                                                        $bgColor = 'color: red;'; // Background merah jika sudah lewat lebih dari 30 menit
                                                    }
                                                @endphp

                                                <span style="{{ $bgColor }} font-weight: bold;">
                                                    {{ \Carbon\Carbon::parse($pasien->tanggal_pemeriksaan)->format('d-m-Y') }} {{ $pasien->waktu_pemeriksaan }}
                                                </span>
                                            </td>

                                            <td style="min-width: 190px; align-items: center;">
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('pasien.edit', $pasien->id_pasien) }}" class="btn btn-outline-secondary btn-icon-text" style="padding: 8px 15px; width: 105px;">
                                                    Edit
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </a>

                                                <!-- Tombol Delete -->
                                                <form action="{{ route('pasien.destroy', $pasien->id_pasien) }}" method="POST" style="display:inline;" id="delete-form-{{ $pasien->id_pasien }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-danger btn-icon-text" style="padding: 8px 8px; width: 110px;" onclick="confirmDelete({{ $pasien->id_pasien }})">
                                                        Delete
                                                        <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                                    </button>
                                                </form>

                                                <!-- Tombol Rekam Medis -->
                                                <a href="{{ route('rekam_medis.create', $pasien->id_pasien) }}" class="btn btn-outline-success btn-icon-text" style="padding: 8px 8px; margin-top: 4px; width: 100%;">
                                                    Rekam Medis
                                                    <i class="typcn typcn-plus btn-icon-append"></i>
                                                </a>

                                                @if($pasien->hasilPemeriksaan)
                                                    <!-- Tombol Export PDF -->
                                                    <a href="{{ route('hasilpemeriksaan.exportPdf', $pasien->hasilPemeriksaan->id) }}" class="btn btn-success btn-icon-text" style="padding: 8px 8px; margin-top: 4px; width: 100%;">
                                                        Export PDF
                                                        <i class="typcn typcn-document-text btn-icon-append"></i>
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
                                            <input type="text" class="form-control" name="nama_panjang" placeholder="Masukkan nama lengkap" value="{{ old('nama_panjang') }}"required>
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

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Dokter</label>
                                        <div class="col-sm-9" style="display: flex; padding: 8px 15px;">
                                            <select class="form-control" name="id_dokter" required>
                                                <option value="" disabled selected>Pilih Dokter</option>
                                                @foreach ($dokterList as $dokter)
                                                    <option value="{{ $dokter->id_user }}">{{ $dokter->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-right: 2%;">Simpan</button>
                            <a href="{{ route('cancelForm') }}" class="btn btn-secondary">Batal</a>
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
    {{-- <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            if (this.value.length > 0) {
                this.style.backgroundColor = '#f0f8ff'; // Warna background saat ada input
            } else {
                this.style.backgroundColor = '#fff'; // Warna background default
            }
        });
    </script> --}}
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
