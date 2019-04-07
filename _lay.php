<?php
    session_start(); 
    $url = $_SERVER["REQUEST_URI"];
    $checkPath = explode('/',$url)[1];
    $urlArr = explode('?',substr($url,1));
    $myvl = $urlArr[0];
    $pars = (count($urlArr) > 1 ? $urlArr[1] : '');
    $ext = explode('.',$myvl);
    if(count($ext)>1){
        $myvl = $ext[0];
    }    
    $myvl = ($myvl==''?'index':$myvl);
    $path = $_SERVER["DOCUMENT_ROOT"];    
?>
<?php require_once('code.php'); ?>
<?php 
    if ($myvl!='server' && $myvl !='test' && $myvl!='testmail' && $myvl != 'mappone' && $_REQUEST["mail"]!="mail" 
        && $myvl != "menu" && $checkPath != 'templates') {
        //echo $_REQUEST["mail"]!="mail";
?>
<html>
    <?php require_once('head.php'); ?>    
    <body>
        <?php require_once($myvl . '.php'); ?>    
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
<?php } else {
    require_once($myvl . '.php'); 
}?>    