<?php 

    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Mood;

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

         /** 
         * @Route("/moods", name="all_moods")
         */
        public function viewMoods()
        {
            //using the Entity & Doctrine to get our Database data
            $moods = $this->getDoctrine()
             ->getRepository(Mood::class)
             ->findAll(); //findAll() function to get all of our data
             //findBy(array(feeling => 'happy', id => '1')) - to compare more than one field

            //create a model
            $model = array('moods' => $moods);

            //return with twig template, specifying the view and data sent to the view
            return $this->render('moods.html.twig', $model);
        }

    }

?>