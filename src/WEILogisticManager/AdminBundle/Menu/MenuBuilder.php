<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Czoo
 * Date: 29/10/13
 * Time: 14:57
 * To change this template use File | Settings | File Templates.
 */

namespace WEILogisticManager\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createDashboardMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav'));
        $menu->setCurrentUri($request->getRequestUri());

        $menu->addChild('Accueil', array('route' => '_admin_homepage'));
        $menu->addChild('Mes Fichiers', array('route' => '_admin_myfiles'));
        $menu->addChild('Lieux', array('route' => '_admin_places'));
        $menu->addChild('Activités', array('route' => '_admin_activities'));
        $menu->addChild('Emplois du temps', array('route' => '_admin_timetables'));

        return $menu;
    }
}