<?php


include "fungsi.php";

session_start();

if (isset($_POST["aksi"])) {


    if ($_POST["aksi"] == "add") {
        if (tambah_data($_POST, $_FILES) == true) {
            $_SESSION["notif"] = "Data Berhasil Ditambahkan" ;
            header("location: index.php");
        } else {
            echo "Gagal";
            echo "<br /><a href='index.php'>Home</a>";
        }
    } elseif ($_POST["aksi"] == "edit") {

       

        if (edit_data($_POST, $_FILES)) {
            $_SESSION["notif"] = "Data Berhasil Diubah";
            header("location: index.php");
        } else {
            echo "Proses Gagal";
        }
    }
}


if (isset($_GET["hapus"])) {

   

    if (hapus_data($_GET) == true) {
        $_SESSION["notif"] = "Data Berhasil Dihapus";
        header("location: index.php");
    } else {
        echo "Gagal";
        
        echo "<br /><a href='index.php'>Home</a>";
    }
}
