<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

use AppBundle\Entity\Location;

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
                ->add('address')
//                ->add('location', 'entity', array(
//                    'class' => 'AppBundle:Location',
//                    'property' => 'name'))
//                ->add('section', 'entity', array(
//                    'placeholder' => 'Choose Section',
//                    'class' => 'AppBundle:Section',
//                    'property' => 'name'))
                ->add('owner', 'entity', array(
                    'class' => 'AppBundle:Owner',
                    'placeholder' => 'Search Owner ID #',
                    'property' => 'socialSecurityNo'))
                ->add('balance')
        ;
        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));
        $builder->addEventListener(FormEvents::PRE_SUBMIT, array($this, 'onPreSubmit'));
    }

    protected function addElements(FormInterface $form, Location $location = null)
    {
        // Remove the submit button, we will place this at the end of the form later
//        $submit = $form->get('save');
//        $form->remove('save');
        // Add the province element
        $form->add('location', 'entity', array(
            'data' => $location,
            'empty_value' => '-- Choose --',
            'class' => 'AppBundle:Location',
            'mapped' => false)
        );
        
        // Sections are empty, unless we actually supplied a location
        $sections = array();

        if ($location) {
            // Fetch the sections from specified location
            $repo = $this->em->getRepository('AppBundle:Sections');
            $sections = $repo->findBy(array('location_id' => $location));
        }

        // Add the sections element
        $form->add('section', 'entity', array(
            'empty_value' => '-- Select location first --',
            'class' => 'AppBundle:Section',
            'choices' => $sections,
        ));
        // Add submit button again, this time, it's back at the end of the form
//        $form->add($submit);
    }

    function onPreSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();
   
        // Note that the data is not yet hydrated into the entity.
        $location = $this->em->getRepository('AppBundle:Location')->find($data['location']);
        $this->addElements($form, $location);
    }

    function onPreSetData(FormEvent $event)
    {
        $erf = $event->getData();
        $form = $event->getForm();     
        dump($erf);
        // We might have an empty account (when we insert a new account, for instance)
        $location = $erf->getSection() ? $erf->getSection()->getLocation() : null;
        $this->addElements($form, $location);
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
