//# sourceMappingURL=menu.js.js.map

$('#check_nav').click(function(){
    if( $('#check_nav').is(':checked') ){
        $(".content").css({"transform" : "translateX(0)","transition-duration" : "0.6s","transition-delay" : "0s"})
    } else {
        $(".content").css({"transform" : "translateX(6vw)","transition-duration" : "0.6s","transition-delay" : "0.6s"})
    }});
