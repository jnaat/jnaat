{**
 * plugins/citationFormats/bibtex/citation.tpl
 *
 * Copyright (c) 2013-2015 Simon Fraser University Library
 * Copyright (c) 2003-2015 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Article reading tools -- Capture Citation BibTeX format
 *
 *}
<div class="separator"></div>
<div id="citation">
{literal}
<pre style="font-size: 1.5em; white-space: pre-wrap; white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; word-wrap: break-word;">@article{{/literal}{$journal->getLocalizedInitials()|bibtex_escape}{$articleId|bibtex_escape}{literal},
	author = {{/literal}{assign var=authors value=$article->getAuthors()}{foreach from=$authors item=author name=authors key=i}{assign var=firstName value=$author->getFirstName()}{assign var=authorCount value=$authors|@count}{$firstName|bibtex_escape|toLatex} {$author->getLastName()|bibtex_escape|toLatex}{if $i<$authorCount-1} {translate key="common.and"} {/if}{/foreach}{literal}},
	title = {{/literal}{$article->getLocalizedTitle()|strip_tags|bibtex_escape|toLatex}{literal}},
	journal = {{/literal}{$journal->getLocalizedTitle($issue)|bibtex_escape|toLatex}{literal}},
{/literal}{if $issue}{literal}	volume = {{/literal}{$issue->getVolume()|bibtex_escape}{literal}},
	number = {{/literal}{$issue->getNumber()|bibtex_escape}{literal}},{/literal}{/if}{literal}
	year = {{/literal}{if $article->getDatePublished()}{$article->getDatePublished()|date_format:'%Y'}{elseif $issue->getDatePublished()}{$issue->getDatePublished()|date_format:'%Y'}{else}{$issue->getYear()|escape}{/if}{literal}},
	url = {{/literal}{url|bibtex_escape page="article" op="view" path=$article->getBestArticleId()}{literal}},{/literal}
{if $article->getPages()}{if $article->getStartingPage()}	pages = {literal}{{/literal}{$article->getStartingPage()}{if $article->getEndingPage()}--{$article->getEndingPage()}{/if}{literal}}{/literal}{/if}{/if}
{literal}
}
</pre>
{/literal}
</div>
