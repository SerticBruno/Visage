<?php
defined( 'ABSPATH' ) || exit;
 
function getLangSlug() {
	$curr = pll_current_language();
	$def = pll_default_language();
	return ($curr !== $def ? "{$curr}/" : '');
}

function visage_get_lang_items() {
	return pll_the_languages(array('raw'=>1));
}

function visage_get_lang_menu($css = '') {
	$r = '';
	$menuLang = visage_get_lang_items();
// print_r(($menuLang));
	if (is_array($menuLang) and count($menuLang) > 1) {
		$r .= "<ul class='list-unstyled navbar-lang {$css}'>";
		foreach ($menuLang as $k => $v) {
			$r .= '<li class="menu-item navbar-lang-item' . ($v['current_lang'] == '1' ? ' active' : '') . '">';
			$r .= '<a class="navbar-lang-link" href="' . $v['url'] . '" title="' . $v['name'] . '">' . strtoupper($v['name']) . '</a>';
			$r .= '</li>';
		} 
		$r .= '</ul>';
	}
	return $r;
}

function visage_get_lang_dropdown($css = '') {
	$r = '';
	$curr = pll_current_language();
	$menuLang = visage_get_lang_items();
//myErr($menuLang);
	if (is_array($menuLang) && count($menuLang) > 0) {
		$r .= '<div class="btn-group">';
		$r .= '<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
		$r .= strtoupper($curr);
		$r .= '</button>';
		$r .= '<div class="dropdown-menu dropdown-menu-right">';
		foreach($menuLang as $k => $v) {
			$r .= "<a class='dropdown-item' href='{$v['url']}'>{$v['name']}</a>";
		}
		$r .= '</div>';
		$r .= '</div>';
	}
	return $r;
}
