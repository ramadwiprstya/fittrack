<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - FitTrack</title>
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

        .password-strength {
            margin-top: 8px;
            font-size: 12px;
        }

        .strength-weak {
            color: #dc2626;
        }

        .strength-medium {
            color: #f59e0b;
        }

        .strength-strong {
            color: #16a34a;
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

        .password-requirements {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .password-requirements .req-title {
            color: #374151;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .password-requirements .req-list {
            list-style: none;
            padding: 0;
        }

        .password-requirements .req-item {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .req-item.valid {
            color: #16a34a;
        }

        .req-item.invalid {
            color: #dc2626;
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

            <h1 class="title">Reset Password</h1>
            <p class="subtitle">Masukkan password baru untuk akun <strong>{{ $email }}</strong></p>

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

            <div class="password-requirements">
                <div class="req-title">Password harus memenuhi kriteria berikut:</div>
                <ul class="req-list">
                    <li class="req-item" id="req-length">
                        <span>•</span>
                        <span>Minimal 8 karakter</span>
                    </li>
                    <li class="req-item" id="req-match">
                        <span>•</span>
                        <span>Konfirmasi password harus sama</span>
                    </li>
                </ul>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                
                <div class="form-group">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="password" id="password" 
                           class="form-input @error('password') error-input @enderror" 
                           placeholder="Masukkan password baru" required>
                    @error('password')
                        <div style="color: #dc2626; font-size: 12px; margin-top: 4px; display: flex; align-items: center; gap: 4px;">
                            <span>⚠️</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                    <div class="password-strength" id="password-strength"></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                           class="form-input @error('password_confirmation') error-input @enderror" 
                           placeholder="Konfirmasi password baru" required>
                    @error('password_confirmation')
                        <div style="color: #dc2626; font-size: 12px; margin-top: 4px; display: flex; align-items: center; gap: 4px;">
                            <span>⚠️</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn-submit" id="submit-btn">
                    Reset Password
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');
            const submitBtn = document.getElementById('submit-btn');
            const reqLength = document.getElementById('req-length');
            const reqMatch = document.getElementById('req-match');
            const strengthDiv = document.getElementById('password-strength');

            function checkPasswordStrength(password) {
                let strength = 0;
                let strengthText = '';
                let strengthClass = '';

                if (password.length >= 8) strength++;
                if (password.match(/[a-z]/)) strength++;
                if (password.match(/[A-Z]/)) strength++;
                if (password.match(/[0-9]/)) strength++;
                if (password.match(/[^a-zA-Z0-9]/)) strength++;

                if (strength < 2) {
                    strengthText = 'Lemah';
                    strengthClass = 'strength-weak';
                } else if (strength < 4) {
                    strengthText = 'Sedang';
                    strengthClass = 'strength-medium';
                } else {
                    strengthText = 'Kuat';
                    strengthClass = 'strength-strong';
                }

                return { text: strengthText, class: strengthClass };
            }

            function updateRequirements() {
                const password = passwordInput.value;
                const confirm = confirmInput.value;

                // Check length
                if (password.length >= 8) {
                    reqLength.classList.add('valid');
                    reqLength.classList.remove('invalid');
                } else {
                    reqLength.classList.add('invalid');
                    reqLength.classList.remove('valid');
                }

                // Check match
                if (confirm && password === confirm) {
                    reqMatch.classList.add('valid');
                    reqMatch.classList.remove('invalid');
                } else if (confirm) {
                    reqMatch.classList.add('invalid');
                    reqMatch.classList.remove('valid');
                } else {
                    reqMatch.classList.remove('valid', 'invalid');
                }

                // Update strength
                if (password) {
                    const strength = checkPasswordStrength(password);
                    strengthDiv.innerHTML = `Kekuatan password: <span class="${strength.class}">${strength.text}</span>`;
                } else {
                    strengthDiv.innerHTML = '';
                }

                // Enable/disable submit button
                const isValid = password.length >= 8 && password === confirm;
                submitBtn.disabled = !isValid;
            }

            passwordInput.addEventListener('input', updateRequirements);
            confirmInput.addEventListener('input', updateRequirements);

            // Initial check
            updateRequirements();
        });
    </script>
</body>
</html>
