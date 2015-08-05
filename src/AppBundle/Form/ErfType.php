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
                ->add('erfType', 'entity', array(
                    'class' => 'AppBundle:ErfType',
                    'property' => 'name'))
                ->add('erfNo')
                ->add('streetName')
                ->add('location', 'entity', array(
                    'class' => 'AppBundle:Location',
                    'property' => 'name'))
                ->add('section', 'entity', array(
                    'class' => 'AppBundle:Section',
                    'property' => 'name'))
                ->add('balance')
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
