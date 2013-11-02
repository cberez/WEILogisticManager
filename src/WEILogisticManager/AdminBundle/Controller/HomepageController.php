<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use WEILogisticManager\AdminBundle\Entity\Event;

class HomepageController extends Controller
{
    /**
     * @Route("/homepage")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $qb->from('WEILogisticManagerAdminBundle:Event', 'e');
        $qb->select('e');
        $events = $qb->getQuery()->getResult();



        return $this->render('WEILogisticManagerAdminBundle:Homepage:index.html.twig', array(
            'events' => $events,
        ));
    }

    /**
     * @Route("/homepage/create_event")
     * @Template()
     */
    public function createEventAction(Request $request)
    {
        $event = new Event();
        $event->setName('test');
        $event->setPlace('paris');

        $form = $this->createFormBuilder($event)
            ->add('name', 'text')
            ->add('beginDate', 'date')
            ->add('endDate', 'date')
            ->add('place', 'text')
            ->add('create', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid())
        {
            //Persist object in database
        }

        return $this->render('WEILogisticManagerAdminBundle:Homepage:createEvent.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}