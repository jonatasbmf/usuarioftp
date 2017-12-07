#!/bin/bash

##[ Ficha ]#####################################
#
# Nome: leitura.sh
# Escrito por: Jônatas Freitas (nenhumdeucerto)
# Criado em: 01/12/2017
# Ultima atualizacao: 07/12/2017
#
##[ Descricao ]#################################
#
# - Script tem a finalidade de adicionar usuários ao sistema
# para que os mesmos tenham acesso ao FTP
# - Script está sendo chamado pelo Cron de 3 em 3 min;
# - Usuários adicionados estão em um arquivo txt.
#
################################################
echo "Inicio, definindo variáveis."
DATA=`date +%Y%m%d-%H:%M`
LISTA=/var/www/html/usuarioftp/usuario.txt
LINHA_QTD_TOTAL=`cat $LISTA | wc -l`
LINHA=1
echo "Começa a ler o arquivo"
while [ $LINHA -le $LINHA_QTD_TOTAL ] ; do
    USUARIO=`sed -n "$LINHA"p $LISTA | cut -f1 -d";"`
    SENHA=`sed -n "$LINHA"p $LISTA | cut -f2 -d";"`
    GRUPO=`sed -n "$LINHA"p $LISTA | cut -f3 -d";"`
    SENHA2=$(openssl passwd $SENHA)

	sudo useradd -m $USUARIO -g $GRUPO -p $SENHA2

    if [ $? -eq 0 ]
    then
        echo "Criado o usuário: $USUARIO com a senha: $SENHA no grupo: $GRUPO - $DATA"
    else
        echo "Erro na criação do usário $USUARIO! - $DATA "
    fi

    LINHA=`expr $LINHA + 1`

done
echo "While finalizado..."
cp $LISTA /var/www/html/usuarioftp/log/
rm -f $LISTA
cd /var/www/html/usuarioftp/log
mv usuario.txt usuario-$DATA.txt