<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * On déclare des routes avec des annotations Route
     * 
     * URL: localhost/route
     * URI: /route
     * /** https://www.php.net/manual/en/function.json-encode 
       

     * @Route("/", name="home")
     */
    
    public function index()
    { 
        // templates/           home.html.twig
        return $this->render('home.html.twig', [
            'pseudo' => 'John Doe',
            'liste' => [
                'foo',
                'bar',
                'baz',
            ]
        ]);
              //render()=
    }

    /**
     * On place les paramètres dynamiques entre accolades
     * URI valide: /test
     * EntityManager = sert à enregistrer une entité en base de donnée
     * 
     * @Route("/test", name="test")
     */
    public function test(EntityManagerInterface $em)
    {
           // Création d'une entité
           $product = new Product();

           $product
                    ->setName('Jeans')
                    ->setDescription('Un super jean !')
                    ->setPrice(79.99)
                    ->setQuantity(50)

            ;

            //dump debug mais continue le code
            // l'entité n'est pas encore enregistrée en base
            dump($product);

            // Enregistrement (insertion)
            // persist = 1. Préparer à l'enregistrement d'une entité
            $em->persist($product);
            // flush = 2. Exécuter les requêtes SQL
            $em->flush();
           

           // fonction de debug: dump() & die = dd  dd debug et s'arrete
           dd($product);


    }

}
