<?php /* Smarty version 2.6.26, created on 2016-02-03 13:47:37
         compiled from file:/var/www/html/jnaat/plugins/generic/googleAnalytics/pageTagUrchin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'file:/var/www/html/jnaat/plugins/generic/googleAnalytics/pageTagUrchin.tpl', 15, false),)), $this); ?>
<!-- Google Analytics -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "<?php echo ((is_array($_tmp=$this->_tpl_vars['googleAnalyticsSiteId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
";
urchinTracker();
<?php $_from = $this->_tpl_vars['gsAuthorAccounts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gsAuthorAccount']):
?>
	_uff = 0; // Reset flag to allow for additional accounts
	_uacct = "<?php echo ((is_array($_tmp=$this->_tpl_vars['gsAuthorAccount'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
";
<?php endforeach; endif; unset($_from); ?>
</script>
<!-- /Google Analytics -->
