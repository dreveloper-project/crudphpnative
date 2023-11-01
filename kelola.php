<?php

include "koneksi.php";

$id = '';
$nisn = '';
$nama_siswa = '';
$jenis_kelamin = '';
$alamat = '';


if (isset($_GET["ubah"])) {

    $id = $_GET["ubah"];
    $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);





    $nisn = $result["nisn"];
    $nama_siswa = $result["nama_siswa"];
    $jenis_kelamin = $result["jenis_kelamin"];

    $alamat = $result["alamat"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
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


    <div class="container">

        <form method="POST" action="proses.php" enctype="multipart/form-data">

            <input name="id" class="hidden" type="text" value="<?php echo $id; ?>">

            <!-- NISN -->
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input required type="text" value="<?php echo $nisn; ?>" name="nisn" class="form-control" id="inputPassword" placeholder="EX : 112334">
                </div>
            </div>

            <!-- Nama -->
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input required value="<?php echo $nama_siswa; ?>" type="text" name="nama_siswa" class="form-control" id="inputPassword" placeholder="Ex : DREE">
                </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-control form-control-sm" name="jenis_kelamin">
                        <option <?php if ($jenis_kelamin == "Laki-laki") {
                                    echo "selected";
                                } ?> value="Laki-laki">Laki Laki</option>
                        <option <?php if ($jenis_kelamin == "Perempuan") {
                                    echo "selected";
                                } ?> value="Perempuan">Wanita</option>
                    </select>
                </div>
            </div>

            <!-- Foto Siswa -->
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">File Input</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3">

                        <div class="custom-file">
                            <input <?php if (!isset($_GET["ubah"])) {
                                        echo 'required';
                                    } ?> type="file" class="custom-file-input" name="foto_siswa" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Input Foto</label>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Alamat -->
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-10">
                    <input required type="text" value="<?php echo $alamat; ?>" name="alamat" class="form-control" id="inputPassword" placeholder="Ex : GOLO Bilas">
                </div>
            </div>


            <div class="mb-3 row">

                <div class="col">
                    <?php
                    if (isset($_GET["ubah"])) {


                    ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">Simpan Perubahan <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                    <?php  } else { ?>
                        <button type="submit" name="aksi" value="add" class=" btn btn-primary">Tambahkan Data <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                    <?php  }  ?>


                    <a href="index.php" type="button" class="btn btn-warning">Kembali <i class="fa fa-fast-backward" aria-hidden="true"></i></a>
                </div>

            </div>

        </form>
    </div>


</body>
<style>

.hidden {
    display: none;
}

</style>
</html>