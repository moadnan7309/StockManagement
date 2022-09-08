<?php
include 'header.php';
$c=mysqli_connect("localhost","root","","stock");
$query = mysqli_query($c, "select * from users");
?>
<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>

                    </strong> Dashboard</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="#">SatyamEduhub</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">

                                        <!-- <strong> <?php

$q = mysqli_query($c, "SELECT * from users where type='0'");
$count = mysqli_num_rows($query);
echo $count;
?></strong>--> Total Admissions
                                    </h5>
                                    <h1 class="mt-1 mb-3">
                                        <?php

$q = mysqli_query($c, "SELECT * from users where type='0'");
$count = mysqli_num_rows($q);
echo $count;
?>
                                    </h1>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Total Monthly Fees</h5>
                                    <h1 class="mt-1 mb-3">2.382</h1>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Total Inquiries</h5>
                                    <h1 class="mt-1 mb-3">2.382</h1>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>


    </div>
</main>

<?php
include 'footer.php';
?>