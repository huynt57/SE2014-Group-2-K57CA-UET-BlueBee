/*
 * Simple Placeholder by @marcgg under MIT License
 * Report bugs or contribute on Gihub: https://github.com/marcgg/Simple-Placeholder
 */
(function(e) {
    e.simplePlaceholder = {
        placeholderClass: null,
        hidePlaceholder: function() {
            var t = e(this);
            t.val() == t.attr("placeholder") && t.data(e.simplePlaceholder.placeholderData) && t.val("").removeClass(e.simplePlaceholder.placeholderClass).data(e.simplePlaceholder.placeholderData, !1)
        },
        showPlaceholder: function() {
            var t = e(this);
            t.val() == "" && t.val(t.attr("placeholder")).addClass(e.simplePlaceholder.placeholderClass).data(e.simplePlaceholder.placeholderData, !0)
        },
        preventPlaceholderSubmit: function() {
            return e(this).find(".simple-placeholder").each(function(t) {
                var n = e(this);
                n.val() == n.attr("placeholder") && n.data(e.simplePlaceholder.placeholderData) && n.val("")
            }), !0
        }
    }, e.fn.simplePlaceholder = function(t) {
        if (document.createElement("input").placeholder == undefined) {
            var n = {
                placeholderClass: "placeholding",
                placeholderData: "simplePlaceholder.placeholding"
            };
            t && e.extend(n, t), e.extend(e.simplePlaceholder, n), this.each(function() {
                var t = e(this);
                t.focus(e.simplePlaceholder.hidePlaceholder), t.blur(e.simplePlaceholder.showPlaceholder), t.data(e.simplePlaceholder.placeholderData, !1), t.val() == "" && (t.val(t.attr("placeholder")), t.addClass(e.simplePlaceholder.placeholderClass), t.data(e.simplePlaceholder.placeholderData, !0)), t.addClass("simple-placeholder"), e(this.form).submit(e.simplePlaceholder.preventPlaceholderSubmit)
            })
        }
        return this
    }
})(jQuery);
