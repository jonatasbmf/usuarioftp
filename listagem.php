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
							while (!feof($arquivo)){
								$linha = fgets($arquivo,6080);
								echo $linha.'<br>';
							}
							fclose ($arquivo);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>