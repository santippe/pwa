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
        $myvl = $myvl == '/' ? 'index' : '';
        $parts = [];
?><html>
    <?php require_once('head.php'); ?>
    <?php //include('sidebar.php'); ?>
    <?php //include('alertsystem.php'); ?>    
    <body>
    <?php require_once($myvl . '.php'. ($queryString !== null ? '?' . $queryString : '')); ?>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/js/sw.js').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
    </body>
</html>
<?php } ?>