<?php

namespace AppBundle\DataFixtures\ORM;

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
        $com->setAddress('Cnr Smuts & De Wet Streets, Koster');
        $com->setPostal('PO Box 66, Koster, 0348');
        $com->setPhone('014 543 2004/5');
        $com->setFax('');
        $com->setEmail('koster@koster.co.za');
        $com->setWebsite('http://www.kgetlengrivier.gov.za');
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
        return 7; // the order in which fixtures will be loaded
    }
}
