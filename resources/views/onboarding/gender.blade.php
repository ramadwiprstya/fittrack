<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What is your gender? - FitTrack</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .onboarding-container {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
            border: 1px solid #f0f0f0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-image {
            height: 100px;
            width: auto;
        }

        .back-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f3f4f6;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .back-btn:hover {
            background: #e5e7eb;
            transform: scale(1.05);
        }

        .title {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 40px;
        }

        .gender-options {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 40px;
        }

        .gender-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .gender-option:hover {
            border-color: #22c55e;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.15);
        }

        .gender-option.selected {
            border-color: #22c55e;
            background: #f0fdf4;
        }

        .gender-text {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
        }

        .gender-icon {
            font-size: 24px;
            color: #6b7280;
        }

        .gender-option.selected .gender-icon {
            color: #22c55e;
        }

        .next-btn {
            width: 100%;
            padding: 16px 24px;
            background: #22c55e;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 0.5;
            pointer-events: none;
        }

        .next-btn.active {
            opacity: 1;
            pointer-events: all;
        }

        .next-btn:hover.active {
            background: #16a34a;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.3);
        }

        @media (max-width: 480px) {
            .onboarding-container {
                padding: 30px 20px;
                margin: 20px;
            }

            .title {
                font-size: 24px;
            }

            .gender-option {
                padding: 16px 20px;
            }

            .gender-text {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="onboarding-container">
        <div class="header">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="FitTrack Logo" class="logo-image">
            </div>
            <button class="back-btn" onclick="history.back()">
                <span>←</span>
            </button>
        </div>

        <h1 class="title">What is your gender?</h1>

        <form method="POST" action="{{ route('onboarding.store-gender') }}">
            @csrf
            <div class="gender-options">
                <div class="gender-option" data-gender="female">
                    <span class="gender-text">Female</span>
                    <span class="gender-icon">♀</span>
                </div>
                <div class="gender-option" data-gender="male">
                    <span class="gender-text">Male</span>
                    <span class="gender-icon">♂</span>
                </div>
                <div class="gender-option" data-gender="other">
                    <span class="gender-text">Other</span>
                    <span class="gender-icon">⚧</span>
                </div>
            </div>

            <input type="hidden" name="gender" id="selected-gender" required>
            <button type="submit" class="next-btn" id="next-btn">Next</button>
        </form>
    </div>

    <script>
        const genderOptions = document.querySelectorAll('.gender-option');
        const selectedGenderInput = document.getElementById('selected-gender');
        const nextBtn = document.getElementById('next-btn');

        genderOptions.forEach(option => {
            option.addEventListener('click', () => {
                // Remove selected class from all options
                genderOptions.forEach(opt => opt.classList.remove('selected'));
                
                // Add selected class to clicked option
                option.classList.add('selected');
                
                // Set the hidden input value
                selectedGenderInput.value = option.dataset.gender;
                
                // Enable next button
                nextBtn.classList.add('active');
            });
        });
    </script>
</body>
</html>
