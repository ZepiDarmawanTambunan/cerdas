<?php

use Carbon\Carbon;

    function bulan_romawi($bulan)
    {
        $bulanRomawi = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
        ];

        return $bulanRomawi[$bulan] ?? null;
    }

    function jenis_kelamin($jenis_kelamin){
        if($jenis_kelamin == 1){
            return 'L';
        }else if($jenis_kelamin == 2){
            return 'P';
        }
        return '-';
    }

    function datedFY($date){
        return Carbon::parse($date)->translatedFormat('d F Y');
    }
