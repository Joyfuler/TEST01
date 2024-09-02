<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP+MySQL 입문</title>
<link rel="stylesheet" href="style.css">
<script>
   function check_input() {
      if (!document.member.pass.value) {
          alert("비밀번호를 입력하세요!");    
          document.member.pass.focus();
          return;
      }
      if (!document.member.pass_confirm.value) {
          alert("비밀번호확인을 입력하세요!");    
          document.member.pass_confirm.focus();
          return;
      }
      if (!document.member.name.value) {
          alert("이름을 입력하세요!");    
          document.member.name.focus();
          return;
      }
      if (!document.member.email.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member.email.focus();
          return;
      }
      if (document.member.pass.value != 
            document.member.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member.pass.focus();
          document.member.pass.select();
          return;
      }
      document.member.submit();
   }
   // 초기화 시 입력했던 모든 칸을 빈칸으로 변경하고, id에 커서를 올린다.
   function reset_form() {
      document.member.id.value = "";  
      document.member.pass.value = "";
      document.member.pass_confirm.value = "";
      document.member.name.value = "";
      document.member.email.value = "";
      document.member.id.focus();
      return;
   }
</script>
</head>
<body> 
<?php    
    // 만일 로그인한 상태(세션이 있는 상태)라면 sql을 통해 데이터를 불러오고, 패러미터로 $userid를 사용할 수 있도록 설정한다.
    session_start(); // 세션 시작.
    if (isset($_SESSION["userid"])) 
        $userid = $_SESSION["userid"];
    else 
        $userid = "";

   	$con = mysqli_connect("localhost", "user", "tiger", "sample");
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_assoc($result); // java의 resultSet과 비슷...?

    $pass = $row["pass"];
    $name = $row["name"];
    $email = $row["email"];

    mysqli_close($con);
?>    
    <form name="member" action="modify.php?id=<?=$userid?>" method="post">
		<h2>회원 정보 수정</h2>
    	<ul class="join_form">
            <!-- 회원정보 수정이므로, 기존 데이터가 남아 있어야 함. 전달받은 패러미터를 value 안에 대입한다. -->
            <li>
                <span class="col1">아이디</span>
                <span class="col2"><?=$userid?></span>                
            </li>
            <li>
                <span class="col1">비밀번호</span>
                <span class="col2"><input type="password" name="pass" value="<?=$pass?>"></span>               
            </li>
            <li>
                <span class="col1">비밀번호 확인</span>
                <span class="col2"><input type="password" name="pass_confirm"></span>               
            </li>            
            <li>
                <span class="col1">이름</span>
                <span class="col2"><input type="text" name="name" value="<?=$name?>"></span>               
            </li>
            <li>
                <span class="col1">이메일</span>
                <span class="col2"><input type="text" name="email" value="<?=$email?>"></span>               
            </li>                        
        </ul>                       
		<ul class="buttons">
	        <li><button type="button" onclick="check_input()">저장하기</button></li>
            <li><button type="button" onclick="reset_form()">취소하기</button></li>
        </ul>
    </form>
</body>
</html>