<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\PaymentMethod;

class LoadPaymentMethodData  extends AbstractFixture  implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $method = new PaymentMethod();
        $method->setName('Cash');
        
        $method1 = new PaymentMethod();
        $method1->setName('EFT');
       
        $manager->persist($method);
        $manager->persist($method1);
        
        $manager->flush();
        
        $this->addReference('ref-method', $method);
        $this->addReference('ref-method1', $method1);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}
