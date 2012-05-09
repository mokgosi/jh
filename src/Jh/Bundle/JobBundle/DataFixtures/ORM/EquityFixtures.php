<?php

namespace Jh\JobBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Jh\Bundle\JobBundle\Entity\Equity;

class EquityFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $string = "None,EE,AA"; 
        $equities = explode(',', $string); 
        foreach($equities as $key => $value) {
            $equity  = new Equity();
            $equity ->setName($value);
            $manager->persist($equity);
        }
        $manager->flush();
    }
}
?>
