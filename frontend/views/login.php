<?php
$heading = "Login";
require __DIR__ . "/shared/head.php";
?>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    <div class="page-loader">
        <div class="bar"></div>
    </div>
    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <form id="loginFrm" method="POST">
                        <div class="card-body">
                            <h4 class="text-center f-w-500 mb-3">Login with your username</h4>
                            <div class="mb-3">
                                <input type="text" name="username" required class="form-control" placeholder="User Name">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" required class="form-control" placeholder="Password">
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    require __DIR__ . "/shared/footerscripts.php";
    ?>
    <script src="../assets/js/pages/login.js"></script>
    <?php
    require __DIR__ . "/shared/foot.php";
    ?>