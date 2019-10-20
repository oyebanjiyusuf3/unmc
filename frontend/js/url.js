var url = window.location;
$('ul.nav-menu a').filter(function(){
    return this.href == url;
}).parent().addClass('menu-active').parent().parent().addClass('menu-active');