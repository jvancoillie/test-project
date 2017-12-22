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
        $version = 0;
        for($i=0;$i<=6;$i+=2){
            $version = $i * 10;
        }
        
        return new Response($twig->render('default/home.html.twig', [ 'ma_valeur' => $version ]));
    }

    /**
     * @Route("/menu/horizontal", name="horizontal_menu")
     * @param Environment $twig
     *
     * @return Response
     */
    public function horizontalMenu(Environment $twig)
    {
        return new Response($twig->render('default/horizontal_menu.html.twig'));
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
