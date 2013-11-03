<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use WEILogisticManager\AdminBundle\Entity\Event;
use WEILogisticManager\AdminBundle\Form\Type\EventType;
use Doctrine\ORM\EntityManager;
use JMS\SecurityExtraBundle\Annotation\Secure;

class HomepageController extends Controller
{
    /**
     * @Route("/homepage")
     * @Template()
     * @Secure("ROLE_USER")
     */
    public function indexAction()
    {
        /** @var EntityManager $em */
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
     * @Route("/homepage/event/create")
     * @Template()
     * @Secure("ROLE_USER")
     */
    public function createEventAction(Request $request)
    {
        $form = $this->createForm(new EventType(), new Event());

        $form->handleRequest($request);

        if($form->isValid())
        {
            //Persist object in database
            $data = $form->getData();

            /** @var EntityManager $em */
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();

            return $this->redirect($this->generateUrl('_admin_homepage'));
        }

        return $this->render('WEILogisticManagerAdminBundle:Homepage:form.html.twig', array(
            'form' => $form->createView(),
            'action' => "Create",
        ));
    }

    /**
     * @Route("/homepage/event/update/{id}")
     * @Template()
     * @Secure("ROLE_USER")
     */
    public function updateEventAction(Event $event, Request $request)
    {
        $form = $this->createForm(new EventType(), $event);

        $form->handleRequest($request);

        if($form->isValid())
        {
            $data = $form->getData();

            /** @var EntityManager $em */
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            return $this->redirect($this->generateUrl('_admin_homepage'));
        }


        return $this->render('WEILogisticManagerAdminBundle:Homepage:form.html.twig', array(
            'form' => $form->createView(),
            'action' => "Update",
        ));
    }

    /**
     * @Route("/homepage/event/delete/{id}")
     * @Template()
     * @Secure("ROLE_USER")
     */
    public function deleteEventAction(Event $event)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();

        return $this->redirect($this->generateUrl('_admin_homepage'));
    }
}