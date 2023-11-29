# RETROTYPING

Retro Typing é um jogo baseado em desafios de digitação, incentivando o usuário a digitar o maior número possível de palavras corretamente em um minuto. Quanto mais rápido o usuário digitar, maior será sua pontuação.

## Linguagens utilizadas e estrutura do repositório

Este projeto foi desenvolvido utilizando HTML, CSS, JavaScript e PHP, além de possuir integração com banco de dados MySQL. O repositório foi organizado agrupando todos os arquivos do código, sendo que cada arquivo possui uma nomeação específica para fácil identificação e distinção. Foi utilizada somente uma imagem que servirá para todas as telas do jogo.

## Estrutura do banco de dados

O banco de dados foi nomeado como "typing-game", contendo duas tabelas denominadas "user" e "pontuacao". A tabela "user" é responsável por armazenar as informações dos usuários, tais como id, username e senha. Por outro lado, a tabela "pontuacao" é responsável por armazenar as pontuações dos usuários, juntamente com as respectivas datas e horas, que serão registradas no banco.

## Por onde começar?

Para jogar, o usuário deve clonar o repositório Git em sua máquina. Recomenda-se a utilização do programa "XAMPP" como servidor web local. Após iniciar os servidores do XAMPP, procure pela pasta "htdocs" no diretório onde os arquivos do programa estão armazenados. O repositório do jogo deve estar localizado nessa pasta. Acesse o seguinte endereço no seu navegador: http://localhost/TypingGame, que abrirá uma página com os arquivos do jogo. Vá até os arquivos "conexao.php" e "cria_tabela.php" para integrar o jogo ao banco de dados. Se nenhuma mensagem de erro aparecer, o usuário pode acessar o arquivo "registro.php" para começar sua jornada gamer no Retro Typing!

## Dicas

O jogo faz distinção entre letras maiúsculas e minúsculas. Ao se deparar com palavras ou frases que incluem ambas as formas, lembre-se de ser rápido(a) no Caps Lock, pois a pontuação não será contabilizada se houver descrepância entre as letras maiúsculas e minúsculas.