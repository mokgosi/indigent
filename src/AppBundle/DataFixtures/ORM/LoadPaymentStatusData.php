<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\PaymentStatus;

class LoadPaymentStatusData extends AbstractFixture  implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $status = new PaymentStatus();
        $status->setName('Completed');
        $status->setCreated(new \DateTime('now'));
        $status->setUpdated(new \DateTime('now'));
        
        $status1 = new PaymentStatus();
        $status1->setName('Cancelled');
        $status1->setCreated(new \DateTime('now'));
        $status1->setUpdated(new \DateTime('now'));
        
        $manager->persist($status);
        $manager->persist($status1);
        $manager->flush();
        
        $this->addReference('ref-status', $status);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 9; // the order in which fixtures will be loaded
    }
}
