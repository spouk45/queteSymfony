<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Review Controller.
 *
 * @route("review")
 */
class ReviewController extends Controller
{
    /**
     * @Route("/new",name="new_review")
     * @Method({"GET","POST"})
     */
    public function newAction()
    {
        return $this->render('review/new.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/",name="index_review")
     *
     */
    public function indexAction()
    {
        return $this->render('review/index.html.twig', array(
            // ...
        ));
    }
}
