// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

let x = ['01/01','05/01','10/01','15/01', '20/01'];
let y = [20,50,100,300,60];
// Area Chart Example
var ctx = document.getElementById("chart-view");
var myLineChart = new Chart(ctx, {
type: 'line',
data: {
    labels: x,
    datasets: [{
    label: "Lượt xem",
    lineTension: 0.3,
    backgroundColor: "rgba(78, 115, 223, 0.05)",
    borderColor: "rgba(78, 115, 223, 1)",
    data: y,
    }],
},
options: {
    maintainAspectRatio: false,
    legend: {
    display: false
    },
    tooltips: {
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    titleMarginBottom: 10,
    titleFontColor: '#6e707e',
    titleFontSize: 14,
    borderColor: '#dddfeb',
    borderWidth: 1
    }
}
});
var ctx_comment = document.getElementById("chart-comment");
var Chart_comment = new Chart(ctx_comment, {
type: 'line',
data: {
    labels: x,
    datasets: [{
    label: "Lượt xem",
    lineTension: 0.3,
    backgroundColor: "rgba(78, 115, 223, 0.05)",
    borderColor: "rgba(78, 115, 223, 1)",
    data: y,
    }],
},
options: {
    maintainAspectRatio: false,
    legend: {
    display: false
    },
    tooltips: {
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    titleMarginBottom: 10,
    titleFontColor: '#6e707e',
    titleFontSize: 14,
    borderColor: '#dddfeb',
    borderWidth: 1
    }
}
});
