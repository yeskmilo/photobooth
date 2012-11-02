<?php
/**
 * fwgallerytmplsimple 1.3.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

JHTML :: script('lightbox_plus_min.js', 'components/com_fwgallery/assets/js/', false);
?>
<script type="text/javascript">
var httpRequest = false;
Spica.E.run(function(){
	var a = new Lightbox({
		loadingimg:"<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/loading.gif",
		expandimg:"<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/expand.gif",
		shrinkimg:"<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/shrink.gif",
		blankimg:"<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/blank.gif",
		previmg:"<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/prevlabel.gif",
		nextimg:"<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/nextlabel.gif",
		closeimg:"<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/closelabel.gif",
		resizable:true,
		animation:true
	});
	var ratings = getElementsByClassName('fwg-star-rating-not-logged');
	if (ratings.length > 0) {
		for (var i = 0; i < ratings.length; i++) {
			Spica.E.register(ratings[i], 'click', function(ev) {
				alert('<?php echo JText :: _('Voting is available for registered users only. Please register.', true); ?>');
			});
		}
	}
	var images = getElementsByClassName('fwg-star-rating');
	if (images.length > 0) {
		for (var i = 0; i < images.length; i++) {
			var stars = getElementsByClassName('fwgallery-stars', images[i]);
			if (stars.length > 0) {
				for (var s = 0; s < stars.length; s++) {
					Spica.E.register(stars[s], 'click', function(ev) {
						if (!httpRequest) {
						    if (window.XMLHttpRequest) {
						        httpRequest = new XMLHttpRequest();
						        if (httpRequest.overrideMimeType) {
						            httpRequest.overrideMimeType('text/html');
						        }
						    } else if (window.ActiveXObject) {
						        try {
						            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
						        } catch (e) {
						            try {
						                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
						            } catch (e) {}
						        }
						    }
						}
						var attr = '';
						if (Spica.B.isWinIE) attr = ev.srcElement.getAttribute('rel');
						else attr = this.getAttribute('rel');
						if (attr) {
				    		var ids = attr.match(/^(\d+)_(\d+)$/);
							if (ids.length > 0) {
							    if (httpRequest && (httpRequest.readyState == 4 || httpRequest.readyState == 0)) {
								    httpRequest.onreadystatechange = function() {
									    if (httpRequest.readyState == 4) {
									        if (httpRequest.status == 200) {
												var el = document.getElementById('rating'+ids[1]);
												if (el) el.innerHTML = httpRequest.responseText;
											}
										}
								    };
								    httpRequest.open('GET', '<?php echo JURI :: root(true); ?>/index.php?format=raw&option=com_fwgallery&view=gallery&task=vote&id='+ids[1]+'&value='+ids[2], true);
								    httpRequest.send(null);
							    }
							}
						}
					});
				}
			}
		}
	}
});
</script>