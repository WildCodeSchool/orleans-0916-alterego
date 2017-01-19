<?php

namespace AlterEgoBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class CreneauAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('lieu')
            ->add('dateheure')
            ->add('duree')
            ->add('capacite')
            ->add('placerestantes')
            ->add('startseance')
            ->add('archive')
        ;
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('lieu')
            ->add('dateheure')
            ->add('duree')
            ->add('capacite')
            ->add('placerestantes')
            ->add('startseance')
            ->add('archive')
        ;
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('lieu')
            ->add('dateheure')
            ->add('duree')
            ->add('capacite')
            ->add('placerestantes')
            ->add('startseance')
            ->add('archive')
            ->add('user')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('lieu')
            ->add('dateheure')
            ->add('duree')
            ->add('capacite')
            ->add('placerestantes')
            ->add('startseance')
            ->add('archive')
        ;
    }
}