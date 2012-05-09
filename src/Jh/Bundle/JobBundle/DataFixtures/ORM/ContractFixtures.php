<?php

namespace Jh\JobBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Jh\Bundle\JobBundle\Entity\Contract;

class ContractFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $string = "Full Time,Part Time,Contract,Freelancing,Internship"; 
        $contracts = explode(',', $string); 
        foreach($contracts as $key => $value) {
            $contract  = new Contract();
            $contract ->setName($value);
            $manager->persist($contract);
        }
        $manager->flush();
    }
}
?>
