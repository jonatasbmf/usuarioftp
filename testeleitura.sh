#!/bin/bash
##[ Ficha ]##########################
#
# Nome: criarusuario
#
# Escrito por: Jônatas Freitas (nenhumdeucerto)
#
# Criado em: 01/12/2017
#
# Ultima atualizacao: 01/12/2017 
#
##[ Descricao ]########################
#
# - Script tem a finalidade de adicionar usuários ao sistema
# para que os mesmos tenham acesso ao FTP
# 
# - Script está sendo chamado pelo Cron de 5 em 5 min;
# - Usuários adicionados estão em um arquivo txt.
#
##################################


while read linha 
do 

#ponha seu comando aqui
#exemplo
echo $linha
echo "-----"

done < usuario.txt