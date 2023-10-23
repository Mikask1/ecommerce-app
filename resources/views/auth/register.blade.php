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
<body>

  <div class="container">
    
    <div class="row justify-content-center align-items-center inner-row">
      <div class="col-md-5 gambar">
        <img src="https://cdn.discordapp.com/attachments/1163489620005224503/1163492192267026624/shopping2_generated.jpg?ex=653fc58b&is=652d508b&hm=584eeedf71a9afeed31eae89649bdb4c036c2e087f416f6d31d6fed0e23cfc19&" alt="Deskripsi Gambar">
      </div>

        <div class="card text-center col-lg-5 col-md-7">
          <div class="card-header cardHeader">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link login-show">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link login-show">Log in</a>
                        @endauth
                    </div>
                @endif
              </li>
              <li class="nav-item">
                <a class="nav-link signup-show active" href="#">Sign Up</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
    
            <div class="form-box registration-form p-md-5 p-5">
              <!-- <div class="form-title">
                <h2 class="fw-bold-mb-3">Create your account</h2>
              </div> -->
              <p class="lead">
                Register to your first account
              </p>
              <form method="POST" action="{{ route('register') }}">
                @csrf
              
                <div class="form-floating mb-3">
                    <div class="mt-4 field">
                        <x-input-label class="x-input-label" for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full x-text-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <div class="mt-4 field">
                        <x-input-label class="x-input-label" for="email" :value="__('Email')" />
                        <x-text-input  id="email" class="block mt-1 w-full x-text-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <div class="mt-4 field">
                        <x-input-label class="x-input-label" for="phone_number" :value="__('Phone Number')" />
                        <x-text-input id="phone_number" class="block mt-1 w-full x-text-input" type="text" name="phone_number" :value="old('phone_number')" required autocomplete="tel" />
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <div class="mt-4 field">
                        <x-input-label class="x-input-label" for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full x-text-input"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <div class="mt-4 field">
                        <x-input-label class="x-input-label" for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full x-text-input"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4 registerButton">
                        {{ __('Register') }}
                    </x-primary-button>
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
    background: rgb(250, 190, 120);
    }

    .card {
    /* border: 2px solid black; */
    padding: 0; 
    border: 0; 
    border-radius: 20px !important;
    }

    .cardHeader {
      border-radius: 20px 20px 0 0  !important; 
      background-color: #9a4444;
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

    .login-form {
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
    border-radius: 20px 0 0 0 !important;
    }

    .signup-show.active  {
    color: black; /* Warna teks saat aktif (hitam) */
    /* background-color: white; */
    background-color: white;
    border: 1px solid white; 
    border-radius: 0 20px 0 0 !important;
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

    .x-input-label {
      width: 40% !important;
      text-align: left !important;
    }

    .registerButton {
      background-color: #9a4444; 
      margin-top:20px; 
      width: 100%;
      border-radius: 10px !important;
    }

    .registerButton:hover {
      /* border: 2px solid black !important; */
      font-weight: bold;
    }

    .x-text-input {
      width: 50%;
      border-radius: 10px !important;
      padding: 2px 10px !important;
    }

    .field {
      width: 100%;
    }

</style>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- <script>
  $('.signup-show').click(function() {
    $('.registration-form').show();
    $('.login-form').hide();
    $('.signup-show').addClass('active');
    $('.login-show').removeClass('active');
  });

  $('.login-show').click(function() {
    $('.login-form').show();
    $('.registration-form').hide();
    $('.login-show').addClass('active');
    $('.signup-show').removeClass('active');
  });
</script> -->

</body>

</html>