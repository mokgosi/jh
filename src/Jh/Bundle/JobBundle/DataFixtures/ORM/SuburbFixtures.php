<?php

namespace Jh\JobBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
//use Doctrine\Common\DataFixtures\FixtureInterface;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


use Jh\Bundle\JobBundle\Entity\Province;
use Jh\Bundle\JobBundle\Entity\Region;
use Jh\Bundle\JobBundle\Entity\Suburb;

class SuburbFixtures   extends AbstractFixture implements OrderedFixtureInterface {

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

        foreach ($array as $pname => $values) {
            
            //iterate regions
            $i=0;
            foreach ($values as $rname => $rvalues) {
                $i++;
                foreach ($rvalues as $sname => $svalues) {
                    $suburb = new Suburb();
                    $suburb->setName($svalues['name']);
                    $suburb->setLatitude(' ');
                    $suburb->setLongitude(' ');
                    $suburb->setRegion($manager->merge($this->getReference("region-$i")));
                    $suburb->setCode($svalues['code']);
                    $manager->persist($suburb);
                    unset($rvalues[$sname]);
                }
                unset($values[$rname]);
            }
            unset($array[$pname]);
        }
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 3;
    }
}

?>
