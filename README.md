## Trabalho sobre Padrões em Sistemas Web

> **Demonstrar o uso de um padrão de projeto em Sistemas Web, contendo o seguinte:**
- Explicações sobre a aplicação do padrão. Pode ser um padrão GoF ou não. Caso seja GoF, precisa estar relacionado com componentes/classes que tem função na parte Web. Caso não seja GoF, buscar uma relação de semelhança do padrão implementado, com um ou mais padrões GoF.
- Diagrama de classes: relacionando as classes do sistema com os papeis de cada uma no padrão de projetos. Pode ser necessário colocar o diagrama de classes genérico do padrão, relacionando com as suas classes.
- Código fonte: pode ser em qualquer linguagem de programação orientada a objetos (backend ou frontend).

### Observações:
- Não pode ser MVC, DAO, Singleton nem Factory Method. Escolher outros...
- Não é necessário ser um projeto totalmente funcional.
- O trabalho é INDIVIDUAL.
- A entrega valerá presença, bem como 1,0 ponto adicional na segunda nota. 
___
### Resolução:
Foi desenvolvida a funcionalidade de envio de email com smtp utilizando o padrão estrutural Facade.
Utilizei a estrutura do framework lumen do php para facilitar a contrução das rotas de API, com um endpoint para teste do envio de email.

Acessar pacote da Facade: [App/Services/Facades/Mail](https://github.com/williamtrindade/college-project-php-facade/tree/master/app/Services/Facades/Mail).

### Diagrama de classes
<img height="40%" src="https://raw.githubusercontent.com/williamtrindade/college-project-php-facade/master/classDiagram.png" alt="DC">

___
### Teste
#### Configurar SMTP no .env
> **MAIL_MAILER=smtp  
  MAIL_HOST=smtp.mailtrap.io  
  MAIL_PORT=2525  
  MAIL_USERNAME={{username}}  
  MAIL_PASSWORD={{pass}}  
  MAIL_ENCRYPTION=tls**

#### Baixar dependências
> **composer install**

#### Rodar aplicação
> **php -S localhost:8000 -t public**

#### Fazer um POST no endpoint
> **{{HOST}}/mail**

