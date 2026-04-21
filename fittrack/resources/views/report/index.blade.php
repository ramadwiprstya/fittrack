<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - FitTrack</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8fafc;
            min-height: 100vh;
            color: #1a1a1a;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

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
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .nav-icon {
            margin-right: 12px;
            font-size: 18px;
            width: 24px;
            text-align: center;
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

        .main-content {
            flex: 1;
            padding: 32px;
            margin-left: 280px;
            min-height: 100vh;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .header h1 {
            font-size: 32px;
            font-weight: 700;
            color: #1a1a1a;
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

        .chart-container {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
            margin-bottom: 32px;
        }

        .chart-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #1a1a1a;
        }

        .chart-bars {
            display: flex;
            align-items: end;
            justify-content: space-between;
            height: 200px;
            padding: 20px 0;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 20px;
        }

        .bar-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .bars {
            display: flex;
            align-items: end;
            gap: 4px;
            height: 160px;
            margin-bottom: 12px;
        }

        .bar {
            width: 20px;
            border-radius: 4px 4px 0 0;
            transition: all 0.3s ease;
        }

        .bar-consumed {
            background: #22c55e;
        }

        .bar-target {
            background: #e5e7eb;
        }

        .bar-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 500;
        }

        .weekly-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .day-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
        }

        .day-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .day-name {
            font-weight: 600;
            color: #1a1a1a;
        }

        .day-date {
            font-size: 14px;
            color: #6b7280;
        }

        .day-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .day-stat {
            text-align: center;
        }

        .day-stat-value {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
        }

        .day-stat-label {
            font-size: 12px;
            color: #6b7280;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #f0f0f0;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 8px;
        }

        .progress-fill {
            height: 100%;
            background: #22c55e;
            border-radius: 4px;
            transition: width 0.3s ease;
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
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .weekly-details {
                grid-template-columns: 1fr;
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
                    <a href="{{ route('dashboard') }}" class="nav-link">
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
                    <a href="{{ route('report.index') }}" class="nav-link active">
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
                <div>
                    <h1>Laporan Mingguan</h1>
                    <p style="color: #6b7280; margin-top: 4px;">Analisis nutrisi 7 hari terakhir</p>
                </div>
                <div style="display: flex; gap: 12px; align-items: center;">
                    <button onclick="window.location.href='{{ route('dashboard') }}'" 
                            style="background: #f3f4f6; color: #374151; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-weight: 500;">
                        ← Kembali
                    </button>
                </div>
            </div>

            <!-- Average Stats -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #fef2f2; color: #dc2626;">🔥</div>
                    <div class="stat-value">{{ number_format($avgCalories, 0) }}</div>
                    <div class="stat-label">Rata-rata Kalori/Hari</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #eff6ff; color: #2563eb;">💪</div>
                    <div class="stat-value">{{ number_format($avgProtein, 1) }}g</div>
                    <div class="stat-label">Rata-rata Protein/Hari</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #fffbeb; color: #d97706;">🍞</div>
                    <div class="stat-value">{{ number_format($avgCarbs, 1) }}g</div>
                    <div class="stat-label">Rata-rata Karbohidrat/Hari</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #f3e8ff; color: #7c3aed;">🥑</div>
                    <div class="stat-value">{{ number_format($avgFat, 1) }}g</div>
                    <div class="stat-label">Rata-rata Lemak/Hari</div>
                </div>
            </div>

            <!-- Weekly Chart -->
            <div class="chart-container">
                <div class="chart-title">Asupan Kalori Mingguan</div>
                <div class="chart-bars">
                    @foreach($weekData as $day)
                    <div class="bar-group">
                        <div class="bars">
                            <div class="bar bar-consumed" style="height: {{ ($day['calories'] / 2000) * 160 }}px;"></div>
                            <div class="bar bar-target" style="height: {{ ($day['goal_calories'] / 2000) * 160 }}px;"></div>
                        </div>
                        <div class="bar-label">
                            @switch($day['day'])
                                @case('Mon') Sen @break
                                @case('Tue') Sel @break
                                @case('Wed') Rab @break
                                @case('Thu') Kam @break
                                @case('Fri') Jum @break
                                @case('Sat') Sab @break
                                @case('Sun') Min @break
                                @default {{ $day['day'] }} @break
                            @endswitch
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Weekly Details -->
            <div class="weekly-details">
                @foreach($weekData as $day)
                <div class="day-card">
                    <div class="day-header">
                        <div class="day-name">
                            @switch($day['day'])
                                @case('Mon') Senin @break
                                @case('Tue') Selasa @break
                                @case('Wed') Rabu @break
                                @case('Thu') Kamis @break
                                @case('Fri') Jumat @break
                                @case('Sat') Sabtu @break
                                @case('Sun') Minggu @break
                                @default {{ $day['day'] }} @break
                            @endswitch
                        </div>
                        <div class="day-date">{{ \Carbon\Carbon::parse($day['date'])->format('d M') }}</div>
                    </div>
                    <div class="day-stats">
                        <div class="day-stat">
                            <div class="day-stat-value">{{ $day['calories'] }}</div>
                            <div class="day-stat-label">Kalori</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ min(($day['calories'] / $day['goal_calories']) * 100, 100) }}%;"></div>
                            </div>
                        </div>
                        <div class="day-stat">
                            <div class="day-stat-value">{{ number_format($day['protein'], 1) }}g</div>
                            <div class="day-stat-label">Protein</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ min(($day['protein'] / $day['goal_protein']) * 100, 100) }}%;"></div>
                            </div>
                        </div>
                        <div class="day-stat">
                            <div class="day-stat-value">{{ number_format($day['carbs'], 1) }}g</div>
                            <div class="day-stat-label">Karbohidrat</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ min(($day['carbs'] / $day['goal_carbs']) * 100, 100) }}%;"></div>
                            </div>
                        </div>
                        <div class="day-stat">
                            <div class="day-stat-value">{{ number_format($day['fat'], 1) }}g</div>
                            <div class="day-stat-label">Lemak</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ min(($day['fat'] / $day['goal_fat']) * 100, 100) }}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // Add confirmation dialog for logout
        document.querySelector('.logout-btn').addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to logout?')) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
