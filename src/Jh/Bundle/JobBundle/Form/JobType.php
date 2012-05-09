<?php

namespace Jh\Bundle\JobBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class JobType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('reference')
            ->add('category', 'entity', array(
                'class' => 'JhJobBundle:Category', 
                'label' => 'Category',
                'property'=>'name'))
            ->add('contract', 'entity', array(
                'label' => 'Contract',
                'class' => 'JhJobBundle:Contract', 
                'property'=>'name'))
            ->add('equity', 'entity', array(
                'label' => 'E/Equity',
                'class' => 'JhJobBundle:Equity', 
                'property'=>'name'))
            ->add('location_id', 'text', array('label' => 'Where?'))    
            ->add('description')
            ->add('package')
            ->add('company')
            ->add('email')
            ->add('is_public')
            ->add('expired')
        ;
    }

    public function getName()
    {
        return 'job';
    }
}
