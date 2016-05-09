<?php /* Smarty version 2.6.26, created on 2016-02-09 11:19:49
         compiled from file:/var/www/html/jnaat/plugins/generic/googleAnalytics/settingsForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'file:/var/www/html/jnaat/plugins/generic/googleAnalytics/settingsForm.tpl', 16, false),array('function', 'plugin_url', 'file:/var/www/html/jnaat/plugins/generic/googleAnalytics/settingsForm.tpl', 22, false),array('function', 'fieldLabel', 'file:/var/www/html/jnaat/plugins/generic/googleAnalytics/settingsForm.tpl', 27, false),array('modifier', 'escape', 'file:/var/www/html/jnaat/plugins/generic/googleAnalytics/settingsForm.tpl', 28, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "plugins.generic.googleAnalytics.manager.googleAnalyticsSettings"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

<div id="googleAnalyticsSettings">
<div id="description"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.googleAnalytics.manager.settings.description"), $this);?>
</div>

<div class="separator"></div>

<br />

<form method="post" action="<?php echo $this->_plugins['function']['plugin_url'][0][0]->smartyPluginUrl(array('path' => 'settings'), $this);?>
">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table width="100%" class="data">
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'googleAnalyticsSiteId','required' => 'true','key' => "plugins.generic.googleAnalytics.manager.settings.googleAnalyticsSiteId"), $this);?>
</td>
		<td width="80%" class="value"><input type="text" name="googleAnalyticsSiteId" id="googleAnalyticsSiteId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['googleAnalyticsSiteId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="15" maxlength="25" class="textField" />
			<br />
			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.googleAnalytics.manager.settings.googleAnalyticsSiteIdInstructions"), $this);?>
</span>
		</td>
	</tr>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "trackingCode-urchin",'required' => 'true','key' => "plugins.generic.googleAnalytics.manager.settings.trackingCode"), $this);?>
</td>
		<td width="80%" class="value"><input type="radio" name="trackingCode" id="trackingCode-urchin" value="urchin" <?php if ($this->_tpl_vars['trackingCode'] == 'urchin' || $this->_tpl_vars['trackingCode'] == ""): ?>checked="checked" <?php endif; ?>/> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.googleAnalytics.manager.settings.urchin"), $this);?>
</td>
	</tr>
	<tr valign="top">
		<td width="20%" class="label">&nbsp;</td>
		<td width="80%" class="value"><input type="radio" name="trackingCode" id="trackingCode-ga" value="ga" <?php if ($this->_tpl_vars['trackingCode'] == 'ga'): ?>checked="checked" <?php endif; ?>/> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.googleAnalytics.manager.settings.ga"), $this);?>
</td>
	</tr>
	<tr valign="top">
		<td width="20%" class="label">&nbsp;</td>
		<td width="80%" class="value"><input type="radio" name="trackingCode" id="trackingCode-analytics" value="analytics" <?php if ($this->_tpl_vars['trackingCode'] == 'analytics'): ?>checked="checked" <?php endif; ?>/> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.googleAnalytics.manager.settings.analytics"), $this);?>
</td>
	</tr>
</table>

<br/>

<input type="submit" name="save" class="button defaultButton" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
"/><input type="button" class="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" onclick="history.go(-1)"/>
</form>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>