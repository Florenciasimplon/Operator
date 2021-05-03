<?php 
$bdd = 'mysql:host=127.0.0.1;dbname=ComparOperator';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($bdd, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print 'erreur!:' . $e->getMessage() . '<br/>';
    die('');
}
function loadClass($classe)
{
  require_once '../classes/'.
		$classe . '.php'; 
}

spl_autoload_register('loadClass'); 
$manager=new Manager($pdo);




if(isset($_POST['name']) && isset($_POST['link'])&& isset($_POST['is_premium'])){
    $tourOperator= new TourOperator(['name'=> $_POST['name'], 'link'=>$_POST['link'], 'is_premium'=>$_POST['is_premium'], 'grade'=> '0']);
    $manager->createTourOperator($tourOperator);
}