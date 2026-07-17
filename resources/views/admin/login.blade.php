<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Car Airport Morocco</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0f1d36;
            --primary-blue-light: #1b2f52;
            --accent-gold: #c5a059;
            --accent-gold-hover: #b08c48;
            --text-dark: #222222;
            --text-muted: #666666;
            --text-white: #ffffff;
            --bg-light: #f8fafc;
            --bg-white: #ffffff;
            --border-color: #e2e8f0;
            --shadow-lg: 0 10px 25px rgba(15, 29, 54, 0.15);
            --font-heading: 'Outfit', sans-serif;
            --font-body: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--primary-blue);
            color: var(--text-dark);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: radial-gradient(circle at 10% 20%, rgba(27, 47, 82, 0.4) 0%, rgba(15, 29, 54, 0.8) 90%);
        }

        .login-card {
            background-color: var(--bg-white);
            padding: 3rem 2.5rem;
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-header h1 {
            font-family: var(--font-heading);
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-family: var(--font-body);
            font-size: 0.95rem;
            background-color: var(--bg-light);
            color: var(--text-dark);
            outline: none;
            transition: all 0.3s;
        }

        .form-group input:focus {
            border-color: var(--accent-gold);
            box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.15);
            background-color: var(--text-white);
        }

        .login-btn {
            background-color: var(--primary-blue);
            color: var(--text-white);
            border: none;
            padding: 0.9rem;
            width: 100%;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }

        .login-btn:hover {
            background-color: var(--primary-blue-light);
        }

        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid #fecaca;
        }
        
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid #a7f3d0;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h1>CAR AIRPORT</h1>
            <p>Morocco Fleet Manager Login</p>
        </div>

        @if(session('error'))
            <div class="alert-error">
                ✗ {{ session('error') }}
            </div>
        @endif
        
        @if(session('success'))
            <div class="alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit', ['locale' => $locale]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required autocomplete="username" placeholder="Enter username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required autocomplete="current-password" placeholder="••••••">
            </div>

            <button type="submit" class="login-btn">Log In</button>
        </form>
    </div>

</body>
</html>
