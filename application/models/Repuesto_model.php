<?php
/***
 * Modelo Producto corresponde a los repuestos utilizados
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {



	public function __construct() {
		parent::__construct();
		$this->load->database('pdo');
	}



}