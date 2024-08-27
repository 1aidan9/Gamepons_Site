<?php

// If this file is called directly, abort.
if(!defined('ABSPATH')) {
	exit;
}

$page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRIPPED );
$author = get_the_author_meta('display_name', $item->author);
$modified = mysql2date(get_option('date_format'), $item->modified) . ' at ' . mysql2date(get_option('time_format'), $item->modified);

?>
<!-- ipages app -->
<div class="wrap ipages ipages-root" id="ipages-app-item" style="display:none;">
	<?php require 'page-info.php'; ?>
	<input id="ipages-load-config-from-file" type="file" />
	<div class="ipages-page-header">
		<div class="ipages-title"><i class="fa fa-cubes"></i><?php esc_html_e('iPages Flipbook Item', IPGS_PLUGIN_NAME); ?></div>
		<div class="ipages-actions">
			<a class="ipages-blue" href="?page=<?php echo IPGS_PLUGIN_NAME . '_item'; ?>" title="<?php esc_html_e('Create a new item', IPGS_PLUGIN_NAME); ?>"><?php esc_html_e('Add Item', IPGS_PLUGIN_NAME); ?></a>
			<a class="ipages-indigo" href="#" al-on.click="appData.fn.saveConfigToFile(appData)" title="<?php esc_html_e('Save config to a JSON file', IPGS_PLUGIN_NAME); ?>"><?php esc_html_e('Save As...', IPGS_PLUGIN_NAME); ?></a>
			<a class="ipages-green" href="#" al-on.click="appData.fn.loadConfigFromFile(appData)" title="<?php esc_html_e('Load config from a JSON file', IPGS_PLUGIN_NAME); ?>"><?php esc_html_e('Load As...', IPGS_PLUGIN_NAME); ?></a>
		</div>
	</div>
	<div class="ipages-messages" id="ipages-messages">
	</div>
	<div class="ipages-app" id="ipages-app">
		<div class="ipages-loader-wrap">
			<div class="ipages-loader">
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
			</div>
		</div>
		<div class="ipages-wrap">
			<div class="ipages-main-header">
				<input class="ipages-title" type="text" al-text="appData.config.title" placeholder="<?php esc_html_e('Title', IPGS_PLUGIN_NAME); ?>">
			</div>
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
							<div class="ipages-item ipages-green" al-on.click="appData.fn.preview(appData);" title="<?php esc_html_e('The config should be saved before preview', IPGS_PLUGIN_NAME); ?>" al-if="appData.embedPage != null"><?php esc_html_e('Preview', IPGS_PLUGIN_NAME); ?></div>
							<div class="ipages-item ipages-blue" al-on.click="appData.fn.saveConfig(appData);" title="<?php esc_html_e('Save config to database', IPGS_PLUGIN_NAME); ?>"><?php esc_html_e('Save', IPGS_PLUGIN_NAME); ?></div>
						</div>
					</div>
				</div>
				<div class="ipages-main-tabs ipages-clear-fix">
					<div class="ipages-pdf-loader" id="ipages-pdf-loader" ><?php esc_html_e('loading PDF', IPGS_PLUGIN_NAME); ?><span class="ipages-pdf-loader-percent"></span></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.general" al-on.click="appData.fn.onTab(appData, 'general')"><?php esc_html_e('General', IPGS_PLUGIN_NAME); ?><div class="ipages-status" al-if="appData.config.active"></div></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.pages" al-on.click="appData.fn.onTab(appData, 'pages')"><?php esc_html_e('Pages', IPGS_PLUGIN_NAME); ?><div class="ipages-counter" al-if="appData.config.pages.length>0">{{appData.config.pages.length}}</div></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.customCSS" al-on.click="appData.fn.onTab(appData, 'customCSS')"><?php esc_html_e('Custom CSS', IPGS_PLUGIN_NAME); ?><div class="ipages-status" al-if="appData.config.customCSS.active"></div></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.customJS" al-on.click="appData.fn.onTab(appData, 'customJS')"><?php esc_html_e('Custom JS', IPGS_PLUGIN_NAME); ?><div class="ipages-status" al-if="appData.config.customJS.active"></div></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.shortcode" al-on.click="appData.fn.onTab(appData, 'shortcode')" al-if="appData.wp_item_id"><?php esc_html_e('Shortcode', IPGS_PLUGIN_NAME); ?></div>
				</div>
				<div class="ipages-main-data">
					<div class="ipages-section" al-attr.class.ipages-active="appData.ui.tabs.general">
						<div class="ipages-stage">
							<div class="ipages-main-panel ipages-main-panel-general">
								<div class="ipages-data ipages-active">
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.book">
										<div class="ipages-block-header" al-attr.class.ipages-warn="(appData.pdfPageHeight && appData.pdfPageHeight != appData.config.pageHeight) || appData.pdfPageWidth && appData.pdfPageWidth != appData.config.pageWidth" al-on.click="appData.fn.onGeneralTab(appData,'book')">
											<div class="ipages-block-title"><?php esc_html_e('Book', IPGS_PLUGIN_NAME); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable book', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Enable book', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.active"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Choose a book style', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Book mode', IPGS_PLUGIN_NAME); ?></div>
												<select class="ipages-select" al-select="appData.config.bookEngine">
													<option al-option="null"><?php esc_html_e('default', IPGS_PLUGIN_NAME); ?></option>
													<option al-option="'TwoPageFlip'"><?php esc_html_e('Two page flip', IPGS_PLUGIN_NAME); ?></option>
													<option al-option="'OnePageFlip'"><?php esc_html_e('One page flip', IPGS_PLUGIN_NAME); ?></option>
													<option al-option="'OnePageSwipe'"><?php esc_html_e('One page swipe', IPGS_PLUGIN_NAME); ?></option>
												</select>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Page width (if not set then default page width will be used)', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page width', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-integer="appData.config.pageWidth" placeholder="<?php esc_html_e('Default: 300', IPGS_PLUGIN_NAME); ?>">
												<div class="ipages-warn" al-if="appData.pdfPageWidth && appData.pdfPageWidth != appData.config.pageWidth"><?php esc_html_e('The page width is not equal to the width ({{appData.pdfPageWidth}}) of the PDF document', IPGS_PLUGIN_NAME); ?></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Page height (if not set then default page height will be used)', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page height', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-integer="appData.config.pageHeight" placeholder="<?php esc_html_e('Default: 360', IPGS_PLUGIN_NAME); ?>">
												<div class="ipages-warn" al-if="appData.pdfPageHeight && appData.pdfPageHeight != appData.config.pageHeight"><?php esc_html_e('The page height is not equal to the height ({{appData.pdfPageHeight}}) of the PDF document', IPGS_PLUGIN_NAME); ?></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Page number to show after the book is ready', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page start', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-integer="appData.config.pageStart" placeholder="<?php esc_html_e('Default: 1', IPGS_PLUGIN_NAME); ?>">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Preload page neighbours for faster loading', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Preload neighbours', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.preloadNeighbours"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Make the book look good on all devices', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Responsive', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.responsive"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Auto fill all available space inside of the book container', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Autofit', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.autoFit"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable prevention of the default behavior on the mouseWheel event', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Mouse wheel, prevent the default behavior', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.mouseWheelPreventDefault"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set time in milliseconds (1000 = 1sec)', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Flip duration (ms)', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-integer="appData.config.flipDuration" placeholder="<?php esc_html_e('Default: 300', IPGS_PLUGIN_NAME); ?>">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable page flip sound', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page flip sound', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.flipSound"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set page flip sound url (mp3 or ogg format)', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page flip sound url', IPGS_PLUGIN_NAME); ?></div>
												<div class="ipages-input-group">
													<div class="ipages-input-group-cell">
														<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.config.flipSoundUrl" placeholder="<?php esc_html_e('Select a sound file', IPGS_PLUGIN_NAME); ?>">
													</div>
													<div class="ipages-input-group-cell ipages-pinch">
														<div class="ipages-btn ipages-default ipages-no-bl ipages-no-brr" al-on.click="appData.fn.playFlipSound(appData)" title="<?php esc_html_e('Play a flip sound', IPGS_PLUGIN_NAME); ?>"><i class="fa fa-play"></i></div>
													</div>
													<div class="ipages-input-group-cell ipages-pinch">
														<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectFlipSound(appData)" title="<?php esc_html_e('Select a flip sound', IPGS_PLUGIN_NAME); ?>"><i class="fa fa-folder"></i></div>
													</div>
												</div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Give a turn-over page some perspective', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Perspective', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-integer="appData.config.perspective" placeholder="<?php esc_html_e('Default: 1500', IPGS_PLUGIN_NAME); ?>">
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.pdf">
										<div class="ipages-block-header"  al-attr.class.ipages-warn="(appData.config.pdfUrl && !appData.fn.hasPdfPages(appData))" al-on.click="appData.fn.onGeneralTab(appData,'pdf')">
											<div class="ipages-block-title"><?php esc_html_e('PDF', IPGS_PLUGIN_NAME); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set pdf document url', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('PDF url', IPGS_PLUGIN_NAME); ?></div>
												<div class="ipages-input-group">
													<div class="ipages-input-group-cell">
														<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.config.pdfUrl" placeholder="<?php esc_html_e('Select a pdf document', IPGS_PLUGIN_NAME); ?>">
													</div>
													<div class="ipages-input-group-cell ipages-pinch">
														<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectPDFDocument(appData)" title="<?php esc_html_e('Select a pdf document', IPGS_PLUGIN_NAME); ?>"><i class="fa fa-folder"></i></div>
													</div>
												</div>
											</div>
											<div class="ipages-control" al-if="(appData.config.pdfUrl && !appData.fn.hasPdfPages(appData))">
												<div class="ipages-warn"><?php esc_html_e('The book does not contain any page from the PDF document', IPGS_PLUGIN_NAME); ?></div>
												<div class="ipages-btn ipages-blue ipages-normal-text" al-on.click="appData.fn.generatePDFPages(appData)" title="<?php esc_html_e('Create pages from the PDF document', IPGS_PLUGIN_NAME); ?>"><?php esc_html_e('Create pages from the PDF document', IPGS_PLUGIN_NAME); ?></div>
											</div>
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('If set true, the progressive loading of a PDF document is enabled', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Progressive loading', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.pdfProgressiveLoading"></div>
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.container">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'container')">
											<div class="ipages-block-title"><?php esc_html_e('Container', IPGS_PLUGIN_NAME); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Specifies the theme of the book', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Theme', IPGS_PLUGIN_NAME); ?></div>
												<select class="ipages-select ipages-capitalize" al-select="appData.config.bookTheme">
													<option al-option="null"><?php esc_html_e('none', IPGS_PLUGIN_NAME); ?></option>
													<option al-repeat="theme in appData.bookThemes" al-option="theme.id">{{theme.title}}</option>
												</select>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Choose a book style for the portrait mode', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Book portrait mode', IPGS_PLUGIN_NAME); ?></div>
												<select class="ipages-select" al-select="appData.config.bookEnginePortrait">
													<option al-option="null"><?php esc_html_e('default', IPGS_PLUGIN_NAME); ?></option>
													<option al-option="'TwoPageFlip'"><?php esc_html_e('Two page flip', IPGS_PLUGIN_NAME); ?></option>
													<option al-option="'OnePageFlip'"><?php esc_html_e('One page flip', IPGS_PLUGIN_NAME); ?></option>
													<option al-option="'OnePageSwipe'"><?php esc_html_e('One page swipe', IPGS_PLUGIN_NAME); ?></option>
												</select>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Choose a book style for the landscape mode', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Book landscape mode', IPGS_PLUGIN_NAME); ?></div>
												<select class="ipages-select" al-select="appData.config.bookEngineLandscape">
													<option al-option="null"><?php esc_html_e('default', IPGS_PLUGIN_NAME); ?></option>
													<option al-option="'TwoPageFlip'"><?php esc_html_e('Two page flip', IPGS_PLUGIN_NAME); ?></option>
													<option al-option="'OnePageFlip'"><?php esc_html_e('One page flip', IPGS_PLUGIN_NAME); ?></option>
													<option al-option="'OnePageSwipe'"><?php esc_html_e('One page swipe', IPGS_PLUGIN_NAME); ?></option>
												</select>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('The ratio value (w/h), if less than enable portrait type, if more then enable landscape type', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Ratio coefficient (portrait or landscape)', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-float="appData.config.ratioPortraitToLandscape" placeholder="<?php esc_html_e('Default: 1.3', IPGS_PLUGIN_NAME); ?>">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable auto container width', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Auto container width', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.autoWidth"></div>
											</div>
											
											<div class="ipages-control" al-if="!appData.config.autoWidth">
												<div class="ipages-helper" title="<?php esc_html_e('Set the book container width, can be any valid CSS units, not just pixels', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Container Width', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.containerWidth">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable auto container height, if sets true, the height will be depends on the book size', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Auto container height', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.autoHeight"></div>
											</div>
											
											<div class="ipages-control" al-if="!appData.config.autoHeight">
												<div class="ipages-helper" title="<?php esc_html_e('Set the book container height, can be any valid CSS units, not just pixels, if not set, the height will be calculated automatic', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Container Height', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.containerHeight">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Generate space around the book\'s content', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Padding (top, right, bottom, left)', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number ipages-quarter" placeholder="<?php esc_html_e('top', IPGS_PLUGIN_NAME); ?>" al-integer="appData.config.padding.top">
												<input class="ipages-number ipages-quarter" placeholder="<?php esc_html_e('right', IPGS_PLUGIN_NAME); ?>" al-integer="appData.config.padding.right">
												<input class="ipages-number ipages-quarter" placeholder="<?php esc_html_e('bottom', IPGS_PLUGIN_NAME); ?>" al-integer="appData.config.padding.bottom">
												<input class="ipages-number ipages-quarter" placeholder="<?php esc_html_e('left', IPGS_PLUGIN_NAME); ?>" al-integer="appData.config.padding.left">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Sets the inline background styles ON or OFF', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Inline background styles', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.background.inline"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Background color in hexadecimal format (#fff or #555555)', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Background color', IPGS_PLUGIN_NAME); ?></div>
												<div class="ipages-color" al-color="appData.config.background.color"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set background image (jpeg or png format)', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Background image', IPGS_PLUGIN_NAME); ?></div>
												<div class="ipages-input-group">
													<div class="ipages-input-group-cell">
														<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.config.background.image.url" placeholder="<?php esc_html_e('Select an image', IPGS_PLUGIN_NAME); ?>">
													</div>
													<div class="ipages-input-group-cell ipages-pinch">
														<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.config.background.image)" title="<?php esc_html_e('Select a background image', IPGS_PLUGIN_NAME); ?>"><span><i class="fa fa-folder"></i></span></div>
													</div>
												</div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Specifies the size of the background images', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Background size', IPGS_PLUGIN_NAME); ?></div>
												<div class="ipages-select" al-backgroundsize="appData.config.background.size"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('How a background image will be repeated', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Background repeat', IPGS_PLUGIN_NAME); ?></div>
												<div class="ipages-select" al-backgroundrepeat="appData.config.background.repeat"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set the starting position of a background image', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Background position', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.background.position" placeholder="<?php esc_html_e('Example: 50% 50%', IPGS_PLUGIN_NAME); ?>">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set additional css classes to the book container', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Extra CSS classes', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.bookClass">
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.zoom">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'zoom')">
											<div class="ipages-block-title"><?php esc_html_e('Zoom', IPGS_PLUGIN_NAME); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('The current book zoom level', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Zoom level', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-float="appData.config.zoom">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('The maximum book zoom level', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Max zoom level', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-float="appData.config.zoomMax">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('The minimum book zoom level', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Min zoom level', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-float="appData.config.zoomMin">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('The number of the zoom step', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Zoom step', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-float="appData.config.zoomStep">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable the focal point on the book on which to zoom', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Zoom focal', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.zoomFocal"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set the scaling of the book to default after double click or tap event', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Zoom default after double click or tap', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.dblClickZoomDefault"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set the scaling of the book with the mouse wheel', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Mouse wheel zoom', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.mouseWheelZoom"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set the scaling of the book with the keyboard (+ and - keys)', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Keyboard zoom', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.keyboardZoom"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set the scaling of the book with multi-touch gestures', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Pinch zoom', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.pinchZoom"></div>
											</div>
											
											<div class="ipages-control" al-if="appData.config.pinchZoom">
												<div class="ipages-helper" title="<?php esc_html_e('The number by which the book is zoomed', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Pinch zoom step', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-float="appData.config.pinchZoomCoef">
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.navigation">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'navigation')">
											<div class="ipages-block-title"><?php esc_html_e('Navigation', IPGS_PLUGIN_NAME); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Show/hide prev & next navigation buttons', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Prev & next buttons', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.prevnextButtons"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable navigation via mouse drag', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Mouse drag navigation', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.mouseDragNavigation"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable navigation via mouse click on a page', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page click navigation', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.mousePageClickNavigation"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable navigation with touch events', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Touch navigation', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.touchNavigation"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable navigation via keyboard', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Keyboard navigation', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.keyboardNavigation"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable navigation via mouse wheel', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Mouse wheel navigation', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.mouseWheelNavigation"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Show/hide page numbers', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page numbers', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.pageNumbers"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Initial page numbering value', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page number first', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-number" al-integer="appData.config.pageNumbersFirst">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Numbers of pages to be hidden (-1 is the last page)', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Hide page numbers', IPGS_PLUGIN_NAME); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.pageNumbersHidden" placeholder="<?php esc_html_e('Example: 1;-1', IPGS_PLUGIN_NAME); ?>">
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.toolbar">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'toolbar')">
											<div class="ipages-block-title"><?php esc_html_e('Toolbar', IPGS_PLUGIN_NAME); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Show/hide the toolbar control', IPGS_PLUGIN_NAME); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Enable toolbar', IPGS_PLUGIN_NAME); ?></div>
												<div al-toggle="appData.config.toolbar"></div>
											</div>
											
											<div al-if="appData.config.toolbar">
												<div class="ipages-control">
													<div class="ipages-helper" title="<?php esc_html_e('Show/hide the thumbnails controls after the book init', IPGS_PLUGIN_NAME); ?>"></div>
													<div class="ipages-label"><?php esc_html_e('Auto-show thumbnails', IPGS_PLUGIN_NAME); ?></div>
													<div al-toggle="appData.config.autoEnableThumbnails"></div>
												</div>
												
												<div class="ipages-control">
													<div class="ipages-helper" title="<?php esc_html_e('Show/hide the outline controls with bookmarks after the book init', IPGS_PLUGIN_NAME); ?>"></div>
													<div class="ipages-label"><?php esc_html_e('Auto-show outline', IPGS_PLUGIN_NAME); ?></div>
													<div al-toggle="appData.config.autoEnableOutline"></div>
												</div>
												
												<div class="ipages-control">
													<div class="ipages-helper" title="<?php esc_html_e('Show/hide the share dialog box after the book init', IPGS_PLUGIN_NAME); ?>"></div>
													<div class="ipages-label"><?php esc_html_e('Auto-show share', IPGS_PLUGIN_NAME); ?></div>
													<div al-toggle="appData.config.autoEnableShare"></div>
												</div>
											
												<div class="ipages-book-controls-wrap">
													<div class="ipages-book-controls-toolbar">
														<div class="ipages-left-panel">
															<span al-if="appData.ui.activeBookControl != null">
															<i class="fa fa-pencil-square" al-on.click="appData.fn.editBookControlTitle(appData)" title="<?php esc_html_e('Edit book control title', IPGS_PLUGIN_NAME); ?>"></i>
															<i class="fa fa-long-arrow-up fa-split"></i>
															<i class="fa fa-arrow-up" al-on.click="appData.fn.updownBookControl(appData, 'up')" title="<?php esc_html_e('Move up', IPGS_PLUGIN_NAME); ?>"></i>
															<i class="fa fa-arrow-down" al-on.click="appData.fn.updownBookControl(appData, 'down')" title="<?php esc_html_e('Move down', IPGS_PLUGIN_NAME); ?>"></i>
															</span>
														</div>
														<div class="ipages-right-panel">
														</div>
													</div>
													<div class="ipages-book-control"
													 al-attr.class.ipages-active="appData.fn.isBookControlActive(appData, control)"
													 al-attr.class.ipages-edit="appData.fn.isBookControlEdit(appData, control)"
													 al-on.click="appData.fn.selectBookControl(appData, control)"
													 al-on.dblclick="appData.fn.editBookControlTitle(appData, control, $element)"
													 al-repeat="control in appData.config.toolbarControls"
													>
														<i class="ipages-icon" al-init="appData.fn.initBookControlIcon(appData, control, $element)" title="{{control.type}}"></i>
														<div class="ipages-label">{{control.title}}</div>
														<input class="ipages-text" type="text" al-text="control.title" placeholder="<?php esc_html_e('Title', IPGS_PLUGIN_NAME); ?>" al-on.keypress="appData.fn.onBookControlEnter(appData, $event)">
														<div class="ipages-actions">
															<i class="fa" al-attr.class.fa-check-circle-o="control.active" al-attr.class.fa-circle-o="!control.active" al-on.click="appData.fn.toggleBookControlActive(appData, control)" title="<?php esc_html_e('Enable/disable book control', IPGS_PLUGIN_NAME); ?>"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.bookmarks">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'bookmarks')">
											<div class="ipages-block-title"><?php esc_html_e('Outline/bookmarks', IPGS_PLUGIN_NAME); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-bookmarks-wrap">
												<div class="ipages-bookmarks-toolbar">
													<div class="ipages-left-panel">
														<i class="fa fa-plus-circle" al-on.click="appData.fn.addBookmark(appData)" title="<?php esc_html_e('Add new', IPGS_PLUGIN_NAME); ?>"></i>
														<span al-if="appData.ui.activeBookmark != null">
														<i class="fa fa-clone" al-on.click="appData.fn.copyBookmark(appData)" title="<?php esc_html_e('Copy', IPGS_PLUGIN_NAME); ?>"></i>
														<i class="fa fa-pencil-square" al-on.click="appData.fn.editBookmark(appData)" title="<?php esc_html_e('Edit', IPGS_PLUGIN_NAME); ?>"></i>
														<i class="fa fa-long-arrow-up fa-split"></i>
														<i class="fa fa-arrow-up" al-on.click="appData.fn.updownBookmark(appData, 'up')" title="<?php esc_html_e('Move up', IPGS_PLUGIN_NAME); ?>"></i>
														<i class="fa fa-arrow-down" al-on.click="appData.fn.updownBookmark(appData, 'down')" title="<?php esc_html_e('Move down', IPGS_PLUGIN_NAME); ?>"></i>
														<i class="fa fa-long-arrow-up fa-split"></i>
														<i class="fa fa-arrow-left" al-on.click="appData.fn.levelBookmark(appData, 'left')" title="<?php esc_html_e('Increase level', IPGS_PLUGIN_NAME); ?>"></i>
														<i class="fa fa-arrow-right" al-on.click="appData.fn.levelBookmark(appData, 'right')" title="<?php esc_html_e('Decrease level', IPGS_PLUGIN_NAME); ?>"></i>
														</span>
													</div>
													<div class="ipages-right-panel">
														<i class="fa fa-trash fa-color-red" al-if="appData.ui.activeBookmark != null" al-on.click="appData.fn.deleteBookmark(appData)" title="<?php esc_html_e('Delete', IPGS_PLUGIN_NAME); ?>"></i>
													</div>
												</div>
												<div class="ipages-bookmarks"
													 al-style.margin-left="appData.fn.getBookmarkLevel(appData, bookmark)"
													 al-repeat="bookmark in appData.config.bookmarks">
													<div class="ipages-bookmark"
													 al-attr.class.ipages-active="appData.fn.isBookmarkActive(appData, bookmark)"
													 al-attr.class.ipages-edit="appData.fn.isBookmarkEdit(appData, bookmark)"
													 al-on.click="appData.fn.selectBookmark(appData, bookmark)"
													 al-on.dblclick="appData.fn.editBookmark(appData, bookmark, $element)"
													>
														<i class="fa" al-attr.class.fa-external-link-square="bookmark.target!='page'" al-attr.class.fa-bookmark="bookmark.target=='page'"></i>
														<div class="ipages-label">{{appData.fn.getBookmarkLabel(appData, bookmark)}}</div>
														<input class="ipages-text" type="text" al-text="bookmark.text" placeholder="<?php esc_html_e('Title', IPGS_PLUGIN_NAME); ?>" al-on.keypress="appData.fn.onBookmarkEnter(appData, $event)">
														<input class="ipages-text" type="text" al-text="bookmark.link" placeholder="<?php esc_html_e('Page number or url', IPGS_PLUGIN_NAME); ?>" al-on.keypress="appData.fn.onBookmarkEnter(appData, $event)">
														<select class="ipages-select" al-select="bookmark.target">
															<option al-option="'page'"><?php esc_html_e('Go to page', IPGS_PLUGIN_NAME); ?></option>
															<option al-option="'self'"><?php esc_html_e('Go to url (self)', IPGS_PLUGIN_NAME); ?></option>
															<option al-option="'blank'"><?php esc_html_e('Go to url (blank)', IPGS_PLUGIN_NAME); ?></option>
														</select>
														<div class="ipages-actions">
															<i class="fa" al-attr.class.fa-check-circle-o="bookmark.active" al-attr.class.fa-circle-o="!bookmark.active" al-on.click="appData.fn.toggleBookmarkActive(appData, bookmark)" title="<?php esc_html_e('Enable/disable bookmark', IPGS_PLUGIN_NAME); ?>"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ipages-section" al-attr.class.ipages-active="appData.ui.tabs.pages">
						<div class="ipages-stage">
							<div class="ipages-main-panel">
								<div class="ipages-pages-wrap">
									<div class="ipages-pages-toolbar">
										<div class="ipages-left-panel">
											<i class="fa fa-plus-circle" al-on.click="appData.fn.addPage(appData)" title="<?php esc_html_e('Add page', IPGS_PLUGIN_NAME); ?>"></i>
											<div al-if="appData.ui.activePage != null">
											<i class="fa fa-clone" al-on.click="appData.fn.copyPage(appData)" title="<?php esc_html_e('Copy page', IPGS_PLUGIN_NAME); ?>"></i>
											<i class="fa fa-pencil-square" al-on.click="appData.fn.editPage(appData, appData.ui.activePage)" title="<?php esc_html_e('Edit page', IPGS_PLUGIN_NAME); ?>"></i>
											<i class="fa fa-long-arrow-up fa-split"></i>
											<i class="fa fa-arrow-up fa-top" al-on.click="appData.fn.updownPage(appData, 'start')" title="<?php esc_html_e('Move to the start', IPGS_PLUGIN_NAME); ?>"></i>
											<i class="fa fa-arrow-up" al-on.click="appData.fn.updownPage(appData, 'up')" title="<?php esc_html_e('Move up', IPGS_PLUGIN_NAME); ?>"></i>
											<i class="fa fa-arrow-down" al-on.click="appData.fn.updownPage(appData, 'down')" title="<?php esc_html_e('Move down', IPGS_PLUGIN_NAME); ?>"></i>
											<i class="fa fa-arrow-down fa-bottom" al-on.click="appData.fn.updownPage(appData, 'end')" title="<?php esc_html_e('Move to the end', IPGS_PLUGIN_NAME); ?>"></i>
											</div>
										</div>
										<div class="ipages-right-panel">
											<i class="fa fa-trash fa-color-red" al-if="appData.ui.activePage != null" al-on.click="appData.fn.deletePage(appData)" title="<?php esc_html_e('Delete page', IPGS_PLUGIN_NAME); ?>"></i>
										</div>
									</div>
									<div class="ipages-pages">
										<div class="ipages-page"
											 al-attr.class.ipages-active="appData.fn.isPageActive(appData, page)"
											 al-repeat="page in appData.config.pages"
											 al-on.click="appData.fn.selectPage(appData, page)"
											 >
											<div class="ipages-back"></div>
											<div class="ipages-front" al-page-image="page" on-page-image-update="appData.fn.onPageImageUpdate(appData, page, $element, 'page')"></div>
											<div class="ipages-overlay" al-attr.class.ipages-active="!page.active"></div>
											<div class="ipages-layers-count" al-if="page.layers.length>0" title="<?php esc_html_e('Layers count', IPGS_PLUGIN_NAME); ?>">{{page.layers.length}}</div>
											<div class="ipages-number">{{$index+1}}</div>
										</div>
									</div>
								</div>
								<div class="ipages-page-editor" al-if="appData.ui.editPage != null">
									<div class="ipages-page-editor-toolbar">
										<div class="ipages-left-panel">
											<i class="fa fa-chevron-left" al-on.click="appData.fn.editPrevNextPage(appData, 'prev')" title="<?php esc_html_e('Prev page', IPGS_PLUGIN_NAME); ?>"></i>
											<span>{{appData.fn.getPageNumber(appData, appData.ui.editPage)}}</span>
											<i class="fa fa-chevron-right" al-on.click="appData.fn.editPrevNextPage(appData, 'next')" title="<?php esc_html_e('Next page', IPGS_PLUGIN_NAME); ?>"></i>
										</div>
										<div class="ipages-right-panel">
											<i class="fa fa-times" al-on.click="appData.fn.editPage(appData, appData.ui.activePage)" title="<?php esc_html_e('Close editor', IPGS_PLUGIN_NAME); ?>"></i>
										</div>
									</div>
									<div id="ipages-layer-canvas" class="ipages-layer-canvas">
										<div id="ipages-layer-page" class="ipages-layer-page" al-page-image="appData.ui.editPage" on-page-image-update="appData.fn.onPageImageUpdate(appData, appData.ui.editPage, $element, 'layer')">
											<div class="ipages-layer"
											 tabindex="1"
											 al-on.click="appData.fn.onLayerClick(appData, layer)"
											 al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'drag', $event)"
											 al-on.keydown="appData.fn.onEditLayerKeyDown(appData, layer, $event)"
											 al-attr.class.ipages-active="appData.fn.isLayerActive(appData, layer)"
											 al-attr.class.ipages-hidden="!layer.visible"
											 al-attr.class.ipages-lock="layer.lock"
											 al-attr.class.ipages-layer-image="layer.type == 'image'"
											 al-attr.class.ipages-layer-text="layer.type == 'text'"
											 al-style.top="appData.fn.getLayerStyle(appData, layer, 'y')"
											 al-style.left="appData.fn.getLayerStyle(appData, layer, 'x')"
											 al-style.width="appData.fn.getLayerStyle(appData, layer, 'width')"
											 al-style.height="appData.fn.getLayerStyle(appData, layer, 'height')"
											 al-style.transform="appData.fn.getLayerStyle(appData, layer, 'angle')"
											 al-repeat="layer in appData.ui.editPage.layers"
											 al-init="appData.fn.initLayer(appData, layer, $element)"
											>
												<div class="ipages-layer-inner"
													 al-on.dblclick="appData.fn.onEditLabelText(appData, layer, $element, $event)"
													 spellcheck="false"
													 al-style.background-color="appData.fn.getLayerStyle(appData, layer, 'background-color')"
													 al-style.background-image="appData.fn.getLayerStyle(appData, layer, 'background-image')"
													 al-style.background-size="appData.fn.getLayerStyle(appData, layer, 'background-size')"
													 al-style.background-repeat="appData.fn.getLayerStyle(appData, layer, 'background-repeat')"
													 al-style.background-position="appData.fn.getLayerStyle(appData, layer, 'background-position')"
													 al-style.color="appData.fn.getLayerStyle(appData, layer, 'color')"
													 al-style.font-family="appData.fn.getLayerStyle(appData, layer, 'font-family')"
													 al-style.font-size="appData.fn.getLayerStyle(appData, layer, 'font-size')"
													 al-style.line-height="appData.fn.getLayerStyle(appData, layer, 'line-height')"
													 al-style.text-align="appData.fn.getLayerStyle(appData, layer, 'text-align')"
													 al-style.letter-spacing="appData.fn.getLayerStyle(appData, layer, 'letter-spacing')"
													 al-init="appData.fn.initLayerInner(appData, layer, $element)"
												>
												</div>
												<div class="ipages-layer-resizer">
													<div class="ipages-layer-coord">X: {{layer.x}} <br>Y: {{layer.y}} <br>L: {{appData.fn.floor(appData, layer.angle)}}</div>
													<div class="ipages-layer-rotator" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'rotate', $event)">
														<div class="ipages-layer-line"></div>
													</div>
													<div class="ipages-layer-dragger-tl" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'tl', $event)"></div>
													<div class="ipages-layer-dragger-tm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'tm', $event)"></div>
													<div class="ipages-layer-dragger-tr" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'tr', $event)"></div>
													<div class="ipages-layer-dragger-rm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'rm', $event)"></div>
													<div class="ipages-layer-dragger-br" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'br', $event)"></div>
													<div class="ipages-layer-dragger-bm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'bm', $event)"></div>
													<div class="ipages-layer-dragger-bl" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'bl', $event)"></div>
													<div class="ipages-layer-dragger-lm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'lm', $event)"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="ipages-sidebar-panel" al-if="appData.config.pages.length>0">
								<div al-if="appData.ui.activePage == null">
									<div class="ipages-data">
										<div class="ipages-control">
											<div class="ipages-tip"><?php esc_html_e('Please, select a page to view its settings', IPGS_PLUGIN_NAME); ?></div>
										</div>
									</div>
								</div>
								<div al-if="appData.ui.activePage != null">
									<div class="ipages-tabs ipages-clear-fix">
										<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.pageTabs.page" al-on.click="appData.fn.onPageTab(appData, 'page')"><?php esc_html_e('Page', IPGS_PLUGIN_NAME); ?></div>
										<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.pageTabs.layers" al-on.click="appData.fn.onPageTab(appData, 'layers')"><?php esc_html_e('Layers', IPGS_PLUGIN_NAME); ?></div>
										<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.pageTabs.layer" al-on.click="appData.fn.onPageTab(appData, 'layer')"><?php esc_html_e('Layer', IPGS_PLUGIN_NAME); ?></div>
									</div>
									<div class="ipages-data" al-if="appData.ui.pageTabs.page">
										<div class="ipages-control">
											<div class="ipages-helper" title="<?php esc_html_e('Enable/disable page', IPGS_PLUGIN_NAME); ?>"></div>
											<div al-toggle="appData.ui.activePage.active"></div>
										</div>
										
										<div class="ipages-control">
											<div class="ipages-helper" title="<?php esc_html_e('Set a page type', IPGS_PLUGIN_NAME); ?>"></div>
											<div class="ipages-label"><?php esc_html_e('Type', IPGS_PLUGIN_NAME); ?></div>
											<div class="ipages-select ipages-long" al-pagetype="appData.ui.activePage.type"></div>
										</div>
										
										<div class="ipages-control" al-if="appData.ui.activePage.type == 'pdf'">
											<div class="ipages-helper" title="<?php esc_html_e('Set a page number from PDF document', IPGS_PLUGIN_NAME); ?>"></div>
											<div class="ipages-label"><?php esc_html_e('Page number', IPGS_PLUGIN_NAME); ?></div>
											<input class="ipages-number ipages-long" al-integer="appData.ui.activePage.pdfpage" placeholder="<?php esc_html_e('Write a number', IPGS_PLUGIN_NAME); ?>">
										</div>
										
										<div class="ipages-control" al-if="appData.ui.activePage.type == 'image'">
											<div class="ipages-helper" title="<?php esc_html_e('Set a page image (jpeg or png format)', IPGS_PLUGIN_NAME); ?>"></div>
											<div class="ipages-label"><?php esc_html_e('Page image', IPGS_PLUGIN_NAME); ?></div>
											<div class="ipages-input-group ipages-long">
												<div class="ipages-input-group-cell">
													<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.ui.activePage.image.url" placeholder="<?php esc_html_e('Select an image', IPGS_PLUGIN_NAME); ?>">
												</div>
												<div class="ipages-input-group-cell ipages-pinch">
													<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.ui.activePage.image)" title="<?php esc_html_e('Select a page image', IPGS_PLUGIN_NAME); ?>"><span><i class="fa fa-folder"></i></span></div>
												</div>
											</div>
										</div>
										
										<div class="ipages-control">
											<div class="ipages-helper" title="<?php esc_html_e('Add class when element becomes visible', IPGS_PLUGIN_NAME); ?>"></div>
											<div class="ipages-label"><?php esc_html_e('Show CSS class', IPGS_PLUGIN_NAME); ?></div>
											<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activePage.showCSSClass">
										</div>
										
										<div class="ipages-control">
											<div class="ipages-helper" title="<?php esc_html_e('Add class when element becomes hidden', IPGS_PLUGIN_NAME); ?>"></div>
											<div class="ipages-label"><?php esc_html_e('Hide CSS class', IPGS_PLUGIN_NAME); ?></div>
											<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activePage.hideCSSClass">
										</div>
									</div>
									<div class="ipages-data" al-if="appData.ui.pageTabs.layers">
										<div class="ipages-layers-wrap">
											<div class="ipages-layers-toolbar">
												<div class="ipages-left-panel">
													<i class="fa fa-picture-o" al-on.click="appData.fn.addLayerImage(appData)" title="<?php esc_html_e('Add image', IPGS_PLUGIN_NAME); ?>"></i>
													<i class="fa fa-font" al-on.click="appData.fn.addLayerText(appData)" title="<?php esc_html_e('Add text', IPGS_PLUGIN_NAME); ?>"></i>
													<span al-if="appData.ui.activeLayer != null">
													<i class="fa fa-long-arrow-up fa-split"></i>
													<i class="fa fa-clone" al-on.click="appData.fn.copyLayer(appData)" title="<?php esc_html_e('Copy', IPGS_PLUGIN_NAME); ?>"></i>
													<i class="fa fa-long-arrow-up fa-split"></i>
													<i class="fa fa-arrow-up fa-top" al-on.click="appData.fn.updownLayer(appData, 'start')" title="<?php esc_html_e('Move to the start', IPGS_PLUGIN_NAME); ?>"></i>
													<i class="fa fa-arrow-up" al-on.click="appData.fn.updownLayer(appData, 'up')" title="<?php esc_html_e('Move up', IPGS_PLUGIN_NAME); ?>"></i>
													<i class="fa fa-arrow-down" al-on.click="appData.fn.updownLayer(appData, 'down')" title="<?php esc_html_e('Move down', IPGS_PLUGIN_NAME); ?>"></i>
													<i class="fa fa-arrow-down fa-bottom" al-on.click="appData.fn.updownLayer(appData, 'end')" title="<?php esc_html_e('Move to the end', IPGS_PLUGIN_NAME); ?>"></i>
													</span>
												</div>
												<div class="ipages-right-panel">
													<i class="fa fa-trash fa-color-red" al-if="appData.ui.activeLayer != null" al-on.click="appData.fn.deleteLayer(appData)" title="<?php esc_html_e('Delete', IPGS_PLUGIN_NAME); ?>"></i>
												</div>
											</div>
											<div class="ipages-layers">
												<div class="ipages-layer"
													 al-attr.class.ipages-active="appData.fn.isLayerActive(appData, layer)"
													 al-on.click="appData.fn.selectLayer(appData, layer)"
													 al-repeat="layer in appData.ui.activePage.layers"
												 >
													<i class="fa fa-picture-o" al-if="layer.type == 'image'"></i>
													<i class="fa fa-font" al-if="layer.type == 'text'"></i>
													<div class="ipages-label">{{layer.title ? layer.title : layer.type}}</div>
													<div class="ipages-actions">
														<i class="fa" al-attr.class.fa-unlock-alt="!layer.lock" al-attr.class.fa-lock="layer.lock" al-on.click="appData.fn.toggleLayerLock(appData, layer)"></i>
														<i class="fa" al-attr.class.fa-check-circle-o="layer.visible" al-attr.class.fa-circle-o="!layer.visible" al-on.click="appData.fn.toggleLayerVisible(appData, layer)"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="ipages-data" al-if="appData.ui.pageTabs.layer">
										<div al-if="appData.ui.activeLayer == null">
											<div class="ipages-control">
												<div class="ipages-tip"><?php esc_html_e('Please, select a layer to view its settings', IPGS_PLUGIN_NAME); ?></div>
											</div>
										</div>
										<div al-if="appData.ui.activeLayer != null">
											<div class="ipages-block ipages-block-flat" al-attr.class.ipages-block-folded="appData.ui.layerTab.general">
												<div class="ipages-block-header" al-on.click="appData.fn.onLayerTab(appData,'general')">
													<div class="ipages-block-title"><?php esc_html_e('General', IPGS_PLUGIN_NAME); ?></div>
													<div class="ipages-block-state"></div>
												</div>
												<div class="ipages-block-data">
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Set layer title', IPGS_PLUGIN_NAME); ?>"></div>
														<div class="ipages-label"><?php esc_html_e('Title', IPGS_PLUGIN_NAME); ?></div>
														<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activeLayer.title">
													</div>
													
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Set layer position', IPGS_PLUGIN_NAME); ?>"></div>
														<div class="ipages-input-group ipages-long">
															<div class="ipages-input-group-cell ipages-rgap">
																<div class="ipages-label"><?php esc_html_e('X [px]', IPGS_PLUGIN_NAME); ?></div>
																<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.x">
															</div>
															<div class="ipages-input-group-cell ipages-lgap">
																<div class="ipages-label"><?php esc_html_e('Y [px]', IPGS_PLUGIN_NAME); ?></div>
																<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.y">
															</div>
														</div>
													</div>
													
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Set layer size', IPGS_PLUGIN_NAME); ?>"></div>
														<div class="ipages-input-group ipages-long">
															<div class="ipages-input-group-cell ipages-rgap">
																<div class="ipages-label"><?php esc_html_e('Width [px]', IPGS_PLUGIN_NAME); ?></div>
																<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.width">
															</div>
															<div class="ipages-input-group-cell ipages-lgap">
																<div class="ipages-label"><?php esc_html_e('Height [px]', IPGS_PLUGIN_NAME); ?></div>
																<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.height">
															</div>
														</div>
													</div>
													
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Set layer angle', IPGS_PLUGIN_NAME); ?>"></div>
														<div class="ipages-label"><?php esc_html_e('Angle [deg]', IPGS_PLUGIN_NAME); ?></div>
														<input class="ipages-number ipages-long" al-float="appData.ui.activeLayer.angle">
													</div>
													
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Set additional css classes to a layer', IPGS_PLUGIN_NAME); ?>"></div>
														<div class="ipages-label"><?php esc_html_e('Additional CSS class', IPGS_PLUGIN_NAME); ?></div>
														<input class="ipages-number ipages-long" type="text" al-text="appData.ui.activeLayer.class">
													</div>
												</div>
											</div>
											
											<div class="ipages-block ipages-block-flat" al-attr.class.ipages-block-folded="appData.ui.layerTab.data">
												<div class="ipages-block-header" al-on.click="appData.fn.onLayerTab(appData,'data')">
													<div class="ipages-block-title"><?php esc_html_e('Data', IPGS_PLUGIN_NAME); ?></div>
													<div class="ipages-block-state"></div>
												</div>
												<div class="ipages-block-data">
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Adds a specific url to the layer', IPGS_PLUGIN_NAME); ?>"></div>
														<div class="ipages-label"><?php esc_html_e('Go to an URL', IPGS_PLUGIN_NAME); ?></div>
														<div class="ipages-input-group ipages-long">
															<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activeLayer.link" placeholder="<?php esc_html_e('URL', IPGS_PLUGIN_NAME); ?>">
														</div>
														<div class="ipages-input-group ipages-long">
															<div class="ipages-input-group-cell ipages-pinch">
																<div al-checkbox="appData.ui.activeLayer.linkNewWindow"></div>
															</div>
															<div class="ipages-input-group-cell">
																<?php esc_html_e('Open url in a new window', IPGS_PLUGIN_NAME); ?>
															</div>
														</div>
													</div>
													
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Adds a specific string data to the layer, if we want to use it in custom code later', IPGS_PLUGIN_NAME); ?>"></div>
														<div class="ipages-label"><?php esc_html_e('User data', IPGS_PLUGIN_NAME); ?></div>
														<textarea class="ipages-textarea ipages-long" al-textarea="appData.ui.activeLayer.userData" placeholder="<?php esc_html_e('Type any string data; it can be JSON format as an example. You can use this data inside the custom code later.', IPGS_PLUGIN_NAME); ?>"></textarea>
													</div>
												</div>
											</div>
											
											<div class="ipages-block ipages-block-flat" al-attr.class.ipages-block-folded="appData.ui.layerTab.special">
												<div class="ipages-block-header" al-on.click="appData.fn.onLayerTab(appData,'special')">
													<div class="ipages-block-title" al-if="appData.ui.activeLayer.type == 'image'"><?php esc_html_e('Image', IPGS_PLUGIN_NAME); ?></div>
													<div class="ipages-block-title" al-if="appData.ui.activeLayer.type == 'text'"><?php esc_html_e('Text', IPGS_PLUGIN_NAME); ?></div>
													<div class="ipages-block-state"></div>
												</div>
												<div class="ipages-block-data">
													<div al-if="appData.ui.activeLayer.type == 'image'">
														<div class="ipages-control">
															<div class="ipages-helper" title="<?php esc_html_e('Set background image (jpeg or png format)', IPGS_PLUGIN_NAME); ?>"></div>
															<div class="ipages-label"><?php esc_html_e('Background image', IPGS_PLUGIN_NAME); ?></div>
															<div class="ipages-input-group ipages-long">
																<div class="ipages-input-group-cell">
																	<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.ui.activeLayer.background.image.url" placeholder="<?php esc_html_e('Select an image', IPGS_PLUGIN_NAME); ?>">
																</div>
																<div class="ipages-input-group-cell ipages-pinch">
																	<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.ui.activeLayer.background.image)" title="<?php esc_html_e('Select a background image', IPGS_PLUGIN_NAME); ?>"><span><i class="fa fa-folder"></i></span></div>
																</div>
															</div>
														</div>
														
														<div class="ipages-control">
															<div class="ipages-input-group ipages-long">
																<div class="ipages-input-group-cell ipages-rgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Background color in hexadecimal format (#fff or #555555)', IPGS_PLUGIN_NAME); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Background color', IPGS_PLUGIN_NAME); ?></div>
																	<div class="ipages-color ipages-long" al-color="appData.ui.activeLayer.background.color"></div>
																</div>
																<div class="ipages-input-group-cell ipages-lgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Specifies the size of the background images', IPGS_PLUGIN_NAME); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Background size', IPGS_PLUGIN_NAME); ?></div>
																	<div class="ipages-select ipages-long" al-backgroundsize="appData.ui.activeLayer.background.size"></div>
																</div>
															</div>
														</div>
														
														<div class="ipages-control">
															<div class="ipages-input-group ipages-long">
																<div class="ipages-input-group-cell ipages-rgap">
																	<div class="ipages-helper" title="<?php esc_html_e('How a background image will be repeated', IPGS_PLUGIN_NAME); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Background repeat', IPGS_PLUGIN_NAME); ?></div>
																	<div class="ipages-select ipages-long" al-backgroundrepeat="appData.ui.activeLayer.background.repeat"></div>
																</div>
																<div class="ipages-input-group-cell ipages-lgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Set the starting position of a background image', IPGS_PLUGIN_NAME); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Background position', IPGS_PLUGIN_NAME); ?></div>
																	<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activeLayer.background.position" placeholder="<?php esc_html_e('Example: 50% 50%', IPGS_PLUGIN_NAME); ?>">
																</div>
															</div>
														</div>
													</div>
													
													<div al-if="appData.ui.activeLayer.type == 'text'">
														<div class="ipages-control">
															<div class="ipages-helper" title="<?php esc_html_e('Text color in hexadecimal format (#fff or #555555)', IPGS_PLUGIN_NAME); ?>"></div>
															<div class="ipages-label"><?php esc_html_e('Color', IPGS_PLUGIN_NAME); ?></div>
															<div class="ipages-color ipages-long" al-color="appData.ui.activeLayer.text.color"></div>
														</div>
														
														<div class="ipages-control">
															<div class="ipages-input-group ipages-long">
																<div class="ipages-input-group-cell ipages-rgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Set the text size in px', IPGS_PLUGIN_NAME); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Size [px]', IPGS_PLUGIN_NAME); ?></div>
																	<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.text.size" placeholder="<?php esc_html_e('Example: 18', IPGS_PLUGIN_NAME); ?>">
																</div>
																<div class="ipages-input-group-cell ipages-lgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Set the text line height in px', IPGS_PLUGIN_NAME); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Line height [px]', IPGS_PLUGIN_NAME); ?></div>
																	<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.text.lineHeight" placeholder="<?php esc_html_e('Example: 18', IPGS_PLUGIN_NAME); ?>">
																</div>
															</div>
														</div>
														
														<div class="ipages-control">
															<div class="ipages-input-group ipages-long">
																<div class="ipages-input-group-cell ipages-rgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Specifies the horizontal alignment of the text', IPGS_PLUGIN_NAME); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Align', IPGS_PLUGIN_NAME); ?></div>
																	<div class="ipages-select ipages-long" al-textalign="appData.ui.activeLayer.text.align"></div>
																</div>
																<div class="ipages-input-group-cell ipages-lgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Specifies the spacing behavior between text characters', IPGS_PLUGIN_NAME); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Letter spacing [px]', IPGS_PLUGIN_NAME); ?></div>
																	<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.text.letterSpacing" placeholder="<?php esc_html_e('Example: 1', IPGS_PLUGIN_NAME); ?>">
																</div>
															</div>
														</div>
														
														<div class="ipages-control">
															<div class="ipages-helper" title="<?php esc_html_e('Set a font family for the text', IPGS_PLUGIN_NAME); ?>"></div>
															<div class="ipages-label"><?php esc_html_e('Font family', IPGS_PLUGIN_NAME); ?></div>
															<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activeLayer.text.fontFamily">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ipages-section" al-attr.class.ipages-active="appData.ui.tabs.customCSS" al-if="appData.ui.tabs.customCSS">
						<div class="ipages-stage">
							<div class="ipages-main-panel ipages-main-panel-general">
								<div class="ipages-data ipages-active">
									<div class="ipages-control">
										<div class="ipages-helper" title="<?php esc_html_e('Enable/disable custom styles', IPGS_PLUGIN_NAME); ?>"></div>
										<div class="ipages-input-group ipages-long">
											<div class="ipages-input-group-cell ipages-pinch">
												<div al-toggle="appData.config.customCSS.active"></div>
											</div>
											<div class="ipages-input-group-cell">
												<div class="ipages-info"><?php esc_html_e('Enable styles', IPGS_PLUGIN_NAME); ?></div>
											</div>
										</div>
									</div>
									<div class="ipages-control">
										<pre id="ipages-notepad-css" class="ipages-notepad"></pre>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ipages-section" al-attr.class.ipages-active="appData.ui.tabs.customJS" al-if="appData.ui.tabs.customJS">
						<div class="ipages-stage">
							<div class="ipages-main-panel ipages-main-panel-general">
								<div class="ipages-data ipages-active">
									<div class="ipages-control">
										<div class="ipages-helper" title="<?php esc_html_e('Enable/disable custom javascript code', IPGS_PLUGIN_NAME); ?>"></div>
										<div class="ipages-input-group ipages-long">
											<div class="ipages-input-group-cell ipages-pinch">
												<div al-toggle="appData.config.customJS.active"></div>
											</div>
											<div class="ipages-input-group-cell">
												<div class="ipages-info"><?php esc_html_e('Enable javascript code', IPGS_PLUGIN_NAME); ?></div>
											</div>
										</div>
									</div>
									<div class="ipages-control">
										<pre id="ipages-notepad-js" class="ipages-notepad"></pre>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ipages-section" al-attr.class.ipages-active="appData.ui.tabs.shortcode" al-if="appData.wp_item_id">
						<div class="ipages-main-panel ipages-main-panel-general">
							<div class="ipages-data ipages-active">
								<div class="ipages-control">
									<div class="ipages-tip ipages-big"><?php esc_html_e('Use a shortcode like the one below, copy and paste it into a post or page.', IPGS_PLUGIN_NAME); ?></div>
								</div>
								
								<div class="ipages-control">
									<div class="ipages-label"><?php esc_html_e('Standard shortcode', IPGS_PLUGIN_NAME); ?></div>
									<div class="ipages-input-group">
										<div class="ipages-input-group-cell">
											<input id="ipages-shortcode-1" class="ipages-text ipages-long ipages-no-brr" type="text" value='[ipages id="{{appData.wp_item_id}}"]' readonly="readonly">
										</div>
										<div class="ipages-input-group-cell ipages-pinch">
											<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.copyToClipboard(appData, '#ipages-shortcode-1')" title="<?php esc_html_e('Copy to clipboard', IPGS_PLUGIN_NAME); ?>"><span><i class="fa fa-clipboard"></i></span></div>
										</div>
									</div>
								</div>
								
								<div class="ipages-control ">
									<div class="ipages-label"><?php esc_html_e('Shortcode with custom CSS classes', IPGS_PLUGIN_NAME); ?></div>
									<div class="ipages-input-group">
										<div class="ipages-input-group-cell">
											<input id="ipages-shortcode-2" class="ipages-text ipages-long ipages-no-brr" type="text" value='[ipages id="{{appData.wp_item_id}}" class="your-css-custom-class"]' readonly="readonly">
										</div>
										<div class="ipages-input-group-cell ipages-pinch">
											<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.copyToClipboard(appData, '#ipages-shortcode-2')" title="<?php esc_html_e('Copy to clipboard', IPGS_PLUGIN_NAME); ?>"><span><i class="fa fa-clipboard"></i></span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="ipages-modals" class="ipages-modals">
		</div>
	</div>
</div>
<!-- /end ipages app -->