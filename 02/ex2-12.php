<?php
    class Hello{
        public $name = '홍길동'; // property
        function say_hello(){
            return $this->name."님 안녕하세요.";
        }
    }

    $message = new Hello(); // hello 클래스 안의 name 변수와 함수를 가져온다.
    echo $message->say_hello(); // message 객체 안에는 say_hello 함수가 있음. 이를 -> 형식으로 가져온다.
    echo "<br>";
?>