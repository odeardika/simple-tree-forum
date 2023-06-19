<?php
$host = 'localhost';
$username = 'root';
$password = '125125';
$db = 'forum';

$connect = new mysqli($host,$username,$password,$db);

function get_question(){
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM diskusi WHERE tipe_input = \"penanya\"")  ; 
    if(!(mysqli_num_rows($query) > 0)){
        return null;
    }else{
        # Data DB to array
    while($temp = mysqli_fetch_assoc($query)){
        $question_data[] = $temp;
    }
    return $question_data;
    }
}

function get_answer($id){
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM diskusi WHERE root_id = $id")  ; 
    # Data DB to array
    while($temp = mysqli_fetch_assoc($query)){
        $answer_data[] = $temp;
    }
    return $answer_data;
}