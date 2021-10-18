<?php

include_once 'db.php';
class User extends DB{

    public $nombre;
    public $username;

    public function userExists($user,$pass){
        $query = $this->connect() -> prepare ('SELECT * FROM Usuarios WHERE Nombre=:user AND Password =:pass');
        $query->execute(['user'=>$user, 'pass'=>$pass]);
        //echo $nombre;
        if($query->rowCount()){
            return true;
            }else{
                return false;
            }
    }

    public function setUser($user){
        $query=$this->connect()->prepare('SELECT * FROM Usuarios WHERE Nombre=:user');
        $query->execute (['user'=>$user]);

        foreach ($query as $currentUser){
            $this->nombre =$currentUser['Nombre'];
            $this->username=$currentUser['area'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getUsername(){
        return $this->username;
    }
}

?>