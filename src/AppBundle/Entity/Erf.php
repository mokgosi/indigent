<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Erf
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ErfRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Erf {

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
     * @Assert\NotBlank()
     */
    private $erfNo;

    /**
     * @var string
     *
     * @ORM\Column(name="street_name", type="string", length=255, nullable=true)
     */
    private $streetName;

    /**
     * @var integer
     *
     * @ORM\Column(name="section_id", type="integer")
     */
    private $sectionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer")
     */
    private $locationId;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_first_name", type="string", length=255, nullable=true)
     */
    private $ownerFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_last_name", type="string", length=255, nullable=true)
     */
    private $ownerLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_mobile", type="string", length=255, nullable=true)
     */
    private $ownerMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_telephone", type="string", length=255, nullable=true)
     */
    private $ownerTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_email", type="string", length=255, nullable=true)
     * @Assert\Email
     */
    private $ownerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_address", type="string", length=255, nullable=true)
     */
    private $ownerAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_id_no", type="string", length=15, nullable=true)
     */
    private $ownerIdNo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     * @Assert\DateTime()
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     * @Assert\DateTime()
     */
    private $updated;

    /**
     * @ORM\ManyToOne(targetEntity="ErfType", inversedBy="erfs")
     * @ORM\JoinColumn(name="erf_type_id", referencedColumnName="id")
     */
    protected $erfType;

    /**
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="erfs")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    protected $location;

    /**
     * @ORM\ManyToOne(targetEntity="Section", inversedBy="erfs")
     * @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     */
    protected $section;
    
     /**
     * @ORM\OneToMany(targetEntity="Payment", mappedBy="erf") 
     */
    protected $payments;

    public function __construct() {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set erfTypeId
     *
     * @param integer $erfTypeId
     * @return Erf
     */
    public function setErfTypeId($erfTypeId) {
        $this->erfTypeId = $erfTypeId;

        return $this;
    }

    /**
     * Get erfTypeId
     *
     * @return integer 
     */
    public function getErfTypeId() {
        return $this->erfTypeId;
    }

    /**
     * Set erfNo
     *
     * @param string $erfNo
     * @return Erf
     */
    public function setErfNo($erfNo) {
        $this->erfNo = $erfNo;

        return $this;
    }

    /**
     * Get erfNo
     *
     * @return string 
     */
    public function getErfNo() {
        return $this->erfNo;
    }

    /**
     * Set streetName
     *
     * @param string $streetName
     * @return Erf
     */
    public function setStreetName($streetName) {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * Get streetName
     *
     * @return string 
     */
    public function getStreetName() {
        return $this->streetName;
    }

    /**
     * Set sectionId
     *
     * @param integer $sectionId
     * @return Erf
     */
    public function setSectionId($sectionId) {
        $this->sectionId = $sectionId;

        return $this;
    }

    /**
     * Get sectionId
     *
     * @return integer 
     */
    public function getSectionId() {
        return $this->sectionId;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     * @return Erf
     */
    public function setLocationId($locationId) {
        $this->locationId = $locationId;

        return $this;
    }

    /**
     * Get locationId
     *
     * @return integer 
     */
    public function getLocationId() {
        return $this->locationId;
    }

    /**
     * Get ownerFirstName
     *
     * @return string
     */
    function getOwnerFirstName() {
        return $this->ownerFirstName;
    }

    /**
     * Get ownerLastName
     *
     * @return string
     */
    function getOwnerLastName() {
        return $this->ownerLastName;
    }

    /**
     * Get ownerMobile
     *
     * @return string
     */
    function getOwnerMobile() {
        return $this->ownerMobile;
    }

    /**
     * Get ownerTelephone
     *
     * @return string
     */
    function getOwnerTelephone() {
        return $this->ownerTelephone;
    }

    /**
     * Get ownerEmail
     *
     * @return string
     */
    function getOwnerEmail() {
        return $this->ownerEmail;
    }

    /**
     * Get ownerAddress
     *
     * @return string
     */
    function getOwnerAddress() {
        return $this->ownerAddress;
    }

    /**
     * Set ownerFirstName
     *
     * @param string $ownerFirstName
     * @return Erf
     */
    function setOwnerFirstName($ownerFirstName) {
        $this->ownerFirstName = $ownerFirstName;
    }

    /**
     * Set ownerLastName
     *
     * @param string $ownerLastName
     * @return Erf
     */
    function setOwnerLastName($ownerLastName) {
        $this->ownerLastName = $ownerLastName;
    }

    /**
     * Set ownerMobile
     *
     * @param string $ownerMobile
     * @return Erf
     */
    function setOwnerMobile($ownerMobile) {
        $this->ownerMobile = $ownerMobile;
    }

    /**
     * Set ownerTelephone
     *
     * @param string $ownerTelephone
     * @return Erf
     */
    function setOwnerTelephone($ownerTelephone) {
        $this->ownerTelephone = $ownerTelephone;
    }

    /**
     * Set ownerEmail
     *
     * @param string $ownerEmail
     * @return Erf
     */
    function setOwnerEmail($ownerEmail) {
        $this->ownerEmail = $ownerEmail;
    }

    /**
     * Set ownerAddress
     *
     * @param string $ownerAddress
     * @return Erf
     */
    function setOwnerAddress($ownerAddress) {
        $this->ownerAddress = $ownerAddress;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Erf
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Erf
     */
    public function setUpdated($updated) {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated() {
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
     * Get updated
     *
     * @return  string
     */
    function getOwnerIdNo() {
        return $this->ownerIdNo;
    }

    /**
     * Set ownerIdNo
     *
     * @param string $ownerIdNo
     * @return Erf
     */
    function setOwnerIdNo($ownerIdNo) {
        $this->ownerIdNo = $ownerIdNo;
    }

    /**
     * Set category
     *
     * @param AppBundle\Entity\ErfType $erfType
     */
    public function setErfType(ErfType $erfType) {
        $this->erfType = $erfType;
    }

    /**
     * Get category
     *
     * @return AppBundle\Entity\ErfType 
     */
    public function getErfType() {
        return $this->erfType;
    }

    /**
     * Set location
     *
     * @param AppBundle\Entity\Location $location
     */
    public function setLocation(Location $location) {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return AppBundle\Entity\Location 
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * Set section
     *
     * @param AppBundle\Entity\Section $section
     */
    public function setSection(Section $section) {
        $this->section = $section;
    }

    /**
     * Get section
     *
     * @return AppBundle\Entity\Section 
     */
    public function getSection() {
        return $this->section;
    }

}
