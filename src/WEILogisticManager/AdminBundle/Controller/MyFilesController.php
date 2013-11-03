<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class MyFilesController extends Controller
{
    /**
     * @Route("/myfiles")
     * @Template()
     * @Secure("ROLE_USER")
     */
    public function indexAction()
    {
        return $this->render('WEILogisticManagerAdminBundle:MyFiles:index.html.twig');
    }

}
