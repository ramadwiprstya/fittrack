<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - FitTrack</title>
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
            cursor: button;
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
            opacity: 0.3;
            z-index: 0;
            pointer-events: none;
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

        .settings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 24px;
        }

        .settings-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #f0f0f0;
            position: relative;
            z-index: 1;
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #1a1a1a;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s ease;
            background-color: white;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #22c55e;
        }

        .btn-primary {
            background: #22c55e;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #16a34a;
            transform: translateY(-1px);
        }

        .goals-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .goal-item {
            text-align: center;
            padding: 16px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .goal-value {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .goal-label {
            font-size: 14px;
            color: #6b7280;
        }

        .success-message {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            border: 1px solid #bbf7d0;
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
            
            .settings-grid {
                grid-template-columns: 1fr;
            }
            
            .goals-grid {
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
                    <a href="{{ route('settings.index') }}" class="nav-link active">
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
                <h1>Pengaturan</h1>
            </div>

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="settings-grid">
                <!-- Profile Settings -->
                <div class="settings-card">
                    <div class="card-title">
                        <span>👤</span>
                        Profile Settings
                    </div>
                    <form method="POST" action="{{ route('settings.updateProfile') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" required>
                                <option value="">-- Pilih Gender --</option>
                                <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                                <option value="other" {{ Auth::user()->gender == 'other' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Tanggal Lahir</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" 
                                   value="{{ Auth::user()->date_of_birth ? Auth::user()->date_of_birth->format('Y-m-d') : '' }}" required>
                        </div>
                        <button type="submit" class="btn-primary">Update Profile</button>
                    </form>
                </div>

                <!-- Daily Goals -->
                <div class="settings-card">
                    <div class="card-title">
                        <span>🎯</span>
                        Daily Goals
                    </div>
                    <form method="POST" action="{{ route('settings.updateGoals') }}">
                        @csrf
                        <div class="goals-grid">
                            <div class="form-group">
                                <label for="calories_goal">Calories Goal</label>
                                <input type="number" name="calories_goal" id="calories_goal" 
                                       value="{{ $todayGoal ? $todayGoal->calories_goal : 2000 }}" 
                                       min="1000" max="5000" required>
                            </div>
                            <div class="form-group">
                                <label for="protein_goal">Protein Goal (g)</label>
                                <input type="number" name="protein_goal" id="protein_goal" 
                                       value="{{ $todayGoal ? $todayGoal->protein_goal : 150 }}" 
                                       min="50" max="300" step="0.1" required>
                            </div>
                            <div class="form-group">
                                <label for="carbs_goal">Carbs Goal (g)</label>
                                <input type="number" name="carbs_goal" id="carbs_goal" 
                                       value="{{ $todayGoal ? $todayGoal->carbs_goal : 250 }}" 
                                       min="100" max="500" step="0.1" required>
                            </div>
                            <div class="form-group">
                                <label for="fat_goal">Fat Goal (g)</label>
                                <input type="number" name="fat_goal" id="fat_goal" 
                                       value="{{ $todayGoal ? $todayGoal->fat_goal : 65 }}" 
                                       min="30" max="150" step="0.1" required>
                            </div>
                        </div>
                        <button type="submit" class="btn-primary">Update Goals</button>
                    </form>
                </div>

                <!-- Current Goals Display -->
                <div class="settings-card">
                    <div class="card-title">
                        <span>📊</span>
                        Current Goals
                    </div>
                    <div class="goals-grid">
                        <div class="goal-item">
                            <div class="goal-value">{{ $todayGoal ? $todayGoal->calories_goal : 2000 }}</div>
                            <div class="goal-label">Calories</div>
                        </div>
                        <div class="goal-item">
                            <div class="goal-value">{{ $todayGoal ? number_format($todayGoal->protein_goal, 1) : '150.0' }}g</div>
                            <div class="goal-label">Protein</div>
                        </div>
                        <div class="goal-item">
                            <div class="goal-value">{{ $todayGoal ? number_format($todayGoal->carbs_goal, 1) : '250.0' }}g</div>
                            <div class="goal-label">Carbs</div>
                        </div>
                        <div class="goal-item">
                            <div class="goal-value">{{ $todayGoal ? number_format($todayGoal->fat_goal, 1) : '65.0' }}g</div>
                            <div class="goal-label">Fat</div>
                        </div>
                    </div>
                </div>

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
