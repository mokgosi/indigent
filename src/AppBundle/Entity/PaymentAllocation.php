<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentAllocation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PaymentAllocationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class PaymentAllocation
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
     * @ORM\Column(name="erf_id", type="integer")
     */
    private $erfId;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=8, scale=2, options={"default":0})
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="month", type="string", length=255)
     */
    private $month;

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
     * @ORM\ManyToOne(targetEntity="Erf", inversedBy="allocations")
     * @ORM\JoinColumn(name="erf_id", referencedColumnName="id")
     */
    protected $erf;

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
     * Set erfId
     *
     * @param integer $erfId
     * @return PaymentAllocation
     */
    public function setErfId($erfId)
    {
        $this->erfId = $erfId;

        return $this;
    }

    /**
     * Get erfId
     *
     * @return integer 
     */
    public function getErfId()
    {
        return $this->erfId;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return PaymentAllocation
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set month
     *
     * @param string $month
     * @return PaymentAllocation
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get month
     *
     * @return string 
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return PaymentAllocation
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
     * @return PaymentAllocation
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
     * Set erf
     *
     * @param AppBundle\Entity\Erf $erf
     */
    public function getErf() {
        return $this->erf;
    }

    /**
     * Get erf
     *
     * @return AppBundle\Entity\Erf 
     */
    public function setErf(Erf $erf = null) {
        $this->erf = $erf;
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
