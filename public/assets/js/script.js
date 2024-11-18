// Sidebar
const menuToggle = document.getElementById("menuToggle");
const sidebar = document.getElementById("sidebar");
const mainContent = document.querySelector("main"); // Ajuste se necessário
const menuPullToggle = document.querySelector("#menuPullToggle");
const menuPullToggleArrowLeft = document.querySelector(
  "#menuPullToggle .fa-chevron-left"
);
const menuPullToggleArrowRight = document.querySelector(
  "#menuPullToggle .fa-chevron-right"
);

// Alternar a visibilidade do sidebar
menuToggle.addEventListener("click", () => {
  menuPullToggleArrowLeft.classList.toggle("d-none");
  menuPullToggleArrowRight.classList.toggle("d-none");
  sidebar.classList.toggle("show");
});

menuPullToggle.addEventListener("click", () => {
  menuPullToggleArrowLeft.classList.toggle("d-none");
  menuPullToggleArrowRight.classList.toggle("d-none");
  sidebar.classList.toggle("show");
});

document.addEventListener("DOMContentLoaded", () => {
  const sidebarItems = document.querySelectorAll("#sidebar ul li");
  const currentPath = window.location.pathname; // Obtém o caminho base da URL (ex.: "/dashboard")

  sidebarItems.forEach((item) => {
    // Verifica se o texto do item corresponde ao nome da página atual
    const itemPath = item.textContent.trim().toLowerCase(); // Ex.: "dashboard"
    if (currentPath.includes(itemPath)) {
      item.classList.add("active");
    }
  });
});

// Ajustar o conteúdo principal conforme o estado do sidebar (opcional)
// sidebar.addEventListener("transitionend", () => {
//   if (sidebar.classList.contains("show")) {
//     mainContent.style.marginLeft = "260px";
//   } else {
//     mainContent.style.marginLeft = "0";
//   }
// });

if (document.getElementById("heroVideo") != null) {
  // Sincronizar o desaparecimento do vídeo e a aparecimento da logo
  setTimeout(() => {
    const video = document.getElementById("heroVideo");
    const content = document.getElementById("content");

    // Esmaecer o vídeo
    video.style.transition = "opacity 1.5s";
    video.style.opacity = "0";

    // Simultaneamente, mostrar o conteúdo
    content.style.opacity = "1";

    // Após a transição, remover o vídeo
    setTimeout(() => {
      video.style.display = "none";
    }, 1500); // Tempo suficiente para o vídeo sumir
  }, 5000); // Espera de 5 segundos antes de começar as animações
}

function acceptCookies() {
  var banner = document.getElementById("cookie-banner");
  banner.classList.remove("show");
  banner.classList.add("hide");
  setCookie("cookieConsent", "accepted", 365);
  setTimeout(function () {
    banner.style.display = "none";
  }, 500);
}

// Função para definir um cookie
function setCookie(name, value, days) {
  var expires = "";
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Função para obter um cookie
function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

// Validação do formulário e exibição do spinner ao enviar
(function () {
  "use strict";

  var forms = document.querySelectorAll(".needs-validation");

  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          document.querySelector("#form").classList.add("visually-hidden");
          document
            .querySelector("#spinner")
            .classList.remove("visually-hidden");
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();
