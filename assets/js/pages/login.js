"use strict";

var loginForm = document.getElementById("loginFrm");

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();
  const formdata = new FormData(loginForm);
  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  fetch(BACKENDURL + "login", requestOptions)
    .then((response) => response.text())
    .then((result) => checkResponse(result, open))
    .catch((error) => Swal.fire({ icon: "error", title: "Error! " + error }));
});
