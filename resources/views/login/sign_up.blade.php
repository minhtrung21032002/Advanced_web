<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login/sign_up.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/My_Fitness_Pal_Clone//Youraccountinformation/youraccount.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/My_Fitness_Pal_Clone/Youraccountinformation/youraccount.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="header">

            <div class="content">
                
                <h3>Create Your Free Account-Step 1 of 2</h3>
            </div>

            <div class="underline"></div>
        </div>

        <div class="main">
            <div class="content">
                <h1>Your Account information</h1>
                <form action="{{ route ('creating_account')}}" method ="POST" id="form">
                    @csrf
                    <label for="email">Email Address</label>
                    <input type="text" placeholder="Enter Your Email" name="email"> <br>
                    <p id="emailError" class="error" style="color: red; font-size: 14px; font-weight: bold; display: none;"></p>
                
                    <label for="password" class="pass">Password</label>
                    <input type="password" placeholder="Enter Your Password" name="password">
                    <label>6-255 characters, no space</label><br>
                    <p id="passwordError" class="error" style="color: red; font-size: 14px; font-weight: bold; display: none;"></p>
                
                    <button type="submit"><a style="text-decoration: none;">Continue</a></button> <br>
                    <br>
                
                    <div id="errorContainer"></div>
                </form>
            </div>

            <div class="content_end">
                <a href="{{route('login')}}"><i class="fa fa-play"></i> Click here to log in.</a> <br>
            </div>
        </div>
    </div>

    
</body>

<script>
    document.getElementById('form').addEventListener('submit', function(event) {
        var email = document.getElementsByName('email')[0].value;
        var password = document.getElementsByName('password')[0].value;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Check if email is empty or does not match the email format
        if (email.trim() === '') {
            document.getElementById('emailError').innerText = 'Please enter your email address.';
            document.getElementById('emailError').style.display = 'block';
            event.preventDefault();
            return;
        } else if (!emailRegex.test(email)) {
            document.getElementById('emailError').innerText = 'Please enter a valid email address.';
            document.getElementById('emailError').style.display = 'block';
            event.preventDefault();
            return;
        } else {
            document.getElementById('emailError').style.display = 'none';
        }

        // Check if password is empty or less than 6 characters
        if (password.trim() === '') {
            document.getElementById('passwordError').innerText = 'Please enter your password.';
            document.getElementById('passwordError').style.display = 'block';
            event.preventDefault();
            return;
        } else if (password.length < 6) {
            document.getElementById('passwordError').innerText = 'Password must be at least 6 characters long.';
            document.getElementById('passwordError').style.display = 'block';
            event.preventDefault();
            return;
        } else {
            document.getElementById('passwordError').style.display = 'none';
        }
    });
</script>
</html>