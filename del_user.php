<?php 
$_user = $_GET['usuario'];
if ($_user == '' ){
    header('Location: index.html');
}
    $arquivo = fopen("limpar.txt", 'a');
    $texto = "$_user;\n";
    fwrite($arquivo, strval($texto));
	fclose($arquivo);
	echo "<script>alert('Sua solicitação de limpesa da pasta foi enviada para o servidor, em breve será executada')</script>";
    echo "<script>location.href='index.html'</script>";
?>