<?php
include "koneksi.php";

function tambah_data($data, $file)
{
    // assign of post data
    $nisn = $data["nisn"];
    $nama_siswa = $data["nama_siswa"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $alamat = $data["alamat"];


    // file asignment
    $dir = "image/"; //image directory folder in server
    $temp = $file["foto_siswa"]["tmp_name"]; //get the real file
    
    $ekstensi = pathinfo($file["foto_siswa"]["name"], PATHINFO_EXTENSION);
    $foto_siswa = $nisn.".".$ekstensi; // get file name
   

    // move uploaded file to server directory
    move_uploaded_file($temp, $dir . $foto_siswa);



    // query
    $query = " INSERT INTO tb_siswa VALUES(NULL, '$nisn', '$nama_siswa', '$jenis_kelamin', '$foto_siswa', '$alamat') ;";

    // sql for add new data
    $sql =  mysqli_query($GLOBALS["conn"], $query);

    return true;

}

function edit_data($data, $file) {
    // assign of post data
    $id = $data["id"];
    $nisn = $data["nisn"];
    $nama_siswa = $data["nama_siswa"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $alamat = $data["alamat"];

    $queryselect = " SELECT * FROM tb_siswa WHERE id_siswa = '$id'; ";
    $sqlselect = mysqli_query($GLOBALS["conn"], $queryselect); //get data
    $result = mysqli_fetch_assoc($sqlselect); // manage data

    if ($file["foto_siswa"]["name"] == "") {
        $foto_siswa = $result["foto_siswa"];
    } else {

        unlink("image/" . $result["foto_siswa"]);

        $ekstensi = pathinfo($file["foto_siswa"]["name"], PATHINFO_EXTENSION);
        $foto_siswa = $nisn . "." . $ekstensi; // get file name
        $dir = "image/"; //image directory folder in server
        $temp =$file["foto_siswa"]["tmp_name"]; //get the real file

        // move uploaded file to server directory
        move_uploaded_file($temp, $dir . $foto_siswa);
    }

    $query = " UPDATE tb_siswa SET nisn = '$nisn', nama_siswa = '$nama_siswa', jenis_kelamin = '$jenis_kelamin', foto_siswa = '$foto_siswa', alamat = '$alamat' WHERE id_siswa = '$id'; ";

    $sql = mysqli_query($GLOBALS["conn"], $query);

    return true;
}

function hapus_data($data)  {
    $id = $data["hapus"];

    $queryselect = " SELECT * FROM tb_siswa WHERE id_siswa = '$id'; ";
    $sqlselect = mysqli_query($GLOBALS["conn"], $queryselect); //get data
    $result = mysqli_fetch_assoc($sqlselect); // manage data

    unlink("image/" . $result["foto_siswa"]); // delete

    $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id';";
    $sql = mysqli_query($GLOBALS["conn"], $query);

    return true;
}