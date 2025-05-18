
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <style>
        body {
            background-color: #ffe4e6; /* soft pink background */
            font-family: Arial, sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background-color: #ff66a3; /* bright pink */
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(255, 102, 163, 0.5);
            color: white;
        }
        h2 {
            text-align: center;
            margin-bottom: 24px;
        }
        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: bold;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #ff3385;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #e62e75;
        }
        .error {
            background-color: #ffcccc;
            color: #b30000;
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        @if ($errors->any())
            <div class="error">
                <ul style="margin:0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required autofocus />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>
