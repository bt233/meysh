<?php
function notice()
{
    global $pdo;
    $getid=$pdo->prepare("SELECT * FROM count WHERE sort=:sort");
    $getid->bindValue(':sort', 1, PDO::PARAM_STR);
    $getid->execute();
    $row=$getid->fetch(PDO::FETCH_ASSOC);
    $uid=$row['notice'];
    while ($uid>=1)
    {
        $search=$pdo->prepare("SELECT * FROM notice WHERE uid=:uid");
        $search->bindValue(':uid', $uid, PDO::PARAM_STR);
        $search->execute();
        $result=$search->fetch(PDO::FETCH_ASSOC);
        echo '<a href="notice/'.$result['uid'].'" class="align">'.$result['title'].'<span style="float:right;font-size:12px;margin:4px 2px">'.$result['time'].'</span></a>';
        $uid--;
    }
}
include 'view/index.php';
?>