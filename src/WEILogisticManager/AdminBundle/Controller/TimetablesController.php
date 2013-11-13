<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class TimetablesController extends Controller
{
    /**
     * @Route("/timetables", name="_admin_timetables")
     * @Template("WEILogisticManagerAdminBundle:Timetables:index.html.twig")
     * @Secure("ROLE_USER")
     */
    public function indexAction()
    {
        return array();
    }
}
