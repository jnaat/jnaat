<?php /* Smarty version 2.6.26, created on 2016-02-03 13:49:07
         compiled from file:/var/www/html/jnaat/plugins/citationFormats/bibtex//citation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'bibtex_escape', 'file:/var/www/html/jnaat/plugins/citationFormats/bibtex//citation.tpl', 14, false),array('modifier', 'count', 'file:/var/www/html/jnaat/plugins/citationFormats/bibtex//citation.tpl', 15, false),array('modifier', 'toLatex', 'file:/var/www/html/jnaat/plugins/citationFormats/bibtex//citation.tpl', 15, false),array('modifier', 'strip_tags', 'file:/var/www/html/jnaat/plugins/citationFormats/bibtex//citation.tpl', 16, false),array('modifier', 'date_format', 'file:/var/www/html/jnaat/plugins/citationFormats/bibtex//citation.tpl', 20, false),array('modifier', 'escape', 'file:/var/www/html/jnaat/plugins/citationFormats/bibtex//citation.tpl', 20, false),array('function', 'translate', 'file:/var/www/html/jnaat/plugins/citationFormats/bibtex//citation.tpl', 15, false),array('function', 'url', 'file:/var/www/html/jnaat/plugins/citationFormats/bibtex//citation.tpl', 21, false),)), $this); ?>
<div class="separator"></div>
<div id="citation">
<?php echo '
<pre style="font-size: 1.5em; white-space: pre-wrap; white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; word-wrap: break-word;">@article{'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['journal']->getLocalizedInitials())) ? $this->_run_mod_handler('bibtex_escape', true, $_tmp) : $this->_plugins['modifier']['bibtex_escape'][0][0]->bibtexEscape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('bibtex_escape', true, $_tmp) : $this->_plugins['modifier']['bibtex_escape'][0][0]->bibtexEscape($_tmp)); ?>
<?php echo ',
	author = {'; ?>
<?php $this->assign('authors', $this->_tpl_vars['article']->getAuthors()); ?><?php $_from = $this->_tpl_vars['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['authors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['author']):
        $this->_foreach['authors']['iteration']++;
?><?php $this->assign('firstName', $this->_tpl_vars['author']->getFirstName()); ?><?php $this->assign('authorCount', count($this->_tpl_vars['authors'])); ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['firstName'])) ? $this->_run_mod_handler('bibtex_escape', true, $_tmp) : $this->_plugins['modifier']['bibtex_escape'][0][0]->bibtexEscape($_tmp)))) ? $this->_run_mod_handler('toLatex', true, $_tmp) : $this->_plugins['modifier']['toLatex'][0][0]->toLatex($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['author']->getLastName())) ? $this->_run_mod_handler('bibtex_escape', true, $_tmp) : $this->_plugins['modifier']['bibtex_escape'][0][0]->bibtexEscape($_tmp)))) ? $this->_run_mod_handler('toLatex', true, $_tmp) : $this->_plugins['modifier']['toLatex'][0][0]->toLatex($_tmp)); ?>
<?php if ($this->_tpl_vars['i'] < $this->_tpl_vars['authorCount']-1): ?> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.and"), $this);?>
 <?php endif; ?><?php endforeach; endif; unset($_from); ?><?php echo '},
	title = {'; ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('bibtex_escape', true, $_tmp) : $this->_plugins['modifier']['bibtex_escape'][0][0]->bibtexEscape($_tmp)))) ? $this->_run_mod_handler('toLatex', true, $_tmp) : $this->_plugins['modifier']['toLatex'][0][0]->toLatex($_tmp)); ?>
<?php echo '},
	journal = {'; ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['journal']->getLocalizedTitle($this->_tpl_vars['issue']))) ? $this->_run_mod_handler('bibtex_escape', true, $_tmp) : $this->_plugins['modifier']['bibtex_escape'][0][0]->bibtexEscape($_tmp)))) ? $this->_run_mod_handler('toLatex', true, $_tmp) : $this->_plugins['modifier']['toLatex'][0][0]->toLatex($_tmp)); ?>
<?php echo '},
'; ?>
<?php if ($this->_tpl_vars['issue']): ?><?php echo '	volume = {'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['issue']->getVolume())) ? $this->_run_mod_handler('bibtex_escape', true, $_tmp) : $this->_plugins['modifier']['bibtex_escape'][0][0]->bibtexEscape($_tmp)); ?>
<?php echo '},
	number = {'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['issue']->getNumber())) ? $this->_run_mod_handler('bibtex_escape', true, $_tmp) : $this->_plugins['modifier']['bibtex_escape'][0][0]->bibtexEscape($_tmp)); ?>
<?php echo '},'; ?>
<?php endif; ?><?php echo '
	year = {'; ?>
<?php if ($this->_tpl_vars['article']->getDatePublished()): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['article']->getDatePublished())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')); ?>
<?php elseif ($this->_tpl_vars['issue']->getDatePublished()): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['issue']->getDatePublished())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['issue']->getYear())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?><?php echo '},
	url = {'; ?>
<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'article','op' => 'view','path' => $this->_tpl_vars['article']->getBestArticleId()), $this))) ? $this->_run_mod_handler('bibtex_escape', true, $_tmp) : $this->_plugins['modifier']['bibtex_escape'][0][0]->bibtexEscape($_tmp));?>
<?php echo '},'; ?>

<?php if ($this->_tpl_vars['article']->getPages()): ?><?php if ($this->_tpl_vars['article']->getStartingPage()): ?>	pages = <?php echo '{'; ?>
<?php echo $this->_tpl_vars['article']->getStartingPage(); ?>
<?php if ($this->_tpl_vars['article']->getEndingPage()): ?>--<?php echo $this->_tpl_vars['article']->getEndingPage(); ?>
<?php endif; ?><?php echo '}'; ?>
<?php endif; ?><?php endif; ?>
<?php echo '
}
</pre>
'; ?>

</div>