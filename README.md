# Meu Perfil App

Bem-vindo ao Meu Perfil App, uma aplicação Laravel 10 que permite aprimorar seu perfil. Siga as instruções abaixo para configurar e executar o aplicativo.

## Requisitos

Certifique-se de que você possui as seguintes dependências instaladas:

- [Composer](https://getcomposer.org/)
- [PHP 8.1](https://www.php.net/)
- [PostgreSQL 15](https://www.postgresql.org/)

## Instalação

1. Clone o repositório do GitHub:

   ```bash
   git clone https://github.com/fabriciosilvaJr/meu-perfil-app.git
   
2. Navegue até o diretório do projeto:
    `cd meu-perfil-app`

3. Renomeie o arquivo .env.example para .env:
   `mv .env.example .env`

4. Instale as dependências do Composer:
   `composer install`

5. Abra o arquivo php.ini e certifique-se de que as extensões pdo_pgsql e gd estão descomentadas (sem ponto e vírgula no início da linha). Isso é importante para o funcionamento correto do aplicativo.

6. Crie um usuário no banco de dados PostgreSQL com o nome sail e senha password.

7. Crie um banco de dados chamado meu_perfil_app.

8. Dê permissões de super usuário para o usuário sail.

9. Execute as migrações para criar as tabelas do banco de dados:
    `php artisan migrate`
   
10. Instale as dependências JavaScript:
    `npm install`

11. Compile os ativos do aplicativo:
    `npm run build`
    
## Executando o Aplicativo

Agora que o aplicativo está configurado, você pode executá-lo com o seguinte comando:
`php artisan serve`

O aplicativo estará disponível em http://localhost:8000.

Lembre-se de que estas são instruções básicas para configurar e executar o aplicativo. Dependendo das necessidades do seu projeto, você pode precisar fazer ajustes adicionais. Certifique-se de consultar a documentação do Laravel e do Breeze para obter mais informações.








