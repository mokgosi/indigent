<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OwnerType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('socialSecurityNo')
                ->add('firstName')
                ->add('lastName')
                ->add('gender', 'choice', array(
                    'placeholder' => 'Choose gender',
                    'choices' => array('Male' => 'Male', 'Female' => 'Female'),
                    'required' => false,
                ))
                ->add('telephone')
                ->add('mobile')
                ->add('email')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Owner'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_owner';
    }

}
