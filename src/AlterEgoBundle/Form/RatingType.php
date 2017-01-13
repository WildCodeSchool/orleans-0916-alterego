<?php

namespace AlterEgoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RatingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('note', ChoiceType::class, array(
            'choices' => array(
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
            ),
            'placeholder' => array(
                'year' => 'Year',
                'month' => 'Month',
                'day' => 'Day',
                'hour' => 'hour',
                'min' => 'min',

            )

        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'alter_ego_bundle_rating_type';
    }
}

