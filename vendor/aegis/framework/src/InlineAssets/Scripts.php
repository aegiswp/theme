<?php
/**
 * Scripts Component
 *
 * Provides support for registering, enqueuing, and managing inline scripts in the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and enqueues inline scripts for the theme and block editor
 * - Integrates with the Aegis inline assets system and WordPress script API
 *
 * @package    Aegis\Framework\InlineAssets
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for inline asset management.
declare(strict_types=1);

// Declares the namespace for inline assets components within the Aegis Framework.
namespace Aegis\Framework\InlineAssets;

// Imports utility classes and WordPress functions for script management.
use Aegis\Utilities\Str;
use function apply_filters;
use function esc_js;
use function is_admin;
use function str_replace;
use function wp_add_inline_script;
use function wp_enqueue_script;
use function wp_localize_script;
use function wp_register_script;

// Implements the Scripts class to support inline script management for the design system.

class Scripts implements Inlinable
{

	use AssetsTrait;

	/**
	 * Enqueue inline scripts.
	 *
	 * @hook enqueue_block_assets
	 *
	 * @return void
	 */
	public function enqueue(): void
	{
		if (is_admin()) {
			return;
		}

		$template_html = $GLOBALS['template_html'] ?? '';
		$load_all = apply_filters('aegis_load_all_scripts', !$template_html);

		$js = $this->get_inline_assets($template_html, $load_all);
		$data = $this->get_data($template_html, $load_all);
		$js .= $this->lazy_loader();

		wp_register_script($this->handle, '', [], '', true);
		wp_enqueue_script($this->handle);
		wp_add_inline_script($this->handle, $js);

		if ($data) {
			wp_localize_script($this->handle, 'aegis', $data);
		}
	}

	private function lazy_loader(): string
	{
		$js_base = $this->url;
		$css_base = str_replace('/js/', '/css/', $js_base);

		$packery = $js_base . 'packery.js';
		$splide = $js_base . 'splide.js';
		$splide_autoscroll = $js_base . 'splide-autoscroll.js';
		$splide_css = $css_base . 'components/splide.css';

		return "(function(){\n" .
			"var loaded={};\n" .
			"function loadCSS(href){if(loaded[href])return;loaded[href]=1;var l=document.createElement('link');l.rel='stylesheet';l.href=href;document.head.appendChild(l);}\n" .
			"function loadJS(src){return new Promise(function(res,rej){if(loaded[src])return res();loaded[src]=1;var s=document.createElement('script');s.src=src;s.defer=true;s.onload=function(){res();};s.onerror=function(){rej();};document.head.appendChild(s);});}\n" .
			"function loadSplide(){loadCSS('" . esc_js($splide_css) . "');return loadJS('" . esc_js($splide) . "').then(function(){return loadJS('" . esc_js($splide_autoscroll) . "');}).catch(function(){});}\n" .
			"function loadPackery(){return loadJS('" . esc_js($packery) . "').catch(function(){});}\n" .
			"function observe(selector, loader){var els=document.querySelectorAll(selector);if(!els||!els.length)return;var fired=false;function fire(){if(fired)return;fired=true;loader();}\n" .
			"if(!('IntersectionObserver'in window)){fire();return;}\n" .
			"var io=new IntersectionObserver(function(entries){for(var i=0;i<entries.length;i++){if(entries[i].isIntersecting){fire();io.disconnect();break;}}},{rootMargin:'200px'});\n" .
			"for(var j=0;j<els.length;j++){io.observe(els[j]);}\n" .
			"}\n" .
			"observe('.splide,[data-splide]', loadSplide);\n" .
			"observe('.packery,[data-packery]', loadPackery);\n" .
			"})();";
	}

	/**
	 * Returns array of localized data.
	 *
	 * @param string $template_html Global template HTML variable.
	 * @param bool   $load_all      Load all scripts.
	 *
	 * @return array
	 */
	public function get_data(string $template_html, bool $load_all): array
	{
		$data = [];

		foreach ($this->data as $key => $args) {
			$value = $args[0] ?? [];
			$strings = $args[1] ?? [];
			$condition = $args[2] ?? true;

			if (!$condition) {
				continue;
			}

			if ($load_all || Str::contains_any($template_html, ...$strings)) {
				$data[$key] = $value;
			}
		}

		return $data;
	}
}
