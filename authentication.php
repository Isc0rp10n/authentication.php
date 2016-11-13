<?
$host = "localhost";
$user = "root";
$pass = "";
$banco = "login";
$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($banco) or die (mysql_error());
?>
<html>
<head>
<title>Autenticando</title>

<script type="text/javascript">
function loginsuccessfully() {
	setTimeout("window.location='painel.php'", 5000);
}
function loginfailed() {
	setTimeout("Window.location='login.php'", 5000);
}
</script>

</head>
<body>
<?
$email=$_Post['email'];
$senha=$_Post['senha'];
$sql = mysql_query("SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'") or die (mysql_error());
$row = mysql_num_rows($sql);

if($row > 0) {
	session_start();
	$_SESSION['email']=$_POST['email'];
	$_SESSION['senha']=$_POST['senha'];
	echo "<center><h1><i>Autenticado com sucesso! Aguarde um instante ...</h1></i></center>";
	echo "<script>loginsuccessfully()</script>";
	
} Else {
	echo "<center><h1><i>Nome de usuario ou senha incorretos, tente novamente em instantes</i></h1></center>";
	echo "<script>loginfailed()</script>";
}
?>
</body>
</html>
