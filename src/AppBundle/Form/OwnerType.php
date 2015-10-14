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
                ->add('socialSecurityNo','text',array('error_bubbling'=>true))
                ->add('firstName','text',array('error_bubbling'=>true))
                ->add('lastName','text',array('error_bubbling'=>true))
                ->add('gender', 'choice', array(
                    'placeholder' => 'Choose Gender',
                    'choices' => array('Male' => 'Male', 'Female' => 'Female'),
                    'required' => false,
                ))
                ->add('telephone')
                ->add('mobile')
                ->add('email')
                ->add('address')
                ->add('location', 'entity', array(
                    'class' => 'AppBundle:Location',
                    'property' => 'name'))
                ->add('section', 'entity', array(
                    'class' => 'AppBundle:Section',
                    'property' => 'name'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Owner',
            'error_bubbling' => true
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
