<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use App\Entity\PasswordUpdate;
use App\Form\PasswordUpdateType;
use Symfony\Component\Form\FormError;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{

    /**
     * @Route("/inscription", name="inscription")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserFormType::class, $user, array(
            'inscription' => true
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $time = new \DateTime('now');
            $user->setRegisterAt($time);
            $user->setRoles("ROLE_USER");
            $user->setStatut(0);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('connexion');
        }

        return $this->render('security/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    
    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion(AuthenticationUtils $util)
    {
        return $this->render('security/connexion.html.twig',[
            "lastUserName" => $util->getLastUsername(),
            "error" =>$util->getLastAuthenticationError()
        ]);
    }

    /**
	 * @Route("/roles", name="roles")
	 *
	 */
	public function roles() 
	{
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('dashboard');
        }
        else{
            return $this->redirectToRoute('accueil'); 
        }

        
	}


    /**
	 * @Route("/check", name="check")
	 *
	 */
	public function connexionCheck()
    { 

    }
    
    /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function deconnexion()
    {

    }


    /**
     * @Route("/profil/{id}", name="profil")
     */
    public function profil(User $user)
    {   
        
        return $this->render('security/profil.html.twig',[
            'user' => $user
        ]);
    }



    /**
     * @Route("/profil_modification/{id}", name="profil_modification", methods={"GET","POST"})
     */

    public function modificationProfil(User $user, Request $request)
    {   
        $form = $this->createForm(UserFormType::class, $user, array('profil' => true));
        $form -> handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('profil', $user->getPrenom().' votre profil a bien été modifié');
        	return $this->redirectToRoute('profil', array('id' => $user->getId()));
        }

        return $this -> render('security/profil_modification.html.twig', [
            'userForm' => $form->createView(),
            'user' => $user
        ]);
    }
        

    /**
     * @Route("/suppresionProfil/{id}", name="profil_suppression", methods={"DELETE"})
     */
    public function suppressionProfil(Request $request, User $user): Response
    {
        
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token')))
        {
            $session = new Session();
            $session->invalidate();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();

            $this->addFlash('sup', 'Votre compte a bien été supprimée');
        }

        return $this->redirectToRoute('accueil');
    }





    /**
     * @Route("/password_modification/{id}", name="password_modification")
     */

    public function modificationPassword(User $user, Request $request, UserPasswordEncoderInterface $encoder, EntityManagerInterface $manager) 
    {
        $passwordUpdate = new PasswordUpdate();
        $form = $this->createForm(PasswordUpdateType::class, $passwordUpdate);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            if(!password_verify($passwordUpdate->getOldPassword(), $user->getPassword()))
            {
                $form->get('oldPassword')->addError(new FormError("Le mot de passe que vous avez tapé n'est pas votre mot de passe actuel !"));
            } 
            else
            {
                $newPassword = $passwordUpdate->getNewPassword();
                $hash = $encoder->encodePassword($user, $newPassword);
                $user->setPassword($hash);
                $manager->persist($user);
                $manager->flush();

                $this->addFlash('success', "Votre mot de passe a bien été modifié !" );

                return $this->redirectToRoute('accueil');
            }
        }


        return $this->render('security/password_modification.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }
}
