<?php
include_once 'include/user.php';
include_once 'include/user_session.php';

$userSession=new userSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "Hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'vistas/menu.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){
    //echo "validacion de datos";
    $userForm=$_POST['username'];
    $passForm=$_POST['password'];

    if ($user->userExists($userForm,$passForm)){
        //echo "usuario correcto";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once 'vistas/menu.php';
    }else{
        //echo "usuario o contraseña incorrecto";
        $errorLogin="usuario o contraseña incorrecto";
        include_once 'vistas/login.php';
    }
}else{
    //echo "Login";
    include_once 'vistas/login.php';
}
?>