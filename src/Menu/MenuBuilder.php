<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class MenuBuilder
{
    
    private $factory;
    private $authorizationChecker;

    /**
     * MenuBuilder constructor.
     *
     * @param $factory
     */
    public function __construct(FactoryInterface $factory, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->factory = $factory;
        $this->authorizationChecker = $authorizationChecker;
    }


    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('main');

        if ($this->authorizationChecker->isGranted("ROLE_ADMIN")) {
            $menu->addChild('Accueil', array('route' => 'homepage'));
            $menu->addChild('Css', array('route' => 'css'));
        }

        return $menu;
    }    
    
    
    public function user(array $options)
    {
        $menu = $this->factory->createItem('user');

        $user = $this->getUser();

        if ($user) {
            $submenu = $menu->addChild($user->__toString());
            if ($this->authorizationChecker->isGranted("ROLE_SUPER_ADMIN")) {
                $submenu->addChild('.icon-cogs Administration', array('route' => 'easyadmin'));
                $submenu->addChild('admin-hr')->setAttribute('divider', true);
            }
            
            $submenu->addChild('.icon-sign-out Déconnexion', array('route' => '_logout'));
        }

        return $menu;
    }
}
