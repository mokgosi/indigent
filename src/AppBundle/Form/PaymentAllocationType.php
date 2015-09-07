<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaymentAllocationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('erf', 'entity', array(
                    'class' => 'AppBundle:Erf',
                    'property' => 'erfNo'))
            ->add('amount')
            ->add('month')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PaymentAllocation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_paymentallocation';
    }
}
