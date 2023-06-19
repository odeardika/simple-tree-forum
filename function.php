<?php
include('mysql.php');
session_start();
// Menambahkan Pertanyaan
if($_GET['type'] == 1){
    $username = $_SESSION['username'];
    $question = $_POST['question'];
    $type_input = 'penanya';
    $category = $_POST['cat'];
    // var_dump($username,$question,$type_input,$category);
    $sql = $sql = "INSERT INTO diskusi (username, input, tipe_input, cat) VALUES (\"{$username}\", \"{$question}\", \"{$type_input}\", \"{$category}\")";
    mysqli_query($connect, $sql);

    header('Location: forum.php');
    exit();
    // var_dump([$username, $question, $type_input, $category]);
}elseif($_GET['type'] == 2){
    $username = $_SESSION['username'];
    $type_input = 'penjawab';
    $root_question = $_GET['id'];
    $reply = $_POST['reply'];
    // var_dump($username,$root_question,$type_input,$reply);
    $sql = $sql = "INSERT INTO diskusi (username, input, tipe_input, root_id) VALUES (\"{$username}\", \"{$reply}\", \"{$type_input}\", \"{$root_question}\")";
    mysqli_query($connect, $sql);

    header('Location: forum.php');
    exit();
}
function show_answer($id){
    $answer_data = get_answer($id);
    if($answer_data != null){
        foreach($answer_data as $temp){
            $username = $temp['username'];
            $waktu = $temp['waktu'];
            $answer = $temp['input'];
            $answer_id = $temp['id'];
            echo "<div class='answer'>";
            echo "<img src='' alt='foto'><h4> $username</h4><h4> $waktu</h4>";
            echo "<p>$answer</p>";
            echo "<label id='reply-label' onclick='addReplyTextArea($answer_id)'>reply</label>";
            echo "<div class='reply_container' id='reply-div-$answer_id'></div>";
            // echo "<h5>$answer_id</h5>";
            show_answer($answer_id);
            echo "</div>";

        }
    }else{
        return 0;
        // foreach($answer_data as $temp){
        //     $username = $temp['username'];
        //     $waktu = $temp['waktu'];
        //     $answer = $temp['input'];
        //     $answer_id = $temp['id'];
        //     echo "<div class='answer'>
        //     <img src='' alt='foto'><h4> $username</h4><h4> $waktu</h4>
        //     <p>$answer</p>";
        //     echo "<div class='reply_container' id='reply-div-$answer_id'></div>";
        //     echo "</div>";
        // }
    }
    
}
function show_question($data){
    for($i = 0;$i < count($data); $i++){
        $temp = $data[$i];
        $username = $temp['username'];
        $waktu = $temp['waktu'];
        $question = $temp['input'];
        $id = $temp['id'];
        $category = $temp['cat'];
        echo "<div class='profile'>";
        echo "<img src='' alt='foto'><h4> $username</h4><h4> $waktu</h4>";
        echo "<div><h5>Category: $category</h5></div>";
        echo "<p>$question</p>";
        echo "<label id='reply-label' onclick='addReplyTextArea($id)'>reply</label>";
        echo "<div class='reply_container' id='reply-div-$id'></div>";
        show_answer($id);
        echo "</div>";

    }  
}