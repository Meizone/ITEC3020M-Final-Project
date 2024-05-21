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

  text_fat = "";
  total_fat = 0;
  format_fat.forEach((item) => {
    text_fat = text_fat.concat("<td>", item[0], "</td>\n");
    text_fat = text_fat.concat("<td>", parseFloat(item[1]), "</td>\n");
    text_fat = text_fat.concat("</tr>");
    total_fat += item[1];
  });

  fat_chart.addEventListener("click", function (e) {
    detail.innerHTML = `<table class="contentTable">
    <tr>
      <td>Food Name</td>
      <td>Fat (/100g)</td>
    </tr>
    <tr>

        <tr>
        `
      .concat(text_fat)
      .concat(
        `
      </tr>
      
      <tr>
      <td>Total</td> 
      <td>`
      )
      .concat(parseFloat(total_fat))
      .concat(
        `
        </td>
      </tr>
  </table>`
      );
  });

  carb_chart.addEventListener("click", function (e) {});

  protein_chart.addEventListener("click", function (e) {});
});
