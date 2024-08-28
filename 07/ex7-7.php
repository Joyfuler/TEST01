<?php
    class Member {
        private $name;

        public function setName($name){
            $this->name = $name;            
        }

        public function getName(){
            return $this->name;
        }
    }

    $member = new Member();

    $member->setName("홍길동");
    echo "이름:".$member->getName();

?>