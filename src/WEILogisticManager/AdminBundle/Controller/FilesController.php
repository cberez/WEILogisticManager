<?php

namespace WEILogisticManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Request;
use WEILogisticManager\AdminBundle\Entity\UploadedDocument;
use WEILogisticManager\AdminBundle\Form\Type\UploadedDocumentType;

class FilesController extends Controller
{
    /**
     * @Route("/files", name="_admin_files")
     * @Template("WEILogisticManagerAdminBundle:Files:index.html.twig")
     * @Secure("ROLE_USER")
     */
    public function indexAction()
    {
        return array(
            'files' => array(),
        );
    }
    /**
     * @Route("/files/upload", name="_admin_files_upload")
     * @Template("WEILogisticManagerAdminBundle:Files:upload.html.twig")
     * @Secure("ROLE_USER")
     */
    public function uploadAction(Request $request)
    {
        $form = $this->createForm(new UploadedDocumentType(), new UploadedDocument());

        $form->handleRequest($request);

        if ($form->isValid()) {
            //Persist object in database
            /*$data = $form->getData();
            $extension = preg_split('/\./', $data->file->getClientOriginalName());
            $extension = end($extension);

            $data->upload();

            $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel = $objReader->load($data->file);
            var_dump($objPHPExcel);*/

            /** @var EntityManager $em */
            /*$em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();

            return $this->redirect($this->generateUrl('_admin_events'));*/
        }

        return array(
            'form' => $form->createView(),
        );
    }
}
