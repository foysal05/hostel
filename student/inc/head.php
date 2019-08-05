<?php
require_once '../db/db.php';


 ?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <title>DIU Hostel</title>
</head>
<script type="text/javascript">
          function isNumberKeyAD(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
               //If you don't want to allow decimals
              //if (charCode > 31 && (charCode < 48 || charCode > 57))
              //If you want to allow decimals
              if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
                return false;
            return true;
        }
        function isNumberKeyND(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
               //If you don't want to allow decimals
              if (charCode > 31 && (charCode < 48 || charCode > 57))
              //If you want to allow decimals
              // if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
                return false;
            return true;
        }
    </script>
<body>