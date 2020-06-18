<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    
     /**
     * On place les paramètres dynamiques entre accolades
     * URI valide: /product
     * 
     * ProductRepository= voir fichier dans src
     * 
     * liste des produits
     * 
     * @Route("/product", name="product_list")
     */
    public function list(ProductRepository $repository)
    {
           
           // Rècupérer plusieurs entités selon des critères
           //FindBy = tri les entitées
           //FindAll = récupérer tous les entitées
           // findOneby =récupére une seul entitée

           //find() = récupére son entité par son ID
           // ex : product_list = $repository->find(4);

          //render()=
           // templates/           product/list.html.twig
        return $this->render('product/list.html.twig', [
                'product_list' => $repository->findAll()
        
        
            ]);
              
    }

    /**
     * Ajout d'un produit
     * @Route ("/product/new", name="product_add")
     */
    public function add()
    {
        return $this->render('product/add.html.twig');
    }

      /**
     * modification d'un produit
     * @Route ("/product/{id}/edit", name="product_edit")
     */
    public function edit($id)
    {
        return $this->render('product/edit.html.twig');
    }
}
