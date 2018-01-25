//script untuk membuat menu yang  dengan jquery situs:http://gawibowo.com/menandai-highlight-halaman-aktif-di-menu-menggunakan-jquery.htm
$(function() {
    $('.ml-menu a[href~="' + location.href + '"]').parents('li').addClass('active');
});
$(function() {
    $(".klik").click(function () {
        $(this)
    }).addClass("toggled");
});

$(function() {
    $('.ml-menu a[href~="' + location.href + '"]').parents('ul').css({display:"block"});
});
////////////

//Konfigurasi Datatabel
$(document).ready(function() {
    //server side
    $('#serverside').DataTable({
        "processing" : true,
        "serverSide" : true,
        "language": {
            "url": "adminbsb/plugins/jquery-datatable/Indonesian.json",
        },
        "lengthMenu": [ [5, 10, 25, -1], [5, 10, 25, "All"] ],"pageLength": 5,
        "order" : [],
        "ajax": {
            "url" : get_url + "/ajax_list",
            "type" : "POST"
        },
        "columnDefs" : [
            {
                "targets" : [0],
                "orderable":false,
            },
        ],
    });
    ///

});
/////////////

//konfigurasi tooltip-popovers
$(function () {
    //Tooltip
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

    //Popover
    $('[data-toggle="popover"]').popover();
});

//Membuat animasi fadeout selama 5 dtk untuk notifikasi
$(".alert").delay(3000).fadeOut(500);

//Membuat javascript jam
function startTime() {
    var today=new Date(),
        curr_hour=today.getHours(),
        curr_min=today.getMinutes(),
        curr_sec=today.getSeconds();
    curr_hour=checkTime(curr_hour);
    curr_min=checkTime(curr_min);
    curr_sec=checkTime(curr_sec);
    document.getElementById('clock').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;
}
function checkTime(i) {
    if (i<10) {
        i="0" + i;
    }
    return i;
}
setInterval(startTime, 500);
/////////////////////////

//Fungsi Mengubah angka menjadi format mata uang
function numtocurrency(num) {
    num = num.toString().replace(/\$|\./g, '');

    if  (isNaN(num)) num = "0";

    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();

    if (cents == 0) cents = '';
    else if (cents < 10) cents = ",0" + cents;
    else cents = ',' + cents;

    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
        num = num.substring(0, num.length -(4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));

    return(((sign) ? '' : '-') + num + cents);
}

//Mengubah input menjadi format mata uang
$('#harga_beli,#harga_jual,#stok').keyup(function(){
    $(this).val(numtocurrency($(this).val()));
});

//Menghilangkan tanda titik di input pada saat di submit
$("form").submit(function() {
    $('#harga_beli').val($('#harga_beli').val().replace(/\./g, ""));
    $('#harga_jual').val($('#harga_jual').val().replace(/\./g, ""));
    $('#stok').val($('#stok').val().replace(/\./g, ""));
});