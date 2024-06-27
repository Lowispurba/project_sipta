<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #9e9c9c;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            padding-top: 100px;
        }
        header {
            background-color: #000000;
            color: #ffff;
            padding: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logout {
            font-size: 20px;
            font-weight: bolder;
            color:#fcfcfc;
            padding-right:10px;
        }
        .logo {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: bolder;
        }
        .logo img {
            background-color: #fcfcfc;
            height: 60px;
            width: auto;
            margin-right: 10px;
            padding: 5px;
        }
        nav {
            display: flex;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 0 20px;
            font-size: 16px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        footer {
            background-color: #000;
            color: #fff;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="download.png" alt="Logo">
            <span>TEKNOLOGI INFORMASI</span>
        </div>
        <nav>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
        <div class="logout">
            <a href="#">Logout</a>
        </div>
    </header>

    <div class="container">
        <h1>Welcome to Our Website</h1>
        <p>Berisi Tentang Sistem Informasi Penjadwalan Sidang Tugas Akhir</p>
        <a href="/login" class="btn">Get Started</a>
    </div>

    <footer>
        <p>Copyrigth 2024 @ Sistem Informasi Penjawalan Tugas Akhir</p>
    </footer>
</body>
</html>
