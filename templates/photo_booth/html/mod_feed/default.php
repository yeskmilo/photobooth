<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php
if( $feed != false )
{
	//image handling
	$iUrl 	= isset($feed->image->url)   ? $feed->image->url   : null;
	$iTitle = isset($feed->image->title) ? $feed->image->title : null;

	// feed description
	if (!is_null( $feed->title ) && $params->get('rsstitle', 1)) {

	}

	// feed image
	if ($params->get('rssimage', 1) && $iUrl) {
	?>
			<image src="<?php echo $iUrl; ?>" alt="<?php echo @$iTitle; ?>"/>
	<?php
	}

	$actualItems = count( $feed->items );
	$setItems    = $params->get('rssitems', 5);

	if ($setItems > $actualItems) {
		$totalItems = $actualItems;
	} else {
		$totalItems = $setItems;
	}
	?>
			<div class="newsfeed<?php echo $params->get( 'moduleclass_sfx'); ?>"  >
			<?php
			$words = $params->def('word_count', 0);
			for ($j = 0; $j < $totalItems; $j ++)
			{
				$currItem = & $feed->items[$j];
				// item title
				?>
				<div class="contenidoInforme">
				<?php
				if ( !is_null( $currItem->get_link() ) ) {
				?>
					<h3><a href="<?php echo $currItem->get_link(); ?>">
					<?php echo $currItem->get_title(); ?></a></h3>
				<?php
				}

				// item description
				if ($params->get('rssitemdesc', 1))
				{
					// item description
					$text = $currItem->get_description();
					$text = str_replace('&apos;', "'", $text);

					// word limit check
					if ($words)
					{
						$texts = explode(' ', $text);
						$count = count($texts);
						if ($count > $words)
						{
							$text = '';
							for ($i = 0; $i < $words; $i ++) {
								$text .= ' '.$texts[$i];
							}
							$text .= '...';
						}
					}
					?>
					<div class="newsfeed_item<?php echo $params->get( 'moduleclass_sfx'); ?>"  >
						<?php echo $text; ?>
					</div>
					<?php
				}
				?>
				</div>
				<?php
			}
			?>
			</div>
	
<?php } ?>
