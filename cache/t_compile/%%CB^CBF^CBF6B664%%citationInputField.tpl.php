<?php /* Smarty version 2.6.26, created on 2016-02-03 14:00:08
         compiled from controllers/grid/citation/form/citationInputField.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'controllers/grid/citation/form/citationInputField.tpl', 20, false),array('modifier', 'escape', 'controllers/grid/citation/form/citationInputField.tpl', 24, false),)), $this); ?>
<tr<?php if ($this->_tpl_vars['required']): ?> class="citation-field-required"<?php endif; ?>>
	<td class="first_column">
		<div class="row_container">
			<div class="row_actions">
				<a class="delete" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.delete"), $this);?>
" href="">&nbsp;</a>
			</div>
			<div class="row_file label">
				<select name="citation-field-input-label[]"
					title="<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.changeFieldInfo"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp));?>
"
					class="citation-field-label">
						<option value="-1"<?php if ($this->_tpl_vars['fieldName'] == 'new'): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.pleaseSelect"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp));?>
</option>
						<?php $_from = $this->_tpl_vars['availableFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['availableFieldName'] => $this->_tpl_vars['availableField']):
?>
							<option value="<?php echo $this->_tpl_vars['availableFieldName']; ?>
"<?php if ($this->_tpl_vars['availableFieldName'] == $this->_tpl_vars['fieldName']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['availableField']['displayName']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
		</div>
	</td>
	<td class="value">
		<input type="text" class="<?php if ($this->_tpl_vars['fieldName'] == 'new'): ?>new-citation-field<?php endif; ?> citation-field text large" maxlength="1500"
			value="<?php if ($this->_tpl_vars['fieldName'] == 'new'): ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.details.newFieldInfo"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp));?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['fieldValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?>"
			name="<?php if ($this->_tpl_vars['fieldName'] == 'new'): ?>new-field<?php else: ?><?php echo $this->_tpl_vars['fieldName']; ?>
<?php endif; ?>" title="<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.clickToEdit"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp));?>
" />
	</td>
</tr>