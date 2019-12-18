<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/route")
 */
class RouteController extends AbstractController
{
    /**
     * @Route("/test", name="route_test")
     */
    public function index()
    {
        return new Response("test coucou");
    }

    /**
     * @Route("/test/{param1}", name="route_test_param")
     */
    public function index2($param1)
    {
        return new Response("test coucou param : ".$param1);
    }

    /**
     * @Route("/test/{param1}/date/{param2}", name="route_test_param_2")
     */
    public function index3($param1, $param2)
    {
        return new Response("test coucou param 2 : ".$param1." ".$param2);
    }

    /**
     * @Route("/test/date/{year}-{month}-{day}",
     *     name="route_date",
     *     requirements={"year"="\d{4}", "month"="\d{2}", "day"="\d{2}"},
     *     defaults={"day":"01","month":"10"},
     *     methods={"GET"}
     * )
     */
    public function index4($year, $month, $day)
    {
        return new Response("test date : ".$year."-".$month."-".$day);
    }
}
