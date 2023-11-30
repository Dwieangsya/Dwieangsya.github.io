<?php
session_start();
if (isset($_SESSION["pasien"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Pasien Check Up</title>
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
    <nav>
        <a href="beranda.php">Beranda</a>
        <a href="#">Check Up</a>
        <a href="#">Pengaturan</a>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </nav>
    </header>
    <div class= "container">
        <h2 class="t-center">Silahkan isi Form</h2>
        <h2 class="t-center">Isi dengan jujur</h2>
    <br>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
            $fullname = $_POST["fullname"];
            $jeniskelamin = $_POST["jeniskelamin"];
            $tempatlahir = $_POST["tempatlahir"];
            $tanggallahir = $_POST["tanggallahir"];
            $alamat = $_POST["alamat"];
        }
            

            $errors = array();

            if (empty($fullname) OR empty($tanggallahir) OR empty($alamat) OR empty($jeniskelamin) OR empty($tempatlahir)) {
                array_push($errors, "Jangan Bercanda Form belum diisi");
            }
            require_once "database.php";
            $stmt = $conn->prepare("SELECT * FROM pasien WHERE fullname = ?");
            $stmt->bind_param("s", $fullname);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                echo "Fullname already registered!";
            }else {
                $sql = "INSERT INTO pasien (`fullname`, `jeniskelamin`, `tempatlahir`, `tanggallahir`, `alamat`) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sssss", $fullname, $jeniskelamin, $tempatlahir, $tanggallahir, $alamat);
                    mysqli_stmt_execute($stmt);
                    echo "<div class= 'alert alert-success'>You are check up.</div>";
                }else{
                    die("Something went wrong");
                }
                $stmt->close();
                }
            
            ?>
    </div>
    <form action="beranda.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name= "fullname" placeholder="Nama Lengkap:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="jeniskelamin" placeholder="Jenis Kelamin:">
            </div><div class="form-group">
                <input type="text" class="form-control"name="tempatlahir" placeholder="Tempat Lahir:">
            </div>
            <div class="form-group">
                <input type="date" class="form-control"name="tanggallahir" placeholder="Tanggal Lahir:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat:">
            </div>
            <button type="submit" name = "submit">Submit</button>
        </form>
        </div>
    </form>
    
    
</body>
</html>