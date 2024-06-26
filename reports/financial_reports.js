const ctz = document.getElementById("barChart");
// const moviesInput = document.getElementById("movies");
// const moviesRevenueInput = document.getElementById("movies_revenue");

// const movies = JSON.parse(moviesInput.value);
// const moviesRevenue = JSON.parse(moviesRevenueInput.value);

const canvas = ctz.getContext("2d");

const barChart = new Chart(canvas, {
  type: "bar",
  data: {
    labels: movies,
    datasets: [
      {
        label: "2024 Revenue Per Movie Report",
        data: moviesRevenue,
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(255, 159, 64, 0.2)",
          "rgba(255, 205, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(201, 203, 207, 0.2)",
        ],
        borderColor: [
          "rgb(255, 99, 132)",
          "rgb(255, 159, 64)",
          "rgb(255, 205, 86)",
          "rgb(75, 192, 192)",
          "rgb(54, 162, 235)",
          "rgb(153, 102, 255)",
          "rgb(201, 203, 207)",
        ],
        borderWidth: 1,
      },
    ],
  },
});
