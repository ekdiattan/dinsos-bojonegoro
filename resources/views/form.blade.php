<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/isimenu.css') }}" />
  <link rel="shortcut icon" href="https://wisatabojonegoro.com/wp-content/uploads/2019/05/Logo-Kabupaten-Bojonegoro.png" />
    <title>SKM DINAS SOSIAL</title>
</head>
<body>
    <header class="header">
        <nav>
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('images/2.png') }}" alt="logo" />
                    <b>Pemerintahan Kabupaten Bojonegoro <br />DINAS SOSIAL</b>
                </a>
            </div>
            <ul class="nav-menu">
                <li><a href="/"><b>Beranda</b></a></li>
                <li><a href=""><b>Produk Layanan</b></a></li>
            </ul>
        </nav>
    </header>
    <br />
    <br />
    <div class="survey3">
        <div class="profil-survey3">
            <h3>Profile Responden</h3>
            <br />
            <form id="surveyForm" action="/formsurvey" method="post">
                @csrf
                <table class="table1-survey3">
                    <tr>
                        <td width="350">Nama Perusahaan / Instansi / Perorangan</td>
                        <td><input type="text" name="NamaPerusahaanInstansiPerorangan" required/></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><input type="text" name="Alamat" required/></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td><input type="text" name="Pekerjaan" required/></td>
                    </tr>
                    <tr>
                        <td>No. Hp</td>
                        <td><input type="number" name="NomorTelepon" required/></td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td><input type="number" name="Umur" required/></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>
                            <select name="Agama" required>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <select name="JenisKelamin" required>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Responden</td>
                        <td><input type="text" name="StatusResponden" required/></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Terakhir</td>
                        <td>
                            <select name="PendidikanTerakhir" required>
                                <option value="SEKOLAH DASAR ( SD )">SEKOLAH DASAR ( SD )</option>
                                <option value="SEKOLAH MENENGAH PERTAMA ( SMP )">SEKOLAH MENENGAH PERTAMA ( SMP )</option>
                                <option value="SEKOLAH MENENGAH ATAS ( SMA )/ SEKOLAH MENENGAH KEJURUSAN ( SMK )">SEKOLAH MENENGAH ATAS ( SMA )/ SEKOLAH MENENGAH KEJURUSAN ( SMK )</option>
                                <option value="DIPLOMA I / II">DIPLOMA I / II</option>
                                <option value="DIPLOMA III / S1">DIPLOMA III / S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </td>
                    </tr>
                </table>
        </div>
    </div>
    <div class="survey4">
        <div class="pendapat-survey4">
            <h3>Pendapat Responden Tentang Pelayanan</h3>
            <br />
            <div class="grid-container">
                @foreach ($pertanyaan as $item)
                <div class="service__card">
                    <h4>{{ $item->Pertanyaan }}</h4>
                    <br />
                    <hr />
                    <br />
                    <table>
                        <tr>
                            <td>
                                <input type="radio" name="nilai_{{$item->PertanyaanId}}" value="Sangat Baik" checked> Sangat Baik
                            </td>
                            <td>
                                <input type="radio" name="nilai_{{$item->PertanyaanId}}" value="Kurang Baik"> Kurang Baik
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" name="nilai_{{$item->PertanyaanId}}" value="Baik"> Baik
                            </td>
                            <td>
                                <input type="radio" name="nilai_{{$item->PertanyaanId}}" value="Tidak Baik"> Tidak Baik
                            </td>
                        </tr>
                    </table>
                </div>
            @endforeach
            
            </div>
        </div>
    </div>
    <div class="survey5">
        <div class="textarea-survey5">
            <h3>Saran dan Kritik</h3>
            <div class="wrapper">
                <textarea spellcheck="false" placeholder="Type something here..." name="KritikSaran" required></textarea>
            </div>
            <br />
            <div class="grid-container-survey5">
                <div class="grid-container-survey5-button">
                    <button class="button-24" role="button" type="submit">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <br />
    <br />
    <br />
    <footer>
        <div class="footer">
            <div class="row">Hak Cipta © {{$year}} Dinas Sosial Kabupaten Bojonegoro</div>
        </div>
    </footer>

    @if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.6/dist/sweetalert2.all.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: 'Success!',
          text: "{{ session('success') }}",
          icon: 'success',
          confirmButtonText: 'OK'
        });
      });
    </script>
    @endif
  
    @if(session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.6/dist/sweetalert2.all.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: 'Error!',
          text: "{{ session('error') }}",
          icon: 'error',
          confirmButtonText: 'OK'
        });
      });
    </script>
    @endif
</body>
</html>
