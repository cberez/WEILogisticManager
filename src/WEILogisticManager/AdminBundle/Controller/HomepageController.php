<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomepageController extends Controller
{
    /**
     * @Route("/", name="_homepage")
     * @Template("WEILogisticManagerAdminBundle:Homepage:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }

}
