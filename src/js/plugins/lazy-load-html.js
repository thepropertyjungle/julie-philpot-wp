/*
    ATTENTION
    =========
    This plugin allows the lazy loading of HTML elements.
    All you need to do is apply the class of 'lazy-load-html'
    to any element you wish to lazy load.

    You can enable and disable debugging by setting tpj_debugging
    to true.

    You can also change the negative pixel threshold to make elements
    appear on scroll sooner or later.
*/

(function ($) {
    var tpj_debugging = true; // Set to 'true' to enable debugging, 'false' to disable
    var tpj_pixelThreshold = -250; // Pixel distance from the bottom of the viewport

    $(document).ready(function () {
        $(window).on("scroll", function () {
            $(".lazy-load-html").each(function () {
                if (
                    !$(this).hasClass("loaded") &&
                    isElementNearViewportBottom($(this), tpj_pixelThreshold)
                ) {
                    $(this).addClass("loaded");
                }
            });

            if (tpj_debugging) {
                updateElementStatus();
            }
        });
    });



    document.addEventListener('DOMContentLoaded', function() {
        // Check if the page contains the .row-search element
        if (document.querySelector('.row-search')) {
            // Add the elementor-sticky--effects class to the .main-nav element
            document.querySelector('.main-nav').classList.add('elementor-sticky--effects');
        }
    });


    // Function to add the class if .row-search is present
function addStickyEffects() {
    if (document.querySelector('.row-search')) {
        document.querySelector('.main-nav').classList.add('elementor-sticky--effects');
    }
}

//change height of description on property single
document.addEventListener('DOMContentLoaded', function() {
    const description = document.querySelector('.description');
    const readButton = document.querySelector('.read');

    readButton.addEventListener('click', function() {
      description.classList.toggle('height');
    });
  });


  $(document).ready(function(){
    $('.slider').slick({
      // Add your Slick options here
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      responsive: [
        {
          breakpoint: 767, // Adjust the breakpoint as needed
          settings: {
            slidesToShow: 1 // Change slidesToShow to 1 on mobile devices
          }
        }
      ]
    });
});








// Function to check if .elementor-sticky--effects is removed and add it back if necessary
function checkStickyEffectsRemoval(mutationsList) {
    for (let mutation of mutationsList) {
        if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
            if (!mutation.target.classList.contains('elementor-sticky--effects')) {
                addStickyEffects();
            }
        }
    }
}

// Create a MutationObserver instance
var observer = new MutationObserver(checkStickyEffectsRemoval);

// Select the target node
var targetNode = document.querySelector('.main-nav');

// Configuration of the MutationObserver
var config = { attributes: true, attributeFilter: ['class'] };

// Start observing the target node for attribute changes
observer.observe(targetNode, config);

    


 



    // The browser viewport is set from the bottom.
    function isElementNearViewportBottom(el, distanceFromViewportBottom) {
        var rect = el.get(0).getBoundingClientRect();
        var windowHeight =
            window.innerHeight || document.documentElement.clientHeight;

        return (
            rect.top <= windowHeight + distanceFromViewportBottom &&
            rect.bottom > windowHeight
        );
    }

    // Debugging code will add borders around your elements
    function updateElementStatus() {
        $(".lazy-load-html").each(function () {
            var rect = $(this).get(0).getBoundingClientRect();
            var windowHeight =
                window.innerHeight || document.documentElement.clientHeight;

            // Remove any previously set styles
            $(this).removeAttr("style");

            if (rect.bottom < 0 || rect.top > windowHeight) {
                $(this).css({ border: "2px solid red" }); // Style for elements outside the viewport
            } else if (
                isElementNearViewportBottom($(this), tpj_pixelThreshold)
            ) {
                $(this).css({ border: "2px solid green" }); // Style for elements inside the viewport
            } else {
                $(this).css({ border: "2px solid orange" }); // Style for elements near the viewport
            }
        });
    }
})(jQuery);
