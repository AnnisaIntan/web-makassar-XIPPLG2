<?php
    if(isset($_GET['page']))
    {
        SWITCH ($_GET['page'])
        {   
            case 'daerah_tampil';
                include "daerah_tampil.php";
            break;
            case 'daerah_tambah';
                include "daerah_tambah.php";
            break;

            case 'makanan_tampil';
                include "makanan_tampil.php";
            break;
            case 'makanan_tambah';
            include "makanan_tambah.php";
            break;

            case 'minuman_tampil';
                include "minuman_tampil.php";
            break;
            case 'minuman_tambah';
                include "minuman_tambah.php";
            break;

            case 'pengelola_tampil':
                include('pengelola_tampil.php');
            break;
            case 'pengelola_tambah':
                include('pengelola_tambah.php');
            break;

            case 'ceo_tampil':
                include('ceo_tampil.php');
            break;
            case 'ceo_tambah':
                include('ceo_tambah.php');
            break;

            case 'galeri_tampil':
                include('galeri_tampil.php');
            break;
            case 'galeri_tambah':
                include('galeri_tambah.php');
            break;
        }
    }
?>