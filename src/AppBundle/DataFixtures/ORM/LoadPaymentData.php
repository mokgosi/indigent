<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Payment;

class LoadPaymentData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $p = 0;
        foreach (range(1, 100) as $i) {
            
            $rand = rand(1, 7);

            //add a few recs per month
            $erf = 0;
            foreach (range(1, $rand) as $y) {
                $p++;
                $pay = new Payment();
                $pay->setRefNo('2015' . $p);
                $pay->setCompany($this->getReference('ref-com'));
                $pay->setErf($this->getReference('ref-erf'.$i));
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
                $date->add(new \DateInterval('P1M'));
                $date->sub(new \DateInterval('P1M'));
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
    public function getOrder() {
        return 7; // the order in which fixtures will be loaded
    }

}
