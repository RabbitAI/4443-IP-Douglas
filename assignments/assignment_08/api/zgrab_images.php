<?php
//shows output as a json file
echo"<pre>";
//file_get_contents gets the contents from reddit and assigns them to the data variable
$data = file_get_contents('https://www.reddit.com/r/seaporn.json');
//json_decode decodes the json file in the data variable and makes it an associative array
$json =json_decode($data,true);
//an empty variable
$clean = [];
//goes through json variable and assigns the url to origurl 
foreach($json['data']['children'] as $key => $val){
    $origurl = $val['data']['preview']['images'][0]['source']['url'];
    list($url,$null)= explode('?', $origurl);
    $name = $val['data']['created'].'_'.basename($url);
    //replaces amp with nothing in origurl
    $origurl = str_replace('amp;','',$origurl);
    //assigns the content from the file the clean array with names
    $clean[] = [
        'title'=>$val['data']['title'],
        'img'=>$origurl,
        'name'=>$name,
        'path'=>'../seaporn/',
        'localurl'=>'./seaporn/'.$name,
        'id'=>$id
    ];
    //gets image url and assigns it to file variable
    //$file = file_get_contents($origurl);
    //if there is a file variable contents are put in seaporn directory
    // if($file){
    //     file_put_contents('.seaporn/'.$name,$file);
    // }
    //else sends back an error message
    // else{
    //     echo"{origurl} did not work!!!\n";
    // }
    //increments id
    $id++;
}
//prints the values from clean array
//print_r($clean);
//saves the clean array encoded into one.json in the seapornjson directory
//file_put_contents('./seapornjson/one.json',json_encode($clean));
echo json_encode($clean);