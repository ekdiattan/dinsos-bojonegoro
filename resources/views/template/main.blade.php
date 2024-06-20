<!DOCTYPE html>
<html lang="en">

<head>

  @include('template.head')

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
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  @include('general.alert')
  
</body>

</html>

