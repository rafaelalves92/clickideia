# Documentação da API

**BASE_URL: https://localhost:5000/api**

## Tabela de Conteúdos

- [Visão Geral](#1-visão-geral)
- [Configurações Necessárias](#2-configurações-necessárias)
- [Endpoints](#3-endpoints)

---

## 1. Visão Geral

Visão geral do projeto, um pouco das tecnologias utilizadas.

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)
- [Docker](https://docker.com/)

---

## 2. Configurações Necessárias

Clone o projeto e copie o arquivo **.env.example** para **.env** com o seguinte comando:

```shell
cp .env.example .env
```

Em seguida, no arquivo **.env**, preencha os campos como do exemplo abaixo como desejar:
```
USER_LOGIN=
USER_PASSWORD=
```

Em seguida suba as imagens do docker com o seguinte comando:
```
docker compose up -d
```

Logo após, abra o terminal no container criado:
```
docker compose exec -it clickideia bash
```

Dentro do terminal, execute a instalação das dependências:
```
composer install
```

Assim que terminar, gere uma KEY para o APP:
```
php artisan key:generate
```

Agora gere uma **JWT SECRET**:
```
php artisan jwt:secret
```

E por último, vamos rodar as migrations:
```
php artisan migrate --seed
```

---

## 3. Endpoints

[ Voltar para o topo ](#tabela-de-conteúdos)

### Índice

- [Login](#1-user)
    - [POST - /login](#11-login-de-usuário)
- [Cards](#2-pets)
	- [POST - /cards](#21-criação-de-card)
	- [GET - /cards](#22-listando-cards)
	- [PUT - /cards/:id](#23-update-card)
	- [DELETE - /cards/:id](#24-delete-card)

---

## 1. **Login**
[ Voltar para os Endpoints ](#3-endpoints)

### Endpoints

| Método   | Rota       | Descrição                               |
|----------|------------|-----------------------------------------|
| POST     | /login     | Login de um usuário.                  | 

---

### 1.1. **Login de Usuário**

[ Voltar aos Endpoints ](#3-endpoints)

### `/login`

### Corpo da Requisição:
```json
{
	"username": "clickideia",
	"password": "clk@123",
}
```

### Corpo da Resposta:
```json
{
	"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjUwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjg1OTA3MjMxLCJleHAiOjE2ODU5MTA4MzEsIm5iZiI6MTY4NTkwNzIzMSwianRpIjoiRG9KZ1N0NFk0R0ZQY25URiIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.QwEaMBf_HXCo9h3v3KjEcNbgHCRjWN2tMSckEP9Owcw",
	"token_type": "bearer",
	"expires_in": 3600
}
```


## 2. **Cards**
[ Voltar para os Endpoints ](#3-endpoints)

### Endpoints

| Método   | Rota       | Descrição                               |
|----------|------------|-----------------------------------------|
| POST     | /cards     | Criação de um card.                  |
| GET     | /cards     | Listando cards.                  |
| PUT      | /cards/:id     | Update de um card.                 | 
| DELETE      | /cards/:id     | Delete de um card. 

---

### 2.1. **Criação de Card**

[ Voltar para os Endpoints ](#3-endpoints)

### `/cards`

### Corpo da Requisição:
```json
{
	"titulo": "Teste",
	"conteudo": "Testando",
	"lista": "Teste"
}
```

### Corpo da Resposta:
```json
{
	"titulo": "Teste",
	"conteudo": "Testando",
	"lista": "Teste",
	"updated_at": "2023-06-04T19:36:42.000000Z",
	"created_at": "2023-06-04T19:36:42.000000Z",
	"id": 1
}
```

### 2.2. **Listando Cards**

[ Voltar aos Endpoints ](#3-endpoints)

### `/cards`

### Exemplo de Request:
```
GET /cards
```

### Corpo da Resposta:
```json
[
	{
		"id": 1,
		"titulo": "Teste",
		"conteudo": "Testando",
		"lista": "Teste",
		"created_at": "2023-06-04T19:36:42.000000Z",
		"updated_at": "2023-06-04T19:36:42.000000Z"
	},
	{
		"id": 2,
		"titulo": "Teste2",
		"conteudo": "Testando2",
		"lista": "Teste2",
		"created_at": "2023-06-04T19:39:21.000000Z",
		"updated_at": "2023-06-04T19:39:21.000000Z"
	}
]
```

### 2.3. **Update card**

[ Voltar aos Endpoints ](#3-endpoints)

### `/cards/:id`

### Corpo da Requisição:
```json
{
	"titulo": "Teste1",
	"conteudo": "Testando1",
	"lista": "Teste1"
}
```

### Corpo da Resposta:
```json
{
	"id": 1,
	"titulo": "Teste1",
	"conteudo": "Testando1",
	"lista": "Teste1",
	"created_at": "2023-06-04T19:36:42.000000Z",
	"updated_at": "2023-06-04T19:42:09.000000Z"
}
```

### 2.4. **Delete card**

[ Voltar aos Endpoints ](#3-endpoints)

### `/cards/:id`

### Exemplo de Request:
```
DELETE /cards/:id
```
