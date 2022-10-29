<?php
include 'db_user1.php';

    //menampung inputan dari form
    $nama = $_POST['nama'];
    $pesan = $_POST['pesan'];
    $id = $_POST['id_mempelai'];

        $insert = mysqli_query($conn, "INSERT INTO tb_pesan VALUES (
                    null,
                    '".$nama."',
                    '".$pesan."',
                    '".$id."'
                                ) ");

            if($insert){
                // echo '<script>alert("Tambah data berhasil")</script>';
                echo '<script>history.back();</script>';
            }else{
                echo 'gagal'.mysqli_error($conn);
            }
                      
?>