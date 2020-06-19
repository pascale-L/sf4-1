<?php

namespace App\Controller;

use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function add(Request $request, EntityManagerInterface $em)
    {
        //createForm() = Création du formulaire
        $productForm = $this->createForm(ProductFormType::class);

        // handleRequest()  =On passe la requête au formulaire
        $productForm->handleRequest($request);

        // On vérifier que le formulaire est envoyé et valide
        if ($productForm->isSubmitted() && $productForm->isValid()) {
            //getData=  On récupère les donnèes du formulaire
            $product = $productForm->getData();

            $em->persist($product);
            $em->flush();

            // Redirection sur la liste des produits
            return $this->redirectToRoute('product_list');
        }

        
        // createView =
       return $this->render('product/add.html.twig', [
            'product_form' => $productForm->createView()
       ]);
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
