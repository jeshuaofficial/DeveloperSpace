<?php

/*
 * This file is part of the Ocrend Framewok 2 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models;

use app\models as Model;
use Ocrend\Kernel\Models\Models;
use Ocrend\Kernel\Models\ModelsInterface;
use Ocrend\Kernel\Models\ModelsException;
use Ocrend\Kernel\Router\RouterInterface;
use Ocrend\Kernel\Helpers\{Strings,Files};


/**
 * Modelo Test
 *
 * @author Brayan Narváez <prinick@ocrend.com>
 */

class Proyectos extends Models implements ModelsInterface {

    /**
     * Medidas de los thumbs
     * @var array
     */
    const RESPONSIVE_SIZES = array(1400);

    /**
      * __construct()
    */
    public function __construct(RouterInterface $router = null) {
        parent::__construct($router);
    }

    /**
      * Obtiene elementos de Proyectos en la tabla `proyectos`
      *
      * @return false|array: false si no hay datos.
      *                      array con los datos.
    */
    final public function get(int $id = 0) {

        if (0 != $id) {
          # Traemos un proyecto
          $proj = $this->db->select('*','proyectos', "id_proyectos = '$id'", 'LIMIT 1');
          if (false == $proj) {
          	return false;
          }
          $proj[0]['categorias'] = implode(', ', json_decode( $proj[0]['categorias'], true ) );
          $pr = $proj;
        }else{
          # Traemos todos los proyectos
          $proj = $this->db->select('*','proyectos');
          if (false == $proj) {
          	return false;
          }
          foreach ($proj as $p) {
            $pr[] = array(
              'id_proyectos' => $p['id_proyectos'],
              'titulo' => $p['titulo'],
              'short_desc_es' => $p['short_desc_es'],
              'short_desc_en' =>  $p['short_desc_en'],
              'content_es'  => $p['content_es'],
              'content_en' => $p['content_en'],
              'categorias' => implode(', ', json_decode( $p['categorias'], true ) ),
              'portada' => $p['portada'],
              'logo' => $p['logo']
            );
          }
        }
       
        return $pr;
    }

    /**
     * Obtiene todas la categorias
     * @return array con todas las categorías
     */
    final public function getCategories() : array{
        return $this->db->select('*', 'categorias');
    }
    /**
     * Obtiene las imagenes de galeria de un proyecto
     * @param int $id - id del proyecto
     * @return array con cada archivo y su directorio
     */
    final public function getGallery(int $id) : array {
      $dir = 'views/app/images/projects/'.$id.'/';
      $sizes = array();
      foreach (self::RESPONSIVE_SIZES as $rs) {
        $sizes[$rs] = Files::get_files_in_dir($dir . $rs . '/'); 
      }

      return $sizes;
    }
        

    /**
      * __destruct()
    */ 
    public function __destruct() {
        parent::__destruct();
    }
}