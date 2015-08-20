<?php

namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
        $builder->add('first_name');
        $builder->add('last_name');
        $builder->add('telephone');
        $builder->add('mobile');
        $builder->add('roles', 'choice', array(
            'choices' => array(
                'ROLE_ADMIN' => 'ROLE_ADMIN',
                'ROLE_USER' => 'ROLE_USER',
            ),
            'multiple' => true,
            'expanded' => true,
            'required' => false,
        ));
//        $builder->add('enabled', 'checkbox');
        $builder->add('enabled', 'checkbox', array(
            'value' => 1,
            'required' => false
        ));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_user_registration';
    }

}
