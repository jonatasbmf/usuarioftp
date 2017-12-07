# Adicionar usuário
Criar usuário no sistema

Muitas vezes precisamos criar usuários automaticamente no sistema
Este projeto tem como objetivo permitir que por uma página web os
usuários sejam informados e por um script rodado pelo servidor em
um período pré-determinado sejam inseridos.

No Cron do Usuario vamos inserir as seguintes informações:

    Crontab -e
    */2 * * * * sh /var/www/html/usuarioftp/leitura.sh
    */3 * * * * (cat /etc/passwd | cut -d \: -f1) > /var/www/html/usuarioftp/cadastrados.txt


Para que o script execute o camando 'sudo adduser ....' e não pare sua execução aguardando a senha do usuário, vamos mudar a configuração dele dentro do grupo sudoers:

    sudo nano /etc/sudoers
    Nas especificações de privilégio do usuário
    user ALL=NOPASSWD:ALL