<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 3/05/16
 * Time: 16:58
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Cliente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ClienteController extends Controller
{
    /**
     * @Route(path="/clienteMas30", name="app_cliente")
     *
     */

    public function mostrarClienteAction(){
        $m = $this->getDoctrine()->getManager();
        $clienteRepositorio = $m->getRepository('AppBundle:Cliente');

        $clientes = $clienteRepositorio->ClienteConPedidoMas30();

        $response = $this->render(':index:clientes.html.twig', [
            'clientes' => $clientes
        ]);

        return $response;
    }

    
    
}


