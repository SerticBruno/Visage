// gsap.config({
//   nullTargetWarn: false,
// });
// /**************************** CARD ANIMATIONS ********************************/

// var animatePropertyCards = gsap.utils.toArray(".card-property");
// var animatePostCards = gsap.utils.toArray(".card-post");

// gsap.set(animatePostCards, {
//   y: 50,
// });
// gsap.set(animatePropertyCards, {
//   y: 50,
// });

// var options = {
//   root: null,
//   // threshold: animationDelay, // animationDelay - declared in footer.php
//   rootMargin: "0px",
// };

// function slideUp(targets) {
//   gsap.to(targets, {
//     y: 0,
//     duration: 1,
//     scrollTrigger: targets,
//     stagger: 0.2,
//     ease: Power2.easeInOut,
//   });

//   targets.forEach((target) => {
//     target.classList.add("animated");
//   });
// }

// var slideUpObs = new IntersectionObserver(function (entries, observer) {
//   var targets = [];
//   entries.forEach((entry) => {
//     if (entry.isIntersecting) {
//       targets.push(entry.target);
//       slideUpObs.unobserve(entry.target);
//     }
//   });
//   slideUp(targets);
// }, options);

// animatePropertyCards.forEach((card) => {
//   slideUpObs.observe(card);
// });
// animatePostCards.forEach((card) => {
//   slideUpObs.observe(card);
// });

// /**************************** CARD ANIMATIONS END ********************************/

// /**************************** PROPERTY ANIMATION *********************************/

// var animateLines = gsap.utils.toArray(".animated-line");

// function expandRight(targets) {
//   gsap.to(targets, {
//     width: "80px",
//     duration: 1,
//     scrollTrigger: targets,
//     stagger: 0.3,
//     ease: Power2.easeInOut,
//   });
// }

// var expandObs = new IntersectionObserver(function (entries, observer) {
//   var targets = [];
//   entries.forEach((entry) => {
//     if (entry.isIntersecting) {
//       targets.push(entry.target);
//       expandObs.unobserve(entry.target);
//     }
//   });
//   expandRight(targets);
// }, options);

// animateLines.forEach((card) => {
//   expandObs.observe(card);
// });

// /**************************** PROPERTY ANIMATION END *****************************/

// /****************************CIRCLE ANIMATION ************************************/

// var animateCircles = gsap.utils.toArray(".scaleUp");

// function scaleUp(targets) {
//   gsap.to(targets, {
//     scale: 1.35,
//     duration: 1,
//     scrollTrigger: targets,
//     stagger: 0.3,
//     ease: Power2.easeInOut,
//   });
// }

// var scaleObs = new IntersectionObserver(function (entries, observer) {
//   var targets = [];
//   entries.forEach((entry) => {
//     if (entry.isIntersecting) {
//       targets.push(entry.target);
//       expandObs.unobserve(entry.target);
//     }
//   });
//   scaleUp(targets);
// }, options);

// animateCircles.forEach((circle) => {
//   scaleObs.observe(circle);
// });

// /****************************CIRCLE ANIMATION END************************************/

// /****************************CARD ANIMATION TO SIDE ************************************/

// // var animateCardIcons = gsap.utils.toArray('.card-icon');

// // gsap.set(animateCardIcons, {
// //     x: -40,
// // });

// // var options = {
// //     root: null,
// //     threshold: animationDelay, // animationDelay - declared in footer.php
// //     rootMargin: "0px"
// // }

// // function slideRight(targets) {
// //     gsap.to(targets, {
// //         x: 0,
// //         duration: 1,
// //         scrollTrigger: targets,
// //         stagger: 0.2,
// //         ease: Power2.easeInOut,
// //     });

// //     targets.forEach(target => {
// //         target.classList.add("animated");
// //     });
// // }

// // var slideRightObs = new IntersectionObserver(function(entries, observer) {
// //     var targets = [];
// //     entries.forEach(entry => {
// //         if(entry.isIntersecting) {
// //             targets.push(entry.target)
// //             slideRightObs.unobserve(entry.target)
// //         }
// //     });
// //     slideRight(targets);
// // }, options);

// // animateCardIcons.forEach(card => {
// //     slideRightObs.observe(card);
// // });
