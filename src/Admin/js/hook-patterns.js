/**
 * Hook Patterns Admin JavaScript
 *
 * Handles interactions for the hook patterns admin interface.
 *
 * @package Aegis\Admin
 */

(function () {
    'use strict';

    var config = window.aegisHookPatterns || {};

    /**
     * Show a hook description below the select when a hook is chosen.
     */
    function onHookChange() {
        var select = document.getElementById('aegis_hook_name');
        if (!select || !config.availableHooks) {
            return;
        }

        var hookName = select.value;
        var description = '';

        Object.keys(config.availableHooks).forEach(function (group) {
            if (config.availableHooks[group][hookName]) {
                description = config.availableHooks[group][hookName];
            }
        });

        var desc = select.parentNode.querySelector('.aegis-hook-description');
        if (!desc) {
            desc = document.createElement('p');
            desc.className = 'description aegis-hook-description';
            select.parentNode.appendChild(desc);
        }
        desc.textContent = description;
    }

    /**
     * Clamp priority to a sane range.
     */
    function onPriorityChange() {
        var input = document.getElementById('aegis_priority');
        if (!input) {
            return;
        }
        var value = parseInt(input.value, 10);
        if (isNaN(value) || value < -1000 || value > 1000) {
            input.value = config.defaultPriority || 10;
        }
    }

    /**
     * Bind events once the DOM is ready.
     */
    function init() {
        var hookSelect = document.getElementById('aegis_hook_name');
        if (hookSelect) {
            hookSelect.addEventListener('change', onHookChange);
        }

        var priorityInput = document.getElementById('aegis_priority');
        if (priorityInput) {
            priorityInput.addEventListener('change', onPriorityChange);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
