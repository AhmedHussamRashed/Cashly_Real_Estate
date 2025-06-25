<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Cashly</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #121212;
        }
        .btn-gold {
            background-color: #FFD700;
            color: #121212;
            border: none;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-gold:hover {
            background-color: #FFB300;
        }
        .input-field {
            background-color: #2C2C2C;
            border: 1px solid #444;
            padding: 10px;
            color: #FFF;
            border-radius: 5px;
        }
        .input-field:focus {
            outline: none;
            border-color: #FFD700;
        }
    </style>
</head>
<body class="font-sans">

    <!-- Login Container -->
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <div class="flex justify-center mb-6">
                <img src="https://via.placeholder.com/150x50/FFD700/FFFFFF/?text=Cashly" alt="Cashly Logo" class="w-36">
            </div>
            <h2 class="text-3xl text-white text-center mb-4">Log In</h2>
            <form action="#" method="POST">
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Email" class="input-field w-full" required />
                </div>
                <div class="mb-6">
                    <input type="password" name="password" placeholder="Password" class="input-field w-full" required />
                </div>
                <button type="submit" class="btn-gold w-full mb-4">Log In</button>
                <div class="text-center">
                    <a href="#" class="text-gold-600 hover:underline">Create Account</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
