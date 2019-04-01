<?php
    //echo "test1\r\n";
    //echo $_SERVER['HTTP_X_REQUESTED_WITH'];
    // $servl = count($_SERVER);
    // for($a=0;$a<$servl;$a++)
    //     echo $_SERVER[$a]."\r\n";
    // foreach($_SERVER as $key=>$val){
    //     echo $key . " = " . $val . "\r\n";
    // }
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){        
        $_isAjax = strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        if($_isAjax){
            try{
                //print($_REQUEST['cmd']);
            }catch(Exception $ex){};
            //print(implode(",",array_keys($_REQUEST)));            
            $_metod = $_SERVER["REQUEST_METHOD"];            
            if($_metod == 'POST')    {                
                $cmd = $_REQUEST['cmd'];
                if ($cmd=='userauth'){
                    $db = new SQLite3("data/my.db");
                    $smt = $db->prepare("SELECT * FROM employers WHERE email=:p0 AND pwd=:p1");
                    $smt->bindValue(':p0',$_REQUEST['user']);
                    $smt->bindValue(':p1',$_REQUEST['pwd']);                    
                    if ($res = $smt->execute())
                        if($row = $res->fetchArray(SQLITE3_ASSOC)){
                            $_SESSION["user"] = $row['id'];
                            // $id_ques = $row1[0];
                            // // making a query over there
                            // $_result = $_db->query('SELECT * FROM places');
                            // $_resOfQuery = [];
                            // while ($row = $_result->fetchArray(SQLITE3_NUM)){
                            //     $_resOfQuery[] = $row;                            
                            // }
                            // print(json_encode($_resOfQuery));
                        }                
                } else if ($cmd == 'logout'){
                    unset($_SESSION["user"]);
                } else if ($cmd == 'addVote'){
                    if (!empty($_SESSION['user'])){
                        $req_data = $_REQUEST['place'];   
                        // $_db = new SQLite3("data/my.db");
                        // $res1=$_db->querySingle('SELECT * FROM question WHERE ACTIVE = true');
                        // if($row1 =  $res1->fetchArray(SQLITE3_NUM)){
                        //     $id_ques = $row1[0];
                        //     // making a query over there
                        //     $_result = $_db->query('SELECT * FROM places');
                        //     $_resOfQuery = [];
                        //     while ($row = $_result->fetchArray(SQLITE3_NUM)){
                        //         $_resOfQuery[] = $row;                            
                        //     }
                        //     print(json_encode($_resOfQuery));
                        // }                
                    }                    
                } else if($cmd == 'test'){

                    //print(array_keys($_REQUEST));
                } else if ($cmd == 'giveMeTips'){
                    
                }
            }
        }
    }
?>