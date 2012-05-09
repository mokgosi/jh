<?php

namespace Jh\Bundle\JobBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegionType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('latitude')
            ->add('longitude')
            ->add('province_id')
        ;
    }

    public function getName()
    {
        return 'region';
    }
}
