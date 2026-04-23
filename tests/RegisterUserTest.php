<?php

// # Créer la base de données de test
// php bin/console doctrine:database:create --env=test

# Appliquer les migrations pour créer le schéma
// php bin/console doctrine:migrations:migrate -n --env=test

# Charger les fixtures (données de test) si nécessaire
//php bin/console doctrine:fixtures:load -n --env=test   

// composer require --dev symfony/test-pack
// nous avons créé ce fichier avec symfony console make:test en choisissant WebTestCase


namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterUserTest extends WebTestCase
{

    public function testSomething(): void
    {
        //etape 1: création d'un client 
        $client = static::createClient();
        $crawler = $client->request('GET', '/inscription');

        //etape 2: on récupère les informations du client
        //submitForm() trouve le premier formulaire qui contient le bouton submit 'inscription
        //et l'utilise pour envoyer les valeurs entrées dans les champs
        $client->submitForm('register_user[inscription]',[
            'register_user[firstname]'=>'Jacques',
            'register_user[lastname]'=>'Mursault',
            'register_user[email]'=>'jakem@proton.me',
            'register_user[plainPassword][first]'=>'12345678',
            'register_user[plainPassword][second]'=>'12345678'
        ]);
        //etape 3: on vérifie que la réponse est une redirection vers la page login
        $this->assertResponseRedirects('/login');
        //etape 4: on suit la redirection
        $client->followRedirect();
        //etape 5: on vérifie que le message de succès est affiché
        $this->assertSelectorExists('.alert-success', 'Votre compte a bien été créé !');
        //on fait un test unitaire avec php bin/phpunit
        
    }
}
