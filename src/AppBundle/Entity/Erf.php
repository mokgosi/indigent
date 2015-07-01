<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Erf
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ErfRepository")
 */
class Erf
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
     * @var integer
     *
     * @ORM\Column(name="erf_type_id", type="integer")
     */
    private $erfTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="erf_no", type="string", length=10)
     */
    private $erfNo;

    /**
     * @var string
     *
     * @ORM\Column(name="erf_street_name", type="string", length=255)
     */
    private $erfStreetName;

    /**
     * @var integer
     *
     * @ORM\Column(name="erf_section_id", type="integer")
     */
    private $erfSectionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="erf_location_id", type="integer")
     */
    private $erfLocationId;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="erf_owner_id", type="integer")
     */
    private $erfOwnerId;

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
     * Set erfTypeId
     *
     * @param integer $erfTypeId
     * @return Erf
     */
    public function setErfTypeId($erfTypeId)
    {
        $this->erfTypeId = $erfTypeId;

        return $this;
    }

    /**
     * Get erfTypeId
     *
     * @return integer 
     */
    public function getErfTypeId()
    {
        return $this->erfTypeId;
    }

    /**
     * Set erfNo
     *
     * @param string $erfNo
     * @return Erf
     */
    public function setErfNo($erfNo)
    {
        $this->erfNo = $erfNo;

        return $this;
    }

    /**
     * Get erfNo
     *
     * @return string 
     */
    public function getErfNo()
    {
        return $this->erfNo;
    }

    /**
     * Set erfStreetName
     *
     * @param string $erfStreetName
     * @return Erf
     */
    public function setErfStreetName($erfStreetName)
    {
        $this->erfStreetName = $erfStreetName;

        return $this;
    }

    /**
     * Get erfStreetName
     *
     * @return string 
     */
    public function getErfStreetName()
    {
        return $this->erfStreetName;
    }

    /**
     * Set erfSectionId
     *
     * @param integer $erfSectionId
     * @return Erf
     */
    public function setErfSectionId($erfSectionId)
    {
        $this->erfSectionId = $erfSectionId;

        return $this;
    }

    /**
     * Get erfSectionId
     *
     * @return integer 
     */
    public function getErfSectionId()
    {
        return $this->erfSectionId;
    }

    /**
     * Set erfLocationId
     *
     * @param integer $erfLocationId
     * @return Erf
     */
    public function setErfLocationId($erfLocationId)
    {
        $this->erfLocationId = $erfLocationId;

        return $this;
    }

    /**
     * Get erfLocationId
     *
     * @return integer 
     */
    public function getErfLocationId()
    {
        return $this->erfLocationId;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Erf
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
     * @return Erf
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
     * Set erfOwnerId
     *
     * @param integer $erfOwnerId
     * @return Erf
     */
    public function setErfOwnerId($erfOwnerId)
    {
        $this->erfOwnerId = $erfOwnerId;

        return $this;
    }

    /**
     * Get erfOwnerId
     *
     * @return integer 
     */
    public function getErfOwnerId()
    {
        return $this->erfOwnerId;
    }
}
