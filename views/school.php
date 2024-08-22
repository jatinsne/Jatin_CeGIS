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
                            <li class="breadcrumb-item" aria-current="page">School</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">School</h2>
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
                                        <h5 class="modal-title" id="stateModalTitle">School</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="stateForm" autocomplete="off">
                                            <div class="mb-3">
                                                <label class="form-label">School UDISE ID</label>
                                                <input name="udise" id="udiseid" required type="text" class="form-control" placeholder="Enter School UDISE ID">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">School Name</label>
                                                <input name="name" id="stateNameField" required type="text" class="form-control" placeholder="Enter School name">
                                                <input name="id" id="idField" type="hidden" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">School Type</label>
                                                        <select required class="form-control" name="type" id="typeField">
                                                            <option value="Govt">Govt</option>
                                                            <option value="Private">Private</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Status</label>
                                                        <select required class="form-control" name="status" id="statusField">
                                                            <option value="1">Active</option>
                                                            <option value="0">Deactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Block </label>
                                                <select required class="form-control" name="blockid" id="blockid">
                                                    <option value="">Select Block</option>
                                                </select>
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
                        <a onclick="openStateModal()" class="btn btn-primary text-light m-r-10 m-b-10 mb-3">Add New School</a>
                        <div class="table-responsive">
                            <table class="table table-hover" id="tableState">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>School Name</th>
                                        <th>UDISE ID</th>
                                        <th>Type</th>
                                        <th>Block</th>
                                        <th>Tehsil</th>
                                        <th>District</th>
                                        <th>State</th>
                                        <th>Status</th>
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
<script src="../assets/js/plugins/choices.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../assets/js/plugins/dataTables.min.js"></script>
<script src="../assets/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="../assets/js/pages/school.js"></script>
<?php
require __DIR__ . "/shared/foot.php";
?>