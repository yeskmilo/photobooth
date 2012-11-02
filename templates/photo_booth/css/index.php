<?php
/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

defined('_JEXEC') or die('Restricted access');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >

<head>
   
   <!--[if gte IE 5.5]>
   <script language="JavaScript" src="<?php echo $this->baseurl ?>/templates/turistainternacional/js/ie6_desplegable.js" type="text/JavaScript"></script>
   <![endif]-->
   
   <!--[if gte IE 5.5]>
   <script language="JavaScript" src="<?php echo $this->baseurl ?>/templates/turistainternacional/js_menuCategorias/ie6_desplegable.js" type="text/JavaScript"></script>
   <![endif]-->
   
<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
<![endif]-->
   
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/turistainternacional/css/template.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/turistainternacional/css/css_desplegable.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/turistainternacional/css/css_menuCategorias.css" type="text/css" />
	 
	<?php echo '<?xml version="1.0" encoding="utf-8"?'.'>'; ?>

</head>

<body>

     <div id="contenedor">
	 
	     <img id="hojas" src="templates/turistainternacional/images/hojas_inicio.png" width="141" height="138" alt="" />
	 
         <div id="encabezado">
		    <div id="tituloEncabezado">
			     <jdoc:include type="modules" name="user1" style="beezDivision" headerLevel="3" />
			   <div id="tituloEncabezadointerno">	 
			     <h1><a href="index.php" title="regresar al inicio"><span>&nbsp;</span>Colombia</a> <span class="portal">Portal oficial de turismo</span></h1>
			     <jdoc:include type="modules" name="user2" style="beezDivision" headerLevel="3" />
			   </div>	 
		    </div>
			<div id="componentesEncabezado">
			     <jdoc:include type="modules" name="top" style="beezDivision" headerLevel="3" />
			     <jdoc:include type="modules" name="user3" style="beezDivision" headerLevel="3" />
			</div>
		 </div>

		  <div id="centroatencionVisual">
		    <jdoc:include type="modules" name="user4" style="beezDivision" headerLevel="3" />
          </div>
		  
	 </div>
		   
	 <div id="menuCategoria">
	    <jdoc:include type="modules" name="user5" style="beezDivision" headerLevel="3" />
     </div>
	  
	 <div id="columnas">
		  
		      <div id="columnaIzquierda">
			     <jdoc:include type="modules" name="left" style="beezDivision" headerLevel="3" />
		      </div>
			
			  <div id="columnaCentral">
			     <jdoc:include type="modules" name="especial" style="beezDivision" headerLevel="3" />
				 <h2 class="destinos">Dos destinos recomendados para viajar esta semana</h2>
			     <jdoc:include type="component" style="beezDivision" headerLevel="3" />
		      </div>
			
			  <div id="columnaDerecha">
			     <jdoc:include type="modules" name="right" style="beezDivision" headerLevel="3" />
		      </div>
			  
		      <div id="complementarios">	  
		  
		          <div id="imagenesPanoramicas">
		               <jdoc:include type="modules" name="user6" style="beezDivision" headerLevel="3" />
		          </div>	  
		          <div id="rssSuscripcion">
                       <jdoc:include type="modules" name="user7" style="beezDivision" headerLevel="3" />
		          </div>
		          <div id="piedePagina">
			           <jdoc:include type="modules" name="footer" style="beezDivision" headerLevel="3" />	
		          </div>
		  
              </div>
			  
	</div>
	 
	<div id="copiright">
            <jdoc:include type="modules" name="user8" style="beezDivision" headerLevel="3" />
	</div>

</body>
</html>