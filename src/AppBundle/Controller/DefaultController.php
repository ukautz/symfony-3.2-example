<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/session-test", name="session-test")
     */
    public function sessionAction(Request $request)
    {
        /** @var Session $session */
        $session = $this->get('session');
        $session->start();

        error_log("SESSION: ". get_class($session));
        $counter = $session->get('foo', 0);
        $session->set('foo', $counter + 1);

        return new Response("COUNTER: $counter");
    }
}
