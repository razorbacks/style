$(function(){
    $('textarea').each(function(){
        var ta = $(this);
        ta.keyup(function(){
            while(ta.outerHeight() < this.scrollHeight + parseFloat(ta.css('borderTopWidth')) + parseFloat(ta.css('borderBottomWidth'))) {
                ta.height(ta.height()+1);
            };
        })
    });
});
