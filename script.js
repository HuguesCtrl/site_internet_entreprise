//Accordéons
var acc = document.getElementsByClassName("accordion");
for (var i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

// Header responsive
function toggleMenu() {
  var navLinks = document.getElementById("nav-links");
  navLinks.classList.toggle("active");
}

// Get modal element
var modal = document.getElementById("myModal");

// Get open modal button
var openModalBtn = document.getElementById("openModalBtn");

// Get close button
var closeModalBtn = document.getElementById("closeModalBtn");

// When the user clicks on the button, open the modal
openModalBtn.onclick = function () {
  modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
closeModalBtn.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

// script.js formulaire
// function sendMail() {
//   let params = {
//     name: document.getElementById("name").value,
//     email: document.getElementById("email").value,
//     message: document.getElementById("message").value,
//   };
//   emailjs
//     .send("service_ehvwy7q", "template_yxn8b4d", params)
//     .then((res) => {
//       document.getElementById("name").value = "";
//       document.getElementById("email").value = "";
//       document.getElementById("message").value = "";

//       console.log(res);
//     })
//     .then(() => {
//       document.getElementById("feedback").classList.remove("hidden");
//       setTimeout(function () {
//         document.getElementById("feedback").classList.add("hidden");
//       }, 2000);
//     })
//     .catch((err) => console.log(err));
// }

// document
//   .getElementById("contact-form")
//   .addEventListener("submit", function (event) {
//     event.preventDefault(); // Empêche le rechargement de la page
//     // Récupérer les valeurs des champs
//     const name = document.getElementById("name").value;
//     const email = document.getElementById("email").value;
//     const message = document.getElementById("message").value;

//     // Validation simple des champs
//     if (name === "" || email === "" || message === "") {
//       alert("Veuillez remplir tous les champs");
//       return;
//     }
//     document.getElementById("feedback").classList.remove("hidden");
//     setTimeout(function () {
//       document.getElementById("feedback").classList.add("hidden");
//     }, 2000);
//     document.getElementById("contact-form").reset();
//   });
