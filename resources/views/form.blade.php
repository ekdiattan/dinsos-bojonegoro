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
                <a href="#">
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
                        <td><input type="text" name="NamaPerusahaanInstansiPerorangan"/></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><input type="text" name="Alamat"/></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td><input type="text" name="Pekerjaan"/></td>
                    </tr>
                    <tr>
                        <td>No. Hp</td>
                        <td><input type="number" name="NomorTelepon"/></td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td><input type="number" name="Umur"/></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td><input type="text" name="Agama" /></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><input type="text" name="JenisKelamin"/></td>
                    </tr>
                    <tr>
                        <td>Status Responden</td>
                        <td><input type="text" name="StatusResponden"/></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Terakhir</td>
                        <td><input type="text" name="PendidikanTerakhir"/></td>
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
</body>
</html>
