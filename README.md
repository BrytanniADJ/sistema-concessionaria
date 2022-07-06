# Sistema Concessionária

## Requisitos mínimos
* PHP
* MariaDB
* Servidor Apache
* [Composer](https://getcomposer.org/download/)

Recomendamos a instalação do [XAMPP](https://www.apachefriends.org/pt_br/download.html) em sistemas operacionais Windows.

## Instalação para testes locais
1) Instalar o XAMPP
2) execute ``` git clone https://github.com/BrytanniADJ/sistema-concessionaria.git ``` na pasta do XAMPP
3) Renomeia a pasta *htdocs* para *htdocs.old*
4) Renomeia a pasta *sistema-concessionaria* para *htdocs*
5) Click em *start* no servidor *Apache* no aplicativo do XAMPP
6)[Abrir site no navegador: *localhost/*](http://localhost/)

7) execute ```composer i```
8) criar arquivo .env conforme as descrições de ```example.env```

## Sobre o Banco de dados

1) Click em *start* no banco de dados *MySql* do *XAMPP*
2) Utilize o gerenciador de banco de dados que preferir.
*obs.:* o XAMPP disponibiliza o [*PHPMyAdmin*](localhost/php)
3) Criar uma nova base de dados, com o nome que preferir
*obs.:* nome utilizado deverá ser preenchido no arquivo *.env*
4) Criar tabela `users` no banco de dados, usando a seguinte instrução SQL.

``` SQL
CREATE TABLE concessionaria.users(
    id INT auto_increment NOT NULL,
    login varchar(50) NOT NULL,
    password varchar(100) NOT NULL,
    tipo INT NOT NULL,
    primary key(id)
)
ENGINE=utf8mb4
DEFALT CHARSET=utf8mb4_general_ci;
```

5) Insira o usuário Admin *(teste)* no sistema.
``` INSERT INTO users (login, password, nome, tipo) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 1); ```

6) **Login:** admin **Senha:** admin
