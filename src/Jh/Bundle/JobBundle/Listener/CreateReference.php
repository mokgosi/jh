<?php

namespace Jh\Bundle\JobBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Jh\Bundle\JobBundle\Entity\Job;

class CreateReference
{
    public function postPersist(LifecycleEventArgs $args) {

        $entity = $args->getEntity();
        $em = $args->getEntityManager();
        
        if($entity instanceof Job) {
            $id = $entity->getId();
            $entity->setReference($id);
            $em->persist($entity);
        }
        $em->flush();
    }
}
?>
