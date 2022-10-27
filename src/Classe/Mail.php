<?php
namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;


class Mail
{
   public function send()
   {
       $mj = new Client('****************************1234', '****************************abcd', true, ['version' => 'v3.1']);
       $body = [
           'Messages' => [
               [
                   'From' => [
                       'Email' => "ramyandrianina777@gmail.com",
                       'Name' => "ANDRIAMBOLA"
                   ],
                   'To' => [
                       [
                           'Email' => "ramyandrianina777@gmail.com",
                           'Name' => "ANDRIAMBOLA"
                       ]
                   ],
                   'Subject' => "Greetings from Mailjet.",
                   'TextPart' => "My first Mailjet email",
                   'CustomID' => "AppGettingStartedTest"
               ]
           ]
       ];
       $response = $mj->post(Resources::$Email, ['body' => $body]);
       $response->success() && var_dump($response->getData());
   }

}