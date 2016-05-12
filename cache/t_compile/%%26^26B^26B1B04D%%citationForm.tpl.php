<?php /* Smarty version 2.6.26, created on 2016-02-03 14:00:08
         compiled from controllers/grid/citation/form/citationForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'uniqid', 'controllers/grid/citation/form/citationForm.tpl', 12, false),array('modifier', 'escape', 'controllers/grid/citation/form/citationForm.tpl', 24, false),array('modifier', 'assign', 'controllers/grid/citation/form/citationForm.tpl', 634, false),array('function', 'translate', 'controllers/grid/citation/form/citationForm.tpl', 24, false),array('function', 'url', 'controllers/grid/citation/form/citationForm.tpl', 328, false),array('function', 'eval', 'controllers/grid/citation/form/citationForm.tpl', 634, false),)), $this); ?>

<?php $this->assign('containerId', 'citationEditorDetailCanvas'); ?>
<?php $this->assign('formUid', ((is_array($_tmp='form')) ? $this->_run_mod_handler('uniqid', true, $_tmp) : uniqid($_tmp))); ?>
<div id="<?php echo $this->_tpl_vars['containerId']; ?>
" class="canvas">
	<script type="text/javascript">
		<!--
		$(function() {
			////////////////////////////////////////////////////////////
			// Form-level code.
			//
			// Create text to be inserted into the empty editor pane.
			emptyEditorText = '<?php echo '<div id="'; ?><?php echo $this->_tpl_vars['containerId']; ?><?php echo '" class="canvas"><div class="wrapper scrollable"><div class="help-message">'; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.pleaseClickOnCitationToStartEditing"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript'));?><?php echo '</div></div></div>'; ?>
';

			// Handle deletion of the currently edited citation.
			<?php if ($this->_tpl_vars['citation']->getId()): ?>
				$('#component-grid-citation-citationgrid-row-<?php echo $this->_tpl_vars['citation']->getId(); ?>
').bind('updatedItem', function(event, actType) {
					// Make sure that we clear the form panel when the corresponding
					// citation row is being deleted.
					$('#<?php echo $this->_tpl_vars['containerId']; ?>
').replaceWith(emptyEditorText);
				});
			<?php endif; ?>

			// Add keyboard shortcuts.
			$(document)
				.unbind('keydown').unbind('keypress')

				// Ctrl-R: save and revoke approval
				.bind('keydown', 'ctrl+r', function() {
					$('#citationFormSaveAndRevokeApproval').click();
					return false;
				})

				// Ctrl-S: save
				.bind('keydown', 'ctrl+s', function() {
					$('#citationFormSave').click();
					return false;
				})

				// Ctrl-Enter: save and approve
				.bind('keydown', 'ctrl+return', function() {
					$('#citationFormSaveAndApprove').click();
					return false;
				})

				// Ctrl-M: manual editing
				.bind('keydown', 'ctrl+m', function() {
					$('#citationImprovement').tabs('select', 0);
					$('.citation-field').first().focus();
					return false;
				})

				// Ctrl-D: citation services (databases)
				.bind('keydown', 'ctrl+d', function() {
					$('#citationImprovement').tabs('select', 1);
					return false;
				})

				// Ctrl-G: Google Scholar
				.bind('keydown', 'ctrl+g', function() {
					$('#citationImprovement').tabs('select', 2);
					return false;
				})

				// Ctrl-Q: author query
				.bind('keydown', 'ctrl+q', function() {
					$('#citationImprovement').tabs('select', 3);
					return false;
				})

				// Ctrl-H: show sources
				.bind('keydown', 'ctrl+h', function() {
					$('#citationImprovementResultsBlock>.options-head').click();
					return false;
				})

				// Esc: cancel
				.bind('keydown', 'esc', function() {
					$('#citationFormCancel').click();
					return false;
				})

				// Additionally bind to "keypress" event to cancel the default event in Opera.
				.bind('keypress', 'ctrl+h ctrl+r ctrl+s ctrl+return ctrl+m ctrl+d ctrl+g ctrl+q esc', function() {
					return false;
				});



			////////////////////////////////////////////////////////////
			// Improvement options
			//
			// Create citation improvement tabs and make sure that
			// tabs are always fully visible when selected.
			$('#citationImprovement').tabs({
				show: function() {
					scrollToMakeVisible('#citationImprovementBlock');
				}
			});

			//
			// 1) Manual editing
			//
			// Store original label values so that we can
			// restore them if we have to cancel a label change.
			$('.citation-field-label').each(function() {
				$(this).data('original-value', $(this).val());
			});

			// Autocomplete feature.
			/**
			 * Add autocomplete to the given field.
			 * @param fieldName string
			 */
			var addAutocomplete = function(fieldName) {
				// Set up local options database.
				var autocompleteOptions = {<?php echo ''; ?><?php $this->assign('firstOption', true); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['availableFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fieldName'] => $this->_tpl_vars['field']):
?><?php echo ''; ?><?php if ($this->_tpl_vars['field']['options']): ?><?php echo ''; ?><?php if (! $this->_tpl_vars['firstOption']): ?><?php echo ', '; ?><?php endif; ?><?php echo '\''; ?><?php echo $this->_tpl_vars['fieldName']; ?><?php echo '\': ['; ?><?php $_from = $this->_tpl_vars['field']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['options'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['options']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['option']):
        $this->_foreach['options']['iteration']++;
?><?php echo '\''; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['option'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript')); ?><?php echo '\''; ?><?php if (! ($this->_foreach['options']['iteration'] == $this->_foreach['options']['total'])): ?><?php echo ','; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ']'; ?><?php $this->assign('firstOption', false); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
};

				// jQuerify the field.
				$citationField = $('.citation-field[name="' + fieldName + '"]');

				// Remove any previous autocomplete that may currently
				// be attached to the given field.
				$citationField.autocomplete('destroy');

				// If the given field has options then add
				// a new autocomplete.
				if (autocompleteOptions[fieldName] !== undefined) {
					$citationField.autocomplete({
						source: autocompleteOptions[fieldName],
						minLength: 0,
						focus: function(event, ui) {
							$(this).val(ui.item.label);
							return false;
						},
						select: function (event, ui) {
							$(this).val(ui.item.value);
							return false;
						}
					});

					// Fixing autocomplete font size (the autocomplete
					// markup is appended to the end of the document and
					// therefore doesn't correctly inherit styles).
					$citationField
						.autocomplete('widget')
						.css('font-size', '55%');
				}
			};

			// Add initial auto-complete info to fields.
			$('.citation-field').each(function() {
				addAutocomplete($(this).attr('name'));
			});

			/**
			 * Function that handles label change.
			 * @param $label jQuery
			 * @param refresh boolean whether to refresh
			 *  the citation comparison after the change.
			 */
			var labelChangeHandler = function($label, refresh) {
				var newName = $label.val();
				var originalName = $label.data('original-value');

				// Filter fake change events in IE.
				if (newName === originalName) return false;

				// Don't allow unsetting the label.
				if (newName === '-1') {
					alert('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.cannotSelectDefaultForLabel"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript'));?>
');
					$label.val(originalName);
					return false;
				}

				// Check whether another field currently
				// has that name set.
				$('.citation-field[name='+newName+']').each(function() {
					var $this = $(this);

					// Reset the name of the input field
					// to something that doesn't clash
					// with existing fields.
					$this.attr('name', 'not-assigned[]');

					// Reset the corresponding label selector
					// and change it's color so that the user
					// easily identifies that this field has
					// been unset.
					$this.closest('tr').find('select')
						.val(-1).data('original-value', -1)
						.css('color', '#990000')
						.children().css('color', '#222222');
				});

				// Reset the color of the label in
				// case we had marked it before.
				$label.css('color', '#222222');

				// Find the corresponding input field and
				// set its name attribute.
				$label.closest('tr').find('input')
					// Set the name to the chosen field name.
					.attr('name', newName)
					// Remove the "new-citation-field" class
					// in case this was a new field
					.removeClass('new-citation-field');

				// Store the new value for future reference.
				$label.data('original-value', newName);

				// Add auto-complete data (if any).
				addAutocomplete(newName);

				if (refresh) {
					// Trigger a change event so that the citation
					// comparison is being updated.
					$('#citationFormErrorsAndComparison').triggerHandler('refresh');
				}
			};

			// Bind initial change handlers for label change.
			// NB: We cannot use live() here as live for change is broken on IE.
			$('.citation-field-label').change(function() {
				labelChangeHandler($(this), true);
			});


			// Handle addition of new fields:
			// - Define helper function
			/**
			 * Add a new field for manual editing.
			 */
			var addNewCitationField = function() {
				<?php ob_start(); ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controllers/grid/citation/form/citationInputField.tpl", 'smarty_include_vars' => array('availableFields' => $this->_tpl_vars['availableFields'],'fieldName' => 'new')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('htmlForNewField', ob_get_contents());ob_end_clean(); ?>
				var htmlForNewField = '<?php echo ((is_array($_tmp=$this->_tpl_vars['htmlForNewField'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript')); ?>
';
				var $newField = $('#citationImprovementManual tbody')
					.append(htmlForNewField).children().last();
				// Hide the label drop-down and the delete action
				// until the user enters a value
				$newField.find('a, select').hide();

				// Configure drop-down.
				$newField.find('select')
					// Set the original value.
					.data('original-value', '-1')
					// Bind change handler for label change.
					// NB: We cannot use live() here as live for change is broken on IE.
					.change(function() {
						labelChangeHandler($(this), true);
					});
			};

			// - Append the a first new input field to
			//   the field list.
			addNewCitationField();

			// - Remove help text and show field label
			//   selector on focus of the new field.
			/**
			 * Activate the waiting empty citation field for
			 * editing.
			 * @param $newField jQuery
			 */
			var activateNewCitationField = function($newField) {
				if ($newField.val() === '<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.newFieldInfo"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript'));?>
') {
					$newField
						// Empty the field.
						.val('')
						// Show label selector and delete button.
						.closest('tr').find('a, select').fadeIn(500);

					// Add new empty field to be edited next.
					addNewCitationField();
				}
			};
			$('.new-citation-field').die('focus').live('focus', function() {
				activateNewCitationField($(this));
			});

			// Handle deletion of fields.
			$('#citationImprovementManual .delete').die('click').live('click', function() {
				// Remove the table row with that field.
				$(this).closest('tr').fadeOut(500, function() {
					$(this).remove();
					// Trigger citation comparison refresh.
					$('#citationFormErrorsAndComparison').triggerHandler('refresh');
				});
				return false;
			});


			//
			// 2) Citation Services Query
			//
			// Bind action to citation service query button.
			ajaxAction(
				'post',
				'#<?php echo $this->_tpl_vars['containerId']; ?>
',
				'#queryCitation',
				'<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'checkCitation'), $this);?>
'
			);

			// Throbber when citation is re-queried.
			$('#queryCitation').click(function() {
				actionThrobber('#<?php echo $this->_tpl_vars['containerId']; ?>
');
			});


			//
			// 3) Google Scholar
			//
			/**
			 * Return a Google Scholar query string
			 * based on NLM citation schema variable names.
			 *
			 * NB: The Google Scholar query string construction
			 * depends on the current metadata schema. That's why
			 * we separate it into it's own function. When we
			 * introduce further meta-data schemas we just have
			 * to provide other versions of this function and
			 * include it dynamically via smarty {include}
			 * based on the meta-data schema name.
			 *
			 * @return String
			 */
			var createMDSchemaSpecificGSQuery = function() {
				var author = $('input[name=nlm30PersonGroupPersonGroupTypeAuthor]').val();
				var confName = $('input[name=nlm30ConfName]').val();
				var source = $('input[name=nlm30Source]').val();
				var articleTitle = $('input[name=nlm30ArticleTitle]').val();
				var doi = $('input[name=nlm30PubIdPubIdTypeDoi]').val();

				var queryString = '';
				if (author) queryString += author.replace(/[()]/g, '');
				if (confName) queryString += ' ' + confName;
				if (source) queryString += ' ' + source;
				if (articleTitle) queryString += ' ' + articleTitle;
				if (doi) queryString += ' ' + doi;
				return queryString;
			};

			$('#googleQuery').click(function() {
				var googleScholarLink = 'http://scholar.google.com/scholar?ie=UTF-8&oe=UTF-8&hl=en&q=' + encodeURIComponent($.trim(createMDSchemaSpecificGSQuery()));
				window.open(googleScholarLink, '_blank');
			});


			//
			// 4) Author Query
			//
			// Bind action to author query button.
			ajaxAction(
				'post',
				'#authorQueryResult',
				'#authorQuery',
				'<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'sendAuthorQuery'), $this);?>
',
				null, null,
				'#editCitationForm'
			);


			////////////////////////////////////////////////////////////
			// Citation Service Results
			//
			// Handle expert citation service results.
			extrasOnDemand('#citationImprovementResultsBlock');

			// Create citation source tabs.
			$('#citationSourceTabs-<?php echo $this->_tpl_vars['formUid']; ?>
').tabs();

			/**
			 * Helper function that copies all values in
			 * the given source element list to the
			 * citation field list.
			 * @param $sources jQuery a list of source table cells
			 */
			var copySourceToFieldList = function($source) {
				// Copy all source values to target fields.
				$source.each(function() {
					$sourceCell = $(this);
					var propertyName = $sourceCell.attr('id').replace(/^[0-9]+-/, '');
					var $targetField = $('.citation-field[name=' + propertyName + ']');

					if ($targetField.length === 0) {
						// The target field does not exist yet. So let's
						// configure a new field.
						$targetField = $('.new-citation-field');
						activateNewCitationField($targetField);

						// Set the correct label for the new field.
						$label = $targetField.closest('tr').find('select');
						$label.val(propertyName);
						labelChangeHandler($label, false);
					}

					// Copy the content of the source to the target field
					$targetField.val($sourceCell.text());
				});

				// Trigger citation comparison refresh.
				$('#citationFormErrorsAndComparison').triggerHandler('refresh');
			};

			// Activate "use" buttons.
			$('.citation-source-use-button').die('click').live('click', function() {
				// Identify the source element.
				var $source = $(this).closest('td').siblings('.value');
				// Copy values.
				copySourceToFieldList($source);
				// Return false to stop further event processing.
				return false;
			});

			// Activate "use all" buttons.
			$('.citation-source-use-all-button').die('click').live('click', function() {
				// Identify all source elements in this citation source.
				var $source = $(this).closest('tbody').find('.value');
				// Copy values.
				copySourceToFieldList($source);
				// Return false to stop further event processing.
				return false;
			});


			////////////////////////////////////////////////////////////
			// Form-level actions.
			//
			//
			// 1) Cancel button.
			//
			$('#citationFormCancel').click(function() {
				// Clear the form panel and show the initial help message.
				$('#<?php echo $this->_tpl_vars['containerId']; ?>
').replaceWith(emptyEditorText);

				// De-select the selected citation.
				$('.current-item').each(function() {
					$(this).removeClass('current-item');
				});
			});

			//
			// 2) Save/Add (+Revoke/Approve) buttons.
			//
			// Style save buttons.
			<?php if ($this->_tpl_vars['citationApproved']): ?>
				$('#citationFormSaveAndApprove').hide();
				$('#citationFormSaveAndRevokeApproval').addClass('secondary-button');
			<?php else: ?>
				$('#citationFormSaveAndRevokeApproval').hide();
				<?php if ($this->_tpl_vars['citation']->getId()): ?>
					$('#citationFormSave').addClass('secondary-button');
				<?php else: ?>
					$('#citationFormCancel').addClass('secondary-button');
				<?php endif; ?>
			<?php endif; ?>

			// Handle save button.
			$('.citation-save-button').each(function() {
				$(this).click(function() {
					var pressedButton = this.id;

					// Bind to the form's submitSuccessful custom event which
					// will be called once the citation has been successfully
					// saved.
					$('#<?php echo $this->_tpl_vars['containerId']; ?>
').bind('submitSuccessful', function(e, $updatedElement) {
						$(this).unbind('submitSuccessful');

						// Remove warning about unsaved data.
						$('li.unsaved-data-warning').remove();
						if($('#citationFormMessages .pkp_form_error_list').children().length === 0) {
							$('#citationFormMessages').remove();
						}

						if (pressedButton === 'citationFormSaveAndApprove') {
							// Shuffle buttons around.
							$('#citationFormSaveAndApprove').hide();
							$('#citationFormSaveAndRevokeApproval').show();
							$('#citationFormSave').removeClass('secondary-button');

							// Get the next unapproved citation:
							// 1) First try to find an unapproved citation
							//    after the current citation.
							$nextUnapproved = $('#component-grid-citation-citationgrid-row-<?php echo $this->_tpl_vars['citation']->getId(); ?>
 ~ .unapproved-citation')
								.first();
							// 2) If that wasn't successful then try to find
							//    an unapproved citation from the top of the list.
							if (!$nextUnapproved.length) {
								$nextUnapproved = $('.unapproved-citation:not(#component-grid-citation-citationgrid-row-<?php echo $this->_tpl_vars['citation']->getId(); ?>
)')
									.first();
							}

							// If there are still unapproved citations then show
							// the next one, otherwise jump to the export main tab.
							if ($nextUnapproved.length) {
								// Scroll the citation list to make the next
								// citation visible.
								scrollToMakeVisible($nextUnapproved);

								// Trigger the click handler on the next
								// unapproved citation to load it in the
								// citation detail pane.
								$nextUnapproved.find('.row_file').triggerHandler('click');
							} else {
								// If all citations have been approved then open
								// the export tab.
								$('.approved-citation .row_file').first().triggerHandler('click');
								$('#citationEditorMainTabs').tabs('select', 'citationEditorTabExport');
							}
						}
						if (pressedButton === 'citationFormSaveAndRevokeApproval') {
							// Shuffle buttons around.
							$('#citationFormSaveAndRevokeApproval').hide();
							$('#citationFormSaveAndApprove').show();
							$('#citationFormSave').addClass('secondary-button');
						}

						// If the user pressed only the save button then provide
						// visual feedback.
						if (pressedButton === 'citationFormSave') {
							if ($('#citationFormMessages').length == 0) {
								var formErrorHtml =
									'<div id="citationFormMessages" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.clickToDismissMessage"), $this);?>
" class="help-message">'+
									'    <div id="pkp_form_errors">'+
									'        <p><span class="pkp_form_error"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.messages"), $this);?>
:</span></p>'+
									'        <ul class="pkp_form_error_list"></ul>'+
									'    </div>'+
									'</div>';
								$('#citationFormErrorsAndComparison').prepend(formErrorHtml);
							}
							var messageHtml = '<li class="unsaved-data-warning"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.dataSaved"), $this);?>
</li>';
							$('#formErrors .pkp_form_error_list').append(messageHtml);
						}


						<?php if (! $this->_tpl_vars['citation']->getId()): ?>
							// A new citation has been saved so refresh the form to get
							// the new citation id.
							scrollToMakeVisible($updatedElement);
							$updatedElement.find('.row_file').triggerHandler('click');
						<?php endif; ?>
					});

					// Fill hidden form elements depending on the save action type.
					if (pressedButton === 'citationFormSaveAndApprove') {
						$('#citationApproved').val('citationApproved');
						$('#remainsCurrentItem').val('no');

						// Throbber because we'll move to a new citation or tab.
						actionThrobber('#<?php echo $this->_tpl_vars['containerId']; ?>
');
					} else {
						$('#remainsCurrentItem').val('yes');
					}
					if (pressedButton === 'citationFormSaveAndRevokeApproval') {
						$('#citationApproved').val('');
					}

					// Submit the form.
					<?php if ($this->_tpl_vars['citation']->getId()): ?>
						// Update existing citation.
						submitJsonForm('#<?php echo $this->_tpl_vars['containerId']; ?>
', 'replace', '#component-grid-citation-citationgrid-row-<?php echo $this->_tpl_vars['citation']->getId(); ?>
');
					<?php else: ?>
						// Create and the new citation.
						submitJsonForm('#<?php echo $this->_tpl_vars['containerId']; ?>
', 'append', '#component-grid-citation-citationgrid .scrollable tbody:first');
					<?php endif; ?>

					// Trigger the throbber for citation approval or when we
					// add a new citation as this will change the whole citation
					// detail pane.
					<?php if ($this->_tpl_vars['citation']->getId()): ?>if (pressedButton === 'citationFormSaveAndApprove') {<?php endif; ?>
						$('#<?php echo $this->_tpl_vars['containerId']; ?>
').triggerHandler('actionStart');
					<?php if ($this->_tpl_vars['citation']->getId()): ?>}<?php endif; ?>
				});
			});

			// Handle highlighting of currently edited citation.
			$('#citationEditorNavPane div.grid .current-item').removeClass('current-item');
			$('#component-grid-citation-citationgrid-row-<?php echo $this->_tpl_vars['citation']->getId(); ?>
').addClass('current-item');

			// Throbber
			actionThrobber('#<?php echo $this->_tpl_vars['containerId']; ?>
');
		});
		// -->
	</script>
	<form class="pkp_form" id="editCitationForm" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'updateCitation'), $this);?>
" >
		<div class="wrapper scrollable with-pane-actions">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controllers/grid/citation/form/citationFormErrorsAndComparison.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						<?php if ($this->_tpl_vars['citation']->getId()): ?>
				<div id="citationImprovementBlock">
					<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.explainImprovementOptions"), $this);?>
</p>

					<div id="citationImprovement">
						<ul>
							<li><a href="#citationImprovementManual" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.manualEditing"), $this);?>
 [Ctrl-M]"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.manualEditing"), $this);?>
</a></li>
							<li><a href="#citationImprovementQuery" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.citationServices"), $this);?>
 [Ctrl-D]"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.citationServices"), $this);?>
</a></li>
							<li><a href="#citationImprovementGoogle" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.googleScholar"), $this);?>
 [Ctrl-G]"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.googleScholar"), $this);?>
</a></li>
							<li><a href="#citationImprovementAuthor" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.authorQuery"), $this);?>
 [Ctrl-Q]"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.authorQuery"), $this);?>
</a></li>
						</ul>

						<div id="citationImprovementManual" class="pkp_controllers_grid">
							<table><tbody>
																<?php $_from = $this->_tpl_vars['availableFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['availableFields'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['availableFields']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['fieldName'] => $this->_tpl_vars['field']):
        $this->_foreach['availableFields']['iteration']++;
?>
									<?php ob_start(); ?>{$<?php echo $this->_tpl_vars['fieldName']; ?>
}<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('fieldValueVar', ob_get_contents());ob_end_clean(); ?>
									<?php echo ((is_array($_tmp=smarty_function_eval(array('var' => $this->_tpl_vars['fieldValueVar']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'fieldValue') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'fieldValue'));?>

									<?php if ($this->_tpl_vars['fieldValue'] != ''): ?>
										<?php if ($this->_tpl_vars['field']['required'] == 'true'): ?><?php $this->assign('hasRequiredField', true); ?><?php endif; ?>
										<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controllers/grid/citation/form/citationInputField.tpl", 'smarty_include_vars' => array('availableFields' => $this->_tpl_vars['availableFields'],'fieldName' => $this->_tpl_vars['fieldName'],'fieldValue' => $this->_tpl_vars['fieldValue'],'required' => $this->_tpl_vars['field']['required'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							</tbody></table>

							<?php if ($this->_tpl_vars['hasRequiredField']): ?><p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p><?php endif; ?>
						</div>

						<div id="citationImprovementQuery">
							<div>
								<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.databaseQueryExplanation"), $this);?>
</p>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controllers/grid/citation/form/citationFilterOptionBlock.tpl", 'smarty_include_vars' => array('titleKey' => "submission.citations.editor.details.editRawCitationDatabaseServices",'availableFilters' => $this->_tpl_vars['availableLookupFilters'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							</div>
							<div class="actions">
								<button id="queryCitation" type="button"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.queryCitation"), $this);?>
</button>
							</div>
							<div class="pkp_helpers_clear"></div>
						</div>

						<div id="citationImprovementGoogle">
							<div>
								<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.googleScholarExplanation"), $this);?>
</p>
							</div>
							<div class="actions">
								<button id="googleQuery" type="button"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.queryGoogleScholar"), $this);?>
</button>
							</div>
							<div class="pkp_helpers_clear"></div>
						</div>

						<div id="citationImprovementAuthor">
							<div>
								<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.authorQueryExplanation"), $this);?>
</p>
								<p>
									<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.authorQuerySubject"), $this);?>

									<input type="text" maxlength="500" value="<?php echo $this->_tpl_vars['authorQuerySubject']; ?>
"
										id="authorQuerySubject" name="authorQuerySubject" validation="required" />
								</p>
								<p>
									<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.authorQueryBody"), $this);?>

									<textarea class="textarea" validation="required" rows=10
										id="authorQueryBody" name="authorQueryBody"><?php echo $this->_tpl_vars['authorQueryBody']; ?>
</textarea>
								</p>
							</div>
							<div id="authorQueryResult"></div>
							<div class="actions">
								<button id="authorQuery" type="button"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.sendAuthorQuery"), $this);?>
</button>
							</div>
							<div class="pkp_helpers_clear"></div>
						</div>
					</div>
				</div>

				<div id="citationImprovementResultsBlock">
					<div class="options-head">
						<span class="ui-icon"></span>
						<span class="option-block-inactive" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.citationImprovementResultsInactive"), $this);?>
 [Ctrl-H]"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.citationImprovementResultsInactive"), $this);?>
</span>
						<span class="option-block-active" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.citationImprovementResultsActive"), $this);?>
 [Ctrl-H]"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.citationImprovementResultsActive"), $this);?>
</span>
					</div>
					<div class="option-block">
												<div id="citationSourceTabs-<?php echo $this->_tpl_vars['formUid']; ?>
">
														<ul>
								<?php $_from = $this->_tpl_vars['citationSourceTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['citationSourceTabId'] => $this->_tpl_vars['citationSourceTab']):
?>
									<li><a href="#<?php echo $this->_tpl_vars['citationSourceTabId']; ?>
-<?php echo $this->_tpl_vars['formUid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['citationSourceTab']['displayName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></li>
								<?php endforeach; endif; unset($_from); ?>
							</ul>

														<?php $_from = $this->_tpl_vars['citationSourceTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['citationSourceTabId'] => $this->_tpl_vars['citationSourceTab']):
?>
								<div id="<?php echo $this->_tpl_vars['citationSourceTabId']; ?>
-<?php echo $this->_tpl_vars['formUid']; ?>
" class="grid">
									<table><tbody>
										<?php $_from = $this->_tpl_vars['citationSourceTab']['statements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sourcePropertyId'] => $this->_tpl_vars['sourceStatement']):
?>
											<tr valign="top">
												<td width="30%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['sourceStatement']['displayName']), $this);?>
</td>
												<td id="<?php echo $this->_tpl_vars['sourcePropertyId']; ?>
" class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['sourceStatement']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
												<td class="citation-source-action-cell">
													[<a id="<?php echo $this->_tpl_vars['sourcePropertyId']; ?>
-use" href="" class="citation-source-use-button" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.sourceResultsUseExplanation"), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.sourceResultsUse"), $this);?>
</a>]
												</td>
											</tr>
										<?php endforeach; endif; unset($_from); ?>
										<tr class="citation-source-action-row">
											<td></td>
											<td></td>
											<td class="citation-source-action-cell">
												<button id="<?php echo $this->_tpl_vars['citationSourceTabId']; ?>
-<?php echo $this->_tpl_vars['formUid']; ?>
-use-all" type="button" class="citation-source-use-all-button" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.sourceResultsUseAllExplanation"), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.sourceResultsUseAll"), $this);?>
</button>
											</td>
										</tr>
									</tbody></table>
								</div>
							<?php endforeach; endif; unset($_from); ?>
						</div>
					</div>
				</div>
				<input type="hidden" name="citationId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['citation']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
				<input type="hidden" name="citationState" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['citation']->getCitationState())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
			<?php endif; ?>
		</div>

		<input type="hidden" name="assocId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['citation']->getAssocId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
		<input id="citationApproved" type="hidden" name="citationApproved" value="<?php if ($this->_tpl_vars['citationApproved']): ?>citationApproved<?php endif; ?>" />
		<input id="remainsCurrentItem" type="hidden" name="remainsCurrentItem" value="yes" />

		<div class="pane-actions form-block">
			<div>
				<button id="citationFormSaveAndRevokeApproval" type="button" class="citation-save-button secondary-button" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.saveAndRevokeApproval"), $this);?>
 [Ctrl-R]"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.saveAndRevokeApproval"), $this);?>
</button>
				<button id="citationFormSave" type="button" class="citation-save-button" title="<?php if ($this->_tpl_vars['citation']->getId()): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.add"), $this);?>
<?php endif; ?> [Ctrl-S]"><?php if ($this->_tpl_vars['citation']->getId()): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.add"), $this);?>
<?php endif; ?></button>
				<?php if ($this->_tpl_vars['citation']->getId()): ?><button id="citationFormSaveAndApprove" type="button" class="citation-save-button" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.saveAndApprove"), $this);?>
 [Ctrl-Enter]"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.saveAndApprove"), $this);?>
</button><?php endif; ?>
				<button id="citationFormCancel" type="button" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
 [Esc]"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
</button>
			</div>
		</div>
	</form>
</div>
