<?php
namespace App\Classe;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeCrudActionEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EventSucriber implements EventSubscriberInterface
{
    private $hash;
    private $manager;
    public function __construct(UserPasswordHasherInterface $hasher, EntityManagerInterface $manager)
    {
        $this->hash = $hasher;
        $this->manager = $manager;
    }

    public static function getSubscribedEvents()
    {
        return [

            BeforeEntityUpdatedEvent::class => ['setPassword']
        ];
    }

    public function setPassword(BeforeEntityUpdatedEvent $event)
    {

        $entity = $event->getEntityInstance();

        if(!$entity instanceof User){
            return;
        }
        $password = $this->hash->hashPassword( $entity,$entity->getPassword());
        $entity->setPassword($password);

    }
}