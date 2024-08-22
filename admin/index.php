<?php session_start(); ?>
<html>

<head>
    <title>Web Tau'na Makassar</title>
    <link rel="icon" href="../foto/logo.png" type="image/png">
    <style>
        body {
            background-color: #5F374B;
            width: auto;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .isi {
            display: flex;
            flex-wrap: wrap;
        }

        .kiri {
            max-width: 100%;
            width: 19%;
            height: auto;
            border: 5px solid #8C6A5D;
            background-color: #EEE4B1;
            font-size: 20px;
            color: #2B2A4C;
            margin: 0.8rem;
            box-sizing: border-box;
            flex: 1 1 20%;
        }

        .kanan {
            max-width: 100%;
            width: 76%;
            height: auto;
            border: 5px solid #8C6A5D;
            background-color: #EEE4B1;
            padding: 1rem;
            overflow: auto;
            color: #2B2A4C;
            margin: 0.8rem;
            box-sizing: border-box;
            flex: 1 1 75%;
        }

        .bawah {
            width: calc(100% - 1.6rem);
            /* max-width: 92rem; */
            max-width: 100%;
            height: 4rem;
            margin: 0.8rem auto;
            justify-content: center;
            border: 7px solid #8C6A5D;
            background-color: #fff;
            text-align: center;
            clear: both;
            color: #EEE2DE;
        }

        @media (max-width: 768px) {

            .kiri,
            .kanan {
                width: 100%;
                flex: 1 1 100%;
                margin: 0.5rem 0;
            }
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION["id_pengelola"])) {
    ?>

        <div class="isi">
            <div class="kiri"> <?php include "menu.php" ?> </div>

            <div class="kanan"> <?php include "isi.php" ?> </div>
        </div>

        <div class="bawah">
            <h3> Copyright &copy; 2024, Designed By Annisa Intan and Salma Novita</h3>
        </div>

    <?php
    } else {
        include "login.php";
    }
    ?>
</body>

</html>