<?php
    header('Content-Type: text/x-vcard');  
    header('Content-Disposition: inline; filename= "VCard.vcf"'); 


    echo $_GET['vcard'];
?>