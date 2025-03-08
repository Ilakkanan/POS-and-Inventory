<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="background-container">
        <div class="snow" id="snow"></div>
        <div class="bird" style="top: 20%;"></div>
        <div class="bird" style="top: 50%; animation-delay: 2s;"></div>
        <div class="bird" style="top: 70%; animation-delay: 4s;"></div>
    </div>
<div class="login-container">
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="error" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="error" />
                
                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                    </div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>{{ __('Remember me') }}</span>
            </div>

            <div class="submit-btn">
                <x-primary-button class="btn">{{ __('Log in') }}</x-primary-button>
            </div>
        </form>
        <footer>
            <p class="m-t-50">Powered By</p>
            <!-- <p class="m-t-10">CODE NODE (PVT) LTD</p> -->
            <img src="{{ asset('images/cn-logo-w.png') }}" alt="CN Logo" class="m-t-10">
        </footer>
</div>
    
    <style>
        .m-t-10{
            margin-top:1px;
        }
        .m-t-30{
            margin-top:30px;
        }
        .m-t-50{
            margin-top:50px;
        }
        footer{
            display:flex;
            font-size:12px;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        }
        footer img{
           height:50px
        }
        body {
            font-size:14px;
            color: #fff;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            background: #0a0a0a;
        }

        .login-container {
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 400px;
            z-index: 1000;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color:rgb(255, 255, 255);
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 98%;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 3px;
            border: 1px solid #333;
            background-color: #222;
            color: #fff;
            font-size: 14px;
            transition: all 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #1e90ff;
            box-shadow: 0 0 5px rgba(30, 144, 255, 0.8);
        }

        .error {
            color: #ff4d4d;
            font-size: 12px;
            margin-top: 4px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-top: 10px;
            color: #fff;
        }

        .remember-me input {
            margin-right: 10px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border-radius: 2px;
            background-color: #1e90ff;
            border: none;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            margin-top:10px;
        }

        .btn:hover {
            background-color: #378eff;
        }

        .forgot-password {
            text-align: left;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #1e90ff;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 20px;
            }
        }
        .background-container {
            position: absolute;
            width: 100%;
            height: 100%;
            background:#0x7192f;
            overflow: hidden;
        }

        .snow {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .snowflake {
            position: absolute;
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: fall linear infinite;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh);
                opacity: 0;
            }
        }

        /* Bird animation */
        .bird {
            position: absolute;
            width: 50px;
            height: 50px;
            background: url('https://i.imgur.com/O2aZzZB.png') no-repeat center;
            background-size: contain;
            animation: fly 10s linear infinite;
            filter: brightness(0.8);
        }

        @keyframes fly {
            0% {
                transform: translateX(-100px) translateY(50px);
            }
            50% {
                transform: translateX(100vw) translateY(100px);
            }
            100% {
                transform: translateX(100vw) translateY(50px);
            }
        }

        .main-container {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
    <script>
        // Generate snowfall
        function createSnowflakes() {
            const snowContainer = document.getElementById('snow');
            for (let i = 0; i < 50; i++) {
                let snowflake = document.createElement('div');
                snowflake.className = 'snowflake';
                snowflake.style.left = Math.random() * 100 + 'vw';
                snowflake.style.animationDuration = (Math.random() * 3 + 2) + 's';
                snowflake.style.animationDelay = Math.random() * 5 + 's';
                snowContainer.appendChild(snowflake);
            }
        }
        createSnowflakes();
    </script>
</body>
</html>