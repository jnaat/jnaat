<?php /* Smarty version 2.6.26, created on 2016-02-03 14:00:12
         compiled from controllers/grid/citation/form/citationFilterOptionBlock.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'controllers/grid/citation/form/citationFilterOptionBlock.tpl', 15, false),array('function', 'fbvElement', 'controllers/grid/citation/form/citationFilterOptionBlock.tpl', 25, false),array('function', 'fieldLabel', 'controllers/grid/citation/form/citationFilterOptionBlock.tpl', 27, false),array('modifier', 'concat', 'controllers/grid/citation/form/citationFilterOptionBlock.tpl', 18, false),)), $this); ?>
<div class="option-block">
	<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['titleKey']), $this);?>
</p>
	<div>
		<?php $_from = $this->_tpl_vars['availableFilters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['citationFilter']):
?>
			<?php $this->assign('citationFilterFieldName', ((is_array($_tmp="citationFilters[")) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['citationFilter']->getId(), "]") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['citationFilter']->getId(), "]"))); ?>
			<?php if ($this->_tpl_vars['citationFilter']->getData('isOptional')): ?>
				<?php $this->assign('citationFilterDefault', false); ?>
			<?php else: ?>
				<?php $this->assign('citationFilterDefault', true); ?>
			<?php endif; ?>
			<div class="option-block-option">
				<?php echo $this->_plugins['function']['fbvElement'][0][0]->smartyFBVElement(array('type' => 'checkbox','id' => $this->_tpl_vars['citationFilter']->getDisplayName(),'name' => $this->_tpl_vars['citationFilterFieldName'],'checked' => $this->_tpl_vars['citationFilterDefault']), $this);?>

				<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => $this->_tpl_vars['citationFilterFieldName'],'label' => $this->_tpl_vars['citationFilter']->getDisplayName()), $this);?>

			</div>
		<?php endforeach; endif; unset($_from); ?>
	</div>
	<div class="pkp_helpers_clear"></div>
</div>