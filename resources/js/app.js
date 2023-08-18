import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




// document.addEventListener('DOMContentLoaded', function () {
//     const createUser = document.querySelector('#createUser');
//     const modal = document.querySelector('[data-modal]');
    


//     if(createUser.value == "") {
//         modal.showModal()
//     }

//     modal.addEventListener('keydown', function(event) {
//         if(event.key == "Escape") {
//             event.preventDefault();
//         }
//     })
// })

// let myTitle = document.getElementById("my-title");
// console.log("my title", myTitle);

// $(document).ready(function() {
//   $('#show-input').click(function(e) {
//     e.preventDefault();
//     $('#show-info, #registration-input').removeClass("hidden").hide().fadeIn(1000);
//   });
// });


// DIALOG LOGIC

// const openModal = document.querySelector("[data-open-modal]");
// const modal = document.querySelector("[data-modal]");
// const messageIcon = document.querySelector(".hero-form-input-info");
// const message = document.querySelector(".hero-input-message");
// const email = document.querySelector('#email');
// const form = document.querySelector(".hero-modal-form")

// const pulse = document.querySelector("#pulse")
// const shake = document.querySelector("#shake")

// let isfirstClick = true;
// let count = 0;


// function sendEmail() {
//     // Make an AJAX request to submit the form data
//     console.log("form action", form.action, form.method, new FormData(form))
//     fetch(form.action, {
//         method: form.method,
//         body: new FormData(form)
//     })
//     .then(function(response) {
//       return response.json();
//     })
//     .then(function(data) {
//         // console.log("dataaaa", data, data.hasOwnProperty('errors'));
//         let errorHtml = "";
//         // Check for errors in the response
//         if (data.hasOwnProperty('errors')) {
//           for (let key in data.errors) {
//             errorHtml = data.errors[key][0]
//           }
//           console.log(errorHtml)

//           // user already has a login

//           if(errorHtml == "The email has already been taken.") {
//             const loginUrl = document.querySelector('#redirect-container').dataset.loginUrl
//             window.location.href = loginUrl
//           }

//           message.style.display = "block"
//           message.innerHTML = errorHtml;
  
//           pulse.removeAttribute("id")
//           shake.removeAttribute("id")
          
//           messageIcon.style.opacity = ".5"
//           messageIcon.style.pointerEvents = "none";
//         } else {
//             // console.log("data", data.message);
//             const emailSentMessage = document.createElement('p')
//             emailSentMessage.id = "email-sent-message";
//             emailSentMessage.textContent = data.message
  
//             const parent = openModal.parentNode
//             parent.replaceChild(emailSentMessage, openModal)
//             modal.close(); // Close the modal if there are no errors
//         }
//     })
//     .catch(function(error) {
//         console.log('An error occurred while submitting the form.');
//         console.log(error);
//     });
// }

// form.addEventListener("submit", function(e) {
//   e.preventDefault()
//   sendEmail()
// })

// form.addEventListener("keydown", function(e) {
//   if(e.key == "Enter") {
//     e.preventDefault()
//     sendEmail()
//   }
// })


// email.addEventListener("click", function() {
//   count++;
//   message.style.display = "none";
// })

// messageIcon.addEventListener("click", function() {
//   if (count === 1 && isfirstClick || !isfirstClick) {
//     message.style.display = (message.style.display === "none") ? "block" : "none";
//   }
//   isfirstClick = false
//   message.classList.toggle("hero-input-message");
// });

// openModal.addEventListener("click", function() {
//   modal.showModal();
// })


// modal.addEventListener("click", function(e) {
//   const modalDimensions = modal.getBoundingClientRect();

//   if(
//     e.clientX < modalDimensions.left ||
//     e.clientX > modalDimensions.right ||
//     e.clientY < modalDimensions.top ||
//     e.clientY > modalDimensions.bottom
//   ) {
//     modal.close();
//   }
// });



// register journey logic

// var tooltip = document.getElementById('tooltip');
// var emailInput = document.getElementById('email');
// var tooltipTimeout;

// tooltip.addEventListener('click', function() {
//     tooltip.classList.remove('active');
// });


// document.getElementById("register-btn").addEventListener("click", function() {
//   document.querySelector("#enter-email").style.display = "block";
// });


// document.getElementById('email').addEventListener('focus', function() {
//   document.querySelector('.tooltip').style.display = 'block';
// });

// document.getElementById('email').addEventListener('blur', function() {
//   document.querySelector('.tooltip').style.display = 'none';
// });

// document.getElementById("send-email").addEventListener("click", function() {
//   let emailValue = emailInput.value
//   const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

//   console.log(emailValue)


//   fetch('/send-email', {
//     method: "POST",
//     headers: {
//       'Content-Type': 'application/json',
//       'X-CSRF-TOKEN': csrfToken 
//     },
//     body: JSON.stringify({email: emailValue})

//   }).then(function(response) {
//     // console.log("response", response)
//     if(response.ok) {
//       // successful message
//       console.log(response)
//       alert("success")
//     } else {
//       // failes message
//       alert("fail")
//       console.log("response", response)
//     }

//   }).catch(function(error) {
//     console.error("Email:", error)
//   })

// });