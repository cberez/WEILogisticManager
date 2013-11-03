<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class FilesController extends Controller
{
    /**
     * @Route("/files")
     * @Template()
     * @Secure("ROLE_USER")
     */
    public function indexAction()
    {
        return $this->render('WEILogisticManagerAdminBundle:Files:index.html.twig');
    }
}
