<?php

namespace AlterEgoBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class ActiviteAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('activite')
            ->add('type')
            ->add('info')
        ;
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('activite')
            ->add('type')
            ->add('info')
        ;
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('activite')
            ->add('type')
            ->add('info')
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
            ->add('activite')
            ->add('type')
            ->add('info')
        ;
    }
}