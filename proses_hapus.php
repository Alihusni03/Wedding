<?php
    include 'db.php';

    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."' ");
        echo '<script>window.location="category.php"</script>'; 
    }

    if(isset($_GET['idp'])){
        $produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($produk);

        unlink('./produk/'.$p->product_image);

        $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
        echo '<script>window.location="product.php"</script>'; 
    }

    if(isset($_GET['ida'])){
        $ajakan = mysqli_query($conn, "SELECT img_ajakan FROM tb_ajakan WHERE id_ajakan = '".$_GET['ida']."' ");
        $a = mysqli_fetch_object($ajakan);

        unlink('./produk/'.$a->img_ajakan);

        $delete = mysqli_query($conn, "DELETE FROM tb_ajakan WHERE id_ajakan = '".$_GET['ida']."' ");
        echo '<script>window.location="ajakan.php"</script>'; 
    }

    if(isset($_GET['idt'])){
        $testimoni = mysqli_query($conn, "SELECT img_testimoni FROM tb_testimoni WHERE id_testimoni = '".$_GET['idt']."' ");
        $t = mysqli_fetch_object($testimoni);

        unlink('./produk/'.$t->img_testimoni);

        $delete = mysqli_query($conn, "DELETE FROM tb_testimoni WHERE id_testimoni = '".$_GET['idt']."' ");
        echo '<script>window.location="testimoni.php"</script>'; 
    }

    if(isset($_GET['idte'])){
        $tentang = mysqli_query($conn, "SELECT img_tentang FROM tb_tentang WHERE id_tentang = '".$_GET['idte']."' ");
        $te = mysqli_fetch_object($tentang);

        unlink('./produk/'.$te->img_tentang);

        $delete = mysqli_query($conn, "DELETE FROM tb_tentang WHERE id_tentang = '".$_GET['idte']."' ");
        echo '<script>window.location="tentang.php"</script>'; 
    }
    if(isset($_GET['idko'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_kontak WHERE id_kontak = '".$_GET['idko']."' ");
        echo '<script>window.location="kontak.php"</script>'; 
    }
    if(isset($_GET['idf'])){
        $fitur = mysqli_query($conn, "SELECT img_wud FROM tb_fitur WHERE id_fitur = '".$_GET['idf']."' ");
        $f = mysqli_fetch_object($fitur);

        unlink('./produk/'.$f->img_wud);

        $delete = mysqli_query($conn, "DELETE FROM tb_fitur WHERE id_fitur = '".$_GET['idf']."' ");
        echo '<script>window.location="fitur.php"</script>'; 
    }
    if(isset($_GET['idf1'])){
        $fitur1 = mysqli_query($conn, "SELECT img_btd FROM tb_fitur1 WHERE id_fitur1 = '".$_GET['idf1']."' ");
        $f1 = mysqli_fetch_object($fitur1);

        unlink('./produk/'.$f1->img_btd);

        $delete = mysqli_query($conn, "DELETE FROM tb_fitur1 WHERE id_fitur1 = '".$_GET['idf1']."' ");
        echo '<script>window.location="fitur.php"</script>'; 
    }
    if(isset($_GET['idf2'])){
        $fitur2 = mysqli_query($conn, "SELECT img_p FROM tb_fitur2 WHERE id_fitur2 = '".$_GET['idf2']."' ");
        $f2 = mysqli_fetch_object($fitur2);

        unlink('./produk/'.$f2->img_p);

        $delete = mysqli_query($conn, "DELETE FROM tb_fitur2 WHERE id_fitur2 = '".$_GET['idf2']."' ");
        echo '<script>window.location="fitur.php"</script>'; 
    }
    if(isset($_GET['idf3'])){
        $fitur3 = mysqli_query($conn, "SELECT img_mps FROM tb_fitur3 WHERE id_fitur3 = '".$_GET['idf3']."' ");
        $f3 = mysqli_fetch_object($fitur3);

        unlink('./produk/'.$f3->img_mps);

        $delete = mysqli_query($conn, "DELETE FROM tb_fitur3 WHERE id_fitur3 = '".$_GET['idf3']."' ");
        echo '<script>window.location="fitur.php"</script>'; 
    }
    
?>