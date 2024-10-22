# Bot do Telegram Fórmula 1

Este projeto é um bot do Telegram que fornece informações sobre a Fórmula 1, incluindo notícias, pilotos e equipes. O bot é construído usando Laravel e interage com um banco de dados para buscar dados relevantes.

## Índice
- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Executando a Aplicação](#executando-a-aplicação)
- [Testando o Bot](#testando-o-bot)
- [Capturas de Tela](#capturas-de-tela)
- [Contribuindo](#contribuindo)

## Pré-requisitos

Antes de começar, verifique se você tem o seguinte instalado em sua máquina:

- PHP >= 7.3
- Composer
- Laravel >= 8.x
- MySQL ou qualquer banco de dados de sua escolha
- Uma conta do Telegram

## Instalação

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/seuusuario/bot-f1-telegram.git
   cd bot-f1-telegram
    ```

## Instalação

### Instale as dependências:

Execute o seguinte comando para instalar os pacotes PHP necessários via Composer:

```bash
composer install
```

## Configuração do Projeto

### Configure o arquivo de ambiente:

Copie o arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```
## Configuração do Projeto

### Gere a chave da aplicação:

Este comando gerará uma chave única para sua aplicação Laravel:

```bash
php artisan key:generate
```

## Configuração do Banco de Dados

### Configure o banco de dados:

Abra o arquivo `.env` e atualize as configurações de conexão do banco de dados:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_nome_do_banco
DB_USERNAME=seu_usuario_do_banco
DB_PASSWORD=sua_senha_do_banco
```

## Executando as Migrações

Para criar as tabelas necessárias no banco de dados, execute:

```bash
php artisan migrate
```

## Configure o Bot do Telegram

1. Crie um novo bot conversando com o [BotFather](https://t.me/botfather) no Telegram.
2. Siga as instruções para obter o token do seu bot.
3. Adicione seu token do bot ao arquivo `.env`:

```plaintext
TELEGRAM_BOT_TOKEN=seu_token_do_bot_aqui
```

## Configuração do Webhook

### Atualize a URL do webhook:

Você precisa configurar seu webhook para conectar o bot do Telegram à sua aplicação. Execute o seguinte comando no terminal para definir o webhook:

```bash
curl -X POST "https://api.telegram.org/bot<SEU_TOKEN_DO_BOT>/setWebhook?url=<SUA_URL_DO_WEBHOOK>"
```

## Configuração do Webhook

Substitua `<SEU_TOKEN_DO_BOT>` pelo token do seu bot e `<SUA_URL_DO_WEBHOOK>` pela URL do servidor onde a aplicação Laravel está hospedada, seguida de `/api/webhook`.

## Executando a Aplicação

### Inicie o servidor de desenvolvimento Laravel:

Você pode executar a aplicação usando o servidor embutido do PHP. Use o comando abaixo:

```bash
php artisan serve
```

## Acesse a aplicação

Por padrão, isso executará sua aplicação em `http://127.0.0.1:8000`.

Abra seu navegador e vá para `http://127.0.0.1:8000` para acessar sua aplicação.

## Testando o Bot

### Inicie uma conversa com seu bot:

Abra o Telegram e procure seu bot pelo nome de usuário. Inicie uma conversa enviando `/start`.

### Use os comandos do bot:

Agora você pode usar o bot para obter notícias, informações sobre pilotos e informações sobre equipes. Siga as instruções para explorar as opções disponíveis.

## Capturas de Tela

### Interface do Site

Home

![Home](https://github.com/luanalamonica/Fotos_Formula1/blob/main/Home.png?raw=true)

Login

![Login](https://github.com/luanalamonica/Fotos_Formula1/blob/main/Login.png?raw=true)

Register

![Register](https://github.com/luanalamonica/Fotos_Formula1/blob/main/Register.png?raw=true)

News - pt1

![News - pt1](https://github.com/luanalamonica/Fotos_Formula1/blob/main/News.png?raw=true)

News - pt2

![News - pt2](https://github.com/luanalamonica/Fotos_Formula1/blob/main/News2.png?raw=true)

Scores - pt1

![Scores - pt1](https://github.com/luanalamonica/Fotos_Formula1/blob/main/Scores.png?raw=true)

Scores - pt2

![Scores - pt2](https://github.com/luanalamonica/Fotos_Formula1/blob/main/Scores2.png?raw=true)

### Interação com o Bot do Telegram

Welcome

![Welcome](https://github.com/luanalamonica/Fotos_Formula1/blob/main/Welcome%20telegram.png?raw=true)

Option 1

![Option1](https://github.com/luanalamonica/Fotos_Formula1/blob/main/option1%20telegram.png?raw=true)

Option 2

![Option2](https://github.com/luanalamonica/Fotos_Formula1/blob/main/option2%20telegram.png?raw=true)

Option 3

![Option3](https://github.com/luanalamonica/Fotos_Formula1/blob/main/option3%20telegram.png?raw=true)

## Contribuindo

Contribuições são bem-vindas! Se você tiver sugestões para melhorias ou novos recursos, fique à vontade para fazer um fork do repositório e criar um pull request.

## Como Usar Este Template

1. **Substitua `seuusuario`, `seu_nome_do_banco`, `seu_usuario_do_banco` e `sua_senha_do_banco`** com seu nome de usuário do GitHub, detalhes do banco de dados e outras configurações.
2. **Adicione Capturas de Tela**: Substitua os espaços reservados na seção "Capturas de Tela" pelos caminhos reais para suas imagens e adicione descrições para clareza.
3. **Teste as Instruções**: Certifique-se de seguir as etapas de instalação você mesmo para verificar se funcionam conforme o esperado e faça os ajustes necessários.
