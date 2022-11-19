if (document.querySelector("#chart-line")) {

    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    $.ajax({
        type: "GET",
        url: '/api/Data-Penjualan',
        success: function (response, status, data) {
            if (status == "success") {
                var nilai = response;
                var label = [];
                var hasil = [];
                const monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
               for (let i = 1; i < 13; i++) {
                hasil.push(nilai[i])
               }
                new Chart(ctx1, {
                    type: "bar",
                    data: {
                        labels: monthNames,
                        datasets: [{
                            label: "bulan",
                            data: hasil,
                            // tension: 0.5,
                            // borderWidth: 0,
                            // pointRadius: 0,
                            // borderColor: "#5e72e4",
                            backgroundColor: "#3B82F6",
                            // borderWidth: 10,
                            // fill: true,
                            maxBarThickness: 50

                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },

                    },
                });
            }
        }
    });

}
