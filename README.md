# Documentação da API

**BASE_URL: https://localhost:5000/api**

## Tabela de Conteúdos

- [Visão Geral](#1-visão-geral)
- [Início Rápido](#2-início-rápido)
    - [Instalando Dependências](#21-instalando-dependências)
    - [Variáveis de Ambiente](#22-variáveis-de-ambiente)
    - [Migrations](#24-migrations)
- [Endpoints](#3-endpoints)

---

## 1. Visão Geral

Visão geral do projeto, um pouco das tecnologias usadas.

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)

---

## 2. Início Rápido

### 2.1. Instalando Dependências

Clone o projeto em sua máquina e instale as dependências com o comando:

```shell
composer update
```

### 2.2. Variáveis de Ambiente

Em seguida, crie um arquivo **.env**, copiando o formato do arquivo **.env.example** e configure no arquivo o login como desejar utilizar:
```
USER_LOGIN=
USER_PASSWORD=
```

Configure suas variáveis de ambiente com suas credenciais do MySQL e uma nova database da sua escolha:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### 2.3. Após configurar as variáveis de ambiente, configure o JWT Secret com o seguinte comando:
```shell
php artisan jwt:secret
```

### 2.4. Migrations

Execute as migrations com o comando:

```
php artisan migrate:fresh --seed
```

---

## 3. Endpoints
### Obs.: TODOS OS ENDPOINTS DE CARDS REQUEREM UM TOKEN JWT.

[ Voltar para o topo ](#tabela-de-conteúdos)

### Índice

- [Login](#1-user)
    - [POST - /login](#11-login-de-usuário)
- [Cards](#2-pets)
	- [POST - /cards](#21-criação-de-card)
	- [GET - /cards](#22-listando-cards)
	- [PUT - /cards/:id](#23-update-card)
	- [DELETE - /cards/:id](#25-delete-card)

---

## 1. **Login**
[ Voltar para os Endpoints ](#5-endpoints)

### Endpoints

| Método   | Rota       | Descrição                               |
|----------|------------|-----------------------------------------|
| POST     | /login     | Login de um usuário.                  | 

---

### 1.1. **Login usuário**

[ Voltar aos Endpoints ](#5-endpoints)

### `/login`

### Corpo da Requisição:
```json
{
	"username": "test",
	"password": "test@1234",
}
```
### Após o login ser realizado com sucesso será retornado um TOKEN JWT.


## 2. **Cards**
[ Voltar para os Endpoints ](#5-endpoints)

### Endpoints

| Método   | Rota       | Descrição                               |
|----------|------------|-----------------------------------------|
| POST     | /cards     | Criação de um card.                  |
| GET     | /cards     | Listando cards.                  |
| PUT      | /cards/:id     | Update de um card.                 | 
| DELETE      | /cards/:id     | Delete de um card. 

---

### 2.1. **Criação de Card**

[ Voltar para os Endpoints ](#5-endpoints)

### `/cards`

### Corpo da Requisição:
```json
{
	"titulo": "Teste",
	"conteudo": "Testando",
	"lista": "Teste"
}
```

### 2.2. **Listando Cards**

[ Voltar aos Endpoints ](#5-endpoints)

### `/cards`

### Exemplo de Request:
```
GET /cards
```

### 2.3. **Update card**

[ Voltar aos Endpoints ](#5-endpoints)

### `/cards/:id`

### Corpo da Requisição:
```json
{
	"titulo": "Teste",
	"conteudo": "Testando",
	"lista": "Teste"
}
```

### 2.5. **Delete card**

[ Voltar aos Endpoints ](#5-endpoints)

### `/cards/:id`

### Exemplo de Request:
```
DELETE /cards/:id
```
