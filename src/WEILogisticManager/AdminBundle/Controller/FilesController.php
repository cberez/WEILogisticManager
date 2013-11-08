<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class FilesController extends Controller
{
    /**
     * @Route("/files", name="_admin_files")
     * @Template("WEILogisticManagerAdminBundle:Files:index.html.twig")
     * @Secure("ROLE_USER")
     */
    public function indexAction()
    {
        return array();
    }
}
