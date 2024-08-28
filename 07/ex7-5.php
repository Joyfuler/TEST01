<?php
   class Rectangle{
        public $width;
        public $height;

    public function __construct($width, $height){
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(){
        return ($this->width * $this->height);
    }
   }

   class Square extends Rectangle{
    public function isSquare(){ 
        if ($this->width == $this->height){ // 상속받았으므로 $this->width로 사용 가능.
            return true; // 정사각형
        } else{
            return false;
        }
    }
   }

   $rect = new Square(10,20);

   if ($rect->isSquare()){
    echo "정사각형입니다. 넓이:".$rect->getArea();
   } else {
    echo "직사각형입니다. 넓이:".$rect->getArea();
   }

?>