<?php
// nous avons créé ce fichier avec symfony console make:test en choisissant TestCase
// ceci permet de créer un fichier de test PHPUnit

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class ExempleTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }
}
