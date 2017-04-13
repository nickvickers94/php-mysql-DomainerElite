(function(){
    $(document).ready(function(){
        var els = document.getElementsByName('form');
        for(var i=0,il=els.length;i<il;i++){
            if(!els[i].onclick){
                els[i].onclick = function(){
                    exit_disabled = true;
                };
            } else if(!els[i].onsubmit){
                els[i].onsubmit = function(){
                    exit_disabled = true;
                };
            }
        };
        els = document.getElementsByName('a');
        for(var i=0,il=els.length;i<il;i++){
            $(els[i]).click(function(){
                exit_disabled = false;
                if($(this).attr('target') != '_blank'){
                    exit_disabled = true;
                }
            });
        };
        $('body').on('submit', 'form', function () {
            exit_disabled = true;
        });
        $('body').on('click', 'a, button', function () {
            exit_disabled = true;
        });
    });
    //So that event won't be triggered immediately after redirect.
    
    setTimeout(function () {
        $(window).bind('beforeunload',unload_event);
    }, 200);
    function unload_event(e){
        if (exit_disabled === false) {
            if (e) {
                e.returnValue = exit_redirect_message;
            }
            setTimeout(function () {
                var url = exit_redirect_url;
                $(window).unbind('beforeunload',unload_event);
                window.location = url;
            }, 200);
            return exit_redirect_message;
        }
    }
}());