<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use WEILogisticManager\AdminBundle\Entity\Event;
use WEILogisticManager\AdminBundle\Form\Type\EventType;

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
        $event->setName('Event name');
        $event->setPlace('Event place');
        $event->setBeginDate(new \DateTime("now"));
        $event->setBeginDate(new \DateTime("now"));

        $form = $this->createForm(new EventType(), new Event());

        $form->handleRequest($request);

        if($form->isValid())
        {
            //Persist object in database
            $data = $form->getData();
            var_dump($data);

        }

        return $this->render('WEILogisticManagerAdminBundle:Homepage:createEvent.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}