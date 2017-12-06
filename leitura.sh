#!/bin/bash
##[ Ficha ]##########################
#
# Nome: criarusuario
#
# Escrito por: Jônatas Freitas (nenhumdeucerto)
#
# Criado em: 01/12/2017
#
# Ultima atualizacao: 06/12/2017 
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

LISTA=/var/www/html/usuarioftp/usuario.txt
LINHA_QTD_TOTAL=`cat $LISTA | wc -l`
LINHA=1

while [ $LINHA -le $LINHA_QTD_TOTAL ] ; do
    USUARIO=`sed -n "$LINHA"p $LISTA | cut -f1 -d";"`
    SENHA=`sed -n "$LINHA"p $LISTA | cut -f2 -d";"`
    GRUPO=`sed -n "$LINHA"p $LISTA | cut -f3 -d";"`
    SENHA2=$(openssl passwd -1 $SENHA)

    echo $USUARIO
    echo $SENHA
    echo $GRUPO

    sudo useradd -g $GRUPO -m $USUARIO -p $SENHA2

    LINHA=`expr $LINHA + 1`
done
cp $LISTA log/$LISTA`data +%Y%m%d`
rm -f $LISTA