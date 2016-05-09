<?php /* Smarty version 2.6.26, created on 2016-02-03 14:00:05
         compiled from controllers/grid/citation/citationGridCell.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'concat', 'controllers/grid/citation/citationGridCell.tpl', 10, false),array('modifier', 'escape', 'controllers/grid/citation/citationGridCell.tpl', 14, false),array('function', 'translate', 'controllers/grid/citation/citationGridCell.tpl', 22, false),)), $this); ?>
<?php $this->assign('cellId', ((is_array($_tmp="cell-")) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['id']) : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['id']))); ?>
<span id="<?php echo $this->_tpl_vars['cellId']; ?>
" class="pkp_linkActions">
	<?php $this->assign('cellAction', $this->_tpl_vars['actions'][0]); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "linkAction/legacyLinkAction.tpl", 'smarty_include_vars' => array('id' => ((is_array($_tmp=$this->_tpl_vars['cellId'])) ? $this->_run_mod_handler('concat', true, $_tmp, "-action-", $this->_tpl_vars['cellAction']->getId()) : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, "-action-", $this->_tpl_vars['cellAction']->getId())),'action' => $this->_tpl_vars['cellAction'],'actOnId' => $this->_tpl_vars['cellAction']->getActOn(),'buttonId' => $this->_tpl_vars['cellId'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	[<?php echo $this->_tpl_vars['citationSeq']; ?>
] <?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

	<script type="text/javascript">
		<!--
		$(function() {
			$parentDiv = $('#<?php echo $this->_tpl_vars['cellId']; ?>
').parent();

			// Format parent div.
			$parentDiv
				.attr('title', '<?php echo $this->_tpl_vars['cellAction']->getLocalizedTitle(); ?>
 [<?php if ($this->_tpl_vars['isApproved']): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.citationlist.approved"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations.editor.citationlist.notApproved"), $this);?>
<?php endif; ?>]');

			// Mark the clickable row.
			$parentDiv.parent().addClass('clickable-row');

			// Mark the row as the current row.
			$parentDiv.parent().parent().parent()
				<?php if ($this->_tpl_vars['isCurrentItem']): ?>.addClass('current-item')<?php endif; ?>
				.addClass('<?php if (! $this->_tpl_vars['isApproved']): ?>un<?php endif; ?>approved-citation');

			// Copy click event to parent div.
			clickEventHandlers = $('#<?php echo $this->_tpl_vars['cellId']; ?>
').data('events')['click'];
			for(clickEvent in clickEventHandlers) {
				$parentDiv.click(clickEventHandlers[clickEvent].handler);
			}
		});
		// -->
	</script>
</span>
