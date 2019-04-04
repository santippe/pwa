<?php
    session_start();
    $url = $_SERVER["REQUEST_URI"];
    //get the array
    $urlArr = explode('/',$url);    
    if( $urlArr[count($urlArr)-1] =='' )
        $urlArr = array_slice($urlArr,0,count($urlArr)-1);
    $myvl = implode('/',array_slice($urlArr,1));    
    //$url = implode('/',$urlArr);
    $queryStringArr = explode('?',$url);
    $queryString = null;
    if (count($queryStringArr)>1){
        $myval = $queryStringArr[0];
        $queryString = $queryStringArr[1];
    }
    if ($myvl=='server'){
        require_once('server.php' . (!$queryString ? '?' . $queryString : ''));
    } else {
        $myvl = ($myvl=='_lay' || $myvl=='_lay.php'?'error':$myvl);      
        $myvl = $myvl == ''? 'index' : $myvl;   
        //$myvl = (!empty($_SESSION["user"]) || $myvl == "error" ? $myvl:"login");        
        $parts = [];
?><html>
    <?php require_once('head.php'); ?>
    <?php //include('sidebar.php'); ?>
    <?php //include('alertsystem.php'); ?>    
    <body>    
    <?php require_once($myvl . '.php'. ($queryString !== null ? '?' . $queryString : '')); ?>
    <script>
        if ('serviceWorker' in navigator) {
            //window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
                });
            //});
        }
    </script>
    </body>
</html>
<?php } ?>