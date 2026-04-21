<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelacakan Makanan - FitTrack</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            height: 50px;
            width: auto;
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
            margin-left: 260px;
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

        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .food-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
            transition: all 0.3s ease;
        }

        .food-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .food-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #1a1a1a;
        }

        .food-nutrition {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            margin-bottom: 16px;
        }

        .nutrition-item {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #6b7280;
        }

        .add-food-form {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
            margin-bottom: 32px;
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

        .form-group select,
        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s ease;
        }

        .form-group select:focus,
        .form-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .btn-primary {
            background: #667eea;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #5a67d8;
            transform: translateY(-1px);
        }

        .today-entries {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
        }

        .entry-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .entry-item:last-child {
            border-bottom: none;
        }

        .entry-info h4 {
            font-weight: 500;
            margin-bottom: 4px;
        }

        .entry-info p {
            font-size: 14px;
            color: #6b7280;
        }

        .entry-calories {
            font-weight: 600;
            color: #667eea;
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
            
            .food-grid {
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
                <h1>Pelacakan Makanan</h1>
            </div>

            <!-- Add Food Form -->
            <div class="add-food-form">
                <h3 style="margin-bottom: 20px;">Tambah Entry Makanan</h3>
                <form method="POST" action="{{ route('food.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="food_id">Pilih Makanan</label>
                        <select name="food_id" id="food_id" required>
                            <option value="">Pilih makanan...</option>
                            @foreach($foods as $food)
                                <option value="{{ $food->id }}">{{ $food->name }} ({{ $food->calories_per_100g }} cal/100g)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Jumlah (gram)</label>
                        <input type="number" name="quantity" id="quantity" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="meal_type">Jenis Makanan</label>
                        <select name="meal_type" id="meal_type" required>
                            <option value="breakfast">Sarapan</option>
                            <option value="lunch">Makan Siang</option>
                            <option value="dinner">Makan Malam</option>
                            <option value="snack">Camilan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-primary">Tambah Entry Makanan</button>
                </form>
            </div>

            <!-- Food Database -->
            <div class="food-grid">
                @foreach($foods as $food)
                <div class="food-card">
                    <div class="food-name">{{ $food->name }}</div>
                    <div class="food-nutrition">
                        <div class="nutrition-item">
                            <span>Calories:</span>
                            <span>{{ $food->calories_per_100g }} cal/100g</span>
                        </div>
                        <div class="nutrition-item">
                            <span>Protein:</span>
                            <span>{{ $food->protein_per_100g }}g</span>
                        </div>
                        <div class="nutrition-item">
                            <span>Carbs:</span>
                            <span>{{ $food->carbs_per_100g }}g</span>
                        </div>
                        <div class="nutrition-item">
                            <span>Fat:</span>
                            <span>{{ $food->fat_per_100g }}g</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Today's Entries -->
            <div class="today-entries">
                <h3 style="margin-bottom: 20px;">Today's Food Entries</h3>
                @forelse($todayEntries as $entry)
                <div class="entry-item">
                    <div class="entry-info">
                        <h4>{{ $entry->food->name }}</h4>
                        <p>{{ $entry->quantity }}g • {{ ucfirst($entry->meal_type) }} • {{ $entry->consumed_at->format('H:i') }}</p>
                    </div>
                    <div class="entry-calories">{{ $entry->calories }} cal</div>
                </div>
                @empty
                <p style="color: #6b7280; text-align: center; padding: 20px;">No food entries today. Start tracking your meals!</p>
                @endforelse
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
