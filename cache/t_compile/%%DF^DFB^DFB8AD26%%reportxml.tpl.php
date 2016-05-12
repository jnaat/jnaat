<?php /* Smarty version 2.6.26, created on 2016-05-05 12:07:57
         compiled from file:/var/www/html/jnaat/plugins/reports/counter/reportxml.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'file:/var/www/html/jnaat/plugins/reports/counter/reportxml.tpl', 18, false),array('modifier', 'escape', 'file:/var/www/html/jnaat/plugins/reports/counter/reportxml.tpl', 20, false),)), $this); ?>
<?php if ($this->_tpl_vars['omitWrapper'] != 'true'): ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<Reports xmlns="http://www.niso.org/schemas/counter"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.niso.org/schemas/counter http://www.niso.org/schemas/sushi/counter3_0.xsd">
<?php endif; ?>
  <Report xmlns="http://www.niso.org/schemas/counter" ID="JR1" Version="3" Title="Journal Report 1" Created="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%dT%H:%M:%SZ") : smarty_modifier_date_format($_tmp, "%Y-%m-%dT%H:%M:%SZ")); ?>
">
    <Vendor>
      <Name><?php echo ((is_array($_tmp=$this->_tpl_vars['siteTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</Name>
      <ID>ID0</ID>
      <WebSiteUrl><?php echo ((is_array($_tmp=$this->_tpl_vars['base_url'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</WebSiteUrl>
    </Vendor>
    <Customer>
      <Name><?php echo ((is_array($_tmp=$this->_tpl_vars['reqUser']->getUserName())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</Name>
      <ID><?php echo ((is_array($_tmp=$this->_tpl_vars['reqUser']->getUserID())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</ID>

      <?php $_from = $this->_tpl_vars['journalsArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['journalkey'] => $this->_tpl_vars['journal']):
?>

      <ReportItems>
        <ItemIdentifier>
          <Type>Print_ISSN</Type>
          <Value><?php echo ((is_array($_tmp=$this->_tpl_vars['journal']['printIssn'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</Value>
        </ItemIdentifier>
        <ItemIdentifier>
          <Type>Online_ISSN</Type>
          <Value><?php echo ((is_array($_tmp=$this->_tpl_vars['journal']['onlineIssn'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</Value>
        </ItemIdentifier>
        <ItemPlatform>Open Journal Systems</ItemPlatform>
        <ItemPublisher><?php echo ((is_array($_tmp=$this->_tpl_vars['journal']['publisherInstitution'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</ItemPublisher>
        <ItemName><?php echo ((is_array($_tmp=$this->_tpl_vars['journal']['journalTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</ItemName>
        <ItemDataType>Journal</ItemDataType>

        <?php $_from = $this->_tpl_vars['journal']['entries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['requests']):
?>

        <ItemPerformance>
          <Period>
            <Begin><?php echo $this->_tpl_vars['requests']['start']; ?>
</Begin>
            <End><?php echo $this->_tpl_vars['requests']['end']; ?>
</End>
          </Period>
          <Category>Requests</Category>
          <?php if ($this->_tpl_vars['requests']['count_total'] != ''): ?><Instance>
            <MetricType>ft_total</MetricType>
            <Count><?php echo $this->_tpl_vars['requests']['count_total']; ?>
</Count>
          </Instance><?php endif; ?>

          <?php if ($this->_tpl_vars['requests']['count_html'] != ''): ?><Instance>
            <MetricType>ft_html</MetricType>
            <Count><?php echo $this->_tpl_vars['requests']['count_html']; ?>
</Count>
          </Instance><?php endif; ?>

          <?php if ($this->_tpl_vars['requests']['count_pdf'] != ''): ?><Instance>
            <MetricType>ft_pdf</MetricType>
            <Count><?php echo $this->_tpl_vars['requests']['count_pdf']; ?>
</Count>
          </Instance><?php endif; ?>

        </ItemPerformance>

        <?php endforeach; endif; unset($_from); ?>

      </ReportItems>

      <?php endforeach; endif; unset($_from); ?>

    </Customer>
  </Report>
<?php if ($this->_tpl_vars['omitWrapper'] != 'true'): ?>
</Reports>
<?php endif; ?>