<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="shortcut icon" href="https://wisatabojonegoro.com/wp-content/uploads/2019/05/Logo-Kabupaten-Bojonegoro.png" />

</head>

<body>
  <div class="container-scroller">
    @include('template.navbar')
    <div class="container-fluid page-body-wrapper">
      @include('template.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <script src="{{ asset('js/settings.js') }}"></script>
</body>

</html>
