<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Company;

class LoadCompanyData  extends AbstractFixture  implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $com = new Company();
        $com->setShortName('KGE');
        $com->setName('Kgetlengrivier Local Municipality');
        $com->setCreated(new \DateTime());
        $com->setUpdated(new \DateTime());
        $manager->persist($com);
        
        $manager->flush();
        
        $this->addReference('ref-com', $com);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 6; // the order in which fixtures will be loaded
    }
}
