<?php
/**
 * Controller de la page profile d'un utilisateur
 * il est accessible uniquement aux utilisateurs connectés
 * grace à la configurtion  - { path: ^/profile, roles: ROLE_USER } dans config/packages/security.yaml  
 */



namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProfileController extends AbstractController
{
    //C'est cette route qui est utilisée dans config/packages/security.yaml
    //- { path: ^/profile, roles: ROLE_USER }
    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
