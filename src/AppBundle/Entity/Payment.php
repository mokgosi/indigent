<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Payment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PaymentRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Payment {

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
     * @ORM\Column(name="receipt_no", type="string", length=255)
     */
    private $receiptNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="erf_id", type="integer")
     */
    private $erfId;

    /**
     * @var string
     *
     * @ORM\Column(name="amount_due", type="decimal")
     */
    private $amountDue;

    /**
     * @var string
     *
     * @ORM\Column(name="amount_received", type="decimal")
     */
    private $amountReceived;

    /**
     * @var string
     *
     * @ORM\Column(name="amount_outstanding", type="decimal")
     */
    private $amountOutstanding;

    /**
     * @var string
     *
     * @ORM\Column(name="total_outstanding", type="decimal")
     */
    private $totalOutstanding;

    /**
     * @var string
     *
     * @ORM\Column(name="payed_by", type="string", length=255)
     */
    private $payedBy;

    /**
     * @var string
     *
     * @ORM\Column(name="payed_by_phone", type="string", length=255)
     */
    private $payedByPhone;

    /**
     * @var integer
     *
     * @ORM\Column(name="staff_email", type="string", length=255)
     */
    private $staffEmail;

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
     * @ORM\ManyToOne(targetEntity="Erf", inversedBy="payments")
     * @ORM\JoinColumn(name="erf_id", referencedColumnName="id")
     */
    protected $erf;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="payment_method_id", type="integer")
     */
    private $paymentMethodId;
    
    /**
     * @ORM\ManyToOne(targetEntity="PaymentMethod", inversedBy="payments")
     * @ORM\JoinColumn(name="payment_method_id", referencedColumnName="id")
     */
    protected $paymentMethod;
    
    public function __construct() {
        $this->created = new \DateTime();
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
     * Set receiptNo
     *
     * @param string $receiptNo
     * @return Payment
     */
    public function setReceiptNo($receiptNo) {
        $this->receiptNo = $receiptNo;

        return $this;
    }

    /**
     * Get receiptNo
     *
     * @return string 
     */
    public function getReceiptNo() {
        return $this->receiptNo;
    }

    /**
     * Set erfId
     *
     * @param integer $erfId
     * @return Payment
     */
    public function setErfId($erfId) {
        $this->erfId = $erfId;

        return $this;
    }

    /**
     * Get erfId
     *
     * @return integer 
     */
    public function getErfId() {
        return $this->erfId;
    }

    /**
     * Set amountDue
     *
     * @param string $amountDue
     * @return Payment
     */
    public function setAmountDue($amountDue) {
        $this->amountDue = $amountDue;

        return $this;
    }

    /**
     * Get amountDue
     *
     * @return string 
     */
    public function getAmountDue() {
        return $this->amountDue;
    }

    /**
     * Set amountReceived
     *
     * @param string $amountReceived
     * @return Payment
     */
    public function setAmountReceived($amountReceived) {
        $this->amountReceived = $amountReceived;

        return $this;
    }

    /**
     * Get amountReceived
     *
     * @return string 
     */
    public function getAmountReceived() {
        return $this->amountReceived;
    }

    /**
     * Set amountOutstanding
     *
     * @param string $amountOutstanding
     * @return Payment
     */
    public function setAmountOutstanding($amountOutstanding) {
        $this->amountOutstanding = $amountOutstanding;

        return $this;
    }

    /**
     * Get amountOutstanding
     *
     * @return string 
     */
    public function getAmountOutstanding() {
        return $this->amountOutstanding;
    }

    /**
     * Set totalOutstanding
     *
     * @param string $totalOutstanding
     * @return Payment
     */
    public function setTotalOutstanding($totalOutstanding) {
        $this->totalOutstanding = $totalOutstanding;

        return $this;
    }

    /**
     * Get totalOutstanding
     *
     * @return string 
     */
    public function getTotalOutstanding() {
        return $this->totalOutstanding;
    }

    /**
     * Set payedBy
     *
     * @param string $payedBy
     * @return Payment
     */
    public function setPayedBy($payedBy) {
        $this->payedBy = $payedBy;

        return $this;
    }

    /**
     * Get payedBy
     *
     * @return string 
     */
    public function getPayedBy() {
        return $this->payedBy;
    }

    /**
     * Set payedByPhone
     *
     * @param string $payedByPhone
     * @return Payment
     */
    public function setPayedByPhone($payedByPhone) {
        $this->payedByPhone = $payedByPhone;

        return $this;
    }

    /**
     * Get payedByPhone
     *
     * @return string 
     */
    public function getPayedByPhone() {
        return $this->payedByPhone;
    }

    /**
     * Set staffEmail
     *
     * @param integer $staffEmail
     * @return Payment
     */
    public function setStaffEmail($staffEmail) {
        $this->staffEmail = $staffEmail;

        return $this;
    }

    /**
     * Get staffEmail
     *
     * @return integer 
     */
    public function getStaffEmail() {
        return $this->staffEmail;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Payment
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
     * @return Payment
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
     * Get paymentMethodId
     *
     * @return integer
     */
    public function getPaymentMethodId() {
        return $this->paymentMethodId;
    }

    /**
     * Set paymentMethodId
     *
     * @param integer $paymentMethodId
     * @return Payment
     */
    public function setPaymentMethodId($paymentMethodId) {
        $this->paymentMethodId = $paymentMethodId;
    }
    
    /**
     * Get paymentMethod
     *
     * @param AppBundle\Entity\PaymentMethod $paymentMethod
     */
    public function getPaymentMethod() {
        return $this->paymentMethod;
    }

    /**
     * Set paymentMethod
     *
     * @return AppBundle\Entity\PaymentMethod 
     */
    public function setPaymentMethod(PaymentMethod $paymentMethod = null) {
        $this->paymentMethod = $paymentMethod;
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
