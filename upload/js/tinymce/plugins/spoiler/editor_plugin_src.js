(function() {
    var wrapBbCode = function(editor)
    {
        var selectedText = editor.selection.getContent(),
            content;

            selectedText.replace(/^<p>/, '').replace(/<\/p>$/, '');
            if(selectedText !== '') {
                content = '<p>[SPOILER]' + selectedText + '[/SPOILER]</p>';
            } else {
                content = '<p>[SPOILER="Hint Text"][/SPOILER]</p>';
            }

        editor.selection.setContent(content);
    };
    /**
     * Initializes the plugin, this will be executed after the plugin has been created.
     * This call is done before the editor instance has finished it's initialization so use the onInit event
     * of the editor instance to intercept that event.
     */
    tinymce.create('tinymce.plugins.SpoilerButtonPlugin', {
        init : function(ed, url) {
            var settings = ed.theme.settings,
                newButton = 'thecollectivemind_spoiler';

            // Check if the button has already been added to the row
            if(settings.theme_xenforo_buttons2.indexOf(newButton) == -1) {
                settings.theme_xenforo_buttons2 = settings.theme_xenforo_buttons2 + "," + newButton;
            }

            // Register command to be run when the button is clicked
            ed.addCommand('addSpoiler', function(ui, val) {
                    wrapBbCode(ed);
            });
            console.log(window.tinymce.i18n);
            // Register example button
            ed.addButton(newButton, {
                    title : window.tinymce.i18n['xenforo.thecollectivemind.spoiler_desc'],
                    cmd : 'addSpoiler',
                    image : url + '/img/spoiler.png'
            });

            // Add a node change handler, selects the button in the UI when a image is selected
            ed.onNodeChange.add(function(ed, cm, n) {
                    cm.setActive('example', n.nodeName == 'IMG');
            });
        },
        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
                return {
                        longname : 'Spoiler Button',
                        author : 'Derek Bonner',
                        authorurl : 'http://derekbonner.com',
                        infourl : '',
                        version : "1.2"
                };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('spoiler', tinymce.plugins.SpoilerButtonPlugin);
})();
