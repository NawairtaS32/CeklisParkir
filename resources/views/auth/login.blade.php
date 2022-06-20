<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css') }}"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css') }}">
    <link rel="stylesheet" href="{{asset('css/fontawesome/css/all.min.css') }}">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    {{--  font-awesome --}}
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.min.css') }}">

    <title>halaman login</title>
</head>

<body id="mainLogin">

<!-- login -->

<div class="card wrapper-login" id="auth">
    <div class="judul">
        <label class="text-center text-light">LOGIN</label>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="info">
            <span>
                Silakan login telebih dahulu sebelum memulai aplikasi
            </span>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan alamat Email Anda" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        Email tidak sesuai
                    </strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" id="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        password tidak sesuai
                    </strong>
                </span>
            @enderror
        </div>

        <div class="tombol">
            <button type="submit" class="btn btn-primary text-light font-weight-bold">Next </button>                
        </div>
    </form>

</div>

<!-- login end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('https://code.jquery.com/jquery-3.2.1.slim.min.js') }}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js') }}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>