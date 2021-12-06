// Password Change Type
$('.password-floating').click(function(e) {
    e.preventDefault();

    let password = $(this).parent().find('input');
    if(password.attr('type') == 'password')
    {
        password.attr('type', 'text');
        $(this).find('i').addClass('fa-eye-slash').removeClass('fa-eye');
    } else {
        password.attr('type', 'password');
        $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
    }
});
