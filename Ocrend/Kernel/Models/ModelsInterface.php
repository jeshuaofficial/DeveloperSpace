<?php

/*
 * This file is part of the Ocrend Framewok 2 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ocrend\Kernel\Models;

use Ocrend\Kernel\Router\RouterInterface;

/**
 * Estructura elemental para el correcto funcionamiento de cualquier modelo en el sistema.    
 *
 * @author Brayan Narváez <prinick@ocrend.com>
 */

 interface ModelsInterface {
     public function __construct(RouterInterface $router = null);
     public function __destruct();
 }