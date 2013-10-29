<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Czoo
 * Date: 29/10/13
 * Time: 16:09
 * To change this template use File | Settings | File Templates.
 */

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
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