"use strict";
function floatchart() {
  $("#tableState").DataTable({
    ajax: {
      url: BACKENDURL + "state",
      dataSrc: "data",
      headers: { Accept: "*/*" },
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "states_name",
      },
      {
        data: "id",
      },
    ],
    columnDefs: [
      {
        targets: 2,
        render: function (data, type, full, meta) {
          return `<ul class="list-inline mb-0 text-end">
              <li class="list-inline-item"><a onclick=edit(this) data-id="${data}" data-item="${full.states_name}" class="avtar avtar-s btn-link-success btn-pc-default"><i class="ti ti-edit f-20"></i></a></li>
              <li class="list-inline-item"><a onclick=deleteID(${data}) class="avtar avtar-s btn-link-danger btn-pc-default"><i class="ti ti-trash f-20"></i></a></li>
              </ul>`;
        },
      },
    ],
  });
}
document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    floatchart();
  }, 500);
});

var stateForm = document.getElementById("stateForm");

stateForm.addEventListener("submit", (e) => {
  e.preventDefault();
  var idField = document.getElementById("idField"),
    stateNameField = document.getElementById("stateNameField");
  if (idField.value > 0) {
    const requestOptions = {
      method: "PUT",
      body: `id=${idField.value}&name=${stateNameField.value}`,
      headers: {
        Accept: "*/*",
        "Content-Type": "application/x-www-form-urlencoded",
      },
    };

    fetch(BACKENDURL + "state", requestOptions)
      .then((response) => response.text())
      .then((result) => checkResponse(result, "close"))
      .catch((error) => Swal.fire({ icon: "error", title: "Error! " + error }));
  } else {
    const formdata = new FormData(stateForm);
    const requestOptions = {
      method: "POST",
      body: formdata,
    };

    fetch(BACKENDURL + "state", requestOptions)
      .then((response) => response.text())
      .then((result) => checkResponse(result, "close"))
      .catch((error) => Swal.fire({ icon: "error", title: "Error! " + error }));
  }
});

function openStateModal() {
  document.getElementById("stateNameField").value = "";
  document.getElementById("idField").value = "";
  $("#stateModal").modal("toggle");
}

function edit(values) {
  openStateModal();
  var itemID = values.dataset.id;
  var itemValue = values.dataset.item;
  document.getElementById("stateNameField").value = itemValue;
  document.getElementById("idField").value = itemID;
}

function deleteID(id) {
  const t = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger",
    },
    buttonsStyling: !1,
  });
  t.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: !0,
  }).then((e) => {
    e.isConfirmed
      ? deleteReq(id, t)
      : e.dismiss === Swal.DismissReason.cancel &&
        t.fire("Cancelled", "", "warning");
  });
}

function deleteReq(id, t) {
  const requestOptions = {
    method: "DELETE",
    body: `id=${id}`,
    headers: {
      Accept: "*/*",
      "Content-Type": "application/x-www-form-urlencoded",
    },
  };

  fetch(BACKENDURL + "state", requestOptions)
    .then((response) => response.text())
    .then((result) => reponseHead(result, t))
    .catch((error) => Swal.fire({ icon: "error", title: "Error! " + error }));
}

function reponseHead(result, t) {
  var response = JSON.parse(result);
  response.statusCode == 3
    ? (t.fire("Deleted!", "Your file has been deleted.", "success"),
      window.location.reload())
    : Swal.fire({ icon: "warning", title: response.error });
}
