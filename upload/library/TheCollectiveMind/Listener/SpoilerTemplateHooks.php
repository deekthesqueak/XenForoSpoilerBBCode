<?php

class TheCollectiveMind_Listener_SpoilerTemplateHooks
{
    /**
     * Provides hook to add tinyMCE spoiler plugin and expose 
     * spoiler description phrase to JavaScript
     * 
     * @param string                    $hookName   Template hook
     * @param string                    $contents   Current contents
     * @param array                     $hookParams Template hook parameters
     * @param XenForo_Template_Abstract $template   Template
     *
     * @return null
     */
    public static function templateHook($hookName, $contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        if ($hookName == 'editor_js_setup') {
            $pluginSearch = "var plugins = '";
            $pluginReplace = "var plugins = 'spoiler,";
            $contents = str_replace($pluginSearch, $pluginReplace, $contents);
            $spoilerButtonPhrase = new XenForo_Phrase('thecollectivemind_tinymce_spoiler_desc');
            $translationSearch = "(jQuery, this, document);";
            $translationReplace = <<<JS
(jQuery, this, document);
!function($, window, document, _undefined)
{
    window.tinyMCE && tinyMCE.addI18n(
    {
        xenforo:
        {
            thecollectivemind:
            {
                spoiler_desc: "$spoilerButtonPhrase"
            }
        }
    });
}
(jQuery, this, document);
JS;
            $contents = str_replace($translationSearch, $translationReplace, $contents);
        }
    }
}