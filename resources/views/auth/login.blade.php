<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Signup</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body style="background: rgb(250, 190, 120);">

  <div class="container">
    
    <div class="row justify-content-center align-items-center inner-row">
      <div class="col-md-5 gambar">
        <img src="https://cdn.discordapp.com/attachments/1163489620005224503/1163492192267026624/shopping2_generated.jpg?ex=653fc58b&is=652d508b&hm=584eeedf71a9afeed31eae89649bdb4c036c2e087f416f6d31d6fed0e23cfc19&" alt="Deskripsi Gambar">
      </div>

        <div class="card text-center col-lg-5 col-md-7" style="padding: 0; border: 0; border-radius: 0;">
          <div class="card-header cardHeader" style="border-radius: 0; background-color: #9a4444;">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link login-show active" style="border: 1px solid white; border-radius: 0;" href="#">Login</a>
              </li>
              <li class="nav-item">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link signup-show">Dashboard</a>
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
                    <div class="mt-4"  style="width: 100%">
                        <x-input-label style="width: 40%" for="email" :value="__('Email')" />
                        <x-text-input style="width: 50%" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <div class="mt-4" style="width: 100%">
                        <x-input-label style="width: 40%" for="password" :value="__('Password')" />

                        <x-text-input style="width: 50%" id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>  
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div>
                    <x-primary-button class="ml-3" style="background-color: #9a4444; margin-top:20px; width: 100%;">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
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
    }

    .card {
    border: 2px solid black;
    }

    .inner-row {
    height: 100vh;
    }

    .primaryBg {
    margin-top: 20px !important;
    background-color: #9a4444 !important;
    /* border-radius: 0 !important; */
    font-size: 17px !important;
    width: 100%;
    }

    .primaryColor {
    color: rgb(19, 19, 19);
    }

    .signupBtn {
    background: #183;
    }

    .registration-form {
    display: none;
    }

    .gambar img {
    max-width: 100%; 
    max-height: 100%; 
    width: auto;
    height: auto; 
    }

    @media screen and (max-width: 768px) {
    .gambar img {
        display: none;
    }
    }

    .login-show.active  {
    color: black; /* Warna teks saat aktif (hitam) */
    background-color: white;
    }

    .login-show:not(.active) {
    color: white; /* Warna teks saat tidak aktif (putih) */
    background-color: #4f1d1d !important;  
    }

    .signup-show.active  {
    color: black; /* Warna teks saat aktif (hitam) */
    /* background-color: white; */
    }

    .signup-show:not(.active) {
    color: white; /* Warna teks saat tidak aktif (putih) */
    background-color: #4f1d1d !important;  
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

</style>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>