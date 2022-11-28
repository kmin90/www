
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
 
 $name_01=$_POST['user_name'];
 $mail_02=$_POST['email1'];
 $mail_02_1=$_POST['email2'];
 $phone_03=$_POST['hp1'];
 $phone_03_1=$_POST['hp2'];
 $phone_03_2=$_POST['hp3'];
 $InquiryTitle_04=$_POST['InquiryTitle'];
 $msg_05=$_POST['InquiryCon'];

 
 $to='ohwjfjs@naver.com';
 $subject='유한양행사이트에서 관리자에게 보낸 메일';
 $msg="보낸사람:$name_01\n".
      "보낸사람메일주소:$mail_02@$mail_02_1\n".
      "보낸사람전화번호:$phone_03-$phone_03_1-$phone_03_2\n".
      "문의제목:$InquiryTitle_04\n".
      "문의내용:$msg_05\n";
 
 mail($to,$subject,$msg,'보낸사람메일주소:'.$mail_02.'@'.$mail_02_1);   

echo "<script>
        alert('성공적으로 메일이 전송되었습니다.');
        //history.go(-1);
        location.href='sub6_3.html' ;
</script>
"
 

 /*
 echo '이름:'.$name_01.'<br />';
 echo '메일:'.$mail_02.'<br />';
 echo '메일:'.$phone_03.'<br />';
 echo '내용:'.$msg_04.'<br />';
 echo '메일이 성공적으로 전송되었습니다<br />';
 */
?>


