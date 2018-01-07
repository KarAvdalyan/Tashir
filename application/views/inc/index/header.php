<!DOCTYPE html>
<html lang="en">
<head>
  <title>Index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('front_data/css/bootstrap.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('front_data/css/front_style.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('front_data/jQuery-autoComplete-master/jquery.auto-complete.css'); ?>">
  <script src="<?= base_url('front_data/js/jquery.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('front_data/jQuery-autoComplete-master/jquery.auto-complete.min.js'); ?>"></script> 
  <script src="<?= base_url('front_data/js/bootstrap.js'); ?>"></script>
  <script type="text/javascript">
    var base_url="<?= base_url(); ?>"
  </script>
  <script type="text/javascript" src="<?= base_url('front_data/js/service.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('front_data/js/insert_payment.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('front_data/js/update_payment.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('front_data/js/search.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('front_data/js/delete.js'); ?>"></script> 

</head>
<body>

<nav class="navbar navbar-default" id="header">
  <h1 style="text-align:center;">Welcome</h1>
  <div class="container-fluid">

<ul class="nav navbar-nav">
                                    <!-- Trigger the Payment with a button -->
  <button id="home" type="button" class="btn btn-primary btn-md" >Գլխավոր</button>

                                    <!-- Trigger the Payment with a button -->
  <button id="insert" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#payment">Գործարք</button>

                                   <!-- Trigger the Product full with a button -->
  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_product">Պրոդուկտի մուտքագրում</button>

                                   <!-- Trigger the project full with a button -->
  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_project">Պրոյեկտի մուտքագրում</button>

                                   <!-- Trigger the ad_supplier full with a button -->
  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_supplier">Մատակարարի մուտքագրում</button>



                                   <!-- Trigger the show Product  button -->
  <button id="show_product" type="button" class="btn btn-primary btn-md">Պրոդուկտի Դիտում</button>

                                   <!-- Trigger the show project full with a button -->
  <button id="show_project" type="button" class="btn btn-primary btn-md" >Պրոյեկտի Դիտում</button>

                                   <!-- Trigger the show  show supplier full with a button -->
  <button id="show_supplier" type="button" class="btn btn-primary btn-md" >Մատակարարի Դիտում</button>


    </ul>
  </div>
</nav>

