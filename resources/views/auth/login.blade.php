<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Signup</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>

  <div class="container">
    
    <div class="row justify-content-center align-items-center inner-row">
      <div class="col-md-6 gambar">
        <img src="https://cdn.discordapp.com/attachments/1163489620005224503/1168180643176386580/New_Project_1.png?ex=6550d401&is=653e5f01&hm=740830cbb0395f434228d073c49620ce789254aa40a6d22b39c70560d21a25ce&" alt="Deskripsi Gambar">
      </div>

        <div class="card text-center col-lg-5 col-md-7">
          <div class="card-header cardHeader">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link login-show active" href="#">Login</a>
              </li>
              <li class="nav-item">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/products') }}" class="nav-link signup-show">Products</a>
                        @else
                            <!-- <a href="{{ route('login') }}" class="nav-link signup-show">Log in</a> -->

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link signup-show">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <!-- <a class="nav-link signup-show" style="border: 1px solid white; border-radius: 0;" href="#">Sign Up</a> -->
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="form-box login-form p-md-5 p-5">
              <!-- <div class="form-title">
                <h2 class="fw-bold-mb-3">Login</h2>
              </div> -->
              <p class="lead">
                Sign in and savor the shopping experience with over 500 local and international brands
              </p>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-floating mb-3">
                    <div class="mt-4 field">
                        <x-input-label class="x-input-label" for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full x-text-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <div class="mt-4 field">
                        <x-input-label class="x-input-label" for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full x-text-input"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>  
                </div>

                <div>
                    <x-primary-button class="ml-3 loginButton">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

                <div class="row align-items-start forgetRemember">
                  <div class="col remember">
                    <label for="remember_me" class="inline-flex items-center">
                      <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                      <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                  </div>
                  <div class="col forget">
                    @if (Route::has('password.request'))
                        <a class="forgetPass" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                  </div>

                </div>

              </form>
            </div>
          </div>
        </div>

        
      <!-- </div> -->

    </div>
  </div>

<style>

    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    body {
    font-family: 'Roboto';
    background: white;
    }

    .card {
    /* border: 2px solid black; */
    padding: 0; 
    border: 0; 
    border-radius: 20px !important;
    background-color: #c8b8df;
    }

    .cardHeader {
      border-radius: 20px 20px 0 0  !important; 
      background-color: #3c0f83 !important;
    }

    .lead {
      color: #3c0f83 !important;
    }

    .inner-row {
    height: 100vh;
    }

    .primaryColor {
    color: rgb(19, 19, 19);
    }

    .registration-form {
    display: none;
    }

    .gambar img {
    max-width: 100%; 
    max-height: 100%; 
    width: 550px;
    height: auto; 
    }

    @media screen and (max-width: 991px) {
    .gambar img {
        display: none;
    }
    }

    .login-show.active  {
      color: black !important; /* Warna teks saat aktif (hitam) */
      background-color: #c8b8df !important;
      border: 1px solid #c8b8df !important; 
      border-radius: 20px 0 0 0 !important;
    }

    .login-show:not(.active) {
      color: black; /* Warna teks saat tidak aktif (putih) */
      background-color: white !important;  
    }

    .signup-show.active  {
      color: black; /* Warna teks saat aktif (hitam) */
      background-color: #c8b8df !important;
      border: 1px solid black !important; 
      border-radius: 20px 0 0 0 !important;
    }

    .signup-show:not(.active) {
      color: black; /* Warna teks saat tidak aktif (putih) */
      background-color: white !important;  
      border-radius: 0 20px 0 0 !important; */
    }

    .login-show:not(.active):hover {
    color: rgb(188, 188, 188) !important;
    }

    .signup-show:not(.active):hover {
    color: rgb(188, 188, 188) !important; 
    }

    .logoBg {
    background-color: #bbbbbb !important;
    }

    .lead {
    margin-bottom: 25px !important;
    font-size: 20px !important;
    color:#4f1d1d;
    }

    .x-input-label {
      width: 30% !important;
      text-align: left !important;
    }

    .loginButton {
      background-color: #3c0f83; 
      margin-top:20px; 
      width: 100%;
      border-radius: 10px !important;
    }

    .loginButton:hover {
      /* border: 2px solid black !important; */
      font-weight: bold;
    }

    .x-text-input {
      width: 60%;
      border-radius: 4px !important;
      padding: 2px 10px !important;
    }

    .field {
      width: 100%;
    }

    .forgetRemember {
      padding: 10px 0;
      color: #3c0f83;
    }

    .forgetPass {
      color: #3c0f83 !important;
    }

</style>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>