<?php
namespace AppBundle\EventListener;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Payment;

class PaymentReference
{
    public function postPersist(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        $em = $args->getEntityManager();
        
        if($entity instanceof Payment) {
            $ref = date('Y').$entity->getId();
            $entity->setRefNo($ref);
            $em->persist($entity);
        }
        $em->flush();
    }
}