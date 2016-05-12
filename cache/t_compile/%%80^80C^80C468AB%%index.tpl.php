<?php /* Smarty version 2.6.26, created on 2016-04-07 12:33:45
         compiled from file:/var/www/html/jnaat/plugins/generic/backup/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'file:/var/www/html/jnaat/plugins/generic/backup/index.tpl', 13, false),array('function', 'url', 'file:/var/www/html/jnaat/plugins/generic/backup/index.tpl', 17, false),)), $this); ?>
<?php $this->assign('pageTitle', "plugins.generic.backup.link"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.backup.longdescription"), $this);?>


<?php $this->assign('footNoteNum', 1); ?>
<ul>
	<li><?php if ($this->_tpl_vars['isDumpConfigured']): ?><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'db'), $this);?>
"><?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.backup.db"), $this);?>
<?php if ($this->_tpl_vars['isDumpConfigured']): ?></a><?php else: ?><sup><?php echo $this->_tpl_vars['footNoteNum']; ?>
<?php $this->assign('dumpFootNote', $this->_tpl_vars['footNoteNum']); ?><?php $this->assign('footNoteNum', $this->_tpl_vars['footNoteNum']+1); ?></sup><?php endif; ?></li>
	<li><?php if ($this->_tpl_vars['isTarConfigured']): ?><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'files'), $this);?>
"><?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.backup.files"), $this);?>
<?php if ($this->_tpl_vars['isTarConfigured']): ?></a><?php else: ?><sup><?php echo $this->_tpl_vars['footNoteNum']; ?>
<?php $this->assign('tarFootNote', $this->_tpl_vars['footNoteNum']); ?><?php $this->assign('footNoteNum', $this->_tpl_vars['footNoteNum']+1); ?></sup><?php endif; ?></li>
	<li><?php if ($this->_tpl_vars['isTarConfigured']): ?><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'code'), $this);?>
"><?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.backup.code"), $this);?>
<?php if ($this->_tpl_vars['isTarConfigured']): ?></a><?php else: ?><sup><?php echo $this->_tpl_vars['tarFootNote']; ?>
</sup><?php endif; ?></li>
</ul>

<?php if ($this->_tpl_vars['dumpFootNote']): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.backup.db.config",'footNoteNum' => $this->_tpl_vars['dumpFootNote']), $this);?>
<?php endif; ?>
<?php if ($this->_tpl_vars['tarFootNote']): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.backup.tar.config",'footNoteNum' => $this->_tpl_vars['tarFootNote']), $this);?>
<?php endif; ?>

<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'admin'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "admin.siteAdmin"), $this);?>
</a>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>