# PHP Tempo Restante API

API em PHP que retorna o tempo restante até uma data futura,
calculado com base na data atual.

Este projeto foi desenvolvido com foco em **Clean Architecture**,
**separação de responsabilidades** e **testes unitários**, sem uso
de frameworks, com o objetivo de demonstrar domínio dos fundamentos
da linguagem e boas práticas de design de software.

---

## Funcionalidade

A API recebe uma data futura e retorna quanto tempo falta até ela,
considerando a data atual do sistema.

Exemplo de requisição:

GET /tempo/2026-05-20

Resposta:

```json
{
  "anos": 0,
  "meses": 3,
  "dias": 24,
  "horas": 7,
  "minutos": 32
}
```

## Estrutura do projeto

```
src/
├── Domain # Regras de negócio e objetos de domínio
├── Http # Controllers e camada HTTP
tests/
├── Domain # Testes unitários
├── Support # Fakes e utilitários de teste
public/
└── index.php # Ponto de entrada da aplicação
``

## Testes

O projeto possui testes unitários utilizando PHPUnit.

Para executar os testes:

```

composer install
vendor/bin/phpunit

```

## Conceitos aplicados

- Clean Architecture

- Domain-Driven Design (nível tático)

- SOLID

- Value Objects

- Dependency Injection

- Testes unitários isolados

- Fake vs Mock

- Código desacoplado de framework

## Objetivo do projeto

Este projeto foi criado com fins educacionais e demonstrativos,
servindo como portfólio técnico para estudo de arquitetura, testes
e boas práticas em PHP.

Licença

- Projeto livre para estudo.
```
