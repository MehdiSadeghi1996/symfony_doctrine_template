<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PosterController extends AbstractController
{
    #[Route('/poster', name: 'app_poster',methods: ['POST'])]
    public function create(MicroPostRepository $posts,Request $request): Response
    {

        $parameters = json_decode($request->getContent(), true);

        $micropost = new MicroPost();
        $micropost->setText($parameters['title']);
        $micropost->setTitle($parameters['text']);

        $posts->add($micropost,true);

        return new Response('ok');
    }
}
