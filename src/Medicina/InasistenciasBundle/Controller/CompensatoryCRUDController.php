<?php

namespace Medicina\InasistenciasBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class CompensatoryCRUDController extends Controller
{
    public function createByUserAction($id = null) {
    	$this->admin->user_id = 1;
    	return $this->createAction();
    }
}