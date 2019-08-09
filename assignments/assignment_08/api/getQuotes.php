<?php

//gets content from famousQuotes.json file
$string = file_get_contents('./famousQuotes.json');
//decodes the file
$json = json_decode($string, true);
$quote;
//empty array
$data;
//finds each quote in json file and assigns it to data array
foreach($json['data']['children'] as $key => $val){
        $data = $val['data']['title'];
}
file_put_contents("./famousQuotes.json",json_encode($data));