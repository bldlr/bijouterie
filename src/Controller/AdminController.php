<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/admin")
 */

class AdminController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard()
    {   
        return $this->render('admin/dashboard.html.twig', [
            'user' => $this->getUser()
        ]);
    }

    /**
     * @Route("/collection2020", name="admin_bijoux")
     */
    public function adminBijoux(ProduitRepository $repoProduit)
    {
        $produits = $repoProduit->findAll();
        return $this->render('admin/adminBijoux.html.twig', [
        'produits' => $produits,
        'user' => $this->getUser()
        ]);
    }

    /**
     * @Route("/creation", name="creationProduit")
     */
    public function creation( Request $request, EntityManagerInterface $entityManagerInterface)
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() )
        {
            if(!$produit->getImageFile()){
                $produit->setImage('imageDefault.png');
            }
            $produit->setUpdatedAt(new \DateTime('now'));
            $entityManagerInterface->persist($produit);
            $entityManagerInterface->flush();
            $this->addFlash("creationProduit", "La création a été effectuée");
            return $this->redirectToRoute("admin_bijoux");
        }


        return $this->render('admin/ajoutBijoux.html.twig', [
            "produit" => $produit,
            "form" => $form->createView(),
            'user' => $this->getUser()
        ]);
    }

    /**
     * @Route("/modification/{id}", name="modificationProduit", methods="GET|POST")
     */
    public function modification(Produit $produit, Request $request, EntityManagerInterface $entityManagerInterface)
    {
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() )
        {
            $entityManagerInterface->persist($produit);
            $entityManagerInterface->flush();
            $this->addFlash("modificationProduit", "La modification a été effectuée");
            return $this->redirectToRoute("admin_bijoux");
        }


        return $this->render('admin/modificationBijoux.html.twig', [
            "produit" => $produit,
            "form" => $form->createView(),
            'user' => $this->getUser()
        ]);
    }


    /**
     * @Route("/suppression/{id}", name="suppressionProduit", methods="delete")
     */
    public function suppression(Produit $produit, Request $request, EntityManagerInterface $entityManagerInterface)
    {
        if($this->isCsrfTokenValid("SUP". $produit->getId(), $request->get('_token') ))
        {
        $entityManagerInterface->remove($produit);
        $entityManagerInterface->flush();
        $this->addFlash("suppressionProduit", "La suppression a été effectuée");
        return $this->redirectToRoute("admin_bijoux");
        }

    }
    
}
