<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f5f5dc; /* cream */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            flex-direction: row;
        }

        .image-side {
            flex: 1;
            background-color: #f5f5dc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .image-side img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .login-container {
            flex: 1;
            max-width: 400px;
            padding: 30px;
            background-color: #fffaf0;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
            border: 1px solid #e0d6c3;
        }

        h2 {
            text-align: center;
            color: #5e412f;
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #6f4e37;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d9cfc0;
            border-radius: 8px;
            font-size: 15px;
            background-color: #fff;
            color: #333;
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #d2b48c;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c19a6b;
        }

        .error {
            background-color: #f8d7da;
            color: #842029;
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #f5c2c7;
        }

        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
                padding: 20px;
            }
            .image-side {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="image-side">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7b/Politeknik_Negeri_Medan_Logo.png" alt="Library Illustration" />
        </div>

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
    </div>
</body>
</html>
