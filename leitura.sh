#!/bin/bash

##[ Ficha ]#####################################
#
# Nome: leitura.sh
# Escrito por: Jônatas Freitas (nenhumdeucerto)
<<<<<<< HEAD
# Criado em: 04/12/2017
# Ultima atualizacao: 01/12/2017 
=======
#
# Criado em: 01/12/2017
#
# Ultima atualizacao: 06/12/2017 
>>>>>>> master
#
##[ Descricao ]#################################
#
# - Script tem a finalidade de adicionar usuários ao sistema
# para que os mesmos tenham acesso ao FTP 
# - Script está sendo chamado pelo Cron de 3 em 3 min;
# - Usuários adicionados estão em um arquivo txt.
#
################################################
DATA=`date +%Y%m%d-%H:%M`
LISTA=/var/www/html/usuarioftp/usuario.txt
LINHA_QTD_TOTAL=`cat $LISTA | wc -l`
#LINHA_QTD_TOTAL=`expr $LINHA_QTD_TOTAL + 1`
LINHA=1

while [ $LINHA -le $LINHA_QTD_TOTAL ] ; do
    USUARIO=`sed -n "$LINHA"p $LISTA | cut -f1 -d";"`
    SENHA=`sed -n "$LINHA"p $LISTA | cut -f2 -d";"`
    GRUPO=`sed -n "$LINHA"p $LISTA | cut -f3 -d";"`
    SENHA2=$(openssl passwd $SENHA)

<<<<<<< HEAD
    useradd -m $USUARIO -g $GRUPO -p $SENHA2 
=======
    sudo useradd -g $GRUPO -m $USUARIO -p $SENHA2
>>>>>>> master

    if [ $? -eq 0 ] 
    then
        echo "Criado o usuário: $USUARIO com a senha: $SENHA no grupo: $GRUPO - $DATA" 
    else
        echo "Erro na criação do usário $USUARIO! - $DATA "
    fi
    
    LINHA=`expr $LINHA + 1`
done
cp $LISTA log/$LISTA`data +%Y%m%d`
rm -f $LISTA