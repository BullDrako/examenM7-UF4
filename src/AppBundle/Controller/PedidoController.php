<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 4/05/16
 * Time: 11:47
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PedidoController extends Controller
{

    /**
     * @Route("/pedidosDelCliente/{id}", name="app_clienteID")
     */
    public function PedidosDeClienteIdAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $pedidosRepoitorio = $m->getRepository('AppBundle:Pedido');
        $pedidos = $pedidosRepoitorio->pedidosDeUsuarioId($id);
        $response = $this->render(':index:pedidos.html.twig', [
            'pedidos'  => $pedidos
        ]);
        return $response;
    }
}