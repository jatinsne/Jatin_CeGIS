function checkResponse(result, cmd) {
  var response = JSON.parse(result);
  response.statusCode == 3
    ? (Swal.fire({ icon: "success", title: response.error }),
      cmd == "close"
        ? ($("#stateModal").modal("toggle"),
          setTimeout((e) => {
            location.reload();
          }, 1000))
        : (window.location = "/dashboard"))
    : Swal.fire({ icon: "warning", title: response.error });
}
