// public/js/filter.js
$(document).ready(function() {
    $('#filter-button').on('click', function (event) {
        event.preventDefault();
        var kategori = [];
        $('input[name="kategori"]:checked').each(function() {
            kategori.push($(this).val());
        });
        var harga = $('#harga').val();
        var lokasi = [];
        $('input[name="lokasi"]:checked').each(function() {
            lokasi.push($(this).val());
        });
        // Kirim permintaan AJAX
        $.ajax({
            type: 'POST',
            url: 'HomeControl/filter', // Ganti dengan URL sesuai dengan rute di CodeIgniter
            data: {
                kategori: kategori,
                harga: harga,
                lokasi: lokasi
            },
            success: function(data) {
                // Perbarui elemen hasil-filter dengan hasil filter
                $('#hasil-filter').html(data);
            }
        });
    });
});

function getCoordinate() {
    var alamat = document.getElementById('alamat').value;

    // Kirim permintaan AJAX ke server untuk mendapatkan koordinat
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "<?= base_url('admin/tempatwisata/getCoordinate'); ?>", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var result = JSON.parse(xhr.responseText);
            displayResult(result);
        }
    };
    xhr.send('alamat=' + encodeURIComponent(alamat));
}

function displayResult(result) {
    var resultDiv = document.getElementById('result');
    if (result) {
        resultDiv.innerHTML = 'Latitude: ' + result.latitude + '<br>Longitude: ' + result.longitude;
    } else {
        resultDiv.innerHTML = 'Gagal mendapatkan koordinat.';
    }
}