document.addEventListener("DOMContentLoaded", (event) => {
  var fat_data = JSON.parse(document.getElementById("fat_data").value);
  var carb_data = JSON.parse(document.getElementById("carb_data").value);
  var protein_data = JSON.parse(document.getElementById("protein_data").value);

  // Load Charts and the corechart package.
  google.charts.load("current", { packages: ["corechart"] });

  google.charts.setOnLoadCallback(drawFatChart);

  google.charts.setOnLoadCallback(drawCarbChart);

  google.charts.setOnLoadCallback(drawProteinChart);

  function drawFatChart() {
    var data = new google.visualization.DataTable();
    data.addColumn("string", "Food Item");
    data.addColumn("number", "Fat% per");
    var format_fat = fat_data.map((item) => [item[0], parseFloat(item[1])]);
    data.addRows(format_fat);

    var options = {
      title: "Fat Breakdown",
    };

    var chart = new google.visualization.PieChart(
      document.getElementById("fatChart")
    );
    chart.draw(data, options);
  }

  function drawCarbChart() {
    var data = new google.visualization.DataTable();
    data.addColumn("string", "Food Item");
    data.addColumn("number", "Slices");
    var format_carb = carb_data.map((item) => [item[0], parseFloat(item[1])]);
    data.addRows(format_carb);

    var options = {
      title: "Carbohydrate Breakdown",
    };

    var chart = new google.visualization.PieChart(
      document.getElementById("carbChart")
    );
    chart.draw(data, options);
  }

  function drawProteinChart() {
    var data = new google.visualization.DataTable();
    data.addColumn("string", "Food Item");
    data.addColumn("number", "Slices");
    var format_protein = protein_data.map((item) => [
      item[0],
      parseFloat(item[1]),
    ]);
    data.addRows(format_protein);

    var options = {
      title: "Protein Breakdown",
    };

    var chart = new google.visualization.PieChart(
      document.getElementById("proteinChart")
    );
    chart.draw(data, options);
  }
});
