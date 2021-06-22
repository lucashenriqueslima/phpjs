<?php

    define("SITE",[
    "name"=>" | Matics 2.0",
    "desc"=>"desc qualquer",
    "domain"=>"",
    "locale"=>"pt_BR",
    "root"=>"http://localhost:888/matics2",

    ]);

    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "localhost",
        "port" => "3325",
        "dbname" => "testes",
        "username" => "root",
        "passwd" => "",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);

    define("LEVEL", [
        "user"=> 1,
        "admin"=> 2
    ]);



    
    
  //  if($_SERVER["SERVER_NAME"] == "localhost"){
      //  require __DIR__."/Minify.php";
    //}

    