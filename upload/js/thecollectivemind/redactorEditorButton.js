/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
    XenForo.spoilerButton = function($textarea) {
        this.__construct($textarea);
    };

    XenForo.spoilerButton.prototype =
    {
        __construct: function($textarea)
        {
            var redactorOptions = $textarea.data('options'),
            myButtons = this.addButton(),
            myOptions = {
                buttons: myButtons
            };

            if(typeof RedactorPlugins == 'undefined') {
                RedactorPlugins = {};
            }

            $textarea.data('options', $.extend(redactorOptions, myOptions));
        },
        addButton: function()
        {
            return {
                spoiler: {
                    title: RELANG.xf.spoiler,
                    tag: 'spoiler'
                }
            }
        }
    }

    XenForo.register('textarea.BbCodeWysiwygEditor', 'XenForo.spoilerButton');
}(jQuery, this, document);  