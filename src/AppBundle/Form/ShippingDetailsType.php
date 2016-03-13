<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Description of ShippingDetails
 *
 * @author Николай
 */
class ShippingDetailsType extends AbstractType {
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', TextType::class, array('label' => 'Имя'))
                ->add('address', TextType::class, array('label' => 'Адрес'))
                ->add('phone', TextType::class, array('label' => 'Телефон'))
                ->add('city', TextType::class, array('label' => 'Город'))
                ->add('country', TextType::class, array('label' => 'Страна'));
                
                
    }
    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ShippingDetails'
        ));
    }
}
