<?php

namespace Jh\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('JhBlogBundle:Blog:index.html.twig');
    }
}
