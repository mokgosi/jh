<?php

namespace Jh\Bundle\JobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jh\Bundle\JobBundle\Entity\Province
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jh\Bundle\JobBundle\Entity\ProvinceRepository")
 */
class Province
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
     * @ORM\OneToMany(targetEntity="Region", mappedBy="province") 
     */
    protected $regions;
    
    public function __construct()
    {
        $this->regions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add regions
     *
     * @param Jh\Bundle\JobBundle\Entity\Region $regions
     */
    public function addRegion(\Jh\Bundle\JobBundle\Entity\Region $regions)
    {
        $this->regions[] = $regions;
    }

    /**
     * Get regions
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRegions()
    {
        return $this->regions;
    }
}