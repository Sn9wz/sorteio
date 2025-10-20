# sorteio


Este projeto utiliza **Docker Compose** para facilitar a execução do ambiente de desenvolvimento.

## Pré-requisitos

Antes de começar, você precisa ter instalado em sua máquina:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Estrutura do Docker

O arquivo `docker-compose.yml` está localizado em:
C:\Users\brayan medeiros\Documents\estudos\sorteio\docker-compose.yml


## Comandos Docker

Para iniciar o servidor:

```bash
docker compose up -d
```

Para parar e remover os containers:

```bash
docker compose down
```

## Observações

Certifique-se de estar no diretório correto (C:\Users\brayan medeiros\Documents\estudos\sorteio\) antes de executar os comandos.

Caso precise ver os logs dos containers, utilize:

```bash
docker compose logs -f
```

Para reconstruir a imagem após alterações no Dockerfile, use:

```bash
docker compose up -d --build
```
