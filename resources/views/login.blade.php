<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  <link rel="shortcut icon" href="https://wisatabojonegoro.com/wp-content/uploads/2019/05/Logo-Kabupaten-Bojonegoro.png" />
  <title>Dinas Sosial</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.6/dist/sweetalert2.min.css">
</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="/register" method="POST">
        @csrf
        <h1>Buat Akun</h1>
        <span>Admin Survey Kepuasan Masyarakat Dinas Sosial Kabupaten Bojonegoro</span>
        <img src="{{ asset('images/2.png') }}" style="width: 150px;">

        <input type="text" placeholder="Name" name="name" required/>
        <input type="email" placeholder="Email" name="email" required/>
        <input type="password" placeholder="Password" name="password" required />
        <button>Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form action="/login" method="POST">
        <img src="{{ asset('images/2.png') }}" style="width: 200px;">
        @csrf
        <span>Admin Survey Kepuasan Masyarakat Dinas Sosial Kabupaten Bojonegoro</span>
        <input type="email" placeholder="Email" name="email" required/>
        <input type="password" placeholder="Password" name="password" required/>
        <br>
        <button>Log In!</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <p>
            Sudah Punya Akun?
          </p>
          <button class="ghost" id="signIn">LOG IN!</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Belum Punya Akun?</h1>
          <p>Tekan tombol SIGN UP untuk membuat akun!</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const signUpButton = document.getElementById("signUp");
    const signInButton = document.getElementById("signIn");
    const container = document.getElementById("container");

    signUpButton.addEventListener("click", () => {
      container.classList.add("right-panel-active");
    });

    signInButton.addEventListener("click", () => {
      container.classList.remove("right-panel-active");
    });
  </script>

  @include('general.alert')
  
</body>
</html>
