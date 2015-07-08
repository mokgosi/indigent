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
            ->add('receiptNo','hidden')
            ->add('erf', 'entity', array(
                    'class' => 'AppBundle:Erf',
                    'property' => 'erfNo'))
            ->add('amountDue')
            ->add('amountReceived')
            ->add('amountOutstanding')
            ->add('totalOutstanding')
            ->add('payedBy')
            ->add('payedByPhone')
            ->add('staffEmail')
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
            'data_class' => 'AppBundle\Entity\Payment'
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
