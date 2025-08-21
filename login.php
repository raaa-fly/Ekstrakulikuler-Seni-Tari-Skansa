<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Mengatur ulang margin, padding, dan font */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Mengatur tata letak body agar form di tengah layar */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
        }

        /* Tampilan untuk form login */
        form {
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        /* Styling untuk logo */
        .logo {
            width: 200px;
            margin-bottom: 1em;
        }

        /* Header untuk login di dalam form */
        h2 {
            font-size: 1.5em;
            margin-bottom: 1em;
            color: #333;
        }

        /* Label dan input field */
        label {
            font-size: 0.9em;
            color: #333;
            display: block;
            margin: 0.5em 0 0.2em;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.5em;
            margin-bottom: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 0.9em;
        }

        /* Tombol login */
        button[type="submit"] {
            width: 100%;
            padding: 0.7em;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Form Login -->
    <form action="proses_login.php" method="post">
        <!-- Logo -->
        <img src="img/logo tari.png" alt="Logo" class="logo">
        
        <h2>Form Login Admin</h2>
        
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
