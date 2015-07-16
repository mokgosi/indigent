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
        $pay1 = new Payment();
        $pay1->setRefNo(20151);
        $pay1->setCompany($this->getReference('ref-com'));
        $pay1->setErf($this->getReference('ref-erf'));
        $pay1->setAmountDue(100);
        $pay1->setAmountReceived(100);
        $pay1->setAmountOutstanding(0);
        $pay1->setTotalOutstanding(1000);
        $pay1->setPayedBy('Payer 1');
        $pay1->setPayedByPhone('012 346 1230');
        $pay1->setStaffEmail('admin@domain.com');
        $pay1->setPaymentMethod($this->getReference('ref-method'));
        $pay1->setCreated(new \DateTime('2015-01-15 18:15:54.000'));
        $pay1->setUpdated(new \DateTime('2015-01-15 18:15:54.000'));
        
        $pay2 = new Payment();
        $pay2->setRefNo(20152);
        $pay2->setCompany($this->getReference('ref-com'));
        $pay2->setErf($this->getReference('ref-erf'));
        $pay2->setAmountDue(100);
        $pay2->setAmountReceived(100);
        $pay2->setAmountOutstanding(0);
        $pay2->setTotalOutstanding(900);
        $pay2->setPayedBy('Payer 1');
        $pay2->setPayedByPhone('012 346 1230');
        $pay2->setStaffEmail('admin@domain.com');
        $pay2->setPaymentMethod($this->getReference('ref-method'));
        $pay2->setCreated(new \DateTime('2015-02-15 18:15:54.000'));
        $pay2->setUpdated(new \DateTime('2015-02-15 18:15:54.000'));
        
        $pay3 = new Payment();
        $pay3->setRefNo(20153);
        $pay3->setCompany($this->getReference('ref-com'));
        $pay3->setErf($this->getReference('ref-erf'));
        $pay3->setAmountDue(100);
        $pay3->setAmountReceived(100);
        $pay3->setAmountOutstanding(0);
        $pay3->setTotalOutstanding(800);
        $pay3->setPayedBy('Payer 1');
        $pay3->setPayedByPhone('012 346 1230');
        $pay3->setStaffEmail('admin@domain.com');
        $pay3->setPaymentMethod($this->getReference('ref-method'));
        $pay3->setCreated(new \DateTime('2015-03-15 18:15:54.000'));
        $pay3->setUpdated(new \DateTime('2015-03-15 18:15:54.000'));
        
        $pay4 = new Payment();
        $pay4->setRefNo(20154);
        $pay4->setCompany($this->getReference('ref-com'));
        $pay4->setErf($this->getReference('ref-erf'));
        $pay4->setAmountDue(100);
        $pay4->setAmountReceived(100);
        $pay4->setAmountOutstanding(0);
        $pay4->setTotalOutstanding(700);
        $pay4->setPayedBy('Payer 1');
        $pay4->setPayedByPhone('012 346 1230');
        $pay4->setStaffEmail('admin@domain.com');
        $pay4->setPaymentMethod($this->getReference('ref-method'));
        $pay4->setCreated(new \DateTime('2015-04-15 18:15:54.000'));
        $pay4->setUpdated(new \DateTime('2015-04-15 18:15:54.000'));
        
        $pay5 = new Payment();
        $pay5->setRefNo(20155);
        $pay5->setCompany($this->getReference('ref-com'));
        $pay5->setErf($this->getReference('ref-erf'));
        $pay5->setAmountDue(100);
        $pay5->setAmountReceived(100);
        $pay5->setAmountOutstanding(0);
        $pay5->setTotalOutstanding(600);
        $pay5->setPayedBy('Payer 1');
        $pay5->setPayedByPhone('012 346 1230');
        $pay5->setStaffEmail('admin@domain.com');
        $pay5->setPaymentMethod($this->getReference('ref-method'));
        $pay5->setCreated(new \DateTime('2015-05-15 18:15:54.000'));
        $pay5->setUpdated(new \DateTime('2015-05-15 18:15:54.000'));
        
        $pay6 = new Payment();
        $pay6->setRefNo(20156);
        $pay6->setCompany($this->getReference('ref-com'));
        $pay6->setErf($this->getReference('ref-erf'));
        $pay6->setAmountDue(100);
        $pay6->setAmountReceived(100);
        $pay6->setAmountOutstanding(0);
        $pay6->setTotalOutstanding(500);
        $pay6->setPayedBy('Payer 1');
        $pay6->setPayedByPhone('012 346 1230');
        $pay6->setStaffEmail('admin@domain.com');
        $pay6->setPaymentMethod($this->getReference('ref-method'));
        $pay6->setCreated(new \DateTime('2015-06-15 18:15:54.000'));
        $pay6->setUpdated(new \DateTime('2015-06-15 18:15:54.000'));
        
        $manager->persist($pay1);
        $manager->persist($pay2);
        $manager->persist($pay3);
        $manager->persist($pay4);
        $manager->persist($pay5);
        $manager->persist($pay6);
        
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 7; // the order in which fixtures will be loaded
    }
}
