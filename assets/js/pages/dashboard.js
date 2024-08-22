"use strict";

var schoolTypeCount;

function floatchart() {
  const requestOptions = {
    method: "GET",
  };

  fetch(BACKENDURL + "stats", requestOptions)
    .then((response) => response.text())
    .then((result) => updateStats(result))
    .catch((error) => console.error(error));

  fetch(BACKENDURL + "schoolType", requestOptions)
    .then((response) => response.text())
    .then((result) => createChart(result))
    .catch((error) => console.error(error));
}
document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    floatchart();
  }, 500);
});

function createChart(schoolTypeCount) {
  var schoolTypeCountData = JSON.parse(schoolTypeCount);
  if (JSON.parse(schoolTypeCount)) {
    if (schoolTypeCountData.statusCode == 3) {
      new ApexCharts(document.querySelector("#overview"), {
        chart: { height: 350, type: "pie" },
        labels: ["Govt", "Private"],
        series: schoolTypeCountData.data,
        colors: ["#4680FF", "#212529"],
        fill: { opacity: [1, 0.8] },
        legend: { show: !1 },
        dataLabels: { enabled: !0, dropShadow: { enabled: !1 } },
        responsive: [
          {
            breakpoint: 575,
            options: { chart: { height: 250 }, dataLabels: { enabled: !1 } },
          },
        ],
      }).render();
    }
  }
}

function updateStats(data) {
  if (JSON.parse(data)) {
    var statsData = JSON.parse(data);
    if (statsData.statusCode == 3) {
      document.getElementById("stateCount").innerHTML =
        statsData.data[0].statecount;
      document.getElementById("districtCount").innerHTML =
        statsData.data[0].districtcount;
      document.getElementById("tehsilCount").innerHTML =
        statsData.data[0].tehsilcount;
      document.getElementById("blockCount").innerHTML =
        statsData.data[0].blockcount;
      document.getElementById("schoolCount").innerHTML =
        statsData.data[0].schoolcount;
      document.getElementById("assetCount").innerHTML =
        statsData.data[0].assetcount;
    } else {
      Swal.fire({ icon: "error", title: "Error! " + statsData.error });
    }
  } else {
    Swal.fire({ icon: "error", title: "Error! API Error" });
  }
}
