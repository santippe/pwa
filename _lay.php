<?php
    session_start();
    $url = $_SERVER["REQUEST_URI"];
    //get the array
    $urlArr = explode('/',$url);
    //take last
    $myvl = $urlArr[count($urlArr)-1];
    //$url = implode('/',$urlArr);
    $queryStringArr = explode('?',$url);
    $queryString = null;
    if (count($queryStringArr)>1){
        $myval = $queryStringArr[0];
        $queryString = $queryStringArr[1];
    }
    $myvl = explode('.',$url)[0];
    $myvl = ($myvl=='' ?'index':$myvl);    
    if ($myvl=='server'){
        require_once('server.php' . (!$queryString ? '?' . $queryString : ''));
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
    <?php require_once($myvl . '.php'. (!$queryString ? '?' . $queryString : '')); ?>
    </body>
</html>
<?php } ?>