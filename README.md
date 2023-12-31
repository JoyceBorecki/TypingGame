# RETROTYPING

Retro Typing é um jogo baseado em desafios de digitação, incentivando o usuário a digitar o maior número possível de palavras corretamente em um minuto. Quanto mais rápido o usuário digitar, maior será sua pontuação.

## Linguagens utilizadas e estrutura do repositório

Este projeto foi desenvolvido utilizando HTML, CSS, JavaScript e PHP, além de possuir integração com banco de dados MySQL. O repositório foi organizado agrupando todos os arquivos do código, sendo que cada arquivo possui uma nomeação específica para fácil identificação e distinção. Foi utilizada somente uma imagem que servirá para todas as telas do jogo.

## Estrutura do banco de dados

O banco de dados foi nomeado como "typing-game", contendo duas tabelas denominadas "users" e "pontuacao". A tabela "users" é responsável por armazenar as informações dos usuários, tais como id, username e senha. Por outro lado, a tabela "pontuacao" é responsável por armazenar as pontuações dos usuários, juntamente com as respectivas datas e horas, que serão registradas no banco.

## Por onde começar?

Para jogar, o usuário deve clonar o repositório Git em sua máquina. Recomenda-se a utilização do programa "XAMPP" como servidor web local. Após iniciar os servidores do XAMPP, procure pela pasta "htdocs" no diretório onde os arquivos do programa estão armazenados. O repositório do jogo deve estar localizado nessa pasta. Acesse o seguinte endereço no seu navegador: http://localhost/TypingGame, que abrirá uma página com os arquivos do jogo. Antes de acessar os arquivos do jogo, acesse a url: http://localhost/phpmyadmin/ onde o usuário terá acesso ao banco de dados MySQL. Essa interface do banco de dados possibilitará ao usuário criar o banco "typing-game". Após a criação do banco, vá até os arquivos "conexao.php", "cria_tabela.php" e "pontuacao.php" para integrar o jogo ao banco de dados. Se nenhuma mensagem de erro aparecer, o usuário pode acessar o arquivo "registro.php" para começar sua jornada gamer no Retro Typing!

## Como o jogo funciona?

Após acessar o arquivo "registro.php", o usuário se deparará com uma tela de registro que permitirá a criação de seu nome de usuário e senha. Lembre-se de que todos os campos, desde a página de registro até a de login, devem ser preenchidos corretamente. Com o regitro concluído, o usuário pode acessar o jogo por meio da tela "login.php", onde utilizará as informações cadastradas anteriormente. Após o login, será redirecionado para a tela "welcome.php", onde terá acesso à sua pontuação individual e a um ranking de pontuação dos usuários que participaram do jogo. Na tela de boas-vindas, o usuário poderá iniciar o jogo clicando no hiperlink "Jogar", ou, se preferir, sair do sistema através do hiperlink "Sair da conta". Ao clicar em "Jogar", o usuário se deparará com uma tela contendo um cronômetro iniciando em 60 segundos, sua pontuação e uma caixa de texto para digitar as palavras ou frases geradas pelo jogo. Quando o cronômetro atingir zero, um alerta será exibido na tela informando que o jogo terminou, junto com a pontuação do jogador. Ao clicar em "Ok" no alerta, o usuário será redirecionado para a tela "welcome.php".

## Dicas

O jogo faz distinção entre letras maiúsculas e minúsculas. Ao se deparar com palavras ou frases que incluem ambas as formas, lembre-se de ser rápido(a) no Caps Lock, pois a pontuação não será contabilizada se houver descrepância entre as letras maiúsculas e minúsculas.
