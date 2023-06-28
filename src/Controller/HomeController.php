<?php

namespace App\Controller;

use App\Repository\ImagesModeleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
private $Images;


    public function __construct(ImagesModeleRepository $repoImage, ){
        $this->Images = $repoImage;
    }

    ///////////////FRONT END////////////////////
    #[Route('/', name: 'homepage')]
    public function homepage(): Response
    {
        $allImage = $this->Images->findAll();

        //dd($allImage);

        return $this->render('TestFrontEnd.html.twig', [
            'allImage' => $allImage
        ]);
    }
}