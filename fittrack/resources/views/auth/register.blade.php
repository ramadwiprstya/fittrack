<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - FitTrack</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: #f5f5dc;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .food-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('{{ asset('images/fotobg.jpg') }}') center/cover;
            z-index: 1;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 2;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px 35px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            position: relative;
            z-index: 10;
            margin: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 35px;
        }

        .logo-image {
            height: 60px;
            width: auto;
        }

        .title {
            font-size: 32px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 35px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            color: #1f2937;
            font-weight: 500;
            font-size: 15px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #1f2937;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
            color: #1f2937;
        }

        .form-input:focus {
            outline: none;
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
            font-size: 16px;
        }

        .btn-register {
            width: 100%;
            padding: 16px;
            background: #16a34a;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 18px;
        }

        .btn-register:hover {
            background: #15803d;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(22, 163, 74, 0.3);
        }

        .login-link {
            text-align: center;
            color: #16a34a;
            font-weight: 500;
            font-size: 14px;
        }

        .login-link a {
            color: #16a34a;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 15px;
                padding: 30px 25px;
                max-width: 350px;
            }
            
            .logo-text {
                font-size: 24px;
            }
            
            .title {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                margin: 10px;
                padding: 25px 20px;
                max-width: 320px;
            }
        }
    </style>
</head>
<body>
    <div class="food-background"></div>
    <div class="overlay"></div>
    
    <div class="form-container">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="FitTrack Logo" class="logo-image">
        </div>

        <h1 class="title">Register Here</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="name" class="form-input" placeholder="Insert your username" value="{{ old('name') }}" required>
                @error('name')
                    <div style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-input" placeholder="Insert your email address" value="{{ old('email') }}" required>
                @error('email')
                    <div style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="password-container">
                    <input type="password" name="password" class="form-input" placeholder="Insert your password" required>
                    <span class="password-toggle" onclick="togglePassword()">👁️</span>
                </div>
                @error('password')
                    <div style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <div class="password-container">
                    <input type="password" name="password_confirmation" class="form-input" placeholder="Confirm your password" required>
                    <span class="password-toggle" onclick="togglePasswordConfirm()">👁️</span>
                </div>
            </div>

            <button type="submit" class="btn-register">
                Sign Up
            </button>
        </form>

        <div class="login-link">
            <a href="{{ route('login') }}">Already have an account?</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.querySelector('input[name="password"]');
            const toggleIcon = passwordInput.nextElementSibling;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }

        function togglePasswordConfirm() {
            const passwordInput = document.querySelector('input[name="password_confirmation"]');
            const toggleIcon = passwordInput.nextElementSibling;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }
    </script>
</body>
</html>