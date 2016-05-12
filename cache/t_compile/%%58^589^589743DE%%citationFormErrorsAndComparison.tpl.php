<?php /* Smarty version 2.6.26, created on 2016-02-03 14:00:08
         compiled from controllers/grid/citation/form/citationFormErrorsAndComparison.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'controllers/grid/citation/form/citationFormErrorsAndComparison.tpl', 116, false),array('function', 'translate', 'controllers/grid/citation/form/citationFormErrorsAndComparison.tpl', 124, false),array('function', 'fieldLabel', 'controllers/grid/citation/form/citationFormErrorsAndComparison.tpl', 207, false),array('modifier', 'escape', 'controllers/grid/citation/form/citationFormErrorsAndComparison.tpl', 125, false),)), $this); ?>

<?php $this->assign('containerId', 'citationEditorDetailCanvas'); ?>
<?php ob_start(); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['citationDiff']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['change']):
?><?php echo ''; ?><?php $_from = $this->_tpl_vars['change']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['changeType'] => $this->_tpl_vars['text']):
?><?php echo ''; ?><?php echo ''; ?><?php if ($this->_tpl_vars['changeType'] <= 0): ?><?php echo '<span class="citation-comparison-'; ?><?php if ($this->_tpl_vars['changeType'] == 0): ?><?php echo 'common'; ?><?php elseif ($this->_tpl_vars['changeType'] == -1): ?><?php echo 'deletion'; ?><?php endif; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['text']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('rawCitationWithMarkup', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['citationDiff']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['change']):
?><?php echo ''; ?><?php $_from = $this->_tpl_vars['change']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['changeType'] => $this->_tpl_vars['text']):
?><?php echo ''; ?><?php echo ''; ?><?php if ($this->_tpl_vars['changeType'] >= 0): ?><?php echo '<span class="citation-comparison-'; ?><?php if ($this->_tpl_vars['changeType'] == 0): ?><?php echo 'common'; ?><?php elseif ($this->_tpl_vars['changeType'] == 1): ?><?php echo 'addition'; ?><?php endif; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['text']; ?><?php echo '</span>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('generatedCitationWithMarkup', ob_get_contents());ob_end_clean(); ?>
<script type="text/javascript">
	<!--
	$(function() {
		//
		// Initial setup
		//
		// Initial setup depends on whether we add or
		// edit a citation.
		<?php if ($this->_tpl_vars['citation']->getId()): ?>
			// Hide editable raw citation on startup unless we're adding a
			// new citation.
			$('#editableRawCitation').hide();
		<?php else: ?>
			// Hide the citation comparison markup instead when we add a new
			// citation.
			$('.citation-comparison').hide();
		<?php endif; ?>


		//
		// Handle form messages
		//
		// "Click to dismiss message" feature. Must be done
		// with live as we use JS to insert messages sometimes.
		$('#citationFormMessages li').die('click').live('click', function() {
			$(this).remove();
			if($('#citationFormMessages .pkp_form_error_list').children().length === 0) {
				$('#citationFormMessages').remove();
			}
		});


		//
		// Handle raw citation edition
		//
		// Clicking on the raw citation should make it editable.
		$('#rawCitationWithMarkup div.value, #rawCitationWithMarkup .actions a.edit').each(function() {
			$(this).click(function() {
				$('#rawCitationWithMarkup').hide();
				$editableRawCitation = $('#editableRawCitation').show();
				$textarea = $editableRawCitation.find('textarea').focus();

				// Save original value for undo
				$textarea.data('original-value', $textarea.val());
				return false;
			});
		});

		// Handle expert settings
		extrasOnDemand('#rawCitationEditingExpertOptions');

		// Handle abort raw citation editing.
		$('#cancelRawCitationEditing').click(function() {
			$editableRawCitation = $('#editableRawCitation').hide();
			$('#rawCitationWithMarkup').show();

			// Restore original raw citation value.
			$textarea = $editableRawCitation.find('textarea');
			$textarea.val($textarea.data('original-value'));
			return false;
		});

		// Open a confirmation dialog when the user
		// clicks the "process raw citation" button.
		$('#processRawCitation')
			// modalConfirm() doesn't remove prior events
			// so we do it ourselves.
			.die('click')
			// Activate a throbber when the button is clicked.
			.click(function() {
				// Throbber for raw citation processing.
				actionThrobber('#<?php echo $this->_tpl_vars['containerId']; ?>
');
			});

		<?php if ($this->_tpl_vars['rawCitationEditingWarningHide']): ?>
			// Process the citation without asking the user.
			ajaxAction(
				'post',
				'#<?php echo $this->_tpl_vars['containerId']; ?>
',
				'#processRawCitation',
				'<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'updateRawCitation'), $this);?>
',
				null,
				'click',
				'#editCitationForm'
			);
		<?php else: ?>
			// Configure the dialog.
			var warningContent =
				'<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.processRawCitationWarning"), $this);?>
<br /><br />' +
				'<input id="rawCitationEditingWarningHide" type="checkbox" /><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.dontShowMessageAgain"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript'));?>
';
			modalConfirm(
				'<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'updateRawCitation'), $this);?>
',
				'replace',
				'#<?php echo $this->_tpl_vars['containerId']; ?>
',
				warningContent,
				[
					'<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.processRawCitationGoAhead"), $this);?>
',
					'<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
'
				],
				'#processRawCitation',
				'<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.processRawCitationTitle"), $this);?>
',
				true
			);

			// Feature to disable raw citation editing warning.
			$('#rawCitationEditingWarningHide').die('click').live('click', function() {
				$.getJSON(
					'<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('router' => @ROUTE_COMPONENT,'component' => "api.user.UserApiHandler",'op' => 'updateUserMessageState'), $this);?>
?setting-name=citation-editor-hide-raw-editing-warning&setting-value='+($(this).attr('checked')===true ? 'true' : 'false'),
					function(jsonData) {
						if (jsonData.status !== true) {
							alert(jsonData.content);
						}
					}
				);
			});
		<?php endif; ?>

		//
		// Handle field level data changes.
		//
		// Register event handler for refresh of the citation
		// comparison and message part of the form.
		ajaxAction(
			'post',
			'#citationFormErrorsAndComparison',
			// We bind the wrapper to a custom event. This can
			// be manually triggered if we want to refresh the
			// interface for some reason.
			'#citationFormErrorsAndComparison',
			'<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'fetchCitationFormErrorsAndComparison'), $this);?>
',
			null,
			'refresh',
			'#editCitationForm'
		);

		// Bind citation fields with live to the refresh event
		// so that new fields will be automatically active.
		$('.citation-field').die('change').live('change', function() {
			$('#citationFormErrorsAndComparison').triggerHandler('refresh');
		});
	});
	// -->
</script>
<div id="citationFormErrorsAndComparison" class="form-block">
	<?php if ($this->_tpl_vars['unsavedChanges'] || $this->_tpl_vars['isError']): ?>
		<div id="citationFormMessages" class="help-message" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.clickToDismissMessage"), $this);?>
">
			<div id="formErrors">
				<p>
					<span class="pkp_form_error"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.messages"), $this);?>
:</span>
					<ul class="pkp_form_error_list">
						<?php if ($this->_tpl_vars['unsavedChanges']): ?>
							<li class="unsaved-data-warning"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.unsavedChanges"), $this);?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['isError']): ?>
							<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['message']):
?>
								<li><?php echo $this->_tpl_vars['message']; ?>
</li>
							<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
					</ul>
				</p>
			</div>
		</div>
	<?php endif; ?>


		<div id="editableRawCitation">
		<div class="label">
			<?php if ($this->_tpl_vars['citation']->getId()): ?>
				<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'rawCitation','key' => "submission.citations.editor.details.rawCitation"), $this);?>

			<?php else: ?>
				<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'rawCitation','key' => "submission.citations.editor.citationlist.newCitation"), $this);?>

			<?php endif; ?>
		</div>
		<div class="value">
						<?php if ($this->_tpl_vars['citation']->getId()): ?><!--[if lt IE 8]><div><![endif]--><?php endif; ?>
			<textarea class="textarea" validation="required" id="rawCitation" name="rawCitation" rows="5"><?php echo $this->_tpl_vars['rawCitation']; ?>
</textarea>
			<?php if ($this->_tpl_vars['citation']->getId()): ?><!--[if lt IE 8]></div><![endif]--><?php endif; ?>
		</div>
		<?php if ($this->_tpl_vars['citation']->getId()): ?>
			<div id="rawCitationEditingExpertOptions">
				<div class="options-head">
					<span class="ui-icon"></span>
					<span class="option-block-inactive"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.editRawCitationExpertSettingsInactive"), $this);?>
</span>
					<span class="option-block-active"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.editRawCitationExpertSettingsActive"), $this);?>
</span>
				</div>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controllers/grid/citation/form/citationFilterOptionBlock.tpl", 'smarty_include_vars' => array('titleKey' => "submission.citations.editor.details.editRawCitationExtractionServices",'availableFilters' => $this->_tpl_vars['availableParserFilters'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			<div class="form-block actions">
				<button id="cancelRawCitationEditing" type="button" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
</button>
				<button id="processRawCitation" type="button" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.processRawCitation"), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.processRawCitation"), $this);?>
</button>
			</div>
			<div class="pkp_helpers_clear"></div>
		<?php endif; ?>
	</div>
	<div id="rawCitationWithMarkup" class="citation-comparison">
		<div class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.rawCitation"), $this);?>
</div>
		<div class="actions">
			<a class="edit" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.clickToEdit"), $this);?>
" href=""></a>
		</div>
		<div class="value ui-corner-all" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.clickToEdit"), $this);?>
"><?php echo $this->_tpl_vars['rawCitationWithMarkup']; ?>
</div>
	</div>
	<div id="generatedCitationWithMarkup" class="citation-comparison">
		<div class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.citationExportPreview"), $this);?>
 (<?php echo $this->_tpl_vars['currentOutputFilter']; ?>
)</div>
		<div class="value ui-corner-all"><?php echo $this->_tpl_vars['generatedCitationWithMarkup']; ?>
</div>
	</div>
</div>
