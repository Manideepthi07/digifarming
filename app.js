$(document).ready(function(){
  $.ajax({
    url: "http://localhost/data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var state = [];
      var price = [];

      for(var i in data) {
        state.push(data[i].State);
        price.push(data[i].TotalPrice);
      }

      var chartdata = {
        labels: state,
        datasets : [
          {
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: price
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});