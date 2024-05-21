function change_detail(detail, formatted_data, type) {
  text_data = "";
  total_data = 0;
  formatted_data.forEach((item) => {
    text_data = text_data.concat("<td>", item[0], "</td>\n");
    text_data = text_data.concat("<td>", parseFloat(item[1]), "</td>\n");
    text_data = text_data.concat("</tr>");
    total_data += item[1];
  });

  //Singular Worst line of code in my life
  detail.innerHTML = `<table class="contentTable">
    <tr>
      <td>Food Name</td>
      <td>`
    .concat(type)
    .concat(
      `(/100g)</td>
    </tr>
    <tr>

        <tr>
        `
    )
    .concat(text_data)
    .concat(
      `
      </tr>
      
      <tr>
      <td>Total</td> 
      <td>`
    )
    .concat(parseFloat(Math.round(total_data * 100) / 100))
    .concat(
      `
        </td>
      </tr>
  </table>`
    );
}

document.addEventListener("DOMContentLoaded", (event) => {
  var fat_chart = document.getElementById("Chart1");
  var carb_chart = document.getElementById("Chart2");
  var protein_chart = document.getElementById("Chart3");
  var detail = document.getElementById("detail_view");

  var fat_data = JSON.parse(document.getElementById("fat_data").value);
  var carb_data = JSON.parse(document.getElementById("carb_data").value);
  var protein_data = JSON.parse(document.getElementById("protein_data").value);

  var format_fat = fat_data.map((item) => [item[0], parseFloat(item[1])]);
  var format_carb = carb_data.map((item) => [item[0], parseFloat(item[1])]);
  var format_protein = protein_data.map((item) => [
    item[0],
    parseFloat(item[1]),
  ]);

  fat_chart.addEventListener("click", function (e) {
    change_detail(detail, format_fat, "Fat");
  });

  carb_chart.addEventListener("click", function (e) {
    change_detail(detail, format_carb, "Carbohydrate");
  });

  protein_chart.addEventListener("click", function (e) {
    change_detail(detail, format_protein, "Protein");
  });
});
