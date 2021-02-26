<?php
class User {
    public $ID;
    public $userId;
    public $datum;
    function getID($id){
        $this->ID=$id;
    }
  }

  class posts extends User{ 
    public $title;
    public $beskrivning;
    public $bild;
    public $kategori;  

}
class comments extends User{
public $innehåll;
public $postUserId;
}

?>