// Set caret position easily in jQuery
// Written by and Copyright of Luke Morton, 2011
// Licensed under MIT

(function ($, undefined) {
    $.fn.getCursorPosition = function() {
        var el = $(this).get(0);
        var pos = 0;
        if('selectionStart' in el) {
            pos = el.selectionStart;
        } else if('selection' in document) {
            el.focus();
            var Sel = document.selection.createRange();
            var SelLength = document.selection.createRange().text.length;
            Sel.moveStart('character', -el.value.length);
            pos = Sel.text.length - SelLength;
        }
        return pos;
    }
})(jQuery);

(function ($) {
    // Behind the scenes method deals with browser
    // idiosyncrasies and such
    $.caretTo = function (el, index) {
        if (el.createTextRange) {
            var range = el.createTextRange();
            range.move("character", index);
            range.select();
        } else if (el.selectionStart != null) {
            el.focus();
            el.setSelectionRange(index, index);
        }
    };

    // The following methods are queued under fx for more
    // flexibility when combining with $.fn.delay() and
    // jQuery effects.

    // Set caret to a particular index
    $.fn.caretTo = function (index, offset) {
        return this.queue(function (next) {
            if (isNaN(index)) {
                var i = $(this).val().indexOf(index);
                if (offset === true) {
                    i += index.length;
                } else if (offset) {
                    i += offset;
                }
                $.caretTo(this, i);
            } else {
                $.caretTo(this, index);
            }
            next();
        });
    };
}(jQuery));

jQuery(document).ready(function($) {
  let textEditor = $('.text-editor');

  let actions = {
    '#title': '## texto',
    '#bold': '**texto**',
    '#italic': '*texto*',
    '#strikethrough': '~~texto~~',
    '#link': '[texto](http://wwww.link.com)',
    '#image':'![texto](Link de la imagen)',
    '#ul': '+ texto',
    '#ol': '1. texto',
    '#blockquote': '>> texto'
  };

  $('.mini-button').on('click', function(e) {
      e.preventDefault(); // prevents default scrolling
      var href = $(this.hash),
      action = href.selector;
      textEditor.val(textEditor.val() + actions[action]);
      textEditor.caretTo('texto', 5);
  });

});
