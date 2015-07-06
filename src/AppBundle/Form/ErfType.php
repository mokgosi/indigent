<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ErfType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('erfTypeId')
            ->add('erfNo')
            ->add('erfStreetName')
            ->add('erfLocationId')
            ->add('erfSectionId')
            ->add('erfOwnerFirstName')
            ->add('erfOwnerLastName')
            ->add('erfOwnerEmail')
            ->add('erfOwnerTelephone')
            ->add('erfOwnerMobile')
            ->add('created')
            ->add('updated')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Erf'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_erf';
    }
}
