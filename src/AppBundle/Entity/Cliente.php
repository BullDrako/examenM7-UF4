<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClienteRepository")
 */
class Cliente
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Pedido", mappedBy="clientes", cascade={"remove"} )
     */
    private $pedidos;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Cliente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set pedidos
     * 
     */

    public function setPedidos($pedidos)
    {
        $this->pedidos = $pedidos;

        return $this;
    }

    /**
     * Get pedidos
     *
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }
    
    
    public function __construct()
    {
        $this->pedidos = new ArrayCollection();
    }


   public function añadirPedido(\AppBundle\Entity\Pedido $pedido)
    {
        $this->pedidos[] = $pedido;
        return $this;
    }

    /**
     * borrar pedido
     *
     * @param \AppBundle\Entity\Pedido $pedido
     */
   public function borrarPedido(\AppBundle\Entity\Pedido $pedido)
    {
        $this->pedidos->removeElement($pedido);
    }

    public function __toString()
    {
        return $this->nombre;
    }
}

