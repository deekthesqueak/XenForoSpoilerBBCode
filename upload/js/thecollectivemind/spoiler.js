/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
    XenForo.Spoiler = function($spoiler)
    {

        $spoiler.click(function(event)
        {
            var header = $(this).parent().parent().parent();
            if (header.hasClass('open')) {
                header.next('.bbCodeSpoilerContent').hide().removeClass('open');
                header.removeClass('open');
            } else {
                header.next('.bbCodeSpoilerContent').show();
                header.addClass('open');
            }
        });
    };

    XenForo.register('.bbCodeSpoiler div a', 'XenForo.Spoiler');
}
(jQuery, this, document);
