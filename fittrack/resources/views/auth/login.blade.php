<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - FitTrack</title>
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
            display: flex;
            overflow: hidden;
        }

        .left-section {
            flex: 1;
            background: #f5f5dc;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .right-section {
            flex: 1;
            background: url('{{ asset("images/fotologin.jpg") }}') center/cover;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
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
            height: 150px;
            width: auto;
        }

        .title {
            font-size: 32px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 35px;
            text-align: center;
        }

        .success-message {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #bbf7d0;
            text-align: center;
            font-size: 14px;
            font-weight: 500;
        }

        .error-message {
            background: #fef2f2;
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #fecaca;
            text-align: center;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .error-icon {
            font-size: 16px;
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

        .form-input.error-input {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .form-input.error-input:focus {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.2);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 25px;
        }

        .forgot-password a {
            color: #16a34a;
            text-decoration: underline;
            font-weight: 500;
            font-size: 14px;
        }

        .btn-login {
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

        .btn-login:hover {
            background: #15803d;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(22, 163, 74, 0.3);
        }

        .register-link {
            text-align: center;
            color: #16a34a;
            font-weight: 500;
            font-size: 14px;
        }

        .register-link a {
            color: #16a34a;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .right-section {
                display: none;
            }
            
            .left-section {
                flex: 1;
            }
            
            .form-container {
                margin: 15px;
                padding: 30px 25px;
                max-width: 350px;
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
    <div class="left-section">
        <div class="form-container">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="FitTrack Logo" class="logo-image">
            </div>

            <h1 class="title">Login Here</h1>

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="error-message">
                    <span class="error-icon">⚠️</span>
                    <span>
                        @if($errors->has('password'))
                            {{ $errors->first('password') }}
                        @elseif($errors->has('email'))
                            {{ $errors->first('email') }}
                        @else
                            Terjadi kesalahan saat login. Silakan coba lagi.
                        @endif
                    </span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-input @error('email') error-input @enderror" placeholder="Insert your email address" value="{{ old('email') }}" required>
                    @error('email')
                        <div style="color: #dc2626; font-size: 12px; margin-top: 4px; display: flex; align-items: center; gap: 4px;">
                            <span>⚠️</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input @error('password') error-input @enderror" placeholder="Insert your password" required>
                    @error('password')
                        <div style="color: #dc2626; font-size: 12px; margin-top: 4px; display: flex; align-items: center; gap: 4px;">
                            <span>⚠️</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="forgot-password">
                    <a href="{{ route('forgot-password') }}">Forgot Password</a>
                </div>

                <button type="submit" class="btn-login">
                    Sign In
                </button>
            </form>

            <div class="register-link">
                <a href="{{ route('register') }}">Don't have any account yet?</a>
            </div>
        </div>
    </div>

    <div class="right-section">
        <div class="overlay"></div>
    </div>
</body>
</html>