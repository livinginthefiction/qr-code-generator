<?php 
    include 'dbConn.php';
    $query = "SELECT * FROM `profile` WHERE token = '".$_GET['token']."'";
    $sql = mysqli_query($db, $query);
    $data =array();
    $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    // $profile = json_decode($data['profile']);
    // echo "<pre>"; print_r($data['profile']); echo "</pre>";
    // echo "<pre>"; print_r($profile); echo "</pre>";

    header('Content-Type: text/x-vcard');  
    header('Content-Disposition: inline; filename= "VCard.vcf"'); 


    echo $data['vcard'];
?>