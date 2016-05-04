<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 4/05/16
 * Time: 11:57
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticuloController extends Controller
{
    /**
     * @Route("/articulosDelPedido/{id}", name="app_articulos")
     */
    public function articulosIdAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $articulosRepositorio = $m->getRepository('AppBundle:Articulo');
        $articulos = $articulosRepositorio->articulosDelPedido($id);
        $response = $this->render(':index:articulos.html.twig', [
            'articulos'  => $articulos
            
        ]);
        return $response;
    }
}