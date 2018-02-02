<?php 
	function verificaSeExiste($existe){
		 $arquivo = fopen("cad/cad_padrao.txt", "r");
		 while (!feof($arquivo)){		 
			 $linha = fgets($arquivo,6080);
				$usuarioVerificado = trim($linha);
				if (!strcmp($existe, $usuarioVerificado)){
					return true;
					break;
				}
		}
		fclose ($arquivo);
		return false;
	}


?>

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
<title>Listagem de usuários</title>
</head>
<body>

	<div class="nnavbar-top">
		<a href="index.html"> <img src="Imagens/logo.png" alt="Logo-marca"
			class="img-logo-navbar"></a>
	</div>

	<div class="page-content-wrapper" style="padding-top: 100px;">
		<div class="">
			<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="portlet light bordered">
					<?php
					$arquivo = fopen("cadastrados.txt", 'r+');
					$meusUsuarios = array();
					
					while (!feof($arquivo)){
						$linha = fgets($arquivo,6080);
						$userVerificar = trim($linha);
						if (!verificaSeExiste($userVerificar)){
							$meusUsuarios[] = $userVerificar;
						}		
					}
					fclose ($arquivo);
					asort($meusUsuarios); //Está organizando os valores em ordem alfabética
					$meusUsuarios = array_filter($meusUsuarios); // Está tirando todo e qualquer valor vazio ou nulo do array
					echo '<table class="table" style="text-align:center;vertical-align:middle;">';
						echo '<tr>';
							echo '<th style="text-align:center;vertical-align:middle;">';
								echo "Usuário";
							echo "</th>";
							echo '<th style="text-align:center;vertical-align:middle;">';
								echo "Função";
							echo "</th>";			
						echo "</tr>";

					echo '<tbody class="table-striped">';
						foreach ($meusUsuarios as $_user){
							echo '<tr>';
									echo "<td>";
										echo $_user;
									echo "</td>";
									echo "<td>";
										echo '<a href="del_user.php?usuario='. $_user .'"><input class="btn btn-danger" type="submit" name="Gerar" Value="Limpar pasta do usuário"></input></a>';
									echo "</td>";					
							echo '</tr>';		
						}			
					echo '</tbody>';	
					echo "</table>";
					?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>