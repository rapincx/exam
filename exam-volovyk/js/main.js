$(document).ready(function(){
    $(document).foundation();
    hs.graphicsDir = 'highslide/graphics/';
    $(".owl-carousel").owlCarousel({
        loop: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true
    });
    $("ul.menu").on("click", "a", function (event) {
        event.preventDefault();
        var id = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });
    $('#show-all').click(function () {
        var pr_items = $('#projects .large-12.hide');
        pr_items.each(function () {
            $(this).removeClass('hide').slideDown(600, 'swing');
        });
    });
    var telInput = $("#ajaxform-i"),
        telInputb = $("#ajaxform-b-i"),
        errorMsg = $("#error-msg"),
        validMsg = $("#valid-msg"),
        errorMsgb = $("#error-msg-b"),
        validMsgb = $("#valid-msg-b");
    var reset = function () {
        telInput.removeClass("error");
        telInputb.removeClass("error");
        errorMsg.addClass("hide");
        errorMsgb.addClass("hide");
        validMsg.addClass("hide");
        validMsgb.addClass("hide");
    };
    telInput.intlTelInput({
        onlyCountries: ["ru"],
        utilsScript: "js/utils.js"
    });
    telInputb.intlTelInput({
        onlyCountries: ["ru"],
        utilsScript: "js/utils.js"
    });
    telInput.blur(function () {
        reset();
        if ($.trim(telInput.val())) {
            if (telInput.intlTelInput("isValidNumber")) {
                validMsg.removeClass("hide");
            } else {
                telInput.addClass("error");
                errorMsg.removeClass("hide");
            }
        }
    });
    telInputb.blur(function () {
        reset();
        if ($.trim(telInputb.val())) {
            if (telInputb.intlTelInput("isValidNumber")) {
                validMsgb.removeClass("hide");
            } else {
                telInput.addClass("error");
                errorMsgb.removeClass("hide");
            }
        }
    });
    telInput.on("keyup change", reset);
    telInputb.on("keyup change", reset);

    $("#ajaxform-a").click(function () {
        var form = $("#ajaxform");
        var error = false;
        if (!error) {
            var data = form.serialize();
            $.ajax({
                type: 'POST',
                url: 'mail.php',
                dataType: 'json',
                data: data,
                success: function (data) {
                    if (data['error']) {
                        alert(data['error']);
                    } else {
                        $('#thanks').foundation('open');
                        var form1_input1 = form.find("input");
                        form1_input1.value = "";
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    });
    $("#ajaxform-b-a").click(function () {
        var form = $("#ajaxform-b");
        var error = false;
        if (!error) {
            var data = form.serialize();
            $.ajax({
                type: 'POST',
                url: 'mail.php',
                dataType: 'json',
                data: data,
                success: function (data) {
                    if (data['error']) {
                        alert(data['error']);
                    } else {
                        $('#thanks').foundation('open');
                        var form1_input1 = form.find("input");
                        form1_input1.value = "";
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    });
});