<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PlacesController extends Controller
{
    /**
     * @Route("/places")
     * @Template()
     * @Secure("ROLE_USER")
     */
    public function indexAction()
    {
        return $this->render('WEILogisticManagerAdminBundle:Places:index.html.twig');
    }

}
