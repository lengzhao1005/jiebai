function showMsg(text,position){
    var show	=	$('.show_msg').length;
    if(show>0){

    }else{
        var	div		=	 $('<div class="show_msg" style="width:100%;height:35px;text-align:center;position:fixed;left: 0;z-index: 999;"></div>');
        //div.addClass('show_msg');
        var span	=	$('<span class="show_span" style="display: inline-block;height: 35px;padding: 0 15px;line-height: 35px;background:rgba(0,0,0,0.8);border-radius: 50px;color: #fff;font-size: 1em;"></span>');
        //span.addClass('show_span');
        span.appendTo(div);
        span.text(text);
        $('body').append(div);
    }
    $(".show_span").text(text);
    if(position=='bottom'){
        $(".show_msg").css('bottom','5%');
    }else if(position=='top'){
        $(".show_msg").css('bottom','95%');
    }else{
        $(".show_msg").css('bottom','50%');
    }
    $('.show_msg').hide();
    $('.show_msg').fadeIn(1000);
    $('.show_msg').fadeOut(1000);
}