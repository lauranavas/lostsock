(function () {
    var burger = document.querySelector(".menu-toggle"),
        nav = document.querySelector(".navegation"),
        overlay = document.querySelector(".overlay"),
        close = document.querySelector(".close");

    burger.onclick = function () {
        nav.classList.toggle("menu-opened");
        overlay.classList.toggle("menu-opened");
    };

    close.onclick = function () {
        nav.classList.toggle("menu-opened");
        overlay.classList.toggle("menu-opened");
    };

    document.addEventListener("click", function (event) {
        var isClickInside = nav.contains(event.target);
        var isClickInMenu = burger.contains(event.target);

        if ((!isClickInside && !isClickInMenu) && nav.classList.contains("menu-opened")) {
            nav.classList.remove("menu-opened");
            overlay.classList.toggle("menu-opened");
        }
    });
})();

/**
 * Efecto en el input
 */
const inputs = document.querySelectorAll('.input');

function focusFunc() {
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}

function blurFunc() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove('focus');
    }
}

inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
});

/**nuevo */
$(document).ready(function () {
    $("#myCarousel").on("slide.bs.carousel", function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 3;
        var totalItems = $(".carousel-item").length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $(".carousel-item")
                        .eq(i)
                        .appendTo(".carousel-inner");
                } else {
                    $(".carousel-item")
                        .eq(0)
                        .appendTo($(this).find(".carousel-inner"));
                }
            }
        }
    });
});

$(document).ready(function () {
    $(".owl-carousel").owlCarousel();
});

$('.owl-carousel').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
})




