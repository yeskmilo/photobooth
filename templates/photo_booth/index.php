<?php

 // no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

JHtml::_('behavior.framework', true);



    unset($this->_scripts[$this->baseurl."/media/system/js/mootools-core.js"]);

    unset($this->_scripts[$this->baseurl."/media/system/js/core.js"]);

    unset($this->_scripts[$this->baseurl."/media/system/js/caption.js"]);

    unset($this->_scripts[$this->baseurl."/media/system/js/mootools-more.js"]);



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >



<head>



<jdoc:include type="head" />



 <link rel="stylesheet" href="<?php echo $this->baseurl ;?>/templates/system/css/system.css" type="text/css" />
 <link rel="stylesheet" href="<?php echo $this->baseurl ;?>/templates/system/css/general.css" type="text/css" />


	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/photo_booth/css/template.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/photo_booth/css/css_desplegable.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/photo_booth/css/css_menuCategorias.css" type="text/css" />
	 <link href="favicon.png" rel="shortcut icon"/>
     <script  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

      <script type="text/javascript" src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />



    <!-- Place this tag in your head or just before your close body tag. -->
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {parsetags: 'explicit'}
</script>

<!-- Place this tag where you want the share button to render. -->



<!-- Place this render call where appropriate. -->

<script>

	$(document).ready(function() {
		$("#slidemarginleft").css('display','none');
		$('#mas-proexport').click(function() {
		$('#shadow').click(function() {
		$("#slidemarginleft").hide();
		$(".inner").css('margin-left','912px');
		$('#shadow').fadeOut("slow");
		});
		if($('#slidemarginleft').css('display')=="block"){
		setTimeout(function(){
		$("#slidemarginleft").fadeOut("slow");
		$("#shadow").css('display','none');
		},20000);}
		else{
		$("#slidemarginleft").fadeIn("slow");
		var $marginLefty = $(".inner");
		$marginLefty.animate({
		marginLeft: parseInt($marginLefty.css('marginLeft'),10) == 0?
		$marginLefty.outerWidth() :
		0
		});
		$("#shadow").css('display','block');
		}
		});

		$(".caja-imagen").hover(
		  function () {
			$(this).children('.roll').show();
		  },
		  function () {
			$(this).children('.roll').hide();
		  }
		);

	});


  function info(foto,ruta,id,filename,user_id,current) {


			var share = '<span>London Photobooth</span><a class="go-gallery" href="#" onclick="$.fancybox.close();">Go to Gallery</a><br /><div class="negro"></div><table border="0" cellspacing="0" cellpadding="0"><tr><td><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fcolombia.travel%2Fen%2Fphotobooth%2Findex.php%3Foption%3Dcom_gallery%26view%3Dfoto%26id%3D'+ id +'&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></td><td><a href="https://twitter.com/share" class="twitter-share-button" data-via="colombia_travel" data-url="http://colombia.travel/en/photobooth/index.php?option=com_gallery&amp;view=foto&amp;id='+ id +'"><img style="margin-top:3px" src="images/tweet.jpg" />&nbsp;</a></td><td><div class="g-plus" data-action="share" data-annotation="none" data-height="15" data-href="http://colombia.travel/en/photobooth/index.php?option=com_gallery&amp;view=foto&amp;&amp;id='+ id +'"></div></td></tr></table>';
			var botones = '<a class="atras"></a><a class="adelante"></a>';

			$.fancybox(
				'<div class="contenido-box"><div class="img-principal"><img src="' + ruta +'/' + filename +'"/>' + botones +'<div class="marca-big"></div></div><div class="right-bar"><span class="fotoname">' +foto + '</span><div class="share"><div class="negro"></div>' + share +'<div class="amarillo"></div></div><div class="download">Download<br><span>your image</span><a class="here" target="_blank" href="descargar.php?user=' + user_id + '&filename=' + filename +'">here</a></div></div></div>',
				{
					'autoDimensions'	: false,
					'width'         		: 946,
					'height'        		: 530,
					'autoScale'			: false,
					'transitionIn'		: 'none',
					'transitionOut'		: 'none',
					'overlayColor'		: '#000',
					'overlayOpacity'	: 0.9,
					'scrolling' : 'no',
					'onClosed'		: function() {

					}
				}
			);

			jQuery('.atras').click(atras);
			jQuery('.adelante').click(adelante);


			function atras(event) {

				var nuevo_atras = parseInt(current)-1;
				eval(jQuery('.caja-lista-'+ nuevo_atras +' a').attr('onclick'));
			}

			function adelante(event) {

				var nuevo_adelante = parseInt(current)+1;
				eval(jQuery('.caja-lista-'+ nuevo_adelante +' a').attr('onclick'));
			}



			!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");


			gapi.plus.go();


	}
</script>


</head>

<body>

<div id="top-tabs">
<div class="center">

<ul class="tabs-proexport">

<li class="active"><span>Tourism</span></li>

<li><a href="http://www.investincolombia.com.co" title="Foreing Investment in Colombia - Invest in Colombia">Foreign Investment</a></li>

<li><a href="http://beta.colombiatrade.com.co" title="Export Promotion in Colombia - Colombia Trade">Export Promotion</a></li>

</ul>


<jdoc:include type="modules" name="user1" style="beezDivision" headerLevel="3" />
</div>
</div>

<div id="all">


     <div id="contenedor">
	 <a href="#columnaCentral" title="Saltar al contenido" id="irContenido">Go to content</a>

          <div id="encabezado">
		    <div id="tituloEncabezado">
			   <div id="tituloEncabezadointerno">
			     <h1><a href="/en" title="Back to home"><span>Colombia</span></a> <span class="portal">Official Travel Guide</span></h1>
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


              <div class="contenido-principal">

              	<?php if($this->countModules('registro')): ?>
              	<div class="capa-principal">
                	<div class="titulo-principal">
                    	<em> London</em> photo booth
                    </div>
                   	<jdoc:include type="modules" name="registro"/>
                </div>
                <div class="fotos-home">
                	<div class="fotos1">
                    	<div class="foto2">
                            <img src="images/foto2.jpg" />
                        </div>

                        <div class="foto1">
                            <img src="images/foto1.jpg" />
                        </div>
                    </div>
                    <div class="fotos2">
                        <div class="foto3">
                            <img src="images/foto3.jpg">
                        </div>
                        <div class="foto4">
                        	<img src="images/foto4.jpg">
                        </div>
                    </div>
                     <div class="foto5">
                        	<img src="images/foto5.jpg" />
                     </div>
                     <div class="foto6">
                     	<img src="images/foto6.jpg" />
                     </div>


                </div>

                <?php else: ?>
                <div class="buscador">
               		<div class="texto-buscador">
                    	<a href="index.php?option=com_gallery&id=1">London Photobooth</a>
                    </div>

                    <div class="caja-buscador">
                    	<form name="buscador" method="post" action="index.php?option=com_gallery&view=search">
                            <table border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><input name="busqueda" class="busqueda-input" type="text" value="Search" onfocus="if(this.value=='Search') this.value='';" onblur="if(this.value=='') this.value='Search';" /></td>
                                <td><input type="submit" class="ir-login" /></td>
                              </tr>
                            </table>
                        </form>
                        <div class="ir-galeria">
                    		<a href="<?php echo $this->baseurl ;?>/index.php?login=false">Log Out</a>
                    	</div>
                    </div>
                    <?php $view = JRequest::getVar('view');
					if($view == "search"):
					?>
                    <div class="ir-galeria">
                    	<a href="index.php?option=com_gallery&id=1">Return to Gallery</a>
                    </div>
                    <?php endif; ?>
                    <div class="clr"></div>
                </div>
                <jdoc:include type="component" />
                <?php endif; ?>
                <div class="clr"></div>
              </div>

		      <div id="complementarios">

				<!--
		          <div id="publicidad">
		               <jdoc:include type="modules" name="publicidad" style="beezDivision" headerLevel="3" />
		          </div>
                -->

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
</div>



<span id="mas-proexport">Other Proexport websities</span>


<div style="display: none;" id="slidemarginleft">

  <div class="inner" style="margin-left: 912px;"><div id="franja">

	<div class="header">
		<span class="logo">Proexport Colombia</span>
		 <p class="slogan"><strong>Proexport Colombia</strong> is in charge of tourism promotion, investment and exports in Colombia.</p>
		<p class="reddeportales">    NETWORK WEBSITES</p>

	</div>

	<div class="content">

		<div class="f_caja">
			<h2 class="f_titulo proexport"><a href="http://www.proexport.com.co" title="Proexport Colombia">Proexport</a></h2>
			<p class="f_imagen"><a href="http://www.proexport.com.co" title="Proexport Colombia"><img src="http://www.investincolombia.com.co/images/stories/franja-institucional/proexporta-ss.png" alt="Portal de Proexport" /></a></p>
			<p class="f_link"><a href="http://www.proexport.com.co" title="Proexport Colombia">www.proexport.com.co</a></p>
						<div class="semi-block">
			</div>
		</div>

		<div class="f_caja">
			<h2 class="f_titulo turismo"><a href="http://www.colombia.travel" title="Colombia Travel">Tourism</a></h2>
			<p class="f_imagen"><a href="http://www.colombia.travel" title="Colombia Travel"><img src="http://www.investincolombia.com.co/images/stories/franja-institucional/turismo-ss.png" alt="Portal de Turismo" /></a></p>
			<p class="f_link"><a href="http://www.colombia.travel" title="Colombia Travel">www.colombia.travel</a></p>
            <div class="semi-block">
			</div>
		</div>

		<div class="f_caja">
			<h2 class="f_titulo inversiones"><a href="http://www.investincolombia.com.co/" title="Invierta en Colombia">Investment</a></h2>
			<p class="f_imagen"><a href="http://www.investincolombia.com.co/" title="Invierta en Colombia"><img src="http://www.investincolombia.com.co/images/stories/franja-institucional/invierta-ss.png" alt="Portal de Inversi&oacute;n" /></a></p>
			<p class="f_link"><a href="http://www.investincolombia.com.co/" title="Invierta en Colombia">www.investincolombia.com.co</a></p>
            <div class="semi-block">
			</div>
		</div>

            <div class="f_caja">
			<h2 class="f_titulo exportaciones"><a href="http://www.colombiatrade.com.co" title="Colombia Trade">Exports</a></h2>
			<p class="f_imagen"><a href="http://www.colombiatrade.com.co/" title="Colombia Trade"><img src="http://www.investincolombia.com.co/images/stories/franja-institucional/exporte-ss.png" alt="Portal de Exportaciones" /></a></p>
			<p class="f_link"><a href="http://www.colombiatrade.com.co/" title="Colombia Trade">www.colombiatrade.com.co</a></p>
			<div class="semi-block">
			</div>
		</div>


	</div>
</div></div>
</div>
<div id="shadow" style="width: 100%; display: none; position: fixed; height: 100%;"></div>

</body>
</html>
<?php
_photoboot_collage();




function _photoboot_collage() {
  if ($handle = opendir('/proexport/images/collage')) {

  }
}
