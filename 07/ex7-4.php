<?php
  // 생성자 & 소멸자
  class Person{
    public $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function __desctruct(){
        echo "이름은 ".$this->name."입니다.";
    }
  }

  $person1 = new Person("홍길동");
    
?>