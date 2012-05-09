<?php

namespace Jh\Bundle\JobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jh\Bundle\JobBundle\Entity\Job
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jh\Bundle\JobBundle\Entity\JobRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Job
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string $reference
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @var text $package
     *
     * @ORM\Column(name="package", type="string", length=255)
     */
    private $package;
    
    /**
     * @var string $company
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;
    
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;
    
    /**
     * @var integer $category_id
     *
     * @ORM\Column(name="category_id", type="integer")
     */
    private $category_id;

    /**
     * @var integer $contract_id
     *
     * @ORM\Column(name="contract_id", type="integer")
     */
    private $contract_id;

    /**
     * @var integer $location_id
     *
     * @ORM\Column(name="location_id", type="integer")
     */
    private $location_id;
    
    /**
     * @var integer $employment_equity_id
     *
     * @ORM\Column(name="equity_id", type="integer")
     */
    private $equity_id;

    /**
     * @var boolean $is_public
     *
     * @ORM\Column(name="is_public", type="boolean")
     */
    private $is_public;

    /**
     * @var datetime $created
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;

    /**
     * @var datetime $expired
     *
     * @ORM\Column(name="expired", type="datetime")
     */
    private $expired;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="jobs")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;
    
    /**
     * @ORM\ManyToOne(targetEntity="Contract", inversedBy="jobs")
     * @ORM\JoinColumn(name="contract_id", referencedColumnName="id")
     */
    protected $contract;
    
    /**
     * @ORM\ManyToOne(targetEntity="Equity", inversedBy="jobs")
     * @ORM\JoinColumn(name="equity_id", referencedColumnName="id")
     */
    protected $equity;
    
    public function __construct() 
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
        $this->setExpired(new \DateTime());
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set category_id
     *
     * @param integer $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;
    }

    /**
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set contract_id
     *
     * @param integer $contractId
     */
    public function setContractId($contractId)
    {
        $this->contract_id = $contractId;
    }

    /**
     * Get contract_id
     *
     * @return integer 
     */
    public function getContractId()
    {
        return $this->contract_id;
    }

    /**
     * Set location_id
     *
     * @param integer $locationId
     */
    public function setLocationId($locationId)
    {
        $this->location_id = $locationId;
    }

    /**
     * Get location_id
     *
     * @return integer 
     */
    public function getLocationId()
    {
        return $this->location_id;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set company
     *
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set is_public
     *
     * @param boolean $isPublic
     */
    public function setIsPublic($isPublic)
    {
        $this->is_public = $isPublic;
    }

    /**
     * Get is_public
     *
     * @return boolean 
     */
    public function getIsPublic()
    {
        return $this->is_public;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }
    
    /**
     * @ORM\preUpdate
     */
    public function setUpdatedValue()
    {
       $this->setUpdated(new \DateTime());
    }

    /**
     * Get updated
     *
     * @return datetime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set expired
     *
     * @param datetime $expired
     */
    public function setExpired($expired)
    {
        $this->expired = $expired->modify('+30 days');
    }

    /**
     * Get expired
     *
     * @return datetime 
     */
    public function getExpired()
    {
        return $this->expired;
    }
    
    /**
     * Set $package
     *
     * @param string $package
     */
    public function setPackage($package)
    {
        $this->package = $package;
    }

    /**
     * Get $package
     *
     * @return string 
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Set reference
     *
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set equity_id
     *
     * @param integer $equityId
     */
    public function setEquityId($equityId)
    {
        $this->equity_id = $equityId;
    }

    /**
     * Get equity_id
     *
     * @return integer 
     */
    public function getEquityId()
    {
        return $this->equity_id;
    }

    /**
     * Set category
     *
     * @param Jh\Bundle\JobBundle\Entity\Category $category
     */
    public function setCategory(\Jh\Bundle\JobBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Jh\Bundle\JobBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Set contract
     *
     * @param Jh\Bundle\JobBundle\Entity\Category $contract
     */
    public function setContract(\Jh\Bundle\JobBundle\Entity\Contract $contract)
    {
        $this->contract = $contract;
    }

    /**
     * Get contract
     *
     * @return Jh\Bundle\JobBundle\Entity\Contract 
     */
    public function getContract()
    {
        return $this->contract;
    }
    
    /**
     * Set equity
     *
     * @param Jh\Bundle\JobBundle\Entity\Equity
     */
    public function setEquity(\Jh\Bundle\JobBundle\Entity\Equity $equity)
    {
        $this->equity = $equity;
    }

    /**
     * Get equity
     *
     * @return Jh\Bundle\JobBundle\Entity\Equity
     */
    public function getEquity()
    {
        return $this->equity;
    }
}