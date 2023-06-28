<?php

namespace App\Controller;

use App\Entity\DownloadModele;
use App\form\DownloadForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DownloadController extends AbstractController {

    /////////////TEST BACK END//////////////////////
    #[Route('/Form', name: 'app_form')]
    public function form(Request $request, EntityManagerInterface $em): Response
    {
        $imageDL = new DownloadModele();
        $form = $this->createForm(DownloadForm::class, $imageDL);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $texte = $form->get('texte')->getData();
            $url = $form->get('url')->getData();

            $imageDL->setTexte($texte)->setUrl($url);

            $em->persist($imageDL);
            $em->flush();

            $form = $this->createForm(DownloadForm::class);
        }

        return $this->render('TestBackEnd.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
