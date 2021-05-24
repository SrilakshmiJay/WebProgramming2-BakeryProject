<?php

require_once("./vendor/autoload.php");

$loader = new Twig\Loader\FilesystemLoader("./src/App/View");
$twig = new Twig\Environment($loader);

//localhost:1234/whatever->["whatever"]
$url = explode("/",trim($_SERVER["REQUEST_URI"],"/"));

//localhost:1234/something
if(!empty($url[0])){
    //localhost:1234/controllername/methodname

    //localhost:1234/aMaZinG-> Amazing
    $urlClassname = ucfirst(strtolower($url[0]));
    
    //App\Controller\AmazingController
    $className = "App\\Controller\\".$urlClassname."Controller";

    $methodName = (sizeof($url)== 2)?
        //localhost:1234/something/methodname?arg=val
                        explode("?",$url[1])[0] :
                        "index";
    $instance = new $className($twig);
    $result = $instance->{$methodName}();
    if($result){
        echo $result;
    }else{
        echo "Page not found";
    }
}else{
    //localhost:1234/
    echo $twig->render("index.twig");
}
