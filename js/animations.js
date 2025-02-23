import { Chart } from "@/components/ui/chart"
document.addEventListener("DOMContentLoaded", () => {
  const ctx = document.getElementById("financialChart").getContext("2d")

  const chart = new Chart(ctx, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [
        {
          label: "Portfolio Growth",
          data: [0, 10, 15, 25, 30, 40, 50, 60, 65, 75, 85, 100],
          borderColor: "#0077b6",
          backgroundColor: "rgba(0, 119, 182, 0.1)",
          tension: 0.4,
        },
      ],
    },
    options: {
      responsive: true,
      animation: {
        duration: 2000,
        easing: "easeOutQuart",
      },
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: "Growth (%)",
          },
        },
        x: {
          title: {
            display: true,
            text: "Month",
          },
        },
      },
    },
  })
})

