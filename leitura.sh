#!/bin/bash

##[ Ficha ]#####################################
#
# Nome: leitura.sh
# Escrito por: Jônatas Freitas (nenhumdeucerto)
# Criado em: 04/12/2017
# Ultima atualizacao: 01/12/2017 
#
##[ Descricao ]#################################
#
# - Script tem a finalidade de adicionar usuários ao sistema
# para que os mesmos tenham acesso ao FTP 
# - Script está sendo chamado pelo Cron de 3 em 3 min;
# - Usuários adicionados estão em um arquivo txt.
#
################################################
DATA=`date`
LISTA=/var/www/html/usuarioftp/usuario.txt
LINHA_QTD_TOTAL=`cat $LISTA | wc -l`
#LINHA_QTD_TOTAL=`expr $LINHA_QTD_TOTAL + 1`
LINHA=1

while [ $LINHA -le $LINHA_QTD_TOTAL ] ; do
    USUARIO=`sed -n "$LINHA"p $LISTA | cut -f1 -d";"`
    SENHA=`sed -n "$LINHA"p $LISTA | cut -f2 -d";"`
    GRUPO=`sed -n "$LINHA"p $LISTA | cut -f3 -d";"`
    SENHA2=$(openssl passwd $SENHA)

    #useradd -m -g $GRUPO -p $SENHA $USUARIO
    adduser -m -g $GRUPO -p $SENHA $USUARIO

    if [ $? == 0 ] 
    then
        echo "Criado o usuário: $USUARIO com a senha: $SENHA no grupo: $GRUPO - $DATA" 
    else
        echo "Erro na criação do usário $USUARIO! - $DATA "
    fi
    
    LINHA=`expr $LINHA + 1`
done

rm -f $LISTA