<?php
// If this file is called directly, abort.
if(!defined('ABSPATH')) {
	exit;
}
?>
<div id="ipages-modal-{{modalData.id}}" class="ipages-modal" tabindex="-1">
	<div class="ipages-modal-dialog">
		<div class="ipages-modal-header">
			<div class="ipages-modal-close" al-on.click="modalData.deferred.resolve('close');">&times;</div>
			<div class="ipages-modal-title"><i class="fa fa-info-circle"></i><?php esc_html_e('Confirm Dialog', IPGS_PLUGIN_NAME); ?></div>
		</div>
		<div class="ipages-modal-data">
			<div class="ipages-control">
				<div class="ipages-input-group ipages-long">
					<div class="ipages-input-group-cell">
						<div class="ipages-info">1) <?php esc_html_e('Remove all existing pages from the "pages" section') ?></div>
					</div>
					<div class="ipages-input-group-cell ipages-pinch">
						<div al-toggle="modalData.removeExistingPages.action"></div>
					</div>
				</div>
			</div>
			
			<div class="ipages-control">
				<div class="ipages-input-group ipages-long">
					<div class="ipages-input-group-cell">
						<div class="ipages-info">2) <?php esc_html_e('Set page width & height from the selected PDF document') ?></div>
					</div>
					<div class="ipages-input-group-cell ipages-pinch">
						<div al-toggle="modalData.pageSize.action"></div>
					</div>
				</div>
			</div>
			
			<div class="ipages-control">
				<div class="ipages-input-group ipages-long">
					<div class="ipages-input-group-cell">
						<div class="ipages-info">3) <?php esc_html_e('Create pages from the selected PDF document') ?></div>
					</div>
					<div class="ipages-input-group-cell ipages-pinch">
						<div al-toggle="modalData.createPages.action"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="ipages-modal-footer">
			<div class="ipages-modal-btn ipages-modal-btn-close" al-on.click="modalData.deferred.resolve('close');"><?php esc_html_e('Close', IPGS_PLUGIN_NAME); ?></div>
			<div class="ipages-modal-btn ipages-modal-btn-create" al-on.click="modalData.deferred.resolve(true);"><?php esc_html_e('OK', IPGS_PLUGIN_NAME); ?></div>
		</div>
	</div>
</div>