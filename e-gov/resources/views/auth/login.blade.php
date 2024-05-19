<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    @vite(['resources/css/app.css'])
</head>
<body>
<div id="loginMessage"></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex align-items-start justify-content-start">
        <a class="navbar-brand" href="#"><img style="height: 100px; width: 100px; margin-right: 20px;" src="{{ asset('images/naguilian.jpg') }}" alt="Your Logo"></a>
        <div style="text-align: left;">
            <h1 style="font-weight: bold; font-size: 24px; margin-top: 20px;" >Barangay Electronic Help Desk</h1>
            <h3 style="font-size: 14px; margin-top: 10px;" >Suguidan Norte, Naguilian, La Union, 2511</h3>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>



<br>
<br>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            <div class="text-center">
                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a>.</p>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/app.js'])

</body>
</html>
