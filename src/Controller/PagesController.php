<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        return $this->render('pages/accueil.html.twig', [
            'user' => $this->getUser()
        ]);
    }

    /**
     * @Route("/collection2020", name="bijoux")
     */
    public function bijoux(ProduitRepository $repoProduit, Request $request)
    {
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);

        $quantitePage = 12;// nombre de produits par page
        //$produits = $repoProduit->findAll();
        //$produitsNb = count($produits); // nombre de produits total
 
        // dump($produitsNb);
        // $nbPage = ceil($produitsNb/$quantitePage); // nombre de pages = nombre de produits total divisé par le nombre sur une page, arrondi à l'unité supérieure
        // dump($nbPage);

        

        // if($produits > 12)
        // {
        // if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $nbPage)
        // // si $_GET['page'] existe, qu'elle est bien définie , superieure à 0 et inférieure ou égale au nombre de pages
        // {
        //     $_GET['page'] = intval($_GET['page']); // $_GET['page'] n'accepte que les chiffres
        //     $pageCourante = $_GET['page'];
             
        // }
        // else
        // {
        //     $pageCourante = 1; // sinon page = 1 
        // }
        // $start = ($pageCourante-1)*$quantitePage; // debut de chaque page, le premier chiffre de la limite
        // }
        $produits = $repoProduit->findSearch($data);
        dump($produits);
        return $this->render('pages/bijoux.html.twig', [
        'produits' => $produits,
        'user' => $this->getUser(),
        'form' => $form->createView(),
        // 'nbPage' => $nbPage,
        // 'pageCourante' => $pageCourante
        
        ]);
    }

    /**
     * @Route("/produit/{id}", name="produit")
     */
    public function produit(Produit $produit)
    {
        return $this->render('pages/produit.html.twig', [
        'produit' => $produit,
        'user' => $this->getUser()
        ]);
    }



    // Quelques améliorations :
    //     - pendant le temps d'attente en bas du scroll : mettre un gif d'un chargement
    //     - filtre : ordre : à régler
    //     - panier : 
    //         - dans la page de chaque bijou pouvoir mettre un select d'une quantité
    //         - dans la page panier : pouvoir également choisir la quantité avec un select

    
}
