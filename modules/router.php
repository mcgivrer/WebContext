<?php
class Router{
    private static $_instance=null;

    private $home=null;


    function Router(){
        $this->home = __config('system','home','indexManager');
    }

    function getInstance(){
        if(self::$_instance==null){
            self::$instance = new Router();
        }
        return self::$_instance;
    }
}
?>

