<?php

include_once"connection.php";

$sql="SELECT * FROM information";

$result=mysqli_query($conn,$sql);

$xml = new SimpleXMLElement('<xml/>');

while($row_info=mysqli_fetch_array($result)){
    $info = $xml->addChild('information');
//    $info->addChild('plant_type',$row_info['plant_type']);
//    $info->addChild('plant_name',$row_info['plant_name']);
//    $info->addChild('disease_name',$row_info['disease_name']);
//    $info->addChild('disease_type',$row_info['disease_type']);
//    $info->addChild('details_symtoms',$row_info['details_symtoms']);
//    $info->addChild('solution',$row_info['solution']);
    $info->addChild('info_id',$row_info['info_id']);
    $info->addChild('tags',$row_info['tags']);


}

Header('Content-type: text/xml');
print($xml->asXML());

?>