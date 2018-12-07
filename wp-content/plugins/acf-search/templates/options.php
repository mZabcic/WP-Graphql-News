<style>

.acf-search-container {
	width: 100%;
}

.acf-search-content > div,
.acf-search-side > div {
	margin-top: 10px;
}

.acf-search-side {
	width: 25%;
	float: left;
	display: inline-block;
	margin-right: 20px;
}

.acf-search-content {
	width: calc(75% - 40px);
	margin-right: 20px;
	float: left;
	display: inline-block;
}

.acf-search-titlebar {
	padding:10px;
	background-color: #f7f7f7;;
	color: #333333;
	border: 1px solid #cccccc;
	border-bottom: 0px;
}

.acf-search-contentbox {
	background-color: white;
	border: 1px solid #cccccc;
	padding: 10px;
}

.acf-search-fields {
	columns: 3;
	-webkit-columns: 3;
	-moz-columns: 3;
}

</style>

<div class="acf-search-container">
	<form method="post">
	<div class="acf-search-content">
		<div>
			<div class="acf-search-titlebar">
				ACF: Search Plugin
			</div>
			<div class="acf-search-contentbox">
				<?php $selectedItems = (unserialize(get_option('acf_search_fields'))); ?>

				<?php global $acf_search_fields; ?>
				<ul class="acf-search-fields">
				<?php foreach($acf_search_fields as $field): if(stristr($field->return, 'a:7:')) { continue; } ?>
					<li><input <?php if(in_array($field->return, $selectedItems)):?>checked="checked"<?php endif; ?> type="checkbox" name="acf_search_fields[]" value="<?php echo $field->return; ?>" id="<?php echo $field->return; ?>"> <label for="<?php echo $field->return; ?>"><?php echo $field->display; ?> <small>(<?php echo $field->return; ?>)</small></label></li>
				<?php endforeach; ?>
				</ul>

				<p class="submit"><input name="submit" id="submit" class="button button-primary" value="Save changes" type="submit"></p>
			</div>
		</div>
	</div>
	</form>

	<div class="acf-search-side">
		<!-- PROPOGANDA! -->
		<div>
			<div class="acf-search-titlebar">
				About this plugin
			</div>
			<div class="acf-search-contentbox">
				<p>This plugin has been made by <a href="https://www.directict.nl" target="_blank">Direct ICT B.V.</a> and is free to use for the entire WordPress Community.<br /><br />
				If you have questions regarding this plugin, or if you need assistance, contact us!</p>

				<img src="<?php echo plugin_dir_url(__FILE__); ?>../img/logo-direct-ict.png" width="150" />

				<hr />
				Plugin version 2.1.7
			</div>
		</div>

		<div>
			<div class="acf-search-titlebar">
				Credits
			</div>
			<div class="acf-search-contentbox">
				Special thanks to <a href="https://www.advancedcustomfields.com/" target="_blank">Advanced Custom Fields</a> for their plugin.
				<hr />
				Credits to <a href="https://vzurczak.wordpress.com/" target="_blank">Vincent Zurczak</a> for the base query structure/spliting tags section
				<hr />
				Credits to <a href="https://www.directict.nl" target="_blank">the geniuses</a> of Direct ICT B.V.
			</div>
		</div>
	</div>
</div>
