function stickyHeader() {
    if ($(".header").length) {
        100 < $(window).scrollTop() ? ($(".header").removeClass("fadeIn animated"), $(".header").addClass("stricky-fixed fadeInDown animated")) : $(this).scrollTop() <= 100 && ($(".header").removeClass("stricky-fixed fadeInDown animated"), $(".header").addClass("slideIn animated"))
    }
}

function mobiletNavToggler() {
    $(".navigation").length && ($(".navigation .navbar button").on("click", function () {
        return $(".navigation .menu").slideToggle(), !1
    }), $(".navigation .cs-submenu").children("a").append(function () {
        return '<button class="dropdown-expander"><i class="fa fa-chevron-down"></i></button>'
    }), $(".navigation .menu .dropdown-expander").on("click", function () {
        return $(this).parent().parent().children(".cs-dropdown").slideToggle(), console.log($(this).parents("li")), !1
    }))
}
jQuery(window).on("scroll", function () {
    jQuery,
    stickyHeader()
}), jQuery(document).on("ready", function () {
    jQuery,
    mobiletNavToggler()
});
(function ($) {
    $('#home_slider').nivoSlider({
        effect: 'random',
        slices: 15,
        boxCols: 8,
        boxRows: 4,
        animSpeed: 500,
        pauseTime: 4000,
        startSlide: 0,
        directionNav: true,
        controlNavThumbs: false,
        pauseOnHover: true,
        manualAdvance: false
    });
})(jQuery);
var owl = $("#service_item");
owl.owlCarousel({
    items: 4,
    itemsDesktop: [1000, 4],
    itemsDesktopSmall: [991, 4],
    itemsTablet: [767, 3],
    itemsMobile: [480, 1],
    pagination: false,
    navigation: true,
    navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    autoPlay: true
});
var owl = $(".testimonials");
owl.owlCarousel({
    items: 1,
    itemsDesktop: [1e3, 1],
    itemsDesktopSmall: [991, 1],
    itemsTablet: [767, 1],
    itemsMobile: [480, 1],
    pagination: !1,
    autoPlay: !0
}), wow = new WOW({
    animateClass: "animated",
    offset: 100,
    mobile: !1
}), wow.init(), $(window).on("scroll", function () {
    100 < $(this).scrollTop() ? $("#scroll-up").fadeIn() : $("#scroll-up").fadeOut()
}), $("#scroll-up").on("click", function () {
    return $("html, body").animate({
        scrollTop: 0
    }, 600), !1
});

jQuery(document).ready(function (a) {
    a("#request_call").validate({
        rules: {
            name: "required",
            comment: "required",
            country: "required",
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                number: true,
                minlength: 10,
            }
        },
        messages: {
            name: "Please enter your name",
            message: "Please enter message",
            email: "Please enter your email address",
            location: "Please enter your location",
            country: "Please select your country",
            mobile: {
                required: "Please enter your mobile no.",
                number: "Mobile No. contains only numbers",
                minlength: "Your Mobile No. must be at least 10 characters long",
            }
        },
    })
    a("#quick_contact").validate({
        rules: {
            name: "required",
            comment: "required",
            country: "required",
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                number: true,
                minlength: 10,
            }
        },
        messages: {
            name: "Please enter your name",
            message: "Please enter message",
            email: "Please enter your email address",
            location: "Please enter your location",
            country: "Please select your country",
            mobile: {
                required: "Please enter your mobile no.",
                number: "Mobile No. contains only numbers",
                minlength: "Your Mobile No. must be at least 10 characters long",
            }
        },
    })
    a("#enqure_form").validate({
        rules: {
            name: "required",
            comment: "required",
            country: "required",
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                number: true,
                minlength: 10,
            }
        },
        messages: {
            name: "Please enter your name",
            message: "Please enter message",
            email: "Please enter your email address",
            location: "Please enter your location",
            country: "Please select your country",
            mobile: {
                required: "Please enter your mobile no.",
                number: "Mobile No. contains only numbers",
                minlength: "Your Mobile No. must be at least 10 characters long",
            }
        },
    })
});

var placeSearch, autocomplete, autocomplete1;
var componentForm = {
    street_number: "short_name",
    route: "long_name",
    locality: "long_name",
    administrative_area_level_1: "short_name",
    country: "long_name",
    postal_code: "short_name"
};

function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete((document.getElementById("autocomplete")), {
        types: ["geocode"]
    });
    autocomplete1 = new google.maps.places.Autocomplete((document.getElementById("autocomplete1")), {
        types: ["geocode"]
    });
    autocomplete.addListener("place_changed", fillInAddress)
}

function fillInAddress() {
    var a = autocomplete.getPlace();
    for (var c in componentForm) {
        document.getElementById(c).value = "";
        document.getElementById(c).disabled = false
    }
    for (var d = 0; d < a.address_components.length; d++) {
        var b = a.address_components[d].types[0];
        if (componentForm[b]) {
            var e = a.address_components[d][componentForm[b]];
            document.getElementById(b).value = e
        }
    }
}

function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (b) {
            var a = {
                lat: b.coords.latitude,
                lng: b.coords.longitude
            };
            var c = new google.maps.Circle({
                center: a,
                radius: b.coords.accuracy
            });
            autocomplete.setBounds(c.getBounds())
        })
    }
};
$('.fancybox').fancybox();