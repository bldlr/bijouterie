<?php

  namespace App\Service\Cart;

  use Symfony\Component\HttpFoundation\Session\SessionInterface;
  use App\Repository\ProduitRepository;

  class CartService {

    protected $session;
    protected $repoProduit;

    public function __construct(SessionInterface $session, ProduitRepository $repoProduit)
    {
      $this->session = $session;
      $this->repoProduit = $repoProduit;
    }



    public function add(int $id)
    {
      $panier = $this->session->get('panier', []);

      if(!empty($panier[$id]))
      {
        $panier[$id]++;
        //$this->$request()->query->get('qte');
      }
      else
      {
        $panier[$id] = 1;
      }

      $this->session->set('panier', $panier);
    }

    public function remove(int $id)
    {
      $panier = $this->session->get('panier', []);

      if(!empty($panier[$id]))
      {
        unset($panier[$id]);
      }

      $this->session->set('panier', $panier);
    }

    public function getFullCart() : array
    {
      $panier = $this->session->get('panier', []);

      $panierWithData = [];

      foreach($panier as $id => $quantity)
      {
        $panierWithData[] = [
          'product' => $this->repoProduit->find($id),
          'quantity' => $quantity
        ];
      }
      return $panierWithData;
    }

    public function getTotal() : float
    {
      $total = 0;

      foreach($this->getFullCart() as $item)
      {
        $total += $item['product']->getPrix() * $item['quantity'];
      }

      return $total;
    }


  }
