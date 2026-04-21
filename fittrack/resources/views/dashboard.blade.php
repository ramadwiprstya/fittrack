<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - FitTrack</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f5f5;
            color: #1a1a1a;
            min-height: 100vh;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #22c55e;
            padding: 32px 24px;
            border-radius: 0 0 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }

        .logo-image {
            height: 120px;
            width: auto;
            filter: brightness(0) invert(1);
        }

        .nav-menu {
            list-style: none;
            margin-bottom: 40px;
        }

        .nav-item {
            margin-bottom: 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 16px;
            position: relative;
        }

        .nav-link.active {
            background: white;
            color: #22c55e;
            font-weight: 600;
        }

        .nav-link:hover:not(.active) {
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-icon {
            margin-right: 12px;
            font-size: 18px;
            width: 24px;
            text-align: center;
        }


        /* Main Content */
        .main-content {
            flex: 1;
            padding: 32px;
            margin-left: 280px;
            min-height: 100vh;
            overflow-y: auto;
            background: #f5f5f5;
            position: relative;
        }

        .main-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="15" fill="%23ff6b6b" opacity="0.1"/><circle cx="80" cy="30" r="12" fill="%234ecdc4" opacity="0.1"/><circle cx="30" cy="70" r="18" fill="%2345b7d1" opacity="0.1"/><circle cx="70" cy="80" r="10" fill="%2396ceb4" opacity="0.1"/></svg>');
            background-size: 200px 200px;
            background-repeat: repeat;
            z-index: -1;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .header h1 {
            font-size: 32px;
            font-weight: 700;
            color: #22c55e;
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        .header-icon {
            width: 40px;
            height: 40px;
            background: #22c55e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .header-icon:hover {
            background: #16a34a;
            transform: scale(1.05);
        }


        .week-selector {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        .day-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            background: white;
            color: #666;
            border: 2px solid transparent;
            position: relative;
        }

        .day-letter {
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
        }

        .day-number {
            font-size: 10px;
            font-weight: 500;
            line-height: 1;
            margin-top: 2px;
        }

        .day-circle.active {
            background: #22c55e;
            color: white;
            border-color: #22c55e;
        }

        .day-circle:hover:not(.active) {
            background: #f0f0f0;
            transform: scale(1.05);
        }

        .calories-section {
            background: white;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 1;
        }

        .calories-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 16px;
        }

        .calories-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .calories-label {
            color: #666;
            font-size: 14px;
        }

        .calories-value {
            font-size: 18px;
            font-weight: 700;
            color: #22c55e;
        }

        .calories-value.negative {
            color: #ef4444;
        }

        .calories-value.positive {
            color: #22c55e;
        }

        .calories-value.neutral {
            color: #6b7280;
        }

        .meal-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }

        .meal-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 1;
            transition: all 0.2s ease;
        }

        .meal-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .meal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .meal-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .meal-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .meal-icon.breakfast {
            background: #fef3c7;
            color: #f59e0b;
        }

        .meal-icon.lunch {
            background: #dbeafe;
            color: #3b82f6;
        }

        .meal-icon.dinner {
            background: #fed7aa;
            color: #ea580c;
        }

        .meal-icon.snack {
            background: #e9d5ff;
            color: #8b5cf6;
        }

        .meal-name {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        .meal-add-btn {
            width: 32px;
            height: 32px;
            background: #22c55e;
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .meal-add-btn:hover {
            background: #16a34a;
            transform: scale(1.1);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
            margin-bottom: 32px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
            text-align: center;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 20px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 14px;
            color: #6b7280;
            font-weight: 500;
        }

        .recent-activities {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
            margin-bottom: 32px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            font-size: 16px;
            background: #f8f9fa;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 500;
            margin-bottom: 4px;
            color: #1a1a1a;
        }

        .activity-time {
            font-size: 13px;
            color: #6b7280;
        }

        .weekly-summary {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
            margin-bottom: 32px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .summary-item {
            text-align: center;
            padding: 16px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .summary-day {
            font-size: 12px;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .summary-calories {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
        }

        .chart-card, .food-card, .summary-card, .goal-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            color: #1a1a1a;
        }

        .chart-container {
            height: 300px;
            position: relative;
        }

        .chart-bars {
            display: flex;
            align-items: end;
            height: 200px;
            gap: 20px;
            margin-bottom: 20px;
        }

        .bar-group {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .bars {
            display: flex;
            gap: 4px;
            align-items: end;
            height: 160px;
            margin-bottom: 12px;
        }

        .bar {
            width: 20px;
            border-radius: 4px 4px 0 0;
            transition: all 0.2s ease;
        }

        .bar:hover {
            opacity: 0.8;
        }

        .bar-consumed {
            background: #1a1a1a;
        }

        .bar-target {
            background: #e5e7eb;
        }

        .bar-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 500;
        }

        .chart-legend {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
        }

        .legend-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .legend-consumed {
            background: #667eea;
        }

        .legend-target {
            background: rgba(102, 126, 234, 0.3);
        }

        .food-list {
            list-style: none;
        }

        .food-item {
            display: flex;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.2s ease;
        }

        .food-item:hover {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 16px 12px;
        }

        .food-item:last-child {
            border-bottom: none;
        }

        .food-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            font-size: 18px;
            background: #f8f9fa;
        }

        .food-info {
            flex: 1;
        }

        .food-name {
            font-weight: 500;
            margin-bottom: 4px;
            font-size: 15px;
            color: #1a1a1a;
        }

        .food-time {
            font-size: 13px;
            color: #6b7280;
        }

        .food-calories {
            color: #1a1a1a;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 15px;
        }

        .food-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-top: 2px solid #f1f3f4;
            font-weight: 600;
            margin-top: 10px;
        }

        .nutrients-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }

        .nutrient-card {
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .nutrient-card:hover {
            transform: translateY(-2px);
        }

        .nutrient-calories {
            background: #fef2f2;
            border: 1px solid #fecaca;
        }

        .nutrient-protein {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
        }

        .nutrient-carbs {
            background: #fffbeb;
            border: 1px solid #fed7aa;
        }

        .nutrient-fat {
            background: #f3e8ff;
            border: 1px solid #d8b4fe;
        }

        .nutrient-value {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 6px;
            color: #1a1a1a;
        }

        .nutrient-label {
            font-size: 12px;
            font-weight: 500;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nutrient-icon {
            position: absolute;
            top: 12px;
            right: 12px;
            font-size: 16px;
            opacity: 0.6;
        }

        .goal-progress {
            text-align: center;
        }

        .goal-percentage {
            font-size: 32px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 12px;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #f0f0f0;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 12px;
        }

        .progress-fill {
            height: 100%;
            background: #1a1a1a;
            border-radius: 4px;
            transition: width 0.3s ease;
        }

        .goal-text {
            color: #6b7280;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-weight: 500;
        }

        .logout-btn {
            width: 100%;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 14px 16px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-1px);
        }

        /* Food Intake Section */
        .food-intake-section {
            background: white;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 32px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 1;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 24px;
            text-align: center;
        }

        .meal-section {
            margin-bottom: 24px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        .meal-section:last-child {
            margin-bottom: 0;
        }

        .meal-section .meal-header {
            background: #f9fafb;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .meal-section .meal-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .meal-section .meal-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .meal-section .meal-name {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        .meal-total {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .calories-count {
            font-size: 18px;
            font-weight: 700;
            color: #22c55e;
        }

        .calories-unit {
            font-size: 14px;
            color: #666;
        }

        .food-items {
            padding: 16px 20px;
        }

        .food-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .food-item:last-child {
            border-bottom: none;
        }

        .food-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .food-name {
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }

        .food-quantity {
            font-size: 12px;
            color: #666;
        }

        .food-nutrition {
            display: flex;
            align-items: center;
        }

        .food-nutrition .calories {
            font-size: 14px;
            font-weight: 600;
            color: #22c55e;
        }

        .no-food {
            text-align: center;
            color: #9ca3af;
            font-style: italic;
            padding: 20px 0;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 20px;
                order: 2;
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .nutrients-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .summary-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .chart-bars {
                height: 200px;
            }
            
            .bar {
                width: 8px;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .nutrients-grid {
                grid-template-columns: 1fr;
            }
            
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .main-content {
                padding: 16px;
            }
            
            .sidebar {
                padding: 16px;
            }
            
            .logout-btn {
                margin-top: 16px;
                padding: 10px 12px;
                font-size: 13px;
            }

        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="FitTrack Logo" class="logo-image">
            </div>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <span class="nav-icon">📝</span>
                        Diary
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('settings.index') }}" class="nav-link">
                        <span class="nav-icon">👤</span>
                        Me
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('report.index') }}" class="nav-link">
                        <span class="nav-icon">📊</span>
                        Reports
                    </a>
                </li>
            </ul>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" style="display: block;">
                @csrf
                <button type="submit" class="logout-btn">
                    <span>🚪</span>
                    Keluar
                </button>
            </form>

        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Today</h1>
            </div>


            <div class="week-selector">
                @php
                    $today = now();
                    $startOfWeek = $today->copy()->startOfWeek();
                    $days = ['M', 'T', 'W', 'T', 'F', 'S', 'S'];
                    $dayNames = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                @endphp
                @for($i = 0; $i < 7; $i++)
                    @php
                        $currentDay = $startOfWeek->copy()->addDays($i);
                        $isToday = $currentDay->isToday();
                        $dayNumber = $currentDay->day;
                    @endphp
                    <div class="day-circle {{ $isToday ? 'active' : '' }}" 
                         data-date="{{ $currentDay->format('Y-m-d') }}"
                         title="{{ $dayNames[$i] }} {{ $dayNumber }}">
                        <div class="day-letter">{{ $days[$i] }}</div>
                        <div class="day-number">{{ $dayNumber }}</div>
                    </div>
                @endfor
            </div>

            <div class="calories-section">
                <div class="calories-title">Calories Overview</div>
                <div class="calories-row">
                    <span class="calories-label">Calories Goals</span>
                    <span class="calories-value neutral">{{ $todayGoal->calories_goal ?? 2000 }}</span>
                </div>
                <div class="calories-row">
                    <span class="calories-label">Calories Today</span>
                    <span class="calories-value positive">{{ $todayTotals['calories'] }}</span>
                </div>
                <div class="calories-row">
                    <span class="calories-label">Calories Remaining</span>
                    @php
                        $remaining = ($todayGoal->calories_goal ?? 2000) - $todayTotals['calories'];
                        $remainingClass = $remaining > 0 ? 'positive' : ($remaining < 0 ? 'negative' : 'neutral');
                    @endphp
                    <span class="calories-value {{ $remainingClass }}">{{ $remaining }}</span>
                </div>
            </div>

            <div class="meal-cards">
                <div class="meal-card">
                    <div class="meal-header">
                        <div class="meal-info">
                            <div class="meal-icon breakfast">🌅</div>
                            <div class="meal-name">Breakfast</div>
                        </div>
                        <button class="meal-add-btn" onclick="openFoodModal('Breakfast')">+</button>
                    </div>
                </div>

                <div class="meal-card">
                    <div class="meal-header">
                        <div class="meal-info">
                            <div class="meal-icon lunch">☀️</div>
                            <div class="meal-name">Lunch</div>
                        </div>
                        <button class="meal-add-btn" onclick="openFoodModal('Lunch')">+</button>
                    </div>
                </div>

                <div class="meal-card">
                    <div class="meal-header">
                        <div class="meal-info">
                            <div class="meal-icon dinner">🌆</div>
                            <div class="meal-name">Dinner</div>
                        </div>
                        <button class="meal-add-btn" onclick="openFoodModal('Dinner')">+</button>
                    </div>
                </div>

                <div class="meal-card">
                    <div class="meal-header">
                        <div class="meal-info">
                            <div class="meal-icon snack">🌙</div>
                            <div class="meal-name">Snack/Other</div>
                        </div>
                        <button class="meal-add-btn" onclick="openFoodModal('Snack/Other')">+</button>
                    </div>
                </div>
            </div>

            <!-- Today's Food Intake Section -->
            <div class="food-intake-section">
                <h3 class="section-title">Asupan Makanan Hari Ini</h3>
                
                <!-- Breakfast -->
                <div class="meal-section">
                    <div class="meal-header">
                        <div class="meal-info">
                            <div class="meal-icon breakfast">🌅</div>
                            <div class="meal-name">Breakfast</div>
                        </div>
                        <div class="meal-total">
                            <span class="calories-count">{{ $todayEntries->where('meal_type', 'Breakfast')->sum('calories') }}</span>
                            <span class="calories-unit">kcal</span>
                        </div>
                    </div>
                    <div class="food-items">
                        @forelse($todayEntries->where('meal_type', 'Breakfast') as $entry)
                            <div class="food-item">
                                <div class="food-info">
                                    <span class="food-name">{{ $entry->food->name }}</span>
                                    <span class="food-quantity">{{ $entry->quantity }} {{ $entry->unit }}</span>
                                </div>
                                <div class="food-nutrition">
                                    <span class="calories">{{ $entry->calories }} kcal</span>
                                </div>
                            </div>
                        @empty
                            <div class="no-food">Belum ada makanan</div>
                        @endforelse
                    </div>
                </div>

                <!-- Lunch -->
                <div class="meal-section">
                    <div class="meal-header">
                        <div class="meal-info">
                            <div class="meal-icon lunch">☀️</div>
                            <div class="meal-name">Lunch</div>
                        </div>
                        <div class="meal-total">
                            <span class="calories-count">{{ $todayEntries->where('meal_type', 'Lunch')->sum('calories') }}</span>
                            <span class="calories-unit">kcal</span>
                        </div>
                    </div>
                    <div class="food-items">
                        @forelse($todayEntries->where('meal_type', 'Lunch') as $entry)
                            <div class="food-item">
                                <div class="food-info">
                                    <span class="food-name">{{ $entry->food->name }}</span>
                                    <span class="food-quantity">{{ $entry->quantity }} {{ $entry->unit }}</span>
                                </div>
                                <div class="food-nutrition">
                                    <span class="calories">{{ $entry->calories }} kcal</span>
                                </div>
                            </div>
                        @empty
                            <div class="no-food">Belum ada makanan</div>
                        @endforelse
                    </div>
                </div>

                <!-- Dinner -->
                <div class="meal-section">
                    <div class="meal-header">
                        <div class="meal-info">
                            <div class="meal-icon dinner">🌆</div>
                            <div class="meal-name">Dinner</div>
                        </div>
                        <div class="meal-total">
                            <span class="calories-count">{{ $todayEntries->where('meal_type', 'Dinner')->sum('calories') }}</span>
                            <span class="calories-unit">kcal</span>
                        </div>
                    </div>
                    <div class="food-items">
                        @forelse($todayEntries->where('meal_type', 'Dinner') as $entry)
                            <div class="food-item">
                                <div class="food-info">
                                    <span class="food-name">{{ $entry->food->name }}</span>
                                    <span class="food-quantity">{{ $entry->quantity }} {{ $entry->unit }}</span>
                                </div>
                                <div class="food-nutrition">
                                    <span class="calories">{{ $entry->calories }} kcal</span>
                                </div>
                            </div>
                        @empty
                            <div class="no-food">Belum ada makanan</div>
                        @endforelse
                    </div>
                </div>

                <!-- Snack/Other -->
                <div class="meal-section">
                    <div class="meal-header">
                        <div class="meal-info">
                            <div class="meal-icon snack">🌙</div>
                            <div class="meal-name">Snack/Other</div>
                        </div>
                        <div class="meal-total">
                            <span class="calories-count">{{ $todayEntries->where('meal_type', 'Snack/Other')->sum('calories') }}</span>
                            <span class="calories-unit">kcal</span>
                        </div>
                    </div>
                    <div class="food-items">
                        @forelse($todayEntries->where('meal_type', 'Snack/Other') as $entry)
                            <div class="food-item">
                                <div class="food-info">
                                    <span class="food-name">{{ $entry->food->name }}</span>
                                    <span class="food-quantity">{{ $entry->quantity }} {{ $entry->unit }}</span>
                                </div>
                                <div class="food-nutrition">
                                    <span class="calories">{{ $entry->calories }} kcal</span>
                                </div>
                            </div>
                        @empty
                            <div class="no-food">Belum ada makanan</div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Real-time date update
        function updateDateDisplay() {
            const now = new Date();
            const today = now.getDate();
            const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            
            // Update header with current date
            const header = document.querySelector('.header h1');
            const dayName = dayNames[now.getDay()];
            const monthName = monthNames[now.getMonth()];
            header.textContent = `${dayName}, ${today} ${monthName}`;
            
            // Update active day in week selector
            document.querySelectorAll('.day-circle').forEach(circle => {
                circle.classList.remove('active');
                const circleDate = new Date(circle.dataset.date);
                if (circleDate.toDateString() === now.toDateString()) {
                    circle.classList.add('active');
                }
            });
        }

        // Day selector functionality
        document.querySelectorAll('.day-circle').forEach(circle => {
            circle.addEventListener('click', function() {
                document.querySelectorAll('.day-circle').forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                
                // Update header with selected date
                const selectedDate = new Date(this.dataset.date);
                const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                const dayName = dayNames[selectedDate.getDay()];
                const monthName = monthNames[selectedDate.getMonth()];
                const dayNumber = selectedDate.getDate();
                
                const header = document.querySelector('.header h1');
                header.textContent = `${dayName}, ${dayNumber} ${monthName}`;
            });
        });

        // Function to open food modal
        function openFoodModal(mealName) {
            console.log('Opening food modal for:', mealName);
            
            // Set meal type in modal
            const modalMealType = document.getElementById('modalMealType');
            const modalTitle = document.getElementById('modalTitle');
            
            if (modalMealType) {
                modalMealType.value = mealName;
                console.log('Set modalMealType to:', mealName);
            } else {
                console.error('modalMealType not found');
            }
            
            if (modalTitle) {
                modalTitle.textContent = `Tambah Asupan - ${mealName}`;
                console.log('Set modalTitle to:', `Tambah Asupan - ${mealName}`);
            } else {
                console.error('modalTitle not found');
            }
            
            // Reset form
            const container = document.getElementById('food-selection-container');
            const rows = container.querySelectorAll('.food-item-row');
            
            // Keep only first row and reset it
            if (rows.length > 1) {
                for (let i = rows.length - 1; i > 0; i--) {
                    rows[i].remove();
                }
            }
            
            // Reset first row
            const firstRow = container.querySelector('.food-item-row');
            firstRow.querySelector('.food-search-input').value = '';
            firstRow.querySelector('.food-select').value = '';
            firstRow.querySelector('.quantity-input').value = '100';
            firstRow.querySelector('.food-dropdown').style.display = 'none';
            firstRow.querySelector('.remove-food-btn').style.display = 'none';
            
            // Clear nutrition fields
            document.getElementById('calories').value = '';
            document.getElementById('protein').value = '';
            document.getElementById('carbs').value = '';
            document.getElementById('fat').value = '';
            
            // Show modal
            const modal = document.getElementById('addFoodModal');
            console.log('Modal element:', modal);
            if (modal) {
                modal.style.display = 'block';
                modal.style.visibility = 'visible';
                modal.style.opacity = '1';
                console.log('Modal should be visible now');
            } else {
                console.error('Modal element not found');
                alert('Modal element not found!');
            }
        }

        // Function to update nutrition info based on multiple food selections
        function updateNutritionInfo() {
            const caloriesInput = document.getElementById('calories');
            const proteinInput = document.getElementById('protein');
            const carbsInput = document.getElementById('carbs');
            const fatInput = document.getElementById('fat');
            
            let totalCalories = 0;
            let totalProtein = 0;
            let totalCarbs = 0;
            let totalFat = 0;
            
            console.log('Updating nutrition info...');
            
            // Calculate totals from all food rows
            const foodRows = document.querySelectorAll('.food-item-row');
            console.log('Found food rows:', foodRows.length);
            
            foodRows.forEach((row, index) => {
                const foodSelect = row.querySelector('.food-select');
                const quantityInput = row.querySelector('.quantity-input');
                
                console.log(`Row ${index}:`, {
                    foodSelectValue: foodSelect ? foodSelect.value : 'not found',
                    quantityValue: quantityInput ? quantityInput.value : 'not found'
                });
                
                if (foodSelect && foodSelect.value && quantityInput && quantityInput.value) {
                    const selectedOption = foodSelect.options[foodSelect.selectedIndex];
                    const quantity = parseFloat(quantityInput.value) || 0;
                    
                    // Get nutrition per 100g from data attributes
                    const caloriesPer100g = parseFloat(selectedOption.dataset.calories) || 0;
                    const proteinPer100g = parseFloat(selectedOption.dataset.protein) || 0;
                    const carbsPer100g = parseFloat(selectedOption.dataset.carbs) || 0;
                    const fatPer100g = parseFloat(selectedOption.dataset.fat) || 0;
                    
                    console.log(`Row ${index} nutrition per 100g:`, {
                        calories: caloriesPer100g,
                        protein: proteinPer100g,
                        carbs: carbsPer100g,
                        fat: fatPer100g
                    });
                    
                    // Calculate nutrition based on quantity (assuming quantity is in grams)
                    const calories = (caloriesPer100g * quantity) / 100;
                    const protein = (proteinPer100g * quantity) / 100;
                    const carbs = (carbsPer100g * quantity) / 100;
                    const fat = (fatPer100g * quantity) / 100;
                    
                    console.log(`Row ${index} calculated nutrition for ${quantity}g:`, {
                        calories: calories,
                        protein: protein,
                        carbs: carbs,
                        fat: fat
                    });
                    
                    totalCalories += calories;
                    totalProtein += protein;
                    totalCarbs += carbs;
                    totalFat += fat;
                }
            });
            
            console.log('Total nutrition:', {
                calories: totalCalories,
                protein: totalProtein,
                carbs: totalCarbs,
                fat: totalFat
            });
            
            // Update input fields with totals
            if (caloriesInput) caloriesInput.value = totalCalories.toFixed(1);
            if (proteinInput) proteinInput.value = totalProtein.toFixed(1);
            if (carbsInput) carbsInput.value = totalCarbs.toFixed(1);
            if (fatInput) fatInput.value = totalFat.toFixed(1);
        }

        // Function to add new food row
        function addFoodRow() {
            const container = document.getElementById('food-selection-container');
            const firstRow = container.querySelector('.food-item-row');
            const newRow = firstRow.cloneNode(true);
            
            // Clear the values
            newRow.querySelector('.food-search-input').value = '';
            newRow.querySelector('.food-select').value = '';
            newRow.querySelector('.quantity-input').value = '100';
            newRow.querySelector('.food-dropdown').style.display = 'none';
            
            // Copy the select options from the first row
            const firstSelect = firstRow.querySelector('.food-select');
            const newSelect = newRow.querySelector('.food-select');
            newSelect.innerHTML = firstSelect.innerHTML;
            
            // Copy the dropdown options from the first row
            const firstDropdown = firstRow.querySelector('.food-dropdown');
            const newDropdown = newRow.querySelector('.food-dropdown');
            newDropdown.innerHTML = firstDropdown.innerHTML;
            
            // Show remove button for all rows except first
            const removeButtons = container.querySelectorAll('.remove-food-btn');
            removeButtons.forEach(btn => btn.style.display = 'inline-block');
            
            // Add event listeners
            newRow.querySelector('.food-search-input').addEventListener('keyup', function() {
                filterFoods(this);
            });
            newRow.querySelector('.food-search-input').addEventListener('focus', function() {
                showFoodDropdown(this);
            });
            newRow.querySelector('.food-search-input').addEventListener('blur', function() {
                hideFoodDropdown(this, 200);
            });
            newRow.querySelector('.food-select').addEventListener('change', updateNutritionInfo);
            newRow.querySelector('.quantity-input').addEventListener('input', updateNutritionInfo);
            
            // Add click listeners to food options
            newRow.querySelectorAll('.food-option').forEach(option => {
                option.addEventListener('click', function() {
                    selectFood(this);
                });
            });
            
            container.appendChild(newRow);
        }

        // Function to remove food row
        function removeFoodRow(button) {
            const container = document.getElementById('food-selection-container');
            const rows = container.querySelectorAll('.food-item-row');
            
            if (rows.length > 1) {
                button.parentElement.remove();
                
                // Hide remove buttons if only one row left
                if (rows.length === 2) {
                    const remainingButtons = container.querySelectorAll('.remove-food-btn');
                    remainingButtons.forEach(btn => btn.style.display = 'none');
                }
                
                updateNutritionInfo();
            }
        }

        // Function to filter foods based on search input
        function filterFoods(input) {
            const searchTerm = input.value.toLowerCase();
            const dropdown = input.parentElement.querySelector('.food-dropdown');
            const options = dropdown.querySelectorAll('.food-option');
            
            options.forEach(option => {
                const foodName = option.dataset.name.toLowerCase();
                if (foodName.includes(searchTerm)) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
            
            // Show dropdown if there's a search term
            if (searchTerm.length > 0) {
                dropdown.style.display = 'block';
            }
        }

        // Function to show food dropdown
        function showFoodDropdown(input) {
            const dropdown = input.parentElement.querySelector('.food-dropdown');
            dropdown.style.display = 'block';
        }

        // Function to hide food dropdown with delay
        function hideFoodDropdown(input, delay) {
            setTimeout(() => {
                const dropdown = input.parentElement.querySelector('.food-dropdown');
                dropdown.style.display = 'none';
            }, delay);
        }

        // Function to select a food from dropdown
        function selectFood(option) {
            const container = option.closest('.food-search-container');
            const input = container.querySelector('.food-search-input');
            const select = container.querySelector('.food-select');
            const dropdown = container.querySelector('.food-dropdown');
            
            // Set the input value
            input.value = option.dataset.name;
            
            // Set the select value
            select.value = option.dataset.foodId;
            
            // Hide dropdown
            dropdown.style.display = 'none';
            
            // Update nutrition info
            updateNutritionInfo();
            
            console.log('Food selected:', option.dataset.name, 'ID:', option.dataset.foodId);
            console.log('Nutrition data:', {
                calories: option.dataset.calories,
                protein: option.dataset.protein,
                carbs: option.dataset.carbs,
                fat: option.dataset.fat
            });
        }

        // Modal functionality
        document.addEventListener('DOMContentLoaded', function() {
            const closeModal = document.getElementById('closeModal');
            const cancelModal = document.getElementById('cancelModal');
            const modal = document.getElementById('addFoodModal');
            const quantityInput = document.getElementById('quantity');
            
            // Add event listener for quantity change
            if (quantityInput) {
                quantityInput.addEventListener('input', updateNutritionInfo);
            }
            
            // Add event listeners for search inputs
            const searchInputs = document.querySelectorAll('.food-search-input');
            searchInputs.forEach(input => {
                input.addEventListener('keyup', function() {
                    filterFoods(this);
                });
                input.addEventListener('focus', function() {
                    showFoodDropdown(this);
                });
                input.addEventListener('blur', function() {
                    hideFoodDropdown(this, 200);
                });
            });
            
            // Add click listeners to food options
            const foodOptions = document.querySelectorAll('.food-option');
            foodOptions.forEach(option => {
                option.addEventListener('click', function() {
                    selectFood(this);
                });
            });
            
            if (closeModal) {
                closeModal.addEventListener('click', function() {
                    if (modal) modal.style.display = 'none';
                });
            }
            
            if (cancelModal) {
                cancelModal.addEventListener('click', function() {
                    if (modal) modal.style.display = 'none';
                });
            }
            
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        this.style.display = 'none';
                    }
                });
            }
        });

        // Form submission
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('foodEntryForm');
            if (form) {
                form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menambah...';
            submitBtn.disabled = true;
            
            // Submit form
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    alert('Asupan makanan berhasil ditambahkan!');
                    
                    // Close modal
                    document.getElementById('addFoodModal').style.display = 'none';
                    
                    // Reset form
                    this.reset();
                    
                    // Show success message and reload after delay
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    alert('Terjadi kesalahan: ' + (data.message || 'Gagal menambahkan asupan makanan'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menambahkan asupan makanan');
            })
            .finally(() => {
                // Reset button state
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
                });
            }
        });

        // Header icon functionality

        // Add confirmation dialog for logout
        document.querySelector('.logout-btn').addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to logout?')) {
                e.preventDefault();
            }
        });

        // Update date every minute
        setInterval(updateDateDisplay, 60000);
        
        // Initial update
        updateDateDisplay();
    </script>

    <!-- Food Entry Form Modal -->
    <div id="addFoodModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; overflow-y: auto;">
        <div style="position: relative; top: 50px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; width: 400px; max-width: 90%; background: white; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
            <div style="margin-top: 12px;">
                <!-- Header Modal -->
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                    <h3 style="font-size: 18px; font-weight: 600; color: #333;" id="modalTitle">Tambah Asupan Makanan</h3>
                    <button id="closeModal" style="color: #999; background: none; border: none; font-size: 24px; cursor: pointer;">&times;</button>
                </div>
                
                <!-- Form -->
                <div style="padding: 8px;">
                    <form id="foodEntryForm" action="{{ route('nutrition.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="meal_type" id="modalMealType">
                        <input type="hidden" name="date" id="modalDate" value="{{ now()->format('Y-m-d') }}">
                        
                        <!-- Pilihan Makanan Multiple -->
                        <div style="margin-bottom: 16px;">
                            <label style="display: block; color: #333; font-weight: 600; margin-bottom: 4px;">Pilih Makanan ({{ isset($foods) ? $foods->count() : 'No data' }} items):</label>
                            <div id="food-selection-container">
                                <div class="food-item-row" style="display: flex; gap: 8px; margin-bottom: 8px; align-items: center;">
                                    <div class="food-search-container" style="flex: 1; position: relative;">
                                        <input type="text" class="food-search-input" 
                                               placeholder="Cari makanan..." 
                                               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
                                               onkeyup="filterFoods(this)" 
                                               onfocus="showFoodDropdown(this)"
                                               onblur="hideFoodDropdown(this, 200)">
                                        <select name="food_ids[]" class="food-select" 
                                                style="display: none;" 
                                                required onchange="updateNutritionInfo()">
                                            <option value="">-- Pilih Makanan --</option>
                                            @if(isset($foods) && $foods->count() > 0)
                                            @foreach($foods as $food)
                                                <option value="{{ $food->id }}" 
                                                        data-calories="{{ $food->calories_per_100g }}"
                                                        data-protein="{{ $food->protein_per_100g }}"
                                                        data-carbs="{{ $food->carbs_per_100g }}"
                                                        data-fat="{{ $food->fat_per_100g }}"
                                                        data-name="{{ $food->name }}">
                                                    {{ $food->name }} ({{ $food->calories_per_100g }} kcal/100g)
                                                </option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <div class="food-dropdown" style="display: none; position: absolute; top: 100%; left: 0; right: 0; background: white; border: 1px solid #ccc; border-top: none; border-radius: 0 0 4px 4px; max-height: 200px; overflow-y: auto; z-index: 1000;">
                                            @if(isset($foods) && $foods->count() > 0)
                                            @foreach($foods as $food)
                                                <div class="food-option" 
                                                     data-food-id="{{ $food->id }}"
                                                     data-calories="{{ $food->calories_per_100g }}"
                                                     data-protein="{{ $food->protein_per_100g }}"
                                                     data-carbs="{{ $food->carbs_per_100g }}"
                                                     data-fat="{{ $food->fat_per_100g }}"
                                                     data-name="{{ $food->name }}"
                                                     style="padding: 8px; cursor: pointer; border-bottom: 1px solid #eee;"
                                                     onmouseover="this.style.backgroundColor='#f5f5f5'"
                                                     onmouseout="this.style.backgroundColor='white'"
                                                     onclick="selectFood(this)">
                                                    <div style="font-weight: 600;">{{ $food->name }}</div>
                                                    <div style="font-size: 12px; color: #666;">{{ $food->calories_per_100g }} kcal/100g</div>
                                                </div>
                                            @endforeach
                                            @else
                                            <div style="padding: 8px; color: #666;">Tidak ada makanan tersedia</div>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="number" name="quantities[]" class="quantity-input" step="0.1" min="0.1"
                                           style="width: 80px; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" 
                                           placeholder="100" value="100" required onchange="updateNutritionInfo()">
                                    <span style="color: #666; font-size: 12px;">gram</span>
                                    <button type="button" class="remove-food-btn" onclick="removeFoodRow(this)" 
                                            style="background: #dc3545; color: white; border: none; border-radius: 4px; padding: 8px; cursor: pointer; display: none;">×</button>
                                </div>
                            </div>
                            <button type="button" onclick="addFoodRow()" 
                                    style="background: #28a745; color: white; border: none; border-radius: 4px; padding: 8px 12px; cursor: pointer; font-size: 12px;">
                                + Tambah Makanan Lain
                            </button>
                        </div>
                        
                        <!-- Kalori -->
                        <div style="margin-bottom: 16px;">
                            <label for="calories" style="display: block; color: #333; font-weight: 600; margin-bottom: 4px;">Kalori (kcal):</label>
                            <input type="number" name="calories" id="calories" min="0" step="0.1" readonly
                                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; background-color: #f5f5f5;" 
                                   placeholder="0" required>
                        </div>
                        
                        <!-- Protein -->
                        <div style="margin-bottom: 16px;">
                            <label for="protein" style="display: block; color: #333; font-weight: 600; margin-bottom: 4px;">Protein (g):</label>
                            <input type="number" name="protein" id="protein" min="0" step="0.1" readonly
                                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; background-color: #f5f5f5;" 
                                   placeholder="0">
                        </div>
                        
                        <!-- Karbohidrat -->
                        <div style="margin-bottom: 16px;">
                            <label for="carbs" style="display: block; color: #333; font-weight: 600; margin-bottom: 4px;">Karbohidrat (g):</label>
                            <input type="number" name="carbs" id="carbs" min="0" step="0.1" readonly
                                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; background-color: #f5f5f5;" 
                                   placeholder="0">
                        </div>
                        
                        <!-- Lemak -->
                        <div style="margin-bottom: 16px;">
                            <label for="fat" style="display: block; color: #333; font-weight: 600; margin-bottom: 4px;">Lemak (g):</label>
                            <input type="number" name="fat" id="fat" min="0" step="0.1" readonly
                                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; background-color: #f5f5f5;" 
                                   placeholder="0">
                        </div>
                        
                        <!-- Tombol -->
                        <div style="display: flex; gap: 12px;">
                            <button type="submit" 
                                    style="flex: 1; padding: 12px; background: #22c55e; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: 600;">
                                Tambah
                            </button>
                            <button type="button" id="cancelModal" 
                                    style="flex: 1; padding: 12px; background: #ccc; color: #333; border: none; border-radius: 4px; cursor: pointer; font-weight: 600;">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
