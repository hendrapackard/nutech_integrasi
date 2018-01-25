<?php

//Fungsi dipakai untuk menampilkan form error yang berkaitan dengan input file
function fileFormError($field, $prefix='',$suffix = '')
{
    $CI =& get_instance();
    $error_field = $CI->form_validation->error_array();

    if (!empty($error_field[$field])) {
        return $prefix . $error_field[$field] . $suffix;
    }
    return '';
}

//Format tanggal dalam Bahasa Indonesia
function formatHariTanggal($waktu)
{
    $hari_array = [
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    ];
    $hr = date('w',strtotime($waktu));
    $hari = $hari_array[$hr];

    $tanggal = date('j',strtotime($waktu));

    $bulan_array = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];
    $bl = date('n',strtotime($waktu));
    $bulan = $bulan_array[$bl];
    $tahun = date('Y',strtotime($waktu));
    return "$hari, $tanggal $bulan $tahun";
}

