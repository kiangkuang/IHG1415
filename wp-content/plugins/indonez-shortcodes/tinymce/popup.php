<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new indonez_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="indonez-popup">

	<div id="indonez-shortcode-wrap">
		
		<div id="indonez-sc-form-wrap">
		
			<div id="indonez-sc-form-head">
			
				<?php echo $shortcode->popup_title; ?>
			
			</div>
			<!-- /#indonez-sc-form-head -->
			
			<form method="post" id="indonez-sc-form">
			
				<table id="indonez-sc-form-table">
				
					<?php echo $shortcode->output; ?>
					
					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary indonez-insert">Insert Shortcode</a></td>							
						</tr>
					</tbody>
				
				</table>
				<!-- /#indonez-sc-form-table -->
				
			</form>
			<!-- /#indonez-sc-form -->
		
		</div>
		<!-- /#indonez-sc-form-wrap -->
		
		<div class="clear"></div>
		
	</div>
	<!-- /#indonez-shortcode-wrap -->

</div>
<!-- /#indonez-popup -->

</body>
</html>