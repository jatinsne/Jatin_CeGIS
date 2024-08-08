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
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">States</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">State</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="stateModal" class="modal fade" tabindex="-1" aria-labelledby="stateModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="stateModalTitle">State</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="stateForm" autocomplete="off">
                                            <div class="mb-3">
                                                <label class="form-label">State Name</label>
                                                <input name="name" id="stateNameField" required type="text" class="form-control" placeholder="Enter state name">
                                                <input name="id" id="idField" type="hidden" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" form="stateForm" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" form="stateForm" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a onclick="openStateModal()" class="btn btn-primary text-light m-r-10 m-b-10 mb-3">Add New State</a>
                        <div class="table-responsive">
                            <table class="table table-hover" id="tableState">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../assets/js/plugins/dataTables.min.js"></script>
<script src="../assets/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="../assets/js/pages/states.js"></script>
<?php
require __DIR__ . "/shared/foot.php";
?>