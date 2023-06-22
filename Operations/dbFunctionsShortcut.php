<?php
function connection(){
    return mysqli_connect('localhost','root','root','ProjektPHP');
}
function executeQuery($query){
    return mysqli_query(connection(),$query);
}
function resultRows($query){
    return mysqli_num_rows(executeQuery($query));
}

function fetchArray($query){
    return mysqli_fetch_array(executeQuery($query));
}