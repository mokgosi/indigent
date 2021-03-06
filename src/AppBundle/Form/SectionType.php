<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SectionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name','text',array('error_bubbling'=>true))
                ->add('location', 'entity', array(
                    'class' => 'AppBundle:Location',
                    'property' => 'name'))
                ->add('xCoord')
                ->add('yCoord')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Section'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'appbundle_section';
    }

}
