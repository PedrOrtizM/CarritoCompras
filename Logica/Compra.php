<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Compra
 *
 * @author Pedro Ortiz M
 */
class Compra {
   private $producto;
   private $cantidad;
   private $subtotal;
   
   
    function __construct($producto, $cantidad) {
       $this->producto = $producto;
       $this->cantidad = $cantidad;
       
   }

   
   function getProducto() {
       return $this->producto;
   }

   function getCantidad() {
       return $this->cantidad;
   }

   function getSubtotal() {
       return $this->cantidad*$this->producto->getPrecio();
       
       
       
   }

   function setProducto($producto) {
       $this->producto = $producto;
   }

   function setCantidad($cantidad) {
       $this->cantidad = $cantidad;
   }

   function setSubtotal($subtotal) {
       $this->subtotal = $subtotal;
   }


   
}
