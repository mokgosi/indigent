<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaymentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('erf', 'entity', array(
                    'error_bubbling' => true,
                    'class' => 'AppBundle:Erf',
                    'property' => 'erfNo',
                    'empty_data'  => null,
                    'placeholder' => 'Please Select...'))
            ->add('company', 'entity', array(
                    'class' => 'AppBundle:Company',
                    'property' => 'name'))    
            ->add('amountDue')
            ->add('amountReceived','text',array(
                'error_bubbling'=>true))
            ->add('amountOutstanding')
            ->add('totalOutstanding')
            ->add('payedBy')
            ->add('payedByPhone')
            ->add('staffEmail')
            ->add('paymentStatus', 'entity', array(
                    'class' => 'AppBundle:PaymentStatus',
                    'property' => 'name'))
            ->add('paymentMethod', 'entity', array(
                    'class' => 'AppBundle:PaymentMethod',
                    'property' => 'name'))
            ->add('created', 'datetime', array(
                'widget' => 'single_text',
            ))
                
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Payment',
            'cascade_validation' => true,
            'error_mapping' => array(
                'profile_skills' => 'erf',
            ),
            
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_payment';
    }
}
