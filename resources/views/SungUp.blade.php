<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up - Cashly</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #1f2937; /* خلفية داكنة */
            color: white;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #2d3748;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            width: 80px;
        }
        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group input, .input-group select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #4A5568;
            background-color: #1A202C;
            color: white;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #fbbf24; /* اللون الذهبي */
            color: black;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #d97706;
        }
        .signup-link {
            text-align: center;
            margin-top: 10px;
        }
        .signup-link a {
            color: #fbbf24;
            text-decoration: none;
            font-weight: 600;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://via.placeholder.com/80x80.png?text=Logo" alt="Logo" />
        </div>
        <h2>Create Your Account</h2>
        <form action="/signup" method="POST">
            @csrf
            <!-- Full Name -->
            <div class="input-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required placeholder="Enter your full name" />
            </div>

            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="Enter your email" />
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Enter your password" />
            </div>

            <!-- User Type -->
            <div class="input-group">
                <label for="role">User Type</label>
                <select name="role" id="role" required>
                    <option value="user">User</option>
                    <option value="agent">Agent</option>
                </select>
            </div>

            <!-- Sign Up Button -->
            <button type="submit" class="btn">Sign Up</button>

            <!-- Sign In Link -->
            <div class="signup-link">
                <p>Already have an account? <a href="/login">Log in</a></p>
            </div>
        </form>
    </div>
</body>
</html>
