<?php
/**
 * fwgallerytmplsimple 1.3.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined('_JEXEC') or die('Restricted access');
JHTML :: script('lightbox_plus_min.js', 'components/com_fwgallery/assets/js/', false);
$next_link = $this->next_image?(JRoute :: _('index.php?option=com_fwgallery&view=image&id='.$this->next_image->id.':'.JFilterOutput :: stringURLSafe($this->next_image->name).'&Itemid='.JFHelper :: getItemid('gallery', $this->row->project_id, JRequest :: getInt('Itemid')).'#fwgallerytop')):'';
?>
<div id="fwgallery">
	<a name="fwgallerytop"></a>
<?php
if (!$this->params->get('hide_iphone_app_promo') and JFHelper :: detectIphone()) {
?>
	<div class="fwg-iphone-promo"><img src="<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/iPhoneAppStore_transp_mini.png" /></div>
<?php
}
if ($this->params->get('display_name_image')) {
?>
	<div class="fwgi-name"><?php echo $this->row->name; ?></div>
<?php
}
?>
    <div class="fwgi-header">
        <div class="fwgi-header-total">
<?php
if ($this->params->get('display_date_image') and $date = JFHelper::encodeDate($this->row->created)) {
?>
	            <div class="fwgi-stats-date"><?php echo $date; ?></div>
<?php
}
if ($this->params->get('display_image_views')) {
?>
			<div class="fwgi-stats-views">
				<?php echo JText :: _('Views') ?>: <?php echo $this->row->hits; ?>
			</div>
<?php
}
if ($this->params->get('use_voting')) {
?>
			<div class="fwgi-stats-vote" id="rating<?php echo $this->row->id; ?>">
				<?php include(dirname(__FILE__).'/../gallery/default_vote.php'); ?>
			</div>
<?php
}
if ($this->params->get('allow_image_download')) {
?>
			<div class="fwgi-stats-download">
				<a href="<?php echo JRoute :: _('index.php?option=com_fwgallery&view=image&task=download&id='.$this->row->id); ?>"><img src="<?php echo JURI :: root(true); ?>/components/com_fwgallerytmplsimple/assets/images/download.png" /></a>
			</div>
<?php
}
if ($this->params->get('allow_print_button')) {
?>
			<div class="fwgi-stats-print">
				<a target="_blank" href="<?php echo JRoute :: _('index.php?option=com_fwgallery&tmpl=component&&view=image&layout=print&id='.$this->row->id); ?>"><img src="<?php echo JURI :: root(true); ?>/components/com_fwgallerytmplsimple/assets/images/print.png" /></a>
			</div>
<?php
}
?>
			<div class="clr"></div>
        </div>
        <div class="fwgi-header-return">
			<a href="<?php echo JRoute::_('index.php?option=com_fwgallery&view=gallery&id='.$this->row->project_id.':'.JFilterOutput :: stringURLSafe($this->row->_gallery_name).'&Itemid='.JFHelper :: getItemid('gallery', $this->row->project_id, JRequest :: getInt('Itemid')).'#fwgallerytop'); ?>">
				<?php echo JText :: _('Return to the gallery'); ?>
			</a>
        </div>
        <div class="clr"></div>
    </div>

	<div class="fwgi-image">
		<table class="fwg-wrapper">
			<tr>
				<td class="fwg-wrapper-top-left"></td>
				<td class="fwg-wrapper-top-middle"></td>
				<td class="fwg-wrapper-top-right"></td>
			</tr>
			<tr>
				<td class="fwg-wrapper-body-left"></td>
				<td class="fwg-wrapper-body-middle">
		<div class="fwgi-image-picture">
<?php
if ($this->plugin_output) {
	echo $this->plugin_output;
} else {
	if ($next_link) {
?>
			<a href="<?php echo $next_link; ?>" title="<?php echo JText :: _('FWG_NEXT'); ?>">
<?php
	}
?>
	        <img src="<?php echo JURI::root(true).'/'.JFHelper::getFileFilename($this->row); ?>" alt="<?php echo JFHelper :: escape($this->row->name); ?>" />
<?php
	if ($next_link) {
?>
			</a>
<?php
	}
}
if ($new_days = (int)$this->params->get('new_days')) {
	$date_diff = floor((mktime() - strtotime($this->row->created))/86400);
	if ($date_diff <= $new_days) {
?>
			    <div class="fwgi-image-new"></div>
<?php
	}
}
?>
		</div>

<?php
if ($this->params->get('hide_bottom_image')) {
	if (!empty($this->image_plugins)) {
		foreach ($this->image_plugins as $image_plugin) {
?>
					<div><?php echo $image_plugin; ?></div>
<?php
		}
	}
	if ($this->row->copyright and $this->params->get('display_user_copyright')) {
?>
					<div class="fwgi-image-copyright"><?php echo $this->row->copyright; ?></div>
<?php
	}
	if ($this->row->descr) {
?>
					<?php echo JText::_('Description').': '.nl2br($this->row->descr); ?>
<?php
	}
	if ($this->comments) {
?>
					<div class="fwgi-image-comments"><?php echo $this->comments; ?></div>
<?php
	}
} else {
?>
		<table class="fwgi-image-info">
			<tr>
				<td class="fwgi-image-prev">
<?php
	if ($this->previous_image) {
	$link = JRoute :: _('index.php?option=com_fwgallery&view=image&id='.$this->previous_image->id.':'.JFilterOutput :: stringURLSafe($this->previous_image->name).'&Itemid='.JFHelper :: getItemid('gallery', $this->row->project_id, JRequest :: getInt('Itemid')).'#fwgallerytop');
?>
			        <a href="<?php echo $link; ?>" title="<?php echo JText :: _('Previous image'); ?>">
				        <img src="<?php echo JURI::root(true).'/'.JFHelper::getFileFilename($this->previous_image, 'th'); ?>"/>
				    </a>
<?php
	}
?>
				</td>
				<td class="fwgi-image-desc">
<?php
	if (!empty($this->image_plugins)) {
		foreach ($this->image_plugins as $image_plugin) {
?>
					<div><?php echo $image_plugin; ?></div>
<?php
		}
	}
	if ($this->row->copyright and $this->params->get('display_user_copyright')) {
?>
					<div class="fwgi-image-copyright"><?php echo $this->row->copyright; ?></div>
<?php
	}
	if ($this->row->descr) {
?>
					<?php echo JText::_('Description').': '.nl2br($this->row->descr); ?>
<?php
	}
	if ($this->comments) {
?>
					<div class="fwgi-image-comments"><?php echo $this->comments; ?></div>
<?php
	}
?>
				</td>
				<td class="fwgi-image-next">
<?php
	if ($this->next_image) {
?>
			        <a href="<?php echo $next_link; ?>" title="<?php echo JText :: _('Next image'); ?>">
				        <img src="<?php echo JURI::root(true).'/'.JFHelper::getFileFilename($this->next_image, 'th'); ?>"/>
			        </a>
<?php
	}
?>
				</td>
			</tr>
		</table>
<?php
}
?>
				</td>
				<td class="fwg-wrapper-body-right"></td>
			</tr>
			<tr>
				<td class="fwg-wrapper-bottom-left"></td>
				<td class="fwg-wrapper-bottom-middle"></td>
				<td class="fwg-wrapper-bottom-right"></td>
			</tr>
		</table>
	</div>

</div>
<?php
$params = JComponentHelper :: getParams('com_fwgallery');
if (!$params->get('hide_fw_copyright')) {
?>
<div id="fwcopy" style="display:block;visibility:visible;text-align:center;font-size:10px;padding:20px 0;">
	<?php echo JText::_("Powered by"); ?> <a href="http://fastw3b.net/fwgallery.html" target="_blank"><?php echo JText::_("FW Gallery"); ?></a>
</div>
<?php
}
?>
<script type="text/javascript">
var httpRequest = false;
function getElementsByClassName(classname, node) { if (!node) { node = document.getElementsByTagName('body')[0]; } var a = [], re = new RegExp('\\b' + classname + '\\b'); els = node.getElementsByTagName('*'); for (var i = 0, j = els.length; i < j; i++) { if ( re.test(els[i].className) ) { a.push(els[i]); } } return a; }
Spica.E.run(function(){
	var ratings = getElementsByClassName('fwg-star-rating-not-logged');
	if (ratings.length > 0) {
		for (var i = 0; i < ratings.length; i++) {
			Spica.E.register(ratings[i], 'click', function(ev) {
				alert('<?php echo JText :: _('Voting is available for registered users only. Please register.', true); ?>');
			});
		}
	}
	var stars = getElementsByClassName('fwgallery-stars');
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
});
</script>