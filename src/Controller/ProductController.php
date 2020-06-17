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
           // templates/           product/list.html.twig
        return $this->render('product/list.html.twig');
              //render()=
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
