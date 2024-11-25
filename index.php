<?php
// test .env
require_once(__DIR__.'./src/model/core.php');
setEnvironnement();
var_dump($_ENV);

if(isset($_GET['action'])){
    if($_GET['action'] == 'add'){
        require_once(__DIR__.'./src/template/add.php');
    }else if($_GET['action']=='mod'){
        require_once(__DIR__.'./src/template/edit.php');
    }else if($_GET['action']=='del'){
        require_once(__DIR__.'./src/template/del.php');
    }else if($_GET['action']=='details'){
        require_once(__DIR__.'./src/template/details.php');
    }else{
    require_once(__DIR__.'./src/template/list.php');}
}else{
    require_once(__DIR__.'./src/template/list.php');
}