<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What is your date of birth? - FitTrack</title>
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

        .date-picker-container {
            margin-bottom: 40px;
        }

        .date-picker {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
        }

        .date-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .date-label {
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .date-select {
            width: 100%;
            padding: 16px 12px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .date-select:focus {
            outline: none;
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }

        .date-select:hover {
            border-color: #22c55e;
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
        }

        .next-btn:hover {
            background: #16a34a;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.3);
        }

        .next-btn:disabled {
            background: #d1d5db;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        @media (max-width: 480px) {
            .onboarding-container {
                padding: 30px 20px;
                margin: 20px;
            }

            .title {
                font-size: 24px;
            }

            .date-picker {
                gap: 12px;
            }

            .date-select {
                padding: 14px 8px;
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

        <h1 class="title">What is your date of birth?</h1>

        <form method="POST" action="{{ route('onboarding.store-date-of-birth') }}">
            @csrf
            <div class="date-picker-container">
                <div class="date-picker">
                    <div class="date-column">
                        <div class="date-label">Month</div>
                        <select name="month" id="month" class="date-select" required>
                            <option value="">--</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="date-column">
                        <div class="date-label">Day</div>
                        <select name="day" id="day" class="date-select" required>
                            <option value="">--</option>
                        </select>
                    </div>
                    <div class="date-column">
                        <div class="date-label">Year</div>
                        <select name="year" id="year" class="date-select" required>
                            <option value="">--</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type="hidden" name="date_of_birth" id="date_of_birth" required>
            <button type="submit" class="next-btn" id="next-btn" disabled>Next</button>
        </form>
    </div>

    <script>
        const monthSelect = document.getElementById('month');
        const daySelect = document.getElementById('day');
        const yearSelect = document.getElementById('year');
        const dateOfBirthInput = document.getElementById('date_of_birth');
        const nextBtn = document.getElementById('next-btn');

        // Generate years (from 1900 to current year - 13)
        const currentYear = new Date().getFullYear();
        const minYear = currentYear - 100;
        const maxYear = currentYear - 13;

        for (let year = maxYear; year >= minYear; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }

        // Generate days based on selected month and year
        function generateDays() {
            const month = monthSelect.value;
            const year = yearSelect.value || new Date().getFullYear(); // Use current year as default
            
            // Clear existing options
            daySelect.innerHTML = '<option value="">--</option>';
            
            if (month) {
                const daysInMonth = new Date(year, month, 0).getDate();
                for (let day = 1; day <= daysInMonth; day++) {
                    const option = document.createElement('option');
                    option.value = day.toString().padStart(2, '0');
                    option.textContent = day.toString().padStart(2, '0');
                    daySelect.appendChild(option);
                }
            }
        }

        // Update date of birth and enable/disable next button
        function updateDateOfBirth() {
            const month = monthSelect.value;
            const day = daySelect.value;
            const year = yearSelect.value;
            
            if (month && day && year) {
                const dateString = `${year}-${month}-${day}`;
                dateOfBirthInput.value = dateString;
                nextBtn.disabled = false;
            } else {
                dateOfBirthInput.value = '';
                nextBtn.disabled = true;
            }
        }

        // Event listeners
        monthSelect.addEventListener('change', () => {
            generateDays();
            updateDateOfBirth();
        });

        yearSelect.addEventListener('change', () => {
            if (monthSelect.value) {
                generateDays();
            }
            updateDateOfBirth();
        });

        daySelect.addEventListener('change', updateDateOfBirth);
    </script>
</body>
</html>
