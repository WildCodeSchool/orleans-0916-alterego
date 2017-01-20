<?php

namespace AlterEgoBundle\Form;

use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreneauType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('lieu', TextType::class ,array(
                    'label_attr' => ['class' => 'label_creneau'],
                    'label' => 'Lieu de la séance'
                ))
                ->add('dateheure', DateTimeType::class, array(
                    'widget' => 'single_text',
                    'html5' => false,
                    'attr' => ['class' => 'js-datepicker'],
                    'label_attr' => ['class' => 'label_creneau'],
                    'label' => 'Date et Heure de la séance',
                ))
                ->add('duree', IntegerType::class, array(
                    'label_attr' => ['class' => 'label_creneau'],
                    'label' => 'Durée de la séance (min.)'
                ))
                ->add('capacite', IntegerType::class, array(
                    'label_attr' => ['class' => 'label_creneau'],
                    'label' => 'Capacité de la séance'
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
