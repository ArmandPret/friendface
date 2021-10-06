<?php 

    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    //userprofile entity 
    use App\Entity\UserProfile;

    //class controller for homeController
    class ProfileController extends AbstractController 
    {
        /** 
         * @Route("/profile/{id}", name="view_profile")
         */
        public function viewProfile($id = null) //default id value
        {

            //added some error handling when an id is not supplied
            if($id == null){
                return $this->redirectToRoute('index');
            }

            //access the wildcard
            $userId = (int) $id;
            
            //using the Entity & Doctrine to get our Database data
            $user = $this->getDoctrine()
             ->getRepository(UserProfile::class)
             ->find($userId);

            //create a model
            $model = array('user' => $user);

            //return with twig template, specifying the view and data sent to the view
            return $this->render('profile.html.twig', $model);
        }

    }

?>