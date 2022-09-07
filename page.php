<?php
include_once("config.php");

$stmt=$pdo->query("SELECT count(*) as total FROM `listings`");
$rowsNumber=$stmt->fetch();
$totalRows=$rowsNumber['total'];

$j=1;
for($i=0;$i<$totalRows/10;$i++){
    
    echo "<li class='page-item '><a class='page-link' href='index.php?index={$i}'>{$j}</a></li>";
    $j++;
}

