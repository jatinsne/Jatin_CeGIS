"use strict";

var typeField = new Choices("#typeField", {
  searchEnabled: 0,
});

var statusField = new Choices("#statusField", {
  searchEnabled: 0,
});

var tehsilSelect = new Choices("#blockid", {
  removeItemButton: true,
  searchPlaceholderValue: "Search Block",
});
tehsilSelect.setChoices(function (callback) {
  return fetch(BACKENDURL + "block")
    .then(function (res) {
      return res.json();
    })
    .then(function (data) {
      return data.data.map(function (data) {
        return {
          label: `${data.block_name} / ${data.tehsil_name} / ${data.district_name} / ${data.states_name}`,
          value: data.id,
        };
      });
    });
});

function floatchart() {
  $("#tableState").DataTable({
    ajax: {
      url: BACKENDURL + "school",
      dataSrc: "data",
      headers: { Accept: "*/*" },
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "name",
      },
      {
        data: "udise_id",
      },
      {
        data: "type",
      },
      {
        data: "block_name",
      },
      {
        data: "tehsil_name",
      },
      {
        data: "district_name",
      },
      {
        data: "states_name",
      },
      {
        data: "status",
        render: function (data, type) {
          return getStatus(data);
        },
      },
      {
        data: "id",
      },
    ],
    columnDefs: [
      {
        targets: 9,
        render: function (data, type, full, meta) {
          return `<ul class="list-inline mb-0 text-end">
              <li class="list-inline-item"><a onclick=edit(this) data-udise="${full.udise_id}" data-id="${data}" data-tehsilid="${full.block_id}" data-item="${full.name}" data-type="${full.type}" data-status="${full.status}" class="avtar avtar-s btn-link-success btn-pc-default"><i class="ti ti-edit f-20"></i></a></li>
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

function getStatus(status) {
  if (status == 1) {
    return '<span class="badge text-bg-success">Active</span>';
  } else {
    return '<span class="badge text-bg-danger">Deactive</span>';
  }
}

var stateForm = document.getElementById("stateForm");

stateForm.addEventListener("submit", (e) => {
  e.preventDefault();
  var idField = document.getElementById("idField"),
    stateNameField = document.getElementById("stateNameField"),
    typeField = document.getElementById("typeField"),
    statusField = document.getElementById("statusField"),
    udiseidField = document.getElementById("udiseid"),
    blockidField = document.getElementById("blockid");
  if (idField.value > 0) {
    const requestOptions = {
      method: "PUT",
      body: `id=${idField.value}&name=${stateNameField.value}&udise=${udiseidField.value}&blockid=${blockidField.value}&type=${typeField.value}&status=${statusField.value}`,
      headers: {
        Accept: "*/*",
        "Content-Type": "application/x-www-form-urlencoded",
      },
    };

    fetch(BACKENDURL + "school", requestOptions)
      .then((response) => response.text())
      .then((result) => checkResponse(result, "close"))
      .catch((error) => Swal.fire({ icon: "error", title: "Error! " + error }));
  } else {
    const formdata = new FormData(stateForm);
    const requestOptions = {
      method: "POST",
      body: formdata,
    };

    fetch(BACKENDURL + "school", requestOptions)
      .then((response) => response.text())
      .then((result) => checkResponse(result, "close"))
      .catch((error) => Swal.fire({ icon: "error", title: "Error! " + error }));
  }
});

function openStateModal() {
  document.getElementById("stateNameField").value = "";
  document.getElementById("idField").value = "";
  document.getElementById("udiseid").value = "";
  tehsilSelect.removeActiveItems();
  typeField.removeActiveItems();
  statusField.removeActiveItems();
  $("#stateModal").modal("toggle");
}

function edit(values) {
  openStateModal();
  var itemID = values.dataset.id,
    itemValue = values.dataset.item,
    tehsilValue = values.dataset.tehsilid,
    typeValue = values.dataset.type,
    udiseValue = values.dataset.udise,
    statusValue = values.dataset.status;
  document.getElementById("stateNameField").value = itemValue;
  document.getElementById("idField").value = itemID;
  document.getElementById("udiseid").value = udiseValue;
  tehsilSelect.setChoiceByValue(parseInt(tehsilValue));
  typeField.setChoiceByValue(typeValue);
  statusField.setChoiceByValue(statusValue);
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

  fetch(BACKENDURL + "school", requestOptions)
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
