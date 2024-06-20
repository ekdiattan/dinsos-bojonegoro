<!DOCTYPE html>
<html lang="en">
    <head>
        @include('templatepublic.head')
    </head>
  <body>
    @include('templatepublic.navbar')
    @yield('contents')
    @include('templatepublic.footer')
  </body>
</html>
