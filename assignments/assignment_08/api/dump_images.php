<?php
//gets contents from one.json from seapornjson directory
$json = file_get_contents('./seapornjson/one.json');
//decodes the file
$json = json_decode($json,true);
$array;
//goes through the file and returns the image
foreach($json as $img){
    /*$array[]=[
        'photo'=>$img['localurl'],
        'alt'=>$img['img'],
        'img_id'=> $img['id']
    ];*/
    //echo '<img src="'.$img['localurl'].'" width="400" data-id="'.$img['id'].'">\n';
    $alt = imagecreatefromjpeg($img['img']);

    imagejpeg ($alt , $img['localurl']);
    echo '<img src="' .$img['localurl']. '"/>';
}
//file_put_contents('./seaporn/two.json', json_encode($array));
