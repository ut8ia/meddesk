$(document).ready(function () {

    $('.tabHeader').click(function () {
        activateTab(this.id);
        gtag('event', this.id, {'event_category': 'Tab_click'});
        if ($(window).width() < 1000) {
            name = 'showbox';
            scrollToAnchor(name);
        }
    });

    activateTab('1');

    $('.tabnav').click(function (event) {
        var name = $(this).attr("tabName");
        var id = $(this).attr("tabId");

        if ($(window).width() < 1000) {
            name = 'showbox';
        }
        activateTab(id);
        scrollToAnchor(name);
        gtag('event', name, {'event_category': 'Transit_to'});
    });

    $(document).on('click', '.toFeedback', function () {
        scrollToAnchor('feedback');
        $('#name').focus();
        eventName = $(this).attr("event_name");
        gtag('event', eventName, {'event_category': 'To_feedback'});
    });

    $('.toAbout').click(function () {
        scrollToAnchor('about');
    });

    $('.becomeButton').click(function () {
        gtag('event', 'feedbackpartner', {'event_category': 'To_feedback'});
    });

    $('.closeMenu').click(function () {
        if ($(window).width() < 1000) {
            $('.navbar-toggler').click();
        }
    });

    $('#sendMessageButton').click(function (e) {
        e.preventDefault();
        submitdata();
    });

});

function scrollToAnchor(name) {

    offset = 80;
    if ($(window).width() < 1000) {
        offset = 50;
    }

    var Tag = $("a[name='" + name + "']");
    $('html,body').animate({scrollTop: Tag.offset().top - offset}, 'slow');

}

function activateTab(id) {

    // remove active from all
    $('.tabHeader').removeClass('activePanel');
    $('.tabButton').removeClass('disabledTabButton');

    // on mobile - hide all and show active
    if ($(window).width() < 1000) {
        $('.tabHeader').css("display", "none");
        $('#' + id).css("display", "block");
    }

    // add active to selected
    $('#' + id).addClass('activePanel');
    // hide button
    $('#btn' + id).addClass('disabledTabButton');

    // copy from storage
    content = $('#storage' + id).html();
    $('.showBox').html(content);

}

function submitdata() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var message = document.getElementById("message").value;





    if (!email) {
        $('#email').focus();
        showMessage("E-mail address required.");
        return;
    }


    if (!validateEmail(email)) {
        $('#email').focus();
        showMessage("Correct e-mail address required.");
        return;
    }


    if (!phone) {
        $('#phone').focus();
        showMessage("Phone number required.");
        return;
    }


    if (!validatePhone(phone)) {
        $('#phone').focus();
        showMessage("Correct phone number required.");
        return;
    }

    if (!name) {
        $('#name').focus();
        showMessage("Name required.");
        return;
    }

    if (!message) {
        $('#message').focus();
        showMessage("Message number required.");
        return;
    }





    $.ajax({
        type: 'POST',
        url: 'sender.php',
        data: {
            name: name,
            email: email,
            phone: phone,
            message: message
        },
        success: function (response) {
            showMessage("<strong>Thank you! The mail has been sent successfully. We will contact you soon.</strong>");
            document.getElementById("name").value = '';
            document.getElementById("email").value = '';
            document.getElementById("phone").value = '';
            document.getElementById("message").value = '';
            $('#success_message').fadeOut("slow").fadeIn("slow").fadeOut("slow").fadeIn("slow").fadeOut("slow").fadeIn("slow").fadeOut("slow").fadeIn("slow");

        }
    });

    return false;
}

function showMessage(message) {
    $('#success_message').html(message);
    $('#success_message').fadeOut("slow").fadeIn("slow").fadeOut("slow").fadeIn("slow").fadeOut("slow").fadeIn("slow");
}


function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test(email);
}

function validatePhone(phone) {
    var phoneReg =  /^\d+$/;
    return phoneReg.test(phone);
}