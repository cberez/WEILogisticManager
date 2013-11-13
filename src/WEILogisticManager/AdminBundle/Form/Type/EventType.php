<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Czoo
 * Date: 02/11/13
 * Time: 14:12
 * To change this template use File | Settings | File Templates.
 */

namespace WEILogisticManager\AdminBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EventType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('place', 'text')
            ->add('beginDate', 'datetime')
            ->add('endDate', 'datetime');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'weilogisticmanager_adminbundle_event';
    }
}
