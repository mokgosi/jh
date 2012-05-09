<?php

namespace Jh\JobBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Jh\Bundle\JobBundle\Entity\Category;

class CategoryFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $string = "Accounting,Admin - Clerical,Automotive,Banking,Biotech,Business Development,Business Opportunity,Construction,Consultant,Customer Service,Design,Distribution - Shipping,Education,Engineering,Entry Level,Executive,Facilities,Finance,Franchise,General Business,General Labor,Government,Government - Federal,Grocery,Health Care,Hospitality - Hotel,Human Resources,Information Technology,Installation - Maint - Repair,Insurance,Inventory,Legal,Legal Admin,Management,Manufacturing,Marketing,Media - Journalism - Newspaper,Nonprofit - Social Services,Nurse,Other,Pharmaceutical,Professional Services,Purchasing - Procurement,QA - Quality Control,Real Estate,Research,Restaurant - Food Service,Retail,Sales,Science,Skilled Labor - Trades,Strategy - Planning,Supply Chain,Telecommunications,Training,Transportation,Veterinary Services,Warehouse"; 
        $categories = explode(',', $string); 
        foreach($categories as $key => $value) {
            $category = new Category();
            $category->setName($value);
            $manager->persist($category);
        }
        $manager->flush();
    }
}
?>
