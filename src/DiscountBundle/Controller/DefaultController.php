<?php

namespace DiscountBundle\Controller;

use http\Env\Request;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Doctrine\DBAL\Driver\PDOException;
//use Doctrine\DBAL\Exception\DriverException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Elasticsearch\ClientBuilder;
use DiscountBundle\Entity\stikers;




class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        $product = $this->getDoctrine()
            ->getRepository('DiscountBundle:Stikers')
            ->find(13);


        return $this->render('DiscountBundle:Default:index.html.twig', ['prod' => $product]);
    }
}