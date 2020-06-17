<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    
     /**
     * On place les paramètres dynamiques entre accolades
     * URI valide: /product
     * 
     * liste des produits
     * 
     * @Route("/product", name="product_list")
     */
    public function list()
    {
            return $this->json([
                 
                 'titre' => 'liste des produits'
            ]);
    }

    /**
     * Ajout d'un produit
     * @Route ("/product/new", name="product_add")
     */
    public function add()
    {
        return $this->json([
            'titre' => 'Ajouter un produit'
        ]);
    }

      /**
     * modification d'un produit
     * @Route ("/product/{id}/edit", name="product_edit")
     */
    public function edit($id)
    {
        return $this->json([
            'titre' => 'modifier le produit ' . $id
        ]);
    }
}
