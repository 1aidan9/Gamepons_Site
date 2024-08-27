<?php

// If this file is called directly, abort.
if(!defined('ABSPATH')) {
	exit;
}

$page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRIPPED );

?>
<!-- ipages app -->
<div class="wrap ipages-root" id="ipages-app-settings" style="display:none;">
	<?php require 'page-info.php'; ?>
	<div class="ipages-page-header">
		<div class="ipages-title"><i class="fa fa-cubes"></i><?php esc_html_e('iPages Settings', IPGS_PLUGIN_NAME); ?></div>
	</div>
	<div class="ipages-messages" id="ipages-messages">
	</div>
	<div class="ipages-app">
		<div class="ipages-loader-wrap">
			<div class="ipages-loader">
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
			</div>
		</div>
		<div class="ipages-wrap">
			<div class="ipages-workplace">
				<div class="ipages-main-menu">
					<div class="ipages-left-panel">
						<div class="ipages-list">
							<a class="ipages-item ipages-small ipages-lite" href="https://1.envato.market/5QrNo" al-if="appData.plan=='lite'"><?php esc_html_e('Buy Pro version', IPGS_PLUGIN_NAME); ?></a>
							<a class="ipages-item ipages-small ipages-pro" href="#" al-if="appData.plan=='pro'"><?php esc_html_e('Pro Version', IPGS_PLUGIN_NAME); ?></a>
						</div>
					</div>
					<div class="ipages-right-panel">
						<div class="ipages-list">
							<div class="ipages-item ipages-blue" al-on.click="appData.fn.saveConfig(appData);" title="<?php esc_html_e('Save config to database', IPGS_PLUGIN_NAME); ?>"><?php esc_html_e('Save', IPGS_PLUGIN_NAME); ?></div>
						</div>
					</div>
				</div>
				<div class="ipages-main-tabs ipages-clear-fix">
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.general" al-on.click="appData.fn.onTab(appData, 'general')"><?php esc_html_e('General', IPGS_PLUGIN_NAME); ?></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.actions" al-on.click="appData.fn.onTab(appData, 'actions')"><?php esc_html_e('Actions', IPGS_PLUGIN_NAME); ?></div>
				</div>
				<div class="ipages-main-data">
					<div id="ipages-section-pages" al-if="appData.ui.tabs.general">
						<div class="ipages-stage">
							<div class="ipages-main-panel">
								<div class="ipages-data ipages-active">
									<div class="ipages-control">
										<div class="ipages-tip"><?php esc_html_e('Editor settings', IPGS_PLUGIN_NAME); ?></div>
									</div>
									
									<div class="ipages-control">
										<div class="ipages-helper"><div class="ipages-tooltip"><?php esc_html_e('Choose a default theme for your custom css editor', IPGS_PLUGIN_NAME); ?></div></div>
										<div class="ipages-label"><?php esc_html_e('CSS editor theme', IPGS_PLUGIN_NAME); ?></div>
										<select class="ipages-select" al-select="appData.config.themeCSS">
											<option al-option="null"><?php esc_html_e('default', IPGS_PLUGIN_NAME); ?></option>
											<option al-repeat="theme in appData.themes" al-option="theme.id">{{theme.title}}</option>
										</select>
									</div>
									
									<div class="ipages-control">
										<div class="ipages-helper"><div class="ipages-tooltip"><?php esc_html_e('Choose a default theme for your custom javascript editor', IPGS_PLUGIN_NAME); ?></div></div>
										<div class="ipages-label"><?php esc_html_e('JavaScript editor theme', IPGS_PLUGIN_NAME); ?></div>
										<select class="ipages-select" al-select="appData.config.themeJavaScript">
											<option al-option="null"><?php esc_html_e('default', IPGS_PLUGIN_NAME); ?></option>
											<option al-repeat="theme in appData.themes" al-option="theme.id">{{theme.title}}</option>
										</select>
									</div>
									
									<div class="ipages-control">
										<div class="ipages-helper" title="<?php esc_html_e('If set true, the progressive loading of a PDF document is enabled', IPGS_PLUGIN_NAME); ?>"></div>
										<div class="ipages-label"><?php esc_html_e('PDF progressive loading', IPGS_PLUGIN_NAME); ?></div>
										<div al-toggle="appData.config.pdfProgressiveLoading"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="ipages-section-actions" al-if="appData.ui.tabs.actions">
						<div class="ipages-stage">
							<div class="ipages-main-panel">
								<div class="ipages-data ipages-active">
									<div class="ipages-control">
										<div class="ipages-warn"><?php esc_html_e('If you want to fully uninstall the plugin with data, you should delete all items from the database before this action.', IPGS_PLUGIN_NAME); ?></div>
									</div>
									<div class="ipages-control">
										<div class="ipages-separator"></div>
									</div>
									<div class="ipages-control">
										<div class="ipages-helper" title="<?php esc_html_e('Delete all book items from database', IPGS_PLUGIN_NAME); ?>"></div>
										<div class="ipages-button ipages-red" al-on.click="appData.fn.deleteAllData(appData, '<?php esc_html_e('Do you really want to delete all data?', IPGS_PLUGIN_NAME); ?>');"><?php esc_html_e('Delete all data', IPGS_PLUGIN_NAME); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ipages-modals" id="ipages-modals">
		</div>
	</div>
</div>
<!-- /end ipages app -->