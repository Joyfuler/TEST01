<?php
    $id   = $_POST["id"];               // 아이디
    $pass = $_POST["pass"];             // 비밀번호
    $name = $_POST["name"];             // 이름
    $email  = $_POST["email"];          // 이메일
    $regist_day = date("Y-m-d (H:i)");  // 가입일자. 현재 시간?
    
    include "../include/db_connect.php";
    $sql = "select * from _mem where id='$id'";
    $result = mysqli_query($conn, $sql);
    $num_record = mysqli_num_rows($result); // select 절을 실행하여 출력된 행 수.

	if ($num_record) { // 만일 해당 아이디의 데이터가 이미 있다면 회원가입을 수행하지 않는다.
		echo "<script>
				alert('아이디가 중복됩니다! 다른 아이디를 사용해주세요!');
				history.go(-1);
				</script>
		";
		exit;
	}

	// 중복 검사 후 이상이 없다면 회원가입을 진행한다.
    
	$sql = "insert into _mem (id, pass, name, email, regist_day, level, point) ";    // 데이터 삽입 명령
	$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 100)";
	mysqli_query($conn, $sql);       // SQL 명령 실행

    mysqli_close($conn);     
    echo "<script>
	          location.href = 'index.php?type=login_form'; 
	      </script>"; // 회원가입이 완료되면 자동으로 로그인 페이지로 이동한다.
		  // type가 login_form이므로, index.php로 이동하는 동시에 include하는 페이지는 로그인 페이지가 된다. (main에 표시됨)
?>