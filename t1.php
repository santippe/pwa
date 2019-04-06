<?php 
    $filesImgs = array_slice(scandir('newsimage'),2);
    foreach ($filesImgs as $key=>$val){
        echo $key . ' - ' . $val . "\r\n";
    }
?>