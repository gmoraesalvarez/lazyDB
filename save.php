<?php
//session_start();
//if ($_SESSION['nat'] != 'on') {header( "Location: $url" );}
echo "save is reached\n";
if (file_exists('dados') == false){
  mkdir('dados');
}
if (isset($_GET['save'])){
    echo "save is a get<br>";
}
$save_token = 'somecharactersequenceyoushouldnthardcode';
if (isset($_POST['token'])) { echo "post-token = ".$_POST['token']."\n"; } else { echo "no token sent\n"; }
if ($_POST['token'] == $save_token){
  if (isset($_POST['dados'])){
    $dados=$_POST['dados'];    
    if (file_put_contents('dados/'.$_POST['save'].'.txt',rawurldecode($_POST['dados']).PHP_EOL) == false){
      echo 'falha';
    }else {echo 'saved '.$_POST['save'];}
  }
} else { echo 'na, na, nã'; }
