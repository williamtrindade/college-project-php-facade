### Resolução:
Foi desenvolvida a funcionalidade de envio de email com smtp utilizando o padrão estrutural Facade.
Utilizei a estrutura do framework lumen do php para facilitar a contrução das rotas de API, com um endpoint para teste do envio de email.

Acessar pacote da Facade: [App/Services/Facades/Mail](https://github.com/williamtrindade/college-project-php-facade/tree/master/app/Services/Facades/Mail).

#### Diagrama de classes
<img height="40%" src="https://raw.githubusercontent.com/williamtrindade/college-project-php-facade/master/classDiagram.png" alt="DC">

___
### Teste
#### Utilização da facade
```php
<?php

namespace App\Http\Controllers;

use App\Services\Facades\Mail\MailFacade;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function mail(Request $request)
    {
        $mail = new MailFacade();
        $mail->to('Wil', $request->to)
            ->from('William', $request->from)
            ->subject($request->subject)
            ->message($request->message)
            ->cc('tests@ggg.net')
            ->bcc('willafdsfssiam@fsdd.net')
            ->send();
        return response()->json($mail->getStatus());
    }
}
```
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
```json
{
    "from": "test@test.com",
    "to": "me@test.com",
    "subject": "a simple message",
    "message": "Hello!"
}
```
____
Referência:
https://refactoring.guru/design-patterns/facade

