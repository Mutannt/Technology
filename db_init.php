<?php
//Попытка установления соединения с MYSql-сервером
$db_link = mysql_connect("localhost","root", "");//(Дескриптор) В случае ошибки, возвращает False
//В случае ошибки, вывести сообщение и завершить программу
if (!$db_link)
    die("Ошибка соединения с базой данных");
//Попытка выбора базы данных
//В случае ошибки вывести сообщение и завершить программу
if (!mysql_select_db("retro_db", $db_link))// True/False
    die("Ошибка выбора базы данных");
    //mysql_query("SET NAMES 'cp1251'");
    
    //mysql_query("SET CHARACTER SET 'cp1251'");
    //mysql_query("SET NAMES cp1251 COLLATE utf8_general_ci",$db_link);
    mysql_query("SET CHARACTER SET 'utf8'");
    mysql_query("SET NAMES utf8 COLLATE utf8_general_ci",$db_link);
?>