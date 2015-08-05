<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Owner;

class LoadOwnerData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $owner = new owner();
        $owner->setIdNo(1234567890123);
        $owner->setLastName('Foo');
        $owner->setFirstName('Bar');
        $owner->setEmail('mail@email.com');
        $owner->setMobile(0720112966);
        $owner->setTelephone(0210112966);
        $owner->setCreated(new \DateTime('now'));
        $owner->setUpdated(new \DateTime('now'));
        $manager->persist($owner);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }

}
