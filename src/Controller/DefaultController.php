<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * User: jeremy
 * Date: 18/12/17
 * Time: 09:19
 */

class DefaultController
{
    /**
     * @Route("/", name="homepage")
     * @param Environment $twig
     *
     * @return Response
     */
    public function index(Environment $twig)
    {
        return new Response($twig->render('default/index.html.twig'));
    }


    /**
     * @Route("/test", name="test")
     * @param Environment $twig
     *
     * @return Response
     */
    public function test(Environment $twig)
    {
        return new Response($twig->render('default/test.html.twig'));
    }
    
    
    /**
     * @Route("/menu/vertical", name="vertical_menu")
     * @param Environment $twig
     *
     * @return Response
     */
    public function verticalMenu(Environment $twig)
    {
        return new Response($twig->render('default/vertical_menu.html.twig'));
    }
}
