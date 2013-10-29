<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MyFilesController extends Controller
{
    /**
     * @Route("/myfiles")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('WEILogisticManagerAdminBundle:MyFiles:index.html.twig');
    }

}
