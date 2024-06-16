<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/isimenu.css') }}" />
    <title>SKM DINAS SOSIAL</title>
  </head>
  <body>
    <header class="header">
      <nav>
        <div class="logo">
          <a href="#"
            ><img src="{{ asset('images/2.png') }}" alt="logo" /><b
              >Pemerintahan Kabupaten Bojonegoro <br />DINAS SOSIAL</b
            ></a
          >
        </div>
        <ul class="nav-menu">
          <li>
            <a href="/"><b>Beranda</b></a>
          </li>
          <li>
            <a href=""><b>Produk Layanan</b></a>
          </li>
        </ul>
      </nav>
    </header>
    <br />
    <br />

    <div class="survey3">
      <div class="profil-survey3">
        <h3>Profile Responden</h3>
        <br />
        <form action="" method="post">
          <table class="table1-survey3">
            <tr>
              <td width="350">Nama Perusahaan / Instansi / Perorangan</td>
              <td><input type="text" /></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td><input type="text" /></td>
            </tr>
            <tr>
              <td>Pekerjaan</td>
              <td><input type="text" /></td>
            </tr>
            <tr>
              <td>No. Hp</td>
              <td><input type="number" /></td>
            </tr>
            <tr>
              <td>Umur</td>
              <td><input type="number" /></td>
            </tr>
            <tr>
              <td>Agama</td>
              <td><input type="text" /></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td><input type="text" /></td>
            </tr>
            <tr>
              <td>Status Responden</td>
              <td><input type="text" /></td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir</td>
              <td><input type="text" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <div class="survey4">
      <div class="pendapat-survey4">
        <h3>Pendapat Responden Tentang Pelayanan</h3>
        <br />
        <div class="grid-container">
          @foreach ($pertanyaan as $pertanyaans)     
          <div class="service__card">
            <h4 value ="{{ $pertanyaans->PertanyaanId }}">{{ $pertanyaans->Pertanyaan }}</h4>
            <br />
            <hr />
            <br />
            <table>
              <tr>
                <td><input type="radio" name="pilihan2" /> Sangat Baik</td>
                <td><input type="radio" name="pilihan2" /> Kurang Baik</td>
              </tr>
              <tr>
                <td><input type="radio" name="pilihan2" /> Baik</td>
                <td><input type="radio" name="pilihan2" /> Tidak Baik</td>
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
          <textarea
            spellcheck="false"
            placeholder="Type something here..."
            required
          ></textarea>
        </div>
        <br />
        <div class="grid-container-survey5">
          <div class="grid-container-survey5-button">
            <button class="button-24" role="button">Kirim</button>
          </div>
        </div>
      </div>
    </div>
    <br />
    <br />
    <br />
    <footer>
      <div class="footer">
        <div class="row">
          Hak Cipta © 2021 Dinas Sosial Kabupaten Bojonegoro
        </div>
      </div>
    </footer>
    <script>
      const textarea = document.querySelector("textarea");
      textarea.addEventListener("keyup", (e) => {
        textarea.style.height = "63px";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
      });
    </script>
  </body>
</html>
