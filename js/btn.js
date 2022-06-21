$('.order').click(function(e) {
	e.preventDefault();
    let button = $(this);

    if(!button.hasClass('animate')) {
        button.addClass('animate');
        setTimeout(() => {
            button.removeClass('animate');
            $('form').submit();

        }, 10000);
    }

});
