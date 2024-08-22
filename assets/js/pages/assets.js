"use strict";

var tehsilSelect = new Choices("#blockid", {
  removeItemButton: true,
  searchPlaceholderValue: "Search Block",
});
tehsilSelect.setChoices(function (callback) {
  return fetch(BACKENDURL + "school")
    .then(function (res) {
      return res.json();
    })
    .then(function (data) {
      return data.data.map(function (data) {
        return {
          label: `${data.name} / ${data.block_name} / ${data.tehsil_name} / ${data.district_name} / ${data.states_name}`,
          value: data.id,
        };
      });
    });
});

function floatchart() {
  $("#tableState").DataTable({
    ajax: {
      url: BACKENDURL + "material",
      dataSrc: "data",
      headers: { Accept: "*/*" },
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "asset_name",
      },
      {
        data: "is_required",
        render: function (data, type) {
          return getStatus(data);
        },
      },
      {
        data: "name",
      },
      {
        data: "quantity_available",
      },
      {
        data: "quantity_working_condition",
      },
      {
        data: "quantity_reductant",
      },
      {
        data: "id",
      },
    ],
    columnDefs: [
      {
        targets: 7,
        render: function (data, type, full, meta) {
          return `<ul class="list-inline mb-0 text-end">
              <li class="list-inline-item"><a onclick=edit(this) data-id="${data}" data-tehsilid="${full.school_id}" data-item="${full.asset_name}" data-required="${full.is_required}" data-total="${full.quantity_available}" data-working="${full.quantity_working_condition}" data-reduct="${full.quantity_reductant}" class="avtar avtar-s btn-link-success btn-pc-default"><i class="ti ti-edit f-20"></i></a></li>
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
    return '<span class="badge text-bg-success">ON</span>';
  } else {
    return '<span class="badge text-bg-danger">OFF</span>';
  }
}

var stateForm = document.getElementById("stateForm");

stateForm.addEventListener("submit", (e) => {
  e.preventDefault();
  var idField = document.getElementById("idField"),
    stateNameField = document.getElementById("stateNameField"),
    checkRequiredField = document.getElementById("checkRequired"),
    totalField = document.getElementById("totalField"),
    workingField = document.getElementById("workingField"),
    reductField = document.getElementById("reduct"),
    schoolidField = document.getElementById("blockid"),
    requiredFieldBody = checkRequiredField.checked ? `&isrequired=ON` : ""; //checked field appending on Checked State Only
  if (idField.value > 0) {
    const requestOptions = {
      method: "PUT",
      body: `id=${idField.value}&name=${stateNameField.value}&quantity_available=${totalField.value}&quantity_working_condition=${workingField.value}&school_id=${schoolidField.value}${requiredFieldBody}`,
      headers: {
        Accept: "*/*",
        "Content-Type": "application/x-www-form-urlencoded",
      },
    };

    fetch(BACKENDURL + "material", requestOptions)
      .then((response) => response.text())
      .then((result) => checkResponse(result, "close"))
      .catch((error) => Swal.fire({ icon: "error", title: "Error! " + error }));
  } else {
    const formdata = new FormData(stateForm);
    const requestOptions = {
      method: "POST",
      body: formdata,
    };

    fetch(BACKENDURL + "material", requestOptions)
      .then((response) => response.text())
      .then((result) => checkResponse(result, "close"))
      .catch((error) => Swal.fire({ icon: "error", title: "Error! " + error }));
  }
});

function openStateModal() {
  document.getElementById("stateNameField").value = "";
  document.getElementById("idField").value = "";
  document.getElementById("totalField").value = 0;
  document.getElementById("workingField").value = 0;
  document.getElementById("reduct").value = 0;
  tehsilSelect.removeActiveItems();
  $("#stateModal").modal("toggle");
}

function edit(values) {
  openStateModal();
  var itemID = values.dataset.id,
    itemValue = values.dataset.item,
    tehsilValue = values.dataset.tehsilid,
    requiredValue = values.dataset.required,
    totalValue = values.dataset.total,
    workingValue = values.dataset.working,
    reductValue = values.dataset.reduct;
  document.getElementById("stateNameField").value = itemValue;
  document.getElementById("idField").value = itemID;
  document.getElementById("totalField").value = totalValue;
  document.getElementById("workingField").value = workingValue;
  document.getElementById("reduct").value = reductValue;
  requiredValue == "1"
    ? (document.getElementById("checkRequired").checked = true)
    : (document.getElementById("checkRequired").checked = false);
  tehsilSelect.setChoiceByValue(parseInt(tehsilValue));
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

  fetch(BACKENDURL + "material", requestOptions)
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

function updateQnt() {
  var total = document.getElementById("totalField");
  var working = document.getElementById("workingField");
  var reducting = document.getElementById("reduct");
  if (parseInt(working.value) <= parseInt(total.value)) {
    reducting.value = parseInt(total.value) - parseInt(working.value);
  } else {
    working.value = total.value;
    alert("Error! Working Quantity cannot be greater than total quantity");
  }
}
