<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Rumah Sakit UMUM DENPASAR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        nav {
            display: flex;
            background-color: #444;
            padding: 1em;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 1em;
        }

        section {
            margin: 1em;
            padding: 1em;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 1em;
            padding: 1em;
            width: 200px;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
        <h1>Selamat Datang di Rumah Sakit Umum Denpasar</h1>
        <p>Apapun Keluhannya Rumah Sakit Umum Solusinya</p>
    </header>

    <nav>
        <a href="beranda.php">Beranda</a>
        <a href="#">Check Up</a>
        <a href="#">Pengaturan</a>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </nav>
    
    <section>
        <h2>Selamat datang!</h2>
        
        <br> 
        
    </section>
    <footer>
        <th>ronaldo wati</th>
        <h3>Terimakasih sudah membaca</h3>
        <p>&copy; 2023 My Dashboard</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>