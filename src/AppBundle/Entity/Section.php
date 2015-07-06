<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SectionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Section
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer")
     */
    private $locationId;

    /**
     * @var string
     *
     * @ORM\Column(name="x_coord", type="string", length=15)
     */
    private $xCoord;

    /**
     * @var string
     *
     * @ORM\Column(name="y_coord", type="string", length=15)
     */
    private $yCoord;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Section
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set xCoord
     *
     * @param string $xCoord
     * @return Section
     */
    public function setXCoord($xCoord)
    {
        $this->xCoord = $xCoord;

        return $this;
    }

    /**
     * Get xCoord
     *
     * @return string 
     */
    public function getXCoord()
    {
        return $this->xCoord;
    }

    /**
     * Set yCoord
     *
     * @param string $yCoord
     * @return Section
     */
    public function setYCoord($yCoord)
    {
        $this->yCoord = $yCoord;

        return $this;
    }

    /**
     * Get yCoord
     *
     * @return string 
     */
    public function getYCoord()
    {
        return $this->yCoord;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Section
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Section
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }
    
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue() {

        $this->setUpdated(new \DateTime('now'));

        if ($this->getCreated() == null) {
            $this->setCreated(new \DateTime('now'));
        }
    }
    
    /**
     * Get locationId
     *
     * @return integer
     */
    function getLocationId() {
        return $this->locationId;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     * @return Section
     */
    function setLocationId($locationId) {
        $this->locationId = $locationId;
    }


}
