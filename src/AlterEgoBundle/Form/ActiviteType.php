<?php

namespace AlterEgoBundle\Form;

use Nelmio\ApiDocBundle\Tests\Fixtures\Form\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActiviteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('activite')
                ->add('date')
                ->add('lieu')
                ->add('capacite')
                ->add('type')
                ->add('info')
                ->add('creneaux', 'collection', array(
                    'entry_type' => 'entity',
                    'entry_options' => array(
                        'class' => 'AlterEgoBundle:Creneau',
                        'choice_label' => 'creneau',
                        )
                    )
                );

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AlterEgoBundle\Entity\Activite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'alteregobundle_activite';
    }


}
