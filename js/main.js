$(".navigation-menu").find("a").each(function(){
    var a = $(this);
    if ( a.attr("href") == window.location.href ) {
        a.parent().addClass("active");
    }
});

$(function(){
    $('textarea:not(.no-autoexpand)').each(function(){
        var ta = $(this);
        if (!ta.parents().hasClass('no-autoexpand')) {
            ta.keyup(function(){
                var top = parseFloat(ta.css('borderTopWidth'));
                var bottom = parseFloat(ta.css('borderBottomWidth'));
                while(ta.outerHeight() < this.scrollHeight + top + bottom) {
                    ta.height(ta.height()+1);
                };
            })
        }
    });
});
