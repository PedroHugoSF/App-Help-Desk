<?php

session_start();
$_SESSION['x'] = 'Oi, eu sou um valor de sessão!';
print_r($_SESSION);
echo '<hr/>';
print_r($_SESSION['y']);

//variable verificador de autetificação realizada

$usuary_authenticated = false;

//usuary of system
$usuary_app = array(
	array('email' => 'adm@teste.com.br', 'password' => '1234567'),
	array('email' => 'user@teste.com.br', 'password' => 'abcd')
);

foreach ($usuary_app as $user) {

	if ( $user['email'] === $_POST['email'] && $user['password'] === $_POST['password']) {
		
		$usuary_authenticated = true;
	}

}

if ($usuary_authenticated) {
 	echo "Usuário autenticado";
 	$_SESSION['autenticado'] = 'SIM';
 	header('Location: home.php?login=erro');
} else {
	$_SESSION['autenticado'] = 'NAO';
 	header('Location: index.php?login=erro');
}
   