$(document).ready(function () {

    $(".navbar-burger").click(function () {
        $("body").toggleClass("stop-scroll");
        $(".navbar-burger").toggleClass("is-active");
        $(".menu-mobile").toggleClass("open");
        $(".navmenu").toggleClass("open");
    });

    $("#contactForm").submit(function (event) {
        event.preventDefault();
        console.log("clicked")
        const formData = new FormData(this);

        $.ajax({
            url: "contact.php",
            type: "post",
            data: formData,
            contentType: false,
            cache: false,
            processData: false
        }).done(function (response) {
            $("#errorMsg").html(response);
            console.log(response);
        })
    })

});

// function PageTransition() {
//     var tl = gsap.timeline();

//     tl.to('.overlay-transition', { duration: .5, scaleY: 1, transformOrigin: "top center", stagger: .2 })
//     tl.to('.overlay-transition', { duration: .5, scaleY: 0, transformOrigin: "top center", stagger: .1, delay: .1 })
// }

// function contentAnimation() {
//     var tl = gsap.timeline();

//     tl.from('.hero-body', { duration: 1.5, translateY: 50, opacity: 0 })
// }

// function delay(n) {
//     n = n || 2000;

//     return new Promise(done => {
//         setTimeout(() => {
//             done()
//         }, n);
//     })
// }

// barba.init({

//     sync: true,

//     transitions: [{
//         async leave(data) {
//             const done = this.async();

//             PageTransition();
//             await delay(1500);
//             done()
//         },

//         async enter(data) {
//             contentAnimation()
//         },

//         async once(data) {
//             contentAnimation()
//         }
//     }]
// })

