<?php
include_once("config.php");

// get the total number of records
$stmt=$pdo->query("SELECT count(*) as total FROM `listings`");
$rowsNumber=$stmt->fetch();
$totalRows=$rowsNumber['total'];


$offset=0;
$size=10;

for($i=0;$i<$totalRows;$i++){
    $orderby=isset($_GET['sort'])?$_GET['sort']:'id';

    $stmt=$pdo->prepare("SELECT * FROM `listings` ORDER BY $orderby LIMIT ?,?");
    $stmt->execute([$offset,$size]);
    $resultSet[$i]=$stmt->fetchAll();
    $offset+=$size;
}

foreach($resultSet[$_GET['index']] as $value){
    echo   "<tr>
                <th>{$value['id']}</th>
                <td>{$value['company']}</td>
                <td>{$value['location']}</td>
                <td>{$value['title']}</td>
            </tr>";
        
}


