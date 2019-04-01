<?php
    session_start();
    $url = $_SERVER["REQUEST_URI"];
    $urlArr = array_slice(explode('/',$url),1);    
    $url = implode('/',$urlArr);
    //$myvl = explode('?',$url)[0];
    $myvl = explode('.',$url)[0];
    $myvl = ($myvl=='' ?'index':$myvl);    
    if ($myvl=='server'){
        include('server.php');
    } else {
        $myvl = ($myvl=='_lay' || $myvl=='_lay.php'?'error':$myvl);          
        //$myvl = (!empty($_SESSION["user"]) || $myvl == "error" ? $myvl:"login");
        //if set head will be repeated...
        //echo $myvl."\r\n";
        $parts = [];
?><html>
    <?php require_once('head.php'); ?>
    <?php //include('sidebar.php'); ?>
    <?php //include('alertsystem.php'); ?>    
    <body>    
    <?php require_once($myvl . '.php'); ?>
    </body>
</html>
<?php } ?>