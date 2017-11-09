<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 09-11-2017
 * Time: 08:45
 */
if (isset($_REQUEST['x']) and isset($_REQUEST['y'])){
    $x = $_REQUEST['x'];
    $y = $_REQUEST['y'];

    $operation = $_REQUEST['operation'];
    switch ($operation){
        case '+':
            $result = $x + $y;
            break;
        case '-':
            $result = $x - $y;
            break;
        case '*':
            $result = $x * $y;
            break;
        case '/':
            $result = $x / $y;
            break;
        default: $result = "Uhhhh senpai";
    }

}else{
    $x = "";
    $y = "";
    $result = "";
    $operation = "+";
}


require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, array(
    // 'cache' => '/path/to/compilation_cache',
    'auto_reload' => true
));

$template = $twig->loadTemplate('showit.html.twig');

$parametersToTwig = array('x' => $x, 'y' => $y, 'operation' => $operation, 'result' => $result);
echo $template->render($parametersToTwig);