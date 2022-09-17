if (document.querySelector("#chart-line")) {

    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

    $.ajax({
        type: "GET",
        url: $('#Penjualan').val(),
        success: function(response, status, data) {
            if (status == "success") {
                var hasil;
                var total_penjualan = [];
                var label = "bulan";
                hasil = JSON.parse(data.responseText);

                for (let i = 0; i < hasil.length; i++) {
                    total_penjualan.push(hasil[i]['data']);
                    console.log(hasil[i]['data']['total'])
                }
                renderChart(total_penjualan, label)
            }
        }
    });

    function renderChart(data, label) {
        new Chart(ctx1, {
            type: "bar",
            data: {
                labels: ["Januari", "Februari", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [{
                    label: label,
                    // tension: 0.5,
                    // borderWidth: 0,
                    // pointRadius: 0,
                    // borderColor: "#5e72e4",
                    backgroundColor: "#3B82F6",
                    // borderWidth: 10,
                    // fill: true,
                    data: data,
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