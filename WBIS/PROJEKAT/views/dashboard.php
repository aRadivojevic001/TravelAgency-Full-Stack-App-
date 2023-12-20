<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets2/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets2/img/favicon.png">
    <title>
        Admin panel
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets2/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets2/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets2/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <a href="/administration"><h3 class="font-weight-bolder mb-0">Admin panel</h3></a>
            </nav>
            <div class="justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    $reservations = new \app\models\ReservationModel();
    $dbResult = $reservations->db->con()->query("SELECT SUM(total_price) AS 'total_price', COUNT(reservation_id) AS 'clients' FROM reservation;");
    $result = $dbResult->fetch_assoc();

    ?>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">payment</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Income</p>
                            <h4 class="mb-0"><?php echo $result['total_price']." €"?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
<!--                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>-->
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Reservations</p>
                            <h4 class="mb-0"><?php echo $result['clients']?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
<!--                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <!--------------------------------->
            <div class="row">
                <div class="col-12 mt-2">
                    <div class="card card-default">
                        <div class="card-header">
                            <div class="col-6">
                                <h3 class="card-title">Number of hotels by country</h3>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-info" download="quantity.json" id="country-data">Download </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="country"
                                        style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%; display: block; width: 634px;"
                                        width="634" height="250" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                        <!--------------------------------->



                    </div>
                </div>
            </div>
            <!--------------------------------->
            <div class="row">
                <div class="col-12 mt-2 mb-4">
                    <div class="card card-default">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <div class="col-6">
                                        <h3 class="card-title">Number of reservations per month</h3>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-info" download="quantity.json" id="reservation-data">Download </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="input_month_start">Month from</label>
                                        <select name="input_month_start" id="input_month_start" style="text-indent:10px;"  class="month-interval form-select border border-secondary">
                                            <option class="form-control" value="1" selected>January</option>
                                            <option class="form-control" value="2">February</option>
                                            <option class="form-control" value="3">March</option>
                                            <option class="form-control" value="4">April</option>
                                            <option class="form-control" value="5">May</option>
                                            <option class="form-control" value="6">Jun</option>
                                            <option class="form-control" value="7">July</option>
                                            <option class="form-control" value="8">August</option>
                                            <option class="form-control" value="9">September</option>
                                            <option class="form-control" value="10">October</option>
                                            <option class="form-control" value="11">November</option>
                                            <option class="form-control" value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="input_month_end">Month to</label>
                                        <select name="input_month_end" id="input_month_end" style="text-indent:10px;" class="month-interval form-select border border-secondary">
                                            <option class="form-control" value="1">January</option>
                                            <option class="form-control" value="2">February</option>
                                            <option class="form-control" value="3">March</option>
                                            <option class="form-control" value="4">April</option>
                                            <option class="form-control" value="5">May</option>
                                            <option class="form-control" value="6">Jun</option>
                                            <option class="form-control" value="7">July</option>
                                            <option class="form-control" value="8">August</option>
                                            <option class="form-control" value="9">September</option>
                                            <option class="form-control" value="10">October</option>
                                            <option class="form-control" value="11">November</option>
                                            <option class="form-control" value="12"  selected>December</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <div id="reservation-panel">
                                    <canvas id="reservations"
                                            style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%; display: block; width: 634px;"
                                            width="634" height="250" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                        <!--------------------------------->



                    </div>
                </div>
            </div>
            <!--------------------------------->
            <div class="row">
                <div class="col-12 mt-2 mb-4">
                    <div class="card card-default">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <div class="col-6">
                                        <h3 class="card-title">Monthly earnings per set price interval</h3>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-info" download="quantity.json" id="income-data">Download </a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <input id="price_from" type="text" class="border border-secondary price_range_helper" style="text-indent:10px;" placeholder="Price from">
                                        </div>
                                        <div class="col-6">
                                            <input id="price_to" type="text" class="border border-secondary price_range_helper" style="text-indent:10px;" placeholder="Price to">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <div id="zarada-panel">
                                    <canvas id="zarada"
                                            style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%; display: block; width: 634px;"
                                            width="634" height="250" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                        <!--------------------------------->



                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h3>
                            Country
                        </h3>
                        <a href="/addcountry" class="btn btn-info btn-sm form-control">ADD</a>
                        <a href="/deletecountry" class="btn btn-info btn-sm form-control">DELETE</a>
                    </div>
                    <div class="card-body p-3">
                        <div class="timeline timeline-one-side">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h3>City</h3>
                        <a href="/addcity" class="btn btn-info btn-sm form-control">ADD</a>
                        <a href="/deletecity" class="btn btn-info btn-sm form-control">DELETE</a>
                    </div>
                    <div class="card-body p-3">
                        <div class="timeline timeline-one-side">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h3>Accommodation</h3>
                        <a href="/addaccommodation" class="btn btn-info btn-sm form-control">ADD</a>
                        <a href="/deleteaccommodation" class="btn btn-info btn-sm form-control">DELETE</a>
                    </div>
                    <div class="card-body p-3">
                        <div class="timeline timeline-one-side">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                       <h3>Countries Table</h3>
                    </div>
                    <div class="card-body p-3">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Num</th>
                                <th scope="col">Countries</th>
                            </tr>
                            </thead>
                            <tbody>

                                <?php

                                use app\models\CountryModel;

                                $country = new CountryModel();
                                $array = $country->getCountry();
                                ?>
                                <?php for ($i = 0; $i < count($array); $i++) :?>
                                <tr>
                                    <th scope="row"><?php echo $i+1?></th>
                                    <td><?php echo $array[$i]?></td>
                                </tr>
                                <?php endfor;?>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h3>City Table</h3>
                    </div>
                    <div class="card-body p-3">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Num</th>
                                <th scope="col">Cities</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            use app\models\CityModel;

                            $city = new CityModel();
                            $array = $city->getCity();
                            ?>
                            <?php for ($i = 0; $i < count($array); $i++) :?>
                                <tr>
                                    <th scope="row"><?php echo $i+1?></th>
                                    <td><?php echo $array[$i]?></td>
                                </tr>
                            <?php endfor;?>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h3>Accommodation Table</h3>
                    </div>
                    <div class="card-body p-3">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Num</th>
                                <th scope="col">Accommodation</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            use app\models\AccommodationModel;

                            $accommodation = new AccommodationModel;
                            $array = $accommodation->getHotels();
                            ?>
                            <?php for ($i = 0; $i < count($array); $i++) :?>
                                <tr>
                                    <th scope="row"><?php echo $i+1?></th>
                                    <td><?php echo $array[$i]?></td>
                                </tr>
                            <?php endfor;?>
                        </table>

                    </div>
                </div>
            </div>
        </div>



    </div>
</main>
<div class="fixed-plugin">
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../assets2/js/core/popper.min.js"></script>
<script src="../assets2/js/core/bootstrap.min.js"></script>
<script src="../assets2/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets2/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets2/js/plugins/chartjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>



    $(document).ready(function (){
        countriesGraphData();
        reservationsPerMonthData();
        incomeData();

        $(".price-range-helper").change(function (){
            $("#hotels_total_panel").empty();
            $("#hotels_total_panel").append('<canvas id="hotels_total"' +
                'style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%; display: block; width: 634px;"' +
                'width="634" height="250" class="chartjs-render-monitor"></canvas>');
        });

        $(".month-interval").change(function (){
            $("#reservation-panel").empty();
            $("#reservation-panel").append('<canvas id="reservations"' +
                'style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%; display: block; width: 634px;"' +
                'width="634" height="250" class="chartjs-render-monitor"></canvas>');
            reservationsPerMonthData();
        });

        $(".price_range_helper").change(function (){
            $("#zarada-panel").empty();
            $("#zarada-panel").append('<canvas id="zarada"' +
                'style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%; display: block; width: 634px;"' +
                'width="634" height="250" class="chartjs-render-monitor"></canvas>');
            incomeData();
        });

    });

    function countriesGraphData(){

        var countriesUrl = '/api/graph/countries';
        $.getJSON(countriesUrl, function (result){
            document.querySelector('#country-data').setAttribute(`href`,`data:application/json,${JSON.stringify(result)}`);


            var labels = result.map(function (e){
                return e.countries;
            });

            var dataValues = result.map(function (e){
                return e.hotels;
            });

            var graph = $("#country").get(0).getContext('2d');

            createGraph(dataValues, labels, graph, labels, "Izvestaj Hotela po Zemljama", "doughnut", false);

        });

    }


    function reservationsPerMonthData(){
        let url = '/api/reservationMonth';
        let data = { "input_month_start":$("#input_month_start").val(), "input_month_end":$("#input_month_end").val() }
        console.log(data);
        $.getJSON(url, data,  function (result){
            document.querySelector('#reservation-data').setAttribute(`href`,`data:application/json,${JSON.stringify(result)}`);


            let dataValues = result.map(function (e){
                return e.total_reservation;
            });

            let labelValues = result.map(function (e){
                return e.mesec;
            });

            let graph = $("#reservations").get(0).getContext('2d');

            createGraph(dataValues, labelValues, graph, "Number of reservation", "Izvestaj Zarade hotela", "line");
        });
    }

    function incomeData(){
        let url = '/api/income';
        let data = { "priceFrom":$("#price_from").val(), "priceTo":$("#price_to").val() }
        $.getJSON(url, data,  function (result){
            document.querySelector('#income-data').setAttribute(`href`,`data:application/json,${JSON.stringify(result)}`);



            let dataValues = result.map(function (e){
                return e.total_price;
            });

            let labelValues = result.map(function (e){
                return e.mesec;
            });

            let graph = $("#zarada").get(0).getContext('2d');

            createGraph(dataValues, labelValues, graph, "Income", "Izvestaj Zarade hotela", "line");
        });
    }








    function createGraph(dataValues, labels, graph, dataSetLabel, reportLabel, type, display){

        new Chart(graph, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    showLine: true,
                    label: dataSetLabel,
                    backgroundColor: [
                        'aqua',
                        'green',
                        'yellow',
                        'red',
                        'purple',
                    ],
                    borderColor: '#fff',
                    fill: true
                }]
            },
            options: {
                title: {
                    display: true,
                    text: reportLabel
                },
                scales: {
                    y: {
                        ticks: {
                            display: display,
                        }
                    }
                },
                legend: {
                    display: true
                }
            }
        });
    }


</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets2/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>