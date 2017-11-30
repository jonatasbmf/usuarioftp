<Html>
<head>
<meta charset='utf-8'>

<link href="estilo/estilo.css" rel="stylesheet">
<link href="estilo/bootstrap.min.css" rel="stylesheet">
<link href="estilo/components-md.min.css" rel="stylesheet">
<link href="estilo/components-rounded.min.css" rel="stylesheet">
<link href="estilo/components.min.css" rel="stylesheet">
<link href="estilo/default.min.css" rel="stylesheet">
<link href="estilo/layout.min.css" rel="stylesheet">
<link href="estilo/light.min.css" rel="stylesheet">
<link href="estilo/plugins-md.min.css" rel="stylesheet">
<link href="estilo/plugins.min.css" rel="stylesheet">
<link href="estilo/simple-line-icons.min.css" rel="stylesheet">
<link rel="shortcut icon" href="logo.ico">
<title>Banco de horas</title>
</head>
<body>
<?php
$user = (isset($_POST['nome'])) ? $_POST['nome'] : '';
$pass = (isset($_POST['senha'])) ? $_POST['senha'] : '';
$group = (isset($_POST['grupo'])) ? $_POST['grupo'] : '';

if (! ($user == '')) {
	$arquivo = fopen("/var/www/html/usuarioftp/usuario.txt", 'a');
	$texto = "$user';'$pass\n";
	$escreve_arquivo = fwrite($txt, $texto);
	$fechar_arquivo = fclose($txt);
	$result = exec('cat /var/www/html/usuarioftp/usuario.txt');
   // $adicionarUsuario = shell_exec('adduser '. $user);
   // $defineSenha = shell_exec('passwd '. $pass);
}
?>
	<div class="nnavbar-top">
		<a href="index.html"> <img src="Imagens/logo.png" alt="Logo-marca"
			class="img-logo-navbar"></a>
	</div>
	<div class="page-content-wrapper" style="padding-top: 100px;">
		<div class="">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="portlet light bordered">
					<form method="POST" action="usuario.php">
						<h2>Formulário de cadastro de novos usuários</h2>
						<br>
						<div class="form-group">
							<label>Nome do Usuário</label>
							<div class="input-group">
								<input type="text" requerid class="form-control"
									placeholder="Usar nome da empresa" size="50" name="nome">
							</div>
						</div>
						<div class="form-group">
							<label>Informe a senha</label>
							<div class="input-group">
								<input type="text" requerid class="form-control"
									placeholder="Utilizar código do atender" size="50" name="senha">
							</div>
						</div>
						<div class="form-group">
							<label>Informe o grupo do usuário</label>
							<div class="input-group">
								<input type="text" requerid class="form-control"
									value="ftp_clientes" name="grupo" size="50">
							</div>
						</div>
    				</div>
    				<input class="btn btn-success" type="submit" name="Gerar"
    					Value="Criar usuário"></input>
    				</td>
    				<td><input class="btn btn-success" type="reset" name="Limpar"
    					Value="Limpar"></input></td> </a>
    				</td>
				</form>
			</div>
		</div>
	</div>
	</div>
<?php
	echo "Nome: $user";
	echo "<br>";
	echo "Password: $pass";
	echo "<br>";
	echo "Grupo: $group";
	echo "<br>";
	echo "Resultado: $result";
?>
</body>
</html>