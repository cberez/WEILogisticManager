<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Request;
use WEILogisticManager\AdminBundle\Entity\Activity;
use WEILogisticManager\AdminBundle\Entity\Event;
use WEILogisticManager\AdminBundle\Form\Type\ActivityType;

class ActivitiesController extends Controller
{
    /**
     * @Route("/activities", name="_admin_activities")
     * @Template("WEILogisticManagerAdminBundle:Activities:index.html.twig")
     * @Secure("ROLE_USER")
     */
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb2 = $em->createQueryBuilder();

        $qb->from('WEILogisticManagerAdminBundle:Activity', 'a');
        $qb->select('a');
        $activities = $qb->getQuery()->getResult();

        $qb2->from('WEILogisticManagerAdminBundle:Place', 'p');
        $nbPlaces = $qb2->select('Count(p)')
            ->getQuery()
            ->getSingleResult();

        return array(
            'activities' => $activities,
            'nb_places' => $nbPlaces,
        );
    }

    /**
     * @Route("/activities/create", name="_admin_activities_create")
     * @Template("WEILogisticManagerAdminBundle:Activities:form.html.twig")
     * @Secure("ROLE_USER")
     */
    public function createAction(Request $request)
    {
        $act = new Activity();
        $act->setBeginTime($this->getRequest()->getSession()->get("event")->getBeginDate());
        $act->setEndTime($this->getRequest()->getSession()->get("event")->getEndDate());

        $form = $this->createForm(new ActivityType(), $act);

        $form->handleRequest($request);

        if($form->isValid()){
            $data = $form->getData();

            /** @var EntityManager $em */
            $em = $this->getDoctrine()->getManager();

            $currentEvent = $em->merge($this->getRequest()->getSession()->get("event"));
            $data->setEvent($currentEvent);

            $em->persist($data);
            $em->flush();

            return $this->redirect($this->generateUrl('_admin_activities'));
        }

        return array(
            'form' => $form->createView(),
            'action' => "Create",
        );
    }

    /**
     * @Route("/activities/update/{id}", name="_admin_activities_update")
     * @Template("WEILogisticManagerAdminBundle:Activities:form.html.twig")
     * @Secure("ROLE_USER")
     */
    public function updateAction(Activity $activity, Request $request)
    {
        $form = $this->createForm(new ActivityType(), $activity);

        $form->handleRequest($request);

        if($form->isValid()){
            $data = $form->getData();

            /** @var EntityManager $em */
            $em = $this->getDoctrine()->getManager();

            $currentEvent = $em->merge($this->getRequest()->getSession()->get("event"));
            $data->setEvent($currentEvent);

            $em->persist($data);
            $em->flush();

            return $this->redirect($this->generateUrl('_admin_activities'));
        }


        return array(
            'form' => $form->createView(),
            'action' => "Update",
        );
    }

    /**
     * @Route("/activities/delete/{id}", name="_admin_activities_delete")
     * @Template()
     * @Secure("ROLE_USER")
     */
    public function deleteAction(Activity $activity)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $em->remove($activity);
        $em->flush();

        return $this->redirect($this->generateUrl('_admin_activities'));
    }
}
