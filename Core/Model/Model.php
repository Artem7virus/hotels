<?php
class CoreModel{
    private $dbUser = 'virus';
    private $dbPass = 'SantaVirus1979';
    private $dbName = 'reference_books';
    private $dbHost = 'localhost';
    
    public $link;
    
    public function CoreModel(){
        $this->link = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
    
        if(! $this->link) {
            die('Could not connect: ' . mysqli_error());
        }
    }
    
    function __destruct(){
        //mysqli_close($this->link);
    }
}
