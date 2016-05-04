<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PedidoRepository")
 */
class Pedido
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var int
     *
     * @ORM\Column(name="precio", type="integer")
     */
    private $precio;


    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Cliente", inversedBy="pedidos")
     */

    private $clientes;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Articulo", mappedBy="pedido", cascade={"remove"})
     */

    private $articulos;
    
    
    private $nombre;
    
    
    public function __construct()
    {   
        $this->clientes = new ArrayCollection();
        $this->articulos = new ArrayCollection();
    }

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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Pedido
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set precio
     *
     * @param integer $precio
     *
     * @return Pedido
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return int
     */
    public function getPrecio()
    {
        return $this->precio;
    }


    /**
     * Set cliente
     *
     * @param \Appbundle\Entity\Cliente $cliente
     *
     * @return Pedido
     */
    public function setCliente(\Appbundle\Entity\Cliente $cliente = null)
    {
        $this->clientes = $cliente;
        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Appbundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->clientes;
    }

    /**
     * añadir cliente
     *
     * @param \Appbundle\Entity\Cliente $cliente
     *
     * @return Pedido
     */
   public function añadirCliente(\Appbundle\Entity\Cliente $cliente)
    {
        $this->clientes[] = $cliente;
        return $this;
    }
    
    /**
     * borrar cliente
     *
     * @param \Appbundle\Entity\Cliente $cliente
     */
   public function borrarCliente(\Appbundle\Entity\Cliente $cliente)
    {
        $this->clientes->removeElement($cliente);
    }

    /**
     * añadir articulo
     *
     * @param \AppBundle\Entity\Articulo $articulo
     *
     * @return Pedido
     */
    public function añadirArticulo(\AppBundle\Entity\Articulo $articulo)
    {
        $this->articulos[] = $articulo;
        return $this;
    }
    /**
     * borrar articulo
     *
     * @param \AppBundle\Entity\Articulo $articulo
     */
    public function borrarArticulo(\AppBundle\Entity\Articulo $articulo)
    {
        $this->articulos->removeElement($articulo);
    }

    /**
     * Get articulos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticulo()
    {
        return $this->articulos;
    }

    public function __toString()
    {
        return $this->nombre;
    }

}

