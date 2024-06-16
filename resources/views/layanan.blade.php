<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
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
            <a href="/layanan"><b>Produk Layanan</b></a>
          </li>
        </ul>
      </nav>
    </header>

    <main>
      <section class="Destinasi">
        <h2>PRODUK LAYANAN DINAS SOSIAL</h2>
        <div class="Destinasi-item">
          <img src="{{ asset('images/g1.jpg') }}" alt="Destinasi 1" />
          <h3>Layanan Penerima Bantuan Iuran dan KIS</h3>
          <p>
            klik di sini untuk mendapatkan informasi lebih lanjut terkait
            layanan dan persyaratan KIS dan PBI yang harus dipenuhi
          </p>
          <a href="Tombol Detail.html"
            ><button type="button" ,>Detail</button></a
          >
        </div>
        <div class="Destinasi-item">
          <img src="{{ asset('images/g2.jpg') }}" alt=" Destinasi 1" />
          <h3>Layanan Penerima Bantuan Sosial</h3>
          <p>
            klik di sini untuk mendapatkan informasi lebih lanjut terkait
            layanan dan persyaratan penerima bantuan sosial yang harus dipenuhi
          </p>
          <a href="Tombol Detail2.html"
            ><button type="button" ,>Detail</button></a
          >
        </div>
        <div class="Destinasi-item">
          <img src="{{ asset('images/g3.jpg') }}" alt="Destinasi 1" />
          <h3>Layanan Penerima Rumah Singgah</h3>
          <p>
            klik di sini untuk mendapatkan informasi lebih lanjut terkait
            layanan dan persyaratan penerima rumah singgah yang harus dipenuhi
          </p>
          <a href="Tombol Detail3.html"
            ><button type="button" ,>Detail</button></a
          >
        </div>
      </section>
    </main>
    <br />
    <br />
    <footer>
      <div class="footer">
        <div class="row">
          Hak Cipta © 2021 Dinas Sosial Kabupaten Bojonegoro
        </div>
      </div>
    </footer>
  </body>
</html>
