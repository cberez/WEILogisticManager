<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\EntityManager;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Request;
use WEILogisticManager\AdminBundle\Entity\Place;
use WEILogisticManager\AdminBundle\Form\Type\PlaceType;

class PlacesController extends Controller
{
    /**
     * @Route("/places", name="_admin_places")
     * @Template("WEILogisticManagerAdminBundle:Places:index.html.twig")
     * @Secure("ROLE_USER")
     */
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $qb->from('WEILogisticManagerAdminBundle:Place', 'p');
        $qb->select('p');
        $places = $qb->getQuery()->getResult();

        return array(
            'places' => $places,
        );
    }

    /**
     * @Route("/places/create", name="_admin_places_create")
     * @Template("WEILogisticManagerAdminBundle:Places:form.html.twig")
     * @Secure("ROLE_USER")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(new PlaceType(), new Place());

        $form->handleRequest($request);

        if($form->isValid()){
            $data = $form->getData();

            /** @var EntityManager $em */
            $em = $this->getDoctrine()->getManager();

            $currentEvent = $em->merge($this->getRequest()->getSession()->get("event"));
            $data->setEvent($currentEvent);

            $em->persist($data);
            $em->flush();

            return $this->redirect($this->generateUrl('_admin_places'));
        }

        return array(
            'form' => $form->createView(),
            'action' => "Create",
        );
    }

    /**
     * @Route("/places/update/{id}", name="_admin_places_update")
     * @Template("WEILogisticManagerAdminBundle:Places:form.html.twig")
     * @Secure("ROLE_USER")
     */
    public function updateAction(Place $place, Request $request)
    {
        $form = $this->createForm(new PlaceType(), $place);

        $form->handleRequest($request);

        if($form->isValid()){
            $data = $form->getData();

            /** @var EntityManager $em */
            $em = $this->getDoctrine()->getManager();

            $currentEvent = $em->merge($this->getRequest()->getSession()->get("event"));
            $data->setEvent($currentEvent);

            $em->persist($data);
            $em->flush();

            return $this->redirect($this->generateUrl('_admin_places'));
        }


        return array(
            'form' => $form->createView(),
            'action' => "Update",
        );
    }

    /**
     * @Route("/places/delete/{id}", name="_admin_places_delete")
     * @Template()
     * @Secure("ROLE_USER")
     */
    public function deleteAction(Place $place)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $em->remove($place);
        $em->flush();

        return $this->redirect($this->generateUrl('_admin_places'));
    }
}
