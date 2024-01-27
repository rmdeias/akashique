var logo = document.getElementById("akashiques-medium-guidance-energeticienne-banner");
var nav = document.getElementById("akashiques-medium-guidance-energeticienne-navDesktop1");
var main = document.getElementsByTagName("main");
const isFirefox = typeof InstallTrigger !== 'undefined';

// When the user scrolls down from the top of the document logohidden and navabar fix to the top
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {

    if (window.screen.width >= 768) {

        nav.classList.remove("sticky");

        logo.style.display = "block";

        main[0].classList.remove("marginTopMain");

        if (document.body.scrollTop >= logo.offsetHeight || document.documentElement.scrollTop >= logo.offsetHeight) {

            logo.style.display = "none";
            nav.classList.add("sticky");
            main[0].classList.add("marginTopMain");
        }

    }
}

//fix anchoring offset with nav
$(document).ready(function () {


    $('#akashiques-medium-guidance-energeticienne-navDesktop li').click(function () {

        var link = $(this).children().attr('href')
       // if (!$('#akashiques-medium-guidance-energeticienne-navDesktop1').hasClass("sticky")) {
           // $('html,body').animate({scrollTop: $(link).offset().top + -50}, 'slow');
        //} else {
            $('html,body').animate({scrollTop: $(link).offset().top - 50}, 'slow');
        //}

    });


    //for hide or show #akashiques-medium-guidance-energeticienne-navDesktop2
    $("#prestationNav").mouseover(function () {
            $("#akashiques-medium-guidance-energeticienne-navDesktop2").css({"display": "flex"});
        }
    );
    $(".navLinks").mouseover(function () {
            $("#akashiques-medium-guidance-energeticienne-navDesktop2").css("display", "none");

        }
    );
    $("main").mouseover(function () {
            $("#akashiques-medium-guidance-energeticienne-navDesktop2").css("display", "none");

        }
    );

})



