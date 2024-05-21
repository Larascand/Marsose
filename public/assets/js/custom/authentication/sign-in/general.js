// "use strict";

// var KTSigninGeneral = function() {
//     var e, t, i;

//     return {
//         init: function() {
//             e = document.querySelector("#kt_sign_in_form");
//             t = document.querySelector("#kt_sign_in_submit");
//             i = FormValidation.formValidation(e, {
//                 fields: {
//                     username: {
//                         validators: {
//                             regexp: {
//                                 message: "The value is not a valid username"
//                             },
//                             notEmpty: {
//                                 message: "Username is required"
//                             }
//                         }
//                     },
//                     password: {
//                         validators: {
//                             notEmpty: {
//                                 message: "The password is required"
//                             }
//                         }
//                     }
//                 },
//                 plugins: {
//                     trigger: new FormValidation.plugins.Trigger(),
//                     bootstrap: new FormValidation.plugins.Bootstrap5({
//                         rowSelector: ".fv-row",
//                         eleInvalidClass: "",
//                         eleValidClass: ""
//                     })
//                 }
//             });

//             t.addEventListener("click", function(n) {
//                 n.preventDefault();
//                 i.validate().then(function(i) {
//                     if (i === "Valid") {
//                         t.setAttribute("data-kt-indicator", "on");
//                         t.disabled = true;
//                         setTimeout(function() {
//                             t.removeAttribute("data-kt-indicator");
//                             t.disabled = false;
//                             Swal.fire({
//                                 text: "You have successfully logged in!",
//                                 icon: "success",
//                                 buttonsStyling: false,
//                                 confirmButtonText: "Ok, got it!",
//                                 customClass: {
//                                     confirmButton: "btn btn-primary"
//                                 }
//                             }).then(function(t) {
//                                 if (t.isConfirmed) {
//                                     e.querySelector('[name="username"]').value = "";
//                                     e.querySelector('[name="password"]').value = "";
//                                     var i = e.getAttribute("data-kt-redirect-url");
//                                     if (i) {
//                                         location.href = i;
//                                     }
//                                 }
//                             });
//                         }, 2000);
//                     } else {
//                         Swal.fire({
//                             text: "Sorry, looks like there are some errors detected, please try again.",
//                             icon: "error",
//                             buttonsStyling: false,
//                             confirmButtonText: "Ok, got it!",
//                             customClass: {
//                                 confirmButton: "btn btn-primary"
//                             }
//                         });
//                     }
//                 });
//             });
//         }
//     };
// }();

// KTUtil.onDOMContentLoaded(function() {
//     KTSigninGeneral.init();
// });
