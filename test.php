<!-- <?php
    $db = new Sqlite3('data/my.db');
    $smt = $db->prepare("SELECT * from employers where id=:id");
    $smt->bindValue(":id",5,SQLITE3_INTEGER);
    $res = $smt->execute();
    while($row = $res->fetchArray(SQLITE3_NUM)){ ?>
        <div><?= $row[0] ?> - <?= $row[1] ?> - <?= $row[2] ?></div>        
    <?php };
?> -->
<script>
    console.log('test');
</script>
<script src="/js/async.js"></script>