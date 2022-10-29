<?php
    include 'db_user1.php';

    if(isset($_GET['idm'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_mempelai WHERE id_mempelai = '".$_GET['idm']."' ");
        echo '<script>window.location="data_mempelai.php"</script>'; 
    }
    if(isset($_GET['idp2'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_profile2 WHERE id_profile2 = '".$_GET['idp2']."' ");
        echo '<script>window.location="data_profile.php"</script>'; 
    }
    if(isset($_GET['idwa'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_waktu WHERE id_waktu = '".$_GET['idwa']."' ");
        echo '<script>window.location="data_waktu.php"</script>'; 
    }
    if(isset($_GET['idwr'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_waktu1 WHERE id_waktu1 = '".$_GET['idwr']."' ");
        echo '<script>window.location="data_waktu.php"</script>'; 
    }
    if(isset($_GET['idl'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_lokasi WHERE id_lokasi = '".$_GET['idl']."' ");
        echo '<script>window.location="data_lokasi.php"</script>'; 
    }
    if(isset($_GET['idd'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_dalil WHERE id_dalil = '".$_GET['idd']."' ");
        echo '<script>window.location="data_dalil.php"</script>'; 
    }
    if(isset($_GET['idp1'])){
        $profile1 = mysqli_query($conn, "SELECT img_profile FROM tb_profile1 WHERE id_profile1 = '".$_GET['idp1']."' ");
        $p1 = mysqli_fetch_object($profile1);

        unlink('./produk/'.$p1->img_profile);

        $delete = mysqli_query($conn, "DELETE FROM tb_profile1 WHERE id_profile1 = '".$_GET['idp1']."' ");
        echo '<script>window.location="data_profile.php"</script>'; 
    }
    if(isset($_GET['idp'])){
        $profile = mysqli_query($conn, "SELECT img_profile FROM tb_profile WHERE id_profile = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($profile);

        unlink('./produk/'.$p->img_profile);

        $delete = mysqli_query($conn, "DELETE FROM tb_profile WHERE id_profile = '".$_GET['idp']."' ");
        echo '<script>window.location="data_profile.php"</script>'; 
    }
?>