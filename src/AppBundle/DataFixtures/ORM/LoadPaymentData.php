<?php

namespace AppBundle\DataFixtures\ORM;

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
        $refNo = 0;
        foreach (range(1, 50) as $i) {
            $today = new \DateTime('now');
            $currMonth = $today->format('m');
            
            //how many months paid
            $months = rand(1, $currMonth);
            
            foreach (range(1, $months) as $y) {
                $refNo++;
                $pay = new Payment();
                $pay->setRefNo('2015' . $refNo);
                $pay->setCompany($this->getReference('ref-com'));
                $pay->setErf($this->getReference('ref-erf' . $i));
                $pay->setPaymentStatus($this->getReference('ref-status'));
                $pay->setAmountDue(100);
                $pay->setAmountReceived(100);
                $pay->setAmountOutstanding(0);
                $sub = 1000 - ((int) $y . '00');
                $pay->setTotalOutstanding($sub);
                $pay->setPayedBy('Payer 1');
                $pay->setPayedByPhone('012 346 1230');
                $pay->setStaffEmail('admin@domain.com');
                $pay->setPaymentMethod($this->getReference('ref-method'));
                $date = new \DateTime('2015-' . $y . '-15');
                $pay->setCreated($date);
                $pay->setUpdated(new \DateTime());
                $manager->persist($pay);
            }
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }

}
