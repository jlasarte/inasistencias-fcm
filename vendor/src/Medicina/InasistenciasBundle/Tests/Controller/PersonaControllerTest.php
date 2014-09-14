<?php

namespace Medicina\InasistenciasBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PersonaControllerTest extends WebTestCase
{
    public function testNueva()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/nueva');
    }

    public function testEdicion()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/edicion');
    }

    public function testCatalogo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/catalogo');
    }

    public function testBaja()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/baja');
    }

}
