<?php

namespace Medicina\InasistenciasBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InicioControllerTest extends WebTestCase
{
    public function testPortada()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/portada');
    }

}
