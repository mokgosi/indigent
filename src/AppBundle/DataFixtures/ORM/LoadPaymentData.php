<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Payment;

class LoadPaymentData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $pay = new Payment();
        $pay->setReceiptNo(231);
        $pay->setErf($this->getReference('ref-erf'));
        $pay->setAmountDue(100);
        $pay->setAmountReceived(50);
        $pay->setAmountOutstanding(50);
        $pay->setTotalOutstanding(300);
        $pay->setPayedBy('Payer 1');
        $pay->setPayedByAddress('123 Church Street');
        $pay->setPayedByPhone('012 346 1230');
        $pay->setFosUserId(1);
        $pay->setCreated(new \DateTime());
        $pay->setUpdated(new \DateTime());
        
        $pay2 = new Payment();
        $pay2->setReceiptNo(232);
        $pay2->setErf($this->getReference('ref-erf'));
        $pay2->setAmountDue(100);
        $pay2->setAmountReceived(50);
        $pay2->setAmountOutstanding(50);
        $pay2->setTotalOutstanding(300);
        $pay2->setPayedBy('Payer 1');
        $pay2->setPayedByAddress('123 Church Street');
        $pay2->setPayedByPhone('012 346 1230');
        $pay2->setFosUserId(1);
        $pay2->setCreated(new \DateTime());
        $pay2->setUpdated(new \DateTime());
        
        $manager->persist($pay);
        $manager->persist($pay2);
        
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}
