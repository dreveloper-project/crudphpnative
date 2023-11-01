<?php

include "koneksi.php";

session_start();

$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn, $query);
$no = 0;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>

    <!-- Datatables -->
    <link rel="stylesheet" href="datatables/datatables.css">
    <script src="datatables/datatables.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <!-- Bootstrap & Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Aplikasi CRUD</span>
    </nav>

    <blockquote class="blockquote mt-2 ml-3">
        <p class="mb-0">Aplikasi latihan crud dasar untuk pemula</p>
        <footer class="blockquote-footer">Bisa Fitur <cite title="Source Title">Search data</cite></footer>
    </blockquote>

    <a href="kelola.php" type="button" class="btn btn-primary ml-3">
        <i class="fa fa-plus"> </i>
        Tambah Data
    </a>



    <!-- Table Data -->
    <div class="container-fluid mt-5">

        <?php if (isset($_SESSION["notif"])) {

        ?>
            <div id="notif" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses !</strong> <?php echo $_SESSION["notif"]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="closeButton">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php } ?>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Foto Siswa</th>
                    <th scope="col">Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($result = mysqli_fetch_assoc($sql)) {


                ?>

                    <tr>
                        <th scope="row"> <?php echo ++$no; ?> </th>
                        <td><?php echo $result["nisn"]; ?></td>
                        <td><?php echo $result["nama_siswa"]; ?></td>
                        <td><?php echo $result["jenis_kelamin"]; ?></td>
                        <td> <img src="image/<?php echo $result['foto_siswa']; ?>" class="img-siswa" alt="foto <?php echo $result['nama_siswa']; ?>" srcset=""> </td>
                        <td><?php echo $result["alamat"]; ?></td>
                        <td>
                            <a href="kelola.php?ubah=<?php echo $result["id_siswa"]; ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i>Edit</a>
                            <a href="proses.php?hapus=<?php echo $result["id_siswa"]; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Ingin Menghapus ?')"><i class="fa fa-trash-o"></i>Hapus</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

<style>
    .img-siswa {
        width: 150px;
    }
</style>

<script>
    document.getElementById("closeButton").addEventListener("click", function() {
        document.getElementById("notif").style.display = "none";
    });
</script>

</html>