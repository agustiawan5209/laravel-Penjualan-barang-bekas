$(document).ready(function() {
    // console.log()
    $.get("/api/kota",
        function(data, textStatus, jqXHR) {
            if (textStatus == 'success') {
                var hasil = JSON.parse(data)
                for (let i = 0; i < hasil['kota_kabupaten'].length; i++) {
                    const element = hasil[i];
                    var option = "<option value='" + hasil['kota_kabupaten'][i]['id'] + "'>" + hasil['kota_kabupaten'][i]['nama'] + "</option>"
                    $("#kabupaten").append(option)

                }
            }
        },
    );
    $("#kabupaten").change(function() {
        $.get("/api/getKota/" + this.value,
            function(data, textStatus, jqXHR) {
                if (textStatus == 'success') {
                    var hasil = JSON.parse(data)
                    const element = hasil;
                    $('#target_kabupaten').val(hasil['nama'])

                }

            },
        );

        $.get("/api/kecamatan/" + this.value,
            function(data, textStatus, jqXHR) {
                if (textStatus == 'success') {
                    var hasil = JSON.parse(data)
                    for (let i = 0; i < hasil['kecamatan'].length; i++) {
                        const element = hasil[i];
                        var option = "<option value='" + hasil['kecamatan'][i]['id'] + "'>" + hasil['kecamatan'][i]['nama'] + "</option>"
                        $("#kecamatan").append(option)
                    }
                }
            },
        );
    })
    $("#kecamatan").change(function() {
        $.get("/api/detailcamata/" + this.value,
            function(data, textStatus, jqXHR) {
                console.log(textStatus)
                if (textStatus == 'success') {
                    var hasil = JSON.parse(data)
                    console.log(hasil)
                    const element = hasil;
                    $('#target_kecamatan').val(hasil['nama'])

                }

            },
        );

    })

});