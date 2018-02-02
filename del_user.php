<?php 
if(!isset($_POST['usuario'])){
    echo "Deu merda";
}else{
    $_user = $_POST['usuario'];     
    $arquivo = fopen("limpar.txt", 'a');
    $texto = "$_user;\n";
    fwrite($arquivo, strval($texto));
    fclose($arquivo);
    echo "<script>alert('Sua solicitação de limpeza da pasta foi enviada para o servidor, em breve será executada')</script>";
    echo "<script>location.href='index.html'</script>";    
}
?>
