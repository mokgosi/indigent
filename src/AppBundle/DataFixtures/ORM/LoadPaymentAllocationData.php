<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\PaymentAllocation;

class LoadPaymentAllocationData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach (range(1, 5) as $i) {
            $allocation = new PaymentAllocation();
            $allocation->setErfId($i);
            $allocation->setAmount(100);
            $date = new \DateTime();
            $allocation->setMonth($date->format('F'));
            $allocation->setCreated($date);
            $allocation->setUpdated(new \DateTime());
            $manager->persist($allocation);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 8; // the order in which fixtures will be loaded
    }

}
