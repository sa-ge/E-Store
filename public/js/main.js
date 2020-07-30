$('table.data').DataTable(
    {
        "aaSorting": [],
        "stateSave": true
    }
);

$('a.menu_switch').click(function(e)
{
    e.preventDefault();
    if($(this).attr('data-menu-status') == 'false') {
        $(this).removeClass('no_animation');
        $('nav.main_navigation').removeClass('no_animation');
        $('div.action_view').removeClass('no_animation');
        $(this).attr('data-menu-status', 'true');
        $(this).addClass('opened');
        $('nav.main_navigation').addClass('opened');
        $('div.action_view').addClass('collapsed');
        if(getCookie('menu_opened') == "") {
            setCookie('menu_opened', true, 180, 'store.test');
        }
    } else {
        $(this).attr('data-menu-status', 'false');
        $(this).removeClass('opened');
        $('nav.main_navigation').removeClass('opened');
        $('div.action_view').removeClass('collapsed');
        deleteCookie('menu_opened', 'store.test');
    }
});

$('form.appForm input:not(.no_float)').on('focus', function()
{
    $(this).parent().find('label').addClass('floated');
}).on('blur', function()
{
    if($(this).val() == '') {
        $(this).parent().find('label').removeClass('floated');
    } else {

    }
});

$('div.radio_button, div.checkbox_button, label.radio span, label.checkbox span, a.language_switch.user').click(function(evt)
{
     evt.stopPropagation();
});

setTimeout(function()
{
    $('p.message').fadeOut();
}, 5000);

$(document).click(function()
{
    $('ul.user_menu').hide();
})

$('a.language_switch.user').click(function(evt)
{
    evt.preventDefault();
    $('ul.user_menu').toggle();
})
