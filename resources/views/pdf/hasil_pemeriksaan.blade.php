<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Rekam Medis dari {{ $hasil->patient->nama_panjang }}</title>
  <style>
    /* CSS untuk tampilan PDF */
    @page {
      margin: 20mm;
    }
    body {
      font-family: 'Times New Roman', serif;
      font-size: 12px;
      margin: 0;
      padding: 0;
      color: #333;
      position: relative;
    }
    .page-container {
      margin: auto;
      padding: 20mm;
      box-sizing: border-box;
      border: 1px solid #ccc;
    }
    header {
      text-align: center;
      margin-bottom: 20px;
      border-bottom: 1px solid #004d40; /* Hijau tua */
      padding-bottom: 10px;
    }
    header img {
      max-width: 100px;
      margin-bottom: 10px;
    }
    header h1 {
      margin: 0;
      font-size: 24px;
      color: #004d40; /* Hijau tua */
    }
    header p {
      font-size: 14px;
      margin: 5px 0 0;
      color: #555;
    }
    .hospital-info {
      text-align: center;
      margin-bottom: 20px;
      font-size: 14px;
      color: #555;
    }
    /* Bagian Data Pasien */
    .patient-info {
      margin-bottom: 20px;
    }
    .patient-info table {
      width: 100%;
      border-collapse: collapse;
    }
    .patient-info th,
    .patient-info td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    .patient-info th {
      background-color: #e0f2f1; /* Hijau muda */
      color: #004d40;
    }
    .section {
      margin-bottom: 15px;
      page-break-inside: avoid;
    }
    .section-title {
      background-color: #e0f2f1; /* Hijau muda */
      padding: 8px 10px;
      font-weight: bold;
      border: 1px solid #004d40; /* Hijau tua */
      margin-bottom: 5px;
      color: #004d40;
    }
    .data-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }
    .data-table th,
    .data-table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    .data-table th {
      background-color: #e0f2f1; /* Hijau muda */
      color: #004d40;
    }
    .data-table tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    /* Tabel untuk daftar hasil pemeriksaan dengan tema hijau */
    .results-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    .results-table th,
    .results-table td {
      border: 1px solid #004d40; /* Garis hijau tua */
      padding: 8px;
      text-align: left;
    }
    .results-table th {
      background-color: #a5d6a7; /* Hijau sedang */
      color: #004d40;
      font-size: 14px;
    }
    .results-table tr:nth-child(even) {
      background-color: #e8f5e9; /* Hijau sangat muda */
    }
    /* Style badge */
    .badge-success {
      display: inline-block;
      padding: 2px 6px;
      background-color: #66bb6a;
      color: #fff;
      border-radius: 4px;
      font-size: 10px;
    }
    .badge-warning {
      display: inline-block;
      padding: 2px 6px;
      background-color: #ffa726;
      color: #fff;
      border-radius: 4px;
      font-size: 10px;
    }
    .stamp {
      position: fixed; /* Stempel muncul di setiap halaman */
      bottom: 50mm;
      right: 50mm;
      font-size: 48px;
      color: rgba(249, 42, 42, 0.3);
      border: 3px solid rgba(0, 77, 64, 0.3);
      padding: 10px;
      transform: rotate(-10deg);
      opacity: 0.5;
      z-index: 9999;
    }
    .page-break {
      page-break-after: always;
    }
    footer {
      text-align: center;
      margin-top: 20px;
      padding-top: 10px;
      border-top: 1px solid #004d40;
      font-size: 10px;
      color: #555;
    }
    .pre-line {
      white-space: pre-line;
    }
  </style>
</head>
<body>
    <header>
      <img src="img/favicon.jpg" alt="Logo">
      <p>Rumah Sakit Semen Gresik</p>
      <p>Jalan RA Kartini No.280, Gresik, Jawa Timur</p>
      <p>Telp: (022) 1234567 | Email: contoh@rssemengresik.go.id</p>
    </header>

    <!-- Informasi RS / Judul Dokumen -->
    <div class="hospital-info">
      <h2>Dokumen Rekam Medis Pasien {{ $pasien->nama_panjang }}</h2>
    </div>

    @php
    $normalParams = [
        // Pemeriksaan Darah (Hematologi & Biokimia)
        'hemoglobin'         => 'Wanita: 8 - 16,5 | Pria: 10 - 18',
        'leukosit'           => '4 ribu – 11 ribu',
        'eritrosit'          => 'Wanita: 4 juta - 5 juta | Pria: 4,5 juta – 5,5 juta',
        'led'                => 'Wanita: 0 – 20 | Pria: 0 – 15',
        'eosinofil'          => '0 – 1',
        'basofil'            => '0 - 1',
        'neutrofil'          => '50 – 70',
        'lymphosit'          => '25 – 33',
        'monosit'            => '3 – 8',
        'trombosit'          => '150000 – 400000',
        'hematokrit'         => 'Wanita: 37 – 45 | Pria: 40 – 50',
        'mcv'                => '82 – 92',
        'sgot'               => 'Wanita: < 31 | Pria: < 37',
        'sgpt'               => 'Wanita: < 32 | Pria: < 42',
        'bun'                => '5 – 23,5',
        'kreatinin'          => 'Wanita: 0,7 – 1,1 | Pria: 0,8 – 1,4',
        'asam_urat'          => 'Wanita: 2,6 – 6 | Pria: 3,5 – 7,2',
        'kolestrol_total'    => '< 200',
        'trigliserida'       => '< 200',
        'kolestrol_hdl'      => '> 35',
        'kolestrol_ldl'      => '< 115',
        'gula_darah_puasa'   => '< 126',
        'gula_darah_2_jam_pp'=> '< 140',

        // Pemeriksaan Urine
        'ph_urine'           => '5 – 8',
        'berat_jenis_urine'  => '1,005 – 1,030',
        'eritrosit_urine'    => '0 – 2',
        'lekosit_urine'      => '0 – 5',
    ];
    @endphp

    @php
    function getPerawatName($id) {
        $names = [
            1 => "Ayu Lestari",
            2 => "Budi Santoso",
            3 => "Citra Dewi",
            4 => "Rudi Prasetyo",
            5 => "Indah Sari"
        ];
        return $names[$id] ?? 'Tidak Diketahui';
    }

    function getDokterName($id) {
        $names = [
            6 => "Dr. Andi Kusuma",
            7 => "Dr. Siti Nurhaliza",
            8 => "Dr. Fahmi Wijaya",
            9 => "Dr. Rina Handayani",
            10 => "Dr. Wahyu Saputra"
        ];
        return $names[$id] ?? 'Tidak Diketahui';
    }
    @endphp


    <!-- Data Pasien di bawah Header -->
    <div class="patient-info">
      <table>
        <tr>
          <th>Nama Lengkap</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Pekerjaan</th>
          <th>Alamat</th>
          <th>Nama Perawat</th>
          <th>Nama Dokter</th>
        </tr>
        <tr>
          <td>{{ $pasien->nama_panjang }}</td>
          <td>{{ $pasien->tanggal_lahir }}</td>
          <td>{{ $pasien->jenis_kelamin }}</td>
          <td>{{ $pasien->pekerjaan }}</td>
          <td>{{ $pasien->alamat }}</td>
          <td>{{ getPerawatName($pasien->id_perawat) }}</td>
          <td>{{ getDokterName($pasien->id_dokter) }}</td>
        </tr>
      </table>
    </div>

    @php
    function getGenderDescription($value) {
        $descriptions = [
            1 => 'Laki-laki',
            2 => 'Perempuan',
        ];
        return $descriptions[$value] ?? 'Tidak Diketahui';
    }
    @endphp

    <!-- Section 1: Identitas & Data Demografis -->
    <div class="section">
      <div class="section-title">Identitas &amp; Data Demografis</div>
      <table class="data-table">
        <tr>
          <th>ID Pemeriksaan</th>
          <td>{{ $hasil->id }}</td>
        </tr>
        <tr>
          <th>ID Pasien</th>
          <td>{{ $hasil->id_pasien }}</td>
        </tr>
        <tr>
          <th>Nama Pasien</th>
          <td>{{ $hasil->patient->nama_panjang }}</td>
        </tr>
        <tr>
          <th>Gender</th>
          <td>{{ getGenderDescription($hasil->gender) }}</td>
        </tr>
        <tr>
          <th>Usia</th>
          <td>{{ $hasil->Age }}</td>
        </tr>
      </table>
    </div>

    @php
    function getBMIDescription($value) {
        $descriptions = [
            0 => 'Normal',
            1 => 'Obesitas I',
            2 => 'Obesitas II',
            3 => 'Overweight',
            4 => 'Underweight',
            5 => 'nan',
        ];
        return $descriptions[$value] ?? 'Tidak Diketahui';
    }

    function getHipertensiDescription($value) {
        $descriptions = [
            0 => 'Hipertensi Tingkat 1',
            1 => 'Hipertensi Tingkat 2',
            2 => 'Normal',
            3 => 'Pra-hipertensi',
        ];
        return $descriptions[$value] ?? 'Tidak Diketahui';
    }

    function getKesadaranDescription($value) {
        $descriptions = [
            0 => 'apatis',
            1 => 'compos mentis',
            2 => 'delirium',
            3 => 'koma',
            4 => 'semi koma',
            5 => 'somnolen',
            6 => 'sopor',
        ];
        return $descriptions[$value] ?? 'Tidak Diketahui';
    }
    @endphp

    <!-- Section 2: Tanda Vital & Antropometri -->
    <div class="section">
      <div class="section-title">Tanda Vital &amp; Antropometri</div>
      <table class="data-table">
        <tr>
          <th>Tinggi Badan</th>
          <td>{{ $hasil->height }}</td>
        </tr>
        <tr>
          <th>Berat Badan</th>
          <td>{{ $hasil->weight }}</td>
        </tr>
        <tr>
          <th>BMI</th>
          <td>{{ $hasil->BMI }} ({{ getBMIDescription($hasil->BMICat) }})</td>
        </tr>
        <tr>
          <th>Kategori Hipertensi</th>
          <td>{{ getHipertensiDescription($hasil->Hipertensi_Kategori) }}</td>
        </tr>
        <tr>
          <th>Sistolik / Diastolik</th>
          <td>{{ $hasil->Sistolik }} / {{ $hasil->Diastolik }}</td>
        </tr>
        <tr>
          <th>Nadi (kali/menit)</th>
          <td>{{ $hasil->{'Nadi(kali/menit)'} }}</td>
        </tr>
        <tr>
          <th>Frekuensi Napas (kali/menit)</th>
          <td>{{ $hasil->{'FrekuensiNapas(kali/menit)'} }}</td>
        </tr>
        <tr>
          <th>Tingkatan Kesadaran</th>
          <td>{{ getKesadaranDescription($hasil->Tingkatan_Kesadaran) }}</td>
        </tr>
      </table>
    </div>

    <!-- Section 3: Riwayat Penyakit & Komorbiditas -->
    <div class="section">
      <div class="section-title">Riwayat Penyakit &amp; Komorbiditas</div>
      <table class="data-table">
        <tr>
          <th>Tuberkulosis</th>
          <td>{{ $hasil->tuberkulosis ? 'Tidak' : 'Ya' }}</td>
        </tr>
        <tr>
          <th>Penyakit Jantung</th>
          <td>{{ $hasil->penyakit_jantung ? 'Tidak' : 'Ya' }}</td>
        </tr>
        <tr>
          <th>Hipertensi</th>
          <td>{{ $hasil->hipertensi ? 'Tidak' : 'Ya' }}</td>
        </tr>
        <tr>
          <th>Diabetes Melitus</th>
          <td>{{ $hasil->diabetes_melitus ? 'Tidak' : 'Ya' }}</td>
        </tr>
        <tr>
          <th>Gangguan Jiwa</th>
          <td>{{ $hasil->gangguan_jiwa ? 'Tidak' : 'Ya' }}</td>
        </tr>
        <tr>
          <th>Trauma pada Kepala</th>
          <td>{{ $hasil->trauma_pada_kepala ? 'Tidak' : 'Ya' }}</td>
        </tr>
        <tr>
          <th>Hepatitis</th>
          <td>{{ $hasil->hepatitis ? 'Tidak' : 'Ya' }}</td>
        </tr>
      </table>
    </div>

    <!-- Section 4: Tes Fungsional / Imaging -->
    <div class="section">
      <div class="section-title">Tes Fungsional / Imaging</div>
      <table class="data-table">
        <tr>
          <th>Spirometri</th>
          <td>{{ $hasil->Spirometri ? 'Tidak Normal' : 'Normal' }}</td>
        </tr>
        <tr>
          <th>Treadmil</th>
          <td>{{ $hasil->Treadmil ? 'Tidak Normal' : 'Normal' }}</td>
        </tr>
        <tr>
          <th>Audiometri</th>
          <td>{{ $hasil->Audiometri ? 'Tidak Normal' : 'Normal' }}</td>
        </tr>
        <tr>
          <th>Foto Thorax</th>
          <td>{{ $hasil->foto_thorax ? 'Tidak Normal' : 'Normal' }}</td>
        </tr>
      </table>
    </div>

    <!-- Section 5: Pemeriksaan Fisik Tambahan -->
    <div class="section">
      <div class="section-title">Pemeriksaan Fisik Tambahan</div>
      <table class="data-table">
        <tr>
          <th>Buta Warna</th>
          <td>{{ $hasil->Buta_Warna ? 'Ya' : 'Tidak' }}</td>
        </tr>
        <tr>
          <th>Jantung</th>
          <td>{{ $hasil->Jantung ? 'Ya' : 'Tidak' }}</td>
        </tr>
      </table>
    </div>

    <!-- Section 6: Pemeriksaan Darah (Hematologi & Biokimia) -->
    <div class="section">
        <div class="section-title">Pemeriksaan Darah (Hematologi &amp; Biokimia)</div>
        <table class="data-table">
          <thead>
            <tr>
              <th>Pemeriksaan</th>
              <th>Hasil Pemeriksaan</th>
              <th>Batas Normal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Hemoglobin</td>
              <td>{{ $hasil->hemoglobin }}</td>
              <td>{{ $normalParams['hemoglobin'] }}</td>
            </tr>
            <tr>
              <td>Leukosit</td>
              <td>{{ $hasil->leukosit }}</td>
              <td>{{ $normalParams['leukosit'] }}</td>
            </tr>
            <tr>
              <td>Eritrosit</td>
              <td>{{ $hasil->eritrosit }}</td>
              <td>{{ $normalParams['eritrosit'] }}</td>
            </tr>
            <tr>
              <td>LED</td>
              <td>{{ $hasil->LED }}</td>
              <td>{{ $normalParams['led'] }}</td>
            </tr>
            <tr>
              <td>Eosinofil</td>
              <td>{{ $hasil->eosinofil }}</td>
              <td>{{ $normalParams['eosinofil'] }}</td>
            </tr>
            <tr>
              <td>Basofil</td>
              <td>{{ $hasil->basofil }}</td>
              <td>{{ $normalParams['basofil'] }}</td>
            </tr>
            <tr>
              <td>Neutrofil</td>
              <td>{{ $hasil->neutrofil }}</td>
              <td>{{ $normalParams['neutrofil'] }}</td>
            </tr>
            <tr>
              <td>Lymphosit</td>
              <td>{{ $hasil->lymphosit }}</td>
              <td>{{ $normalParams['lymphosit'] }}</td>
            </tr>
            <tr>
              <td>Monosit</td>
              <td>{{ $hasil->monosit }}</td>
              <td>{{ $normalParams['monosit'] }}</td>
            </tr>
            <tr>
              <td>Trombosit</td>
              <td>{{ $hasil->trombosit }}</td>
              <td>{{ $normalParams['trombosit'] }}</td>
            </tr>
            <tr>
              <td>Hematokrit</td>
              <td>{{ $hasil->hematokrit }}</td>
              <td>{{ $normalParams['hematokrit'] }}</td>
            </tr>
            <tr>
              <td>MCV</td>
              <td>{{ $hasil->MCV }}</td>
              <td>{{ $normalParams['mcv'] }}</td>
            </tr>
            <tr>
              <td>SGOT</td>
              <td>{{ $hasil->SGOT }}</td>
              <td>{{ $normalParams['sgot'] }}</td>
            </tr>
            <tr>
              <td>SGPT</td>
              <td>{{ $hasil->SGPT }}</td>
              <td>{{ $normalParams['sgpt'] }}</td>
            </tr>
            <tr>
              <td>BUN</td>
              <td>{{ $hasil->BUN }}</td>
              <td>{{ $normalParams['bun'] }}</td>
            </tr>
            <tr>
              <td>Kreatinin</td>
              <td>{{ $hasil->kreatinin }}</td>
              <td>{{ $normalParams['kreatinin'] }}</td>
            </tr>
            <tr>
              <td>Asam Urat</td>
              <td>{{ $hasil->asam_urat }}</td>
              <td>{{ $normalParams['asam_urat'] }}</td>
            </tr>
            <tr>
              <td>Kolestrol Total</td>
              <td>{{ $hasil->kolestrol_total }}</td>
              <td>{{ $normalParams['kolestrol_total'] }}</td>
            </tr>
            <tr>
              <td>Trigliserida</td>
              <td>{{ $hasil->trigliserida }}</td>
              <td>{{ $normalParams['trigliserida'] }}</td>
            </tr>
            <tr>
              <td>Kolestrol HDL (Direct)</td>
              <td>{{ $hasil->{'kolestrol_HDL_(direct)'} }}</td>
              <td>{{ $normalParams['kolestrol_hdl'] }}</td>
            </tr>
            <tr>
              <td>Kolestrol LDL (Direct)</td>
              <td>{{ $hasil->{'kolestrol_LDL_(direct)'} }}</td>
              <td>{{ $normalParams['kolestrol_ldl'] }}</td>
            </tr>
            <tr>
              <td>Gula Darah Puasa</td>
              <td>{{ $hasil->gula_darah_puasa }}</td>
              <td>{{ $normalParams['gula_darah_puasa'] }}</td>
            </tr>
            <tr>
              <td>Gula Darah 2 Jam PP</td>
              <td>{{ $hasil->gula_darah_2_jam_pp }}</td>
              <td>{{ $normalParams['gula_darah_2_jam_pp'] }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      @php
        function getReduksiUrineDescription($value) {
            $descriptions = [
                0 => 'negatif',
                1 => 'positif 1',
                2 => 'positif 2',
            ];
            return $descriptions[$value] ?? 'Tidak Diketahui';
        }
      @endphp

      <div class="section">
        <div class="section-title">Pemeriksaan Urine</div>
        <table class="data-table">
          <thead>
            <tr>
              <th>Pemeriksaan</th>
              <th>Hasil Pemeriksaan</th>
              <th>Batas Normal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>pH pada Urine</td>
              <td>{{ $hasil->pH_pada_urine }}</td>
              <td>{{ $normalParams['ph_urine'] }}</td>
            </tr>
            <tr>
              <td>Berat Jenis pada Urine</td>
              <td>{{ $hasil->berat_jenis_pada_urine }}</td>
              <td>{{ $normalParams['berat_jenis_urine'] }}</td>
            </tr>
            <tr>
              <td>Eritrosit pada Urine</td>
              <td>{{ $hasil->eritrosit_pada_urine }}</td>
              <td>{{ $normalParams['eritrosit_urine'] }}</td>
            </tr>
            <tr>
              <td>Lekosit pada Urine</td>
              <td>{{ $hasil->lekosit_pada_urine }}</td>
              <td>{{ $normalParams['lekosit_urine'] }}</td>
            </tr>
            <tr>
              <td>Nitrite pada Urine</td>
              <td>{{ $hasil->nitrite_pada_urine ? 'Ya' : 'Tidak' }}</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Protein pada Urine</td>
              <td>{{ $hasil->protein_pada_urine ? 'Ya' : 'Tidak' }}</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Reduksi pada Urine</td>
              <td>{{ getReduksiUrineDescription($hasil->reduksi_pada_urine) }}</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Keton pada Urine</td>
              <td>{{ $hasil->ketone_pada_urine ? 'Ya' : 'Tidak' }}</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Urobilinogen pada Urine</td>
              <td>{{ $hasil->urobilinogen_pada_urine ? 'Ya' : 'Tidak' }}</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Billirubin pada Urine</td>
              <td>{{ $hasil->billirubin_pada_urine ? 'Ya' : 'Tidak' }}</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Silinder pada Urine</td>
              <td>{{ $hasil->silinder_pada_urine ? 'Ya' : 'Tidak' }}</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Kristal pada Urine</td>
              <td>{{ $hasil->kristal_pada_urine ? 'Ya' : 'Tidak' }}</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Yeast pada Urine</td>
              <td>{{ $hasil->yeast_pada_urine ? 'Ya' : 'Tidak' }}</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Bakteri pada Urine</td>
              <td>{{ $hasil->bakteri_pada_urine ? 'Ya' : 'Tidak' }}</td>
              <td>-</td>
            </tr>
          </tbody>
        </table>
      </div>


    <!-- Section 8: Daftar Hasil Pemeriksaan -->
    <div class="section">
        <div class="section-title">Daftar Hasil Pemeriksaan</div>
        <div class="results-section">
          @foreach($hasilPemeriksaan as $hp)
            <div class="result-card">
              <p><strong>Hasil Pemeriksaan:</strong> {{ $hp->prediksi->hasil_pemeriksaan ?? 'Not available' }}</p>
              <div class="rekomendasi">
                <strong>Rekomendasi Medis:</strong>
                @if($hp->rekomMedis)
                  <p><strong>Diagnosis:</strong> <span class="pre-line">{{ $hp->rekomMedis->diagnosis }}</span></p>
                  <p><strong>Rekomendasi:</strong> <span class="pre-line">{{ $hp->rekomMedis->rekomendasi }}</span></p>
                @else
                  <p>Belum Ada</p>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>

    <!-- Footer -->
    <footer>
      <p>Dokumen ini dicetak pada: {{ date('d/m/Y H:i:s') }}</p>
    </footer>

</body>
</html>
