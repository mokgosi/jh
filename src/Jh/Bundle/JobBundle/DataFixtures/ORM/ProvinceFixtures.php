<?php

namespace Jh\JobBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
//use Doctrine\Common\DataFixtures\FixtureInterface;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Jh\Bundle\JobBundle\Entity\Province;

class ProvinceFixtures extends AbstractFixture implements OrderedFixtureInterface 
{
    public function load(ObjectManager $manager) {

        $array = array();
        $file = dirname(__FILE__) . '\..\suburb.csv';
        
        $handle = fopen($file, "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            if (!in_array($data[0], array("BOTSWANA", "ZAMBIA", "NAMIBIA", "MOZAMBIQUE", "SWAZILAND", "REPUBLIC OF MAURITIUS"))) {
                if (!(substr($data[0], -6) == "TSWANA")) {
                    $array[$data[0]][$data[1]][] = array('name' => $data[2], 'code' => $data[3]);
                }
            }
        }
        fclose($handle);
        $i=0;
        foreach ($array as $pname => $values) {
            //persist province
            $i++;
            $province = new Province();
            $province->setName($pname);
            $province->setLatitude(' ');
            $province->setLongitude(' ');
            $manager->persist($province);
            
            unset($array[$pname]);
            
            $this->addReference("province-$i", $province);
        }
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 1;
    }
}

?>
