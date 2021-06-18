window.addEventListener('load', function () {


    var button = document.querySelector('.nav-button');
    var nav = document.querySelector('.navbar-collapse');
    var top = document.querySelector('.top');
    var mid = document.querySelector('.mid');
    var down = document.querySelector('.down');
    var login_hide = document.querySelector('.login_hide');
    var hidden_login = document.querySelector('.hidden_login');
    var closing_button = document.querySelector('.closing_button');
    var link_login = document.querySelector('.link_login');
    var display_login = document.querySelector('.display_login');
    var close_link_login = document.querySelector('.close_link_login');


    button.addEventListener('click', function () {
        if (nav.classList.contains('open')) {
            nav.classList.remove('open');
            top.classList.remove('open');
            mid.classList.remove('open');
            down.classList.remove('open');
        } else {
            nav.classList.add('open');
            top.classList.add('open');
            mid.classList.add('open');
            down.classList.add('open');
        }
    });

    login_hide.addEventListener('click', function () {
        if (hidden_login.classList.contains('open')) {
            hidden_login.classList.remove('open');
        } else {
            hidden_login.classList.add('open');
        }
    });

    closing_button.addEventListener('click', function () {
        if (hidden_login.classList.contains('open')) {
            hidden_login.classList.remove('open');
        } else {
            hidden_login.classList.add('open');
        }
    });

    link_login.addEventListener('click', function () {
        if (display_login.classList.contains('open')) {
            display_login.classList.remove('open');
        } else {
            display_login.classList.add('open');
        }
    });

    // close_link_login.addEventListener('click', function () {
    //     if (display_login.classList.contains('open')) {
    //         display_login.classList.remove('open');
    //     } else {
    //         display_login.classList.add('open');
    //     }
    // });

    $(function () {
        $(".button").on("click", function () {
            var $button = $(this);
            var $parent = $button.parent();
            var oldValue = $parent.find('.input').val();

            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below minimum
                if (oldValue > minimum_java) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = minimum_java;
                }
            }
            $parent.parent().find('a.add-to-cart').attr('data-quantity', newVal);
            $parent.parent().find('input').attr('value', newVal);
            $parent.find('.input').val(newVal);
        });
    });
});
