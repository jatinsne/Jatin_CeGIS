<?php
require __DIR__ . "/shared/head.php";
require __DIR__ . "/shared/nav.php";
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Home</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-1"><span id="stateCount">0</span></h3>
                                <p class="text-muted mb-0">Total States</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-1"><span id="districtCount">0</span></h3>
                                <p class="text-muted mb-0">Total District</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-1"><span id="tehsilCount">0</span></h3>
                                <p class="text-muted mb-0">Total Tehsil</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-1"><span id="blockCount">0</span></h3>
                                <p class="text-muted mb-0">Total Blocks</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-1"><span id="schoolCount">0</span></h3>
                                <p class="text-muted mb-0">Total Schools</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-1"><span id="assetCount">0</span></h3>
                                <p class="text-muted mb-0">Total Assets</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="mb-0">Overview Schools</h5>
                        </div>
                        <div class="my-3">
                            <div id="overview"></div>
                        </div>
                        <div class="row g-3 text-center">
                            <div class="col-6 col-lg-6 col-xxl-6">
                                <div class="overview-product-legends">
                                    <p class="text-dark mb-1"><span>Govt</span></p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-6 col-xxl-6">
                                <div class="overview-product-legends">
                                    <p class="text-primary mb-1"><span>Private</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require __DIR__ . "/shared/footer.php";
require __DIR__ . "/shared/footerscripts.php";
?>
<script src="../assets/js/plugins/apexcharts.min.js"></script>
<script src="../assets/js/pages/dashboard.js"></script>
<?php
require __DIR__ . "/shared/foot.php";
?>