<form id="searchform" action="<?php echo home_url();?>" method="get" >
		<fieldset class="search-fieldset">
			<input type="text" id="s" name="s" value="<?php _e('Type and hit enter','indonez');?>" onblur="if (this.value == ''){this.value = '<?php _e('Type and hit enter','indonez');?>'; }" onfocus="if (this.value == '<?php _e('Type and hit enter','indonez');?>') {this.value = ''; }" />
		</fieldset>      						
</form>