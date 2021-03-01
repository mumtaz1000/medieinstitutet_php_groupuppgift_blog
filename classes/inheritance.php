<?php
class User {
    public $userId;
    public $datum;
   
  }

  class posts extends User{ 
    public $title;
    public $description;
    public $picture;
    public $category;  

}
class comments extends User{
public $contents;
public $postUserId;
}

?>