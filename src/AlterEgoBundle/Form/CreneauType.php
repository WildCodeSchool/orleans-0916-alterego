<?php

namespace AlterEgoBundle\Form;

use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreneauType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('lieu')
                ->add('dateheure')
                ->add('duree')
                ->add('capacite')
            ->add('activite', 'collection', array(
                'entry_type' => 'entity',
                'entry_options' => array(
                    'class' => 'AlterEgoBundle:Activite',
                    'choice_label' => 'Activité',
                ),
                'required'=>false,
                'prototype' => true,
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AlterEgoBundle\Entity\Creneau'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'alteregobundle_creneau';
    }


}
