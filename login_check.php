﻿
<?php
session_start();
$id=$_POST['id'];
$pw=$_POST['pw'];
$mysqli=mysqli_connect("localhost","yesungyun1","ys01290129@","xxpodo");
 $check="SELECT * FROM savelunch WHERE id='$id'";
$result=$mysqli->query($check); 
if($result->num_rows==1){
    $row=$result->fetch_array(MYSQLI_ASSOC); //하나의 열을 배열로 가져오기
    if($row['pw']==$pw){  //MYSQLI_ASSOC 필드명으로 첨자 가능
        $_SESSION['id']=$id;           //로그인 성공 시 세션 변수 만들기
        if(isset($_SESSION['id']))    //세션 변수가 참일 때
        {
            if($id == admin){
                header('Location: ./admin.php'); 
            }else{
            header('Location: ./main.php'); 
            }                                     //로그인 성공 시 페이지 이동
        }
        else{
            echo "세션 저장 실패";
        }            
    }
    else{
        echo "wrong id or pw";
    }
}else{
    echo "wrong id or pw";
}?>
