<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="contenido-box">
	<div class="img-principal">
		<img src="images/com_fwgallery/files/<?php echo $this->foto->user_id; ?>/<?php echo $this->foto->filename ?>"/>
		<div class="marca-big"></div>
    </div>
	<div class="right-bar">
    	<span class="fotoname"><?php echo $this->foto->name; ?></span>
        <div class="negro"></div>
		<div class="share">
        	<span>London Photobooth</span>
            <a class="go-gallery" href="index.php?option=com_gallery&id=1">Go to Gallery</a>
            <br />
			<div class="negro"></div>
            	<table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fcolombia.travel%2Fen%2Fphotobooth%2Findex.php%3Foption%3Dcom_gallery%26view%3Dfoto%26id%3D<?php echo $this->foto->id; ?>&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
                </td>
                    <td><a href="https://twitter.com/share" class="twitter-share-button" data-via="colombia_travel" data-hashtags="PhotoboothWTM" data-url="http://colombia.travel/en/photobooth/index.php?option=com_gallery&amp;view=foto&amp;id=<?php echo $this->foto->id; ?>"><img src="images/tweet.jpg" /></a>
                </td>
                    <td><div class="g-plus" data-action="share" data-annotation="none" data-height="15" data-href="http://colombia.travel/en/photobooth/index.php?option=com_gallery&amp;view=foto&amp;&amp;id=<?php echo $this->foto->user_id; ?>"></div></td>
                  </tr>
                </table>

				
			<div class="amarillo"></div>
			
		</div>
	<div class="download">
		Download<br>
		<span>your image</span>
		<a class="here" target="_blank" href="descargar.php?user=<?php echo $this->foto->user_id; ?>&filename=<?php echo $this->foto->filename ?>">here</a>
	</div>
</div>



<script>

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");

			
			gapi.plus.go();
			

</script>