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
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text');
        $builder->add('place', 'text');
        $builder->add('beginDate', 'datetime');
        $builder->add('endDate', 'datetime');
    }

    public function getName()
    {
        return 'event';
    }
}