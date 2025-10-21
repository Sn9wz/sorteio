# Sorteio

Um projeto em Laravel para sortear brindes durante o meetup do PHPRS.

## 📋 Pré-requisitos

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## 🚀 Instalação

1. Clone o repositório:

```bash
git clone git@github.com:Sn9wz/sorteio.git
cd sorteio
```

1. Copie o arquivo de ambiente:

```bash
cp .env.example .env
```

1. Inicie os containers:

```bash
docker-compose up -d --build --force-recreate
```

1. Instalar dependências e configurar a aplicação:

```bash
docker-compose exec app composer install --no-interaction --no-plugins --no-scripts
docker-compose exec app npm install && npm run build
docker-compose exec app artisan key:generate
docker-compose exec app touch /var/www/html/database/database.sqlite
docker-compose exec app php artisan migrate --force
```

O script de entrada (`docker-entrypoint.sh`) irá automaticamente:

* Criar os diretórios necessários
* Instalar dependências do Composer e NPM
* Gerar a chave da aplicação
* Executar as migrations (se houver banco de dados configurado)

## 📂 Estrutura do Projeto

```bash
sorteio/
├── docker-compose.yml       # Configuração dos serviços Docker
├── Dockerfile               # Imagem PHP customizada
├── docker-entrypoint.sh     # Script de inicialização
├── docker/
│   └── nginx/
│       └── nginx.conf       # Configuração do Nginx
└── php.ini                  # Configurações customizadas do PHP
```

## 🐳 Comandos Docker

Para iniciar o servidor:

```bash
docker-compose up -d
```

Para parar e remover os containers:

```bash
docker-compose down
```

Entrar no container da aplicação:

```bash
docker-compose exec app bash
```

## Observações

Certifique-se de estar no diretório correto do projeto antes de executar os comandos.

Caso precise ver os logs dos containers, utilize:

```bash
docker-compose logs -f
```

Para reconstruir a imagem após alterações no Dockerfile, use:

```bash
docker-compose up -d --build --force-recreate
```

## 🌐 Acessando a Aplicação

Após iniciar os containers, acesse:

> Aplicação: http://localhost:8080

## 📝 Notas Importantes

- Certifique-se de que as portas 8080 e 9000 estejam disponíveis
- Os volumes mapeiam o código local para /var/www/html no container
- As permissões dos diretórios storage e bootstrap/cache são configuradas automaticamente
