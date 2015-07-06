<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Erf
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ErfRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @var string
     *
     * @ORM\Column(name="erf_owner_first_name", type="string", length=255)
     */
     private $erfOwnerFirstName;
     
    /**
     * @var string
     *
     * @ORM\Column(name="erf_owner_last_name", type="string", length=255)
     */
    private $erfOwnerLastName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="erf_owner_mobile", type="string", length=255)
     */
    private $erfOwnerMobile;
    
    /**
     * @var string
     *
     * @ORM\Column(name="erf_owner_telephone", type="string", length=255)
     */
    private $erfOwnerTelephone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="erf_owner_email", type="string", length=255)
     */
    private $erfOwnerEmail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="erf_owner_address", type="string", length=255)
     */
    private $erfOwnerAddress;

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
    
    
    public function __construct() {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
    }

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
     * Get erfOwnerFirstName
     *
     * @return string
     */
    function getErfOwnerFirstName() {
        return $this->erfOwnerFirstName;
    }

    /**
     * Get erfOwnerLastName
     *
     * @return string
     */
    function getErfOwnerLastName() {
        return $this->erfOwnerLastName;
    }

    /**
     * Get erfOwnerMobile
     *
     * @return string
     */
    function getErfOwnerMobile() {
        return $this->erfOwnerMobile;
    }

    /**
     * Get erfOwnerTelephone
     *
     * @return string
     */
    function getErfOwnerTelephone() {
        return $this->erfOwnerTelephone;
    }

    /**
     * Get erfOwnerEmail
     *
     * @return string
     */
    function getErfOwnerEmail() {
        return $this->erfOwnerEmail;
    }
    
    /**
     * Get erfOwnerAddress
     *
     * @return string
     */
    function getErfOwnerAddress() {
        return $this->erfOwnerAddress;
    }

    /**
     * Set erfOwnerFirstName
     *
     * @param string $erfOwnerFirstName
     * @return Erf
     */
    function setErfOwnerFirstName($erfOwnerFirstName) {
        $this->erfOwnerFirstName = $erfOwnerFirstName;
    }

    /**
     * Set erfOwnerLastName
     *
     * @param string $erfOwnerLastName
     * @return Erf
     */
    function setErfOwnerLastName($erfOwnerLastName) {
        $this->erfOwnerLastName = $erfOwnerLastName;
    }

    /**
     * Set erfOwnerMobile
     *
     * @param string $erfOwnerMobile
     * @return Erf
     */
    function setErfOwnerMobile($erfOwnerMobile) {
        $this->erfOwnerMobile = $erfOwnerMobile;
    }

    /**
     * Set erfOwnerTelephone
     *
     * @param string $erfOwnerTelephone
     * @return Erf
     */
    function setErfOwnerTelephone($erfOwnerTelephone) {
        $this->erfOwnerTelephone = $erfOwnerTelephone;
    }

    /**
     * Set erfOwnerEmail
     *
     * @param string $erfOwnerEmail
     * @return Erf
     */
    function setErfOwnerEmail($erfOwnerEmail) {
        $this->erfOwnerEmail = $erfOwnerEmail;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Erf
     */
    function setErfOwnerAddress($erfOwnerAddress) {
        $this->erfOwnerAddress = $erfOwnerAddress;
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
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue() {

        $this->setUpdated(new \DateTime('now'));

        if ($this->getCreated() == null) {
            $this->setCreated(new \DateTime('now'));
        }
    }
}
