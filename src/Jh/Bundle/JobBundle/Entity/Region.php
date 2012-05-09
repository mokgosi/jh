<?php

namespace Jh\Bundle\JobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jh\Bundle\JobBundle\Entity\Region
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jh\Bundle\JobBundle\Entity\RegionRepository")
 */
class Region
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $latitude
     *
     * @ORM\Column(name="latitude", type="string", length=255)
     */
    private $latitude;

    /**
     * @var string $longitude
     *
     * @ORM\Column(name="longitude", type="string", length=255)
     */
    private $longitude;

    /**
     * @var integer $province_id
     *
     * @ORM\Column(name="province_id", type="integer")
     */
    private $province_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Province", inversedBy="regions")
     * @ORM\JoinColumn(name="province_id", referencedColumnName="id")
     */
    private $province;
    
    /**
     * @ORM\OneToMany(targetEntity="Suburb", mappedBy="region") 
     */
    protected $suburbs;
    
    public function __construct()
    {
        $this->suburbs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set latitude
     *
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set province_id
     *
     * @param integer $provinceId
     */
    public function setProvinceId($provinceId)
    {
        $this->province_id = $provinceId;
    }

    /**
     * Get province_id
     *
     * @return integer 
     */
    public function getProvinceId()
    {
        return $this->province_id;
    }

    /**
     * Set province
     *
     * @param Jh\Bundle\JobBundle\Entity\Province $province
     */
    public function setProvince(\Jh\Bundle\JobBundle\Entity\Province $province)
    {
        $this->province = $province;
    }

    /**
     * Get province
     *
     * @return Jh\Bundle\JobBundle\Entity\Province 
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Add suburbs
     *
     * @param Jh\Bundle\JobBundle\Entity\Suburb $suburbs
     */
    public function addSuburb(\Jh\Bundle\JobBundle\Entity\Suburb $suburbs)
    {
        $this->suburbs[] = $suburbs;
    }

    /**
     * Get suburbs
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSuburbs()
    {
        return $this->suburbs;
    }
}