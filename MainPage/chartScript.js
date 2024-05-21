// Load Charts and the corechart package.
google.charts.load("current", { packages: ["corechart"] });

google.charts.setOnLoadCallback(drawFatChart);

google.charts.setOnLoadCallback(drawCarbChart);

google.charts.setOnLoadCallback(drawProteinChart);

function drawFatChart() {
  var data = new google.visualization.DataTable();
  data.addColumn("string", "Topping");
  data.addColumn("number", "Slices");
  data.addRows([
    ["Mushrooms", 1],
    ["Onions", 1],
    ["Olives", 2],
    ["Zucchini", 2],
    ["Pepperoni", 1],
  ]);

  var options = {
    title: "How Much Pizza Sarah Ate Last Night",
  };

  var chart = new google.visualization.PieChart(
    document.getElementById("fatChart")
  );
  chart.draw(data, options);
}

function drawCarbChart() {
  var data = new google.visualization.DataTable();
  data.addColumn("string", "Topping");
  data.addColumn("number", "Slices");
  data.addRows([
    ["Mushrooms", 2],
    ["Onions", 2],
    ["Olives", 2],
    ["Zucchini", 0],
    ["Pepperoni", 3],
  ]);

  var options = {
    title: "Carbohydrate Chart",
  };

  var chart = new google.visualization.PieChart(
    document.getElementById("carbChart")
  );
  chart.draw(data, options);
}

function drawProteinChart() {
  var data = new google.visualization.DataTable();
  data.addColumn("string", "Topping");
  data.addColumn("number", "Slices");
  data.addRows([
    ["Mushrooms", 1],
    ["Onions", 1],
    ["Olives", 2],
    ["Zucchini", 2],
    ["Pepperoni", 1],
  ]);

  var options = {
    title: "How Much Pizza Sarah Ate Last Night",
  };

  var chart = new google.visualization.PieChart(
    document.getElementById("proteinChart")
  );
  chart.draw(data, options);
}
