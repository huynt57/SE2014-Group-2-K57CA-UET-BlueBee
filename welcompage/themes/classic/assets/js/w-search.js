(function(e){"use strict";e.fn.wSearch=function(){return this.each(function(){var t=e(this).find(".w-search-form"),n=e(this).find(".w-search-show"),r=e(this).find(".w-search-close");e().simplePlaceholder&&t.find(".w-search-input-h input").simplePlaceholder(),n&&n.click(function(){t.animate({top:"0px"},250,function(){t.find(".w-search-input input").focus()})}),r&&r.click(function(){t.animate({top:"-100%"},250)})})}})(jQuery),jQuery(document).ready(function(){"use strict";jQuery(".w-search").wSearch()});