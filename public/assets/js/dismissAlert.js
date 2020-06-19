$(document).ready(function(){
    $('.alert[data-auto-dismiss]').each(function(index,element){
        const $element= $(element),
            timeout= $element.data('auto-dismiss') || 5000;
        setTimeout(function(){
            $element.alert('close');
        }, timeout);
    });

    $('ul.nav').find('a.active').parents('ul').parents('li').children('a').addClass('active');
    $('ul.nav').find('a.active').parents('li').addClass('menu-open');
    
    
});