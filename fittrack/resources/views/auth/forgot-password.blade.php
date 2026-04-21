<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - FitTrack</title>
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
            background: url('{{ asset("images/fotobg.jpg") }}') center/cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .left-section {
            width: 100%;
            max-width: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .right-section {
            display: none;
        }

        .overlay {
            display: none;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 50px 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 10;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 35px;
        }

        .logo-image {
            height: 120px;
            width: auto;
        }

        .title {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 15px;
            text-align: center;
        }

        .subtitle {
            font-size: 16px;
            color: #6b7280;
            margin-bottom: 35px;
            text-align: center;
            line-height: 1.5;
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
            border: 1px solid #d1d5db;
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

        .btn-submit {
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

        .btn-submit:hover {
            background: #15803d;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(22, 163, 74, 0.3);
        }

        .btn-submit:disabled {
            background: #9ca3af;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .back-to-login {
            text-align: center;
            color: #6b7280;
            font-weight: 500;
            font-size: 14px;
        }

        .back-to-login a {
            color: #16a34a;
            text-decoration: none;
            font-weight: 600;
        }

        .back-to-login a:hover {
            text-decoration: underline;
        }


        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            
            .form-container {
                padding: 40px 30px;
                max-width: 100%;
            }
            
            .title {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .form-container {
                padding: 30px 20px;
                max-width: 100%;
            }
            
            .title {
                font-size: 22px;
            }
            
            .subtitle {
                font-size: 14px;
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

            <h1 class="title">Lupa Password?</h1>
            <p class="subtitle">Masukkan email Anda dan kami akan mengirimkan link untuk reset password</p>

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="error-message">
                    <span class="error-icon">⚠️</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif


            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-input @error('email') error-input @enderror" 
                           placeholder="Masukkan email yang terdaftar" value="{{ old('email') }}" required>
                    @error('email')
                        <div style="color: #dc2626; font-size: 12px; margin-top: 4px; display: flex; align-items: center; gap: 4px;">
                            <span>⚠️</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">
                    Kirim Link Reset Password
                </button>
            </form>

            <div class="back-to-login">
                <a href="{{ route('login') }}">← Kembali ke Login</a>
            </div>
        </div>
    </div>

    <div class="right-section">
        <div class="overlay"></div>
    </div>
</body>
</html>
