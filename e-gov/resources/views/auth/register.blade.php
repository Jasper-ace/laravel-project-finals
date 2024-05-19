<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Include Bootstrap CSS -->
    @vite(['resources/css/app.css'])
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
    <!-- Include Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .password-container {
            position: relative;
        }
        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group password-container">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            <i class="fas fa-eye toggle-password" data-target="#password" onclick="togglePasswordVisibility(this)"></i>
                        </div>
                        
                        <div class="form-group password-container">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            <i class="fas fa-eye toggle-password" data-target="#password_confirmation" onclick="togglePasswordVisibility(this)"></i>
                            
                        </div>
                        <div id="passwordMatchMessage" style="color: red;"></div>
                        <br>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            <div class="text-center">
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a>.</p>
            </div>
        </div>
    </div>
</div>

<!-- Include Font Awesome JS for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
    function togglePasswordVisibility(element) {
        const target = document.querySelector(element.getAttribute('data-target'));
        const type = target.getAttribute('type') === 'password' ? 'text' : 'password';
        target.setAttribute('type', type);
        element.classList.toggle('fa-eye');
        element.classList.toggle('fa-eye-slash');
    }
</script>
@vite(['resources/js/app.js'])
</body>
</html>
