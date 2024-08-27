<?php

// If this file is called directly, abort.
if(!defined('ABSPATH')) {
	exit;
}

$list_table = new iPages_List_Table_Items();
$list_table->prepare_items();

?>
<!-- ipages app -->
<div class="wrap ipages-root" id="ipages-app-items">
	<?php require 'page-info.php'; ?>
	<div class="ipages-page-header">
		<div class="ipages-title"><i class="fa fa-cubes"></i><?php esc_html_e('iPages Flipbook Items', IPGS_PLUGIN_NAME); ?></div>
		<div class="ipages-actions">
			<a class="ipages-blue" href="?page=<?php echo IPGS_PLUGIN_NAME . '_item'; ?>"><?php esc_html_e('Add Book', IPGS_PLUGIN_NAME); ?></a>
		</div>
	</div>
	<div class="ipages-app">
		<form method="get">
			<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>">
			<?php $list_table->display() ?>
		</form>
	</div>
	<!-- /end ipages app -->
</div>