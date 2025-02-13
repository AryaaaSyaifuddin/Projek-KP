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

                            <!-- Modal Detail (Atas-Bawah) dengan Format Baris -->
                            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px;">
                                <div class="modal-content shadow-lg border-0">
                                    <!-- Header Modal -->
                                    <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="detailModalLabel">
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
                                        <div class="card-body">
                                        <!-- Menggunakan white-space: pre-line untuk memunculkan enter -->
                                        <p class="card-text" id="detailDiagnosis" style="font-size: 1.1em; white-space: pre-line;"></p>
                                        </div>
                                    </div>
                                    <!-- Card Rekomendasi Medis -->
                                    <div class="card">
                                        <div class="card-header bg-success text-white">
                                        <i class="fas fa-heartbeat"></i> Rekomendasi Medis
                                        </div>
                                        <div class="card-body">
                                        <!-- Menggunakan white-space: pre-line untuk memunculkan enter -->
                                        <p class="card-text" id="detailRekomendasi" style="font-size: 1.1em; white-space: pre-line;"></p>
                                        </div>
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

                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Id Pasien</th>
                                        <th>Nama Pasien</th>
                                        <th>Hasil Pemeriksaan</th>
                                        <th>Status Pemeriksaan</th>
                                        <th>Rekomendasi Medis</th> <!-- Kolom baru -->
                                        <th>Action</th>
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
                                                    <!-- Opsional: Pastikan kedua field tidak kosong -->
                                                    @if($hasil->rekomMedis->diagnosis && $hasil->rekomMedis->rekomendasi)
                                                        <span class="badge badge-success">Sudah Diisi</span>
                                                    @else
                                                        <span class="badge badge-warning">Data Tidak Lengkap</span>
                                                    @endif
                                                @else
                                                    <span class="badge badge-warning">Belum Diisi</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('rekomendasimedis.view', $hasil->id) }}" class="btn btn-outline-secondary btn-icon-text" style="padding: 8px 8px; margin-bottom: 7px;">
                                                    Generate Rekom Medis
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </a>

                                                <button class="btn btn-info btn-icon-text" style="padding: 8px 8px; margin-bottom: 7px;" onclick="viewDetail({{ $hasil->id }})">
                                                    View Detail
                                                    <i class="typcn typcn-eye btn-icon-append"></i>
                                                </button>

                                                <form action="{{ route('rekomendasimedis.destroy', $hasil->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-icon-text" style="padding: 8px 8px; margin-bottom: 7px;"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data rekomendasi medis ini?')">
                                                        Delete
                                                        <i class="typcn typcn-delete-outline btn-icon-append"></i>
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
                    $('#detailDiagnosis').text('Data tidak ditemukan');
                    $('#detailRekomendasi').text('Data tidak ditemukan');
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
