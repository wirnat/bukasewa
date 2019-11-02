<?php
    if($_POST['word']){
        require_once('config.php');
        $word=$_POST['word'];
        $sql=$link->query("SELECT * FROM negara WHERE nama LIKE '%".$word."%'");
        while ($row = $sql->fetch_assoc()) {
            $data[] = $row['nama'];
            // $data[] = $row['id_negara'];
        }
        echo json_encode($data);
        
    }
?>