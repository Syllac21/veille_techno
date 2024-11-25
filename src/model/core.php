<?php
function setEnvironnement(){
    $filename = ".env.local";
    if(!file_exists($filename)){
        throw new Exception("$filename doesn't exist");
    }
    $contentEnv = file_get_contents($filename);
    $array = explode("\n",$contentEnv);
    foreach($array as $l){
        if(trim($l) !== '' && strpos(trim($l),'#') !== 0){
            list($k,$v) = explode("=",$l,2);
            $k=trim($k);
            $v=trim($v);
            $v=trim($v,"'\"");
            $_ENV[$k]=$v;
        }
    }
}