//# sourceMappingURL=menu.js.js.map

$('#remember_me').click(function(){
    if( $('#remember_me').is(':checked') ){
        $(".remember").css({"background-color" : "rgba(244, 244, 244, 0.8)"})
    } else {
        $(".remember").css({"background-color" : "rgba(244, 244, 244, 0.6)"})
    }});
