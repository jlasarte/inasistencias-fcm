<?php

namespace Medicina\InasistenciasBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AccesoControllerTest extends WebTestCase
{
    public function testIngresar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ingresar');
    }

}
