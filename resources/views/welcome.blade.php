<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SKM DINAS SOSIAL</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="shortcut icon" href="https://wisatabojonegoro.com/wp-content/uploads/2019/05/Logo-Kabupaten-Bojonegoro.png" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
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
    <div class="container">
      <div class="logo2">
        <img src="{{ asset('images/1.jpeg') }}"/>
      </div>

      <div class="survey">
        <div class="grid-survey">
          <div class="txt">
            <h1>SURVEY KEPUASAN <br />MASYARAKAT (SKM)</h1>
            <p>
              adalah data dan informasi tentang tingkat kepuasan masyarakat yang
              diperoleh dari hasil pengukuran secara kuantitatif dan kualitatif
              atas pendapat masyarakat dalam memperoleh pelayanan dari aparatur
              penyelenggara pelayanan publik.
            </p>
          </div>
          <div class="simple-bar-chart">
            @foreach ($yearData as $yeardatas)
            <div class="item" style="--clr: #069cdb; --val: 50">
              <div class="label">{{$yeardatas['year']}}</div>
              <div class="value">{{$yeardatas['data']}}</div>
            </div>
            @endforeach
          </div>
          <a href="cekdiagram.html" class="button-24">Cek Diagram</a>
          <div>
            <button class="button-24" onclick="window.dialog.showModal();">
              Mengisi Survey
            </button>
            <dialog id="dialog">
              <p>Apakah anda ingin melanjutkan survey kepuasan masyarakat?</p>
              <a href="/form" class="button-24">Iya</a>
              <button
                onclick="window.dialog.close();"
                aria-label="close"
                class="x"
              >
                ❌
              </button>
            </dialog>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="footer">
        <div class="row">
          Hak Cipta © {{$year}} Dinas Sosial Kabupaten Bojonegoro
        </div>
      </div>
    </footer>
  </body>
</html>
