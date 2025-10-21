# Sorteio
Um projeto em Laravel para sortear brindes durante o meetup do PHPRS.

## Pré-requisitos
- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
## Instalação

Primeiro precisamos instalar o docker, Se você não estiver usando o GNOME, deve instalar o gnome-terminal para habilitar o acesso ao terminal do Docker Desktop

```
sudo apt install gnome-terminal
```

Agora sim, baixe o Docker

```
sudo apt-get update
sudo apt-get install ./docker-desktop-amd64.deb
```

Pronto agora vamos criar um contêiner com a imagem PHP e tentar instalar o Composer e o Bun manualmente.

```
docker run -it --rm php bash
```

>Esse comando vai criar um contêiner com a imagem PHP e executar o comando bash dentro dele. O parâmetro --rm vai remover o contêiner assim que ele for encerrado.

Beleza vamos tentar instalar o composer agora

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Antes de instalar o bun ele precisa do unzip, que não está instalado no contêiner. Vamos instalar.

```
apt-get update && apt-get install -y unzip
```

Ótimo vamos tentar instalar o Bun — um gerenciador de pacotes alternativo ao Node.js.

```
curl -fsSL https://bun.sh/install | bash
```

Só mais um comando que o Bun pediu para rodar, e está instalado.

```
source /root/.bashrc
```

>Na verdade, ele já estava instalado, mas para que funcionasse na sessão atual do shell, eu tive que rodar esse comando para recarregar o arquivo .bashrc.

Vamos testar se tudo está funcionando até agora.

```
composer --version
bun --version
```
## Estrutura do Docker

O arquivo `docker-compose.yml` está localizado em: sorteio\docker-compose.yml

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
