/* const ctx = document.getElementById("pie");

var xValues = [];
// ["Italy", "France", "Spain", "USA", "Argentina", "Finland"];
var yValues = [12, 19, 3.93, 5, 2, 3];
var barColors = [
  "rgba(255,99,132,.4)",
  "rgba(255,99,32,.4)",
  "rgba(255,9,132,.4)",
  "rgba(255,255,132,.4)",
  "rgba(255,99,255,.4)",
  "rgba(25,99,132,.4)",
];
var borColors = [
  "rgba(255,99,132,1)",
  "rgba(255,99,32,1)",
  "rgba(255,9,132,1)",
  "rgba(255,255,132,1)",
  "rgba(255,99,255,1)",
  "rgba(25,99,132,1)",
]; */


/* function showStatisticPieChart() {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.status == 200 && this.readyState == 4) {
      let data = this.responseText.split('/');
      console.log();
      xValues = [];
      for (const i of data) {
        xValues.push(i);
      }
      new Chart(ctx, {
        type: "pie",
        data: {
          labels: xValues,
          datasets: [
            {
              label: "Products quantity sold",
              data: yValues,
              backgroundColor: barColors,
              borderColor: borColors,
              borderWidth: 1,
            },
          ],
        },
        options: {
          title: {
              display: true,
              text: "Best - selling products"
          },
          plugins: {
            customCanvasBackgroundColor: {
              color: 'lightGreen',
            }
          }
        },
        plugins: [plugin],
      });
      
      
    }
  }
  xhr.open("GET","./getDataStatistic.php",true);
  xhr.send();
}

document.querySelector('.statistic-container').addEventListener('click',showStatisticPieChart)

 */

/* var xValues = ["", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = ["red", "green", "blue", "orange", "brown"];

new Chart("barchart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [
      {
        backgroundColor: barColors,
        data: yValues,
      },
    ],
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: "World Wine Production 2018",
    },
  },
});
 */
