Symfony Id Generator Example
============================
This is a simple random unique id generation example in PHP 8.1 with Symfony 6!

# Installation

### Requirements

- PHP 8.1 or higher

Clone this repository using HTTPS or SSH

```bash
$ git clone https://github.com/rakib-587/Symfony-Id-Generator-Example.git
```

Install all the backend dependencies using composer

```bash
$ composer install
```

Configure your database in .env, then run following commands

```bash
$ symfony console doctrine:database:create
$ symfony console make:migration
$ symfony console doctrine:migrations:migrate
```

Configure the orderNumberGenerator1

```yaml
    App\Service\OrderNumberGenerator1:
        arguments:
            $maxRetry: 6
            $length: 6
            $chars: '0123456789'
```

# Run

### Using Symfony CLI

If you are using Symfony CLI just run it by command:

```bash
$ symfony server:start
```
Now browse the given URL, or run this command:
```bash
$ symfony open:local
```