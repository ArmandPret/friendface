<?php 

    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    //class controller for homeController
    class HomeController extends AbstractController 
    {
        /** 
         * @Route("/", name="index")
         */
        public function helloWorld()
        {
            
            return new Response(
                '<html><body><h1>Hello Armand!</h1></body></html>'
            );
        }

    }

?>