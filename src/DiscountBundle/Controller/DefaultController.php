<?php

namespace DiscountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Elasticsearch\ClientBuilder;




class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {




		//;d,fh;fdlfd;l;lrkt;eltkwepogpoteh
        return $this->render('DiscountBundle:Default:index.html.twig');
    }
}
