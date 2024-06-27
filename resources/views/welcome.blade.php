@extends('templatepublic.main')

@section('contents')
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
        @php($colors = ['#069cdb', '#ff7f00', '#1b9e77', '#d95f02', '#7570b3', '#e7298a', '#66a61e', '#2a9d8f', '#e9c46a', '#f4a261', '#e76f4f', '#d32f2f', '#8a8a5c', '#2a768c', '#40407a'])
        @foreach ($yearData as $index => $yeardatas)
        @php($colorIndex = $index % count($colors))
        <div class="item" style="--clr: {{$colors[$colorIndex]}}; --val: 50">
          <div class="label">{{$yeardatas['year']}}</div>
          <div class="value">{{$yeardatas['data']}}</div>
        </div>
        @endforeach
      </div>
      <a href="/diagram" class="button-24">Cek Diagram</a>
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
<div class="container2">
  <h3>Tanggapan Responden</h3>
  <br />
  <div class="chart-container">
    <div class="bar" id="bar-one">
      <img src="{{asset('images/emoji1.png')}}" alt="Sangat Baik"id="imagemot" />
      <div class="emoji-text" id="emoji-text1">Sangat Puas</div>
      <div id="emoji-text1">18%</div>
    </div>
    <div class="bar" id="bar-two">
      <img src="{{asset('images/emoji2.png')}}" alt="Baik" id="imagemot"/>
      <div class="emoji-text" id="emoji-text2">Puas</div>
      <div id="emoji-text2">90%</div>
    </div>
    <div class="bar" id="bar-three">
      <img src="{{asset('images/emoji3.png')}}" alt="Kurang Baik"id="imagemot" />
      <div class="emoji-text" id="emoji-text3">Cukup Puas</div>
      <div id="emoji-text3">90%</div>
    </div>
    <div class="bar" id="bar-four">
      <img src="{{asset('images/emoji4.png')}}" alt="Tidak Baik"id="imagemot" />
      <div class="emoji-text" id="emoji-text4">Tidak Puas</div>
      <div id="emoji-text41">90%</div>
    </div>
  </div>
</div>
@endsection