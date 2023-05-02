<div class="modal fade" id="UsersModal">
    <div class="modal-dialog modal-fullscreen text-dark">
        <div class="modal-content">
            <div class="modal-content container">
                <div class="row">
                    <div class="col-12 text-end">
                        <span type="button" class="btn-close" data-bs-dismiss="modal"></span>
                    </div>
                    <div class="col-12">
                        <div class="alert alert-danger errorContainer" style="display:none;">
                            <h5 class="font-weight-bolder">Error!</h5>
                            <ul></ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                        <h5 class="modal-title font-weight-bold">NEW USER</h5>
                        <hr>
                        <form action="" id="UsersForm">
                            <input type="hidden" class="form-control" id="itemId">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="userName" class="form-label">Name</label>
                                    <input type="name" class="form-control" id="userName" placeholder="Kwaku Frimpong">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="userEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="userEmail" placeholder="name@example.com">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" autocomplete="new-password">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="passwordConfirmation" autocomplete="new-password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer container">
                <button type="button" class="btn btn-sm btn-secondary rounded-4" data-bs-dismiss="modal">Close</button>
                <button type="button" id="SubmitUsersForm" class="btn btn-sm btn-primary rounded-4">Save or Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    let userEnpoint = "/api/dashboard/users";
    function clearForm(){
        $("#itemId").val(null);
        $("#userName").val(null);
        $("#userEmail").val(null);
        $("#password").val(null);
        $("#passwordConfirmation").val(null);
        clearErrors();
    }
    function clearErrors(){
        $("#UsersModal .errorContainer ul").empty();
        $("#UsersModal .errorContainer").hide();
    }
    function showErrors(errorList = []){
        Object.keys(errorList).forEach(key => {
            $("#UsersModal .errorContainer ul").append(
                "<li><b>" + key + ": </b>" + errorList[key] + "</li>"
            );
            $("#UsersModal .errorContainer").show();
        });
    }
    $(document).ready(function () {
        $("#SubmitUsersForm").click(function () {
            event.preventDefault();
            clearErrors();
            $.post(
                userEnpoint,
                {
                    id: $("#itemId").val(),
                    name: $("#itemName").val(),
                    email: $("#itemEmail").val(),
                    password: $("#password").val(),
                    password_confirmation: $("#passwordConfirmation").val(),
                },
                function (response) {
                    $UserModel.hide();
                    $("#dataTable").DataTable().ajax.reload();
                }
            ).fail(function (response) {
                if (response.status === 422) {
                    showErrors(response.responseJSON["errors"]);
                } else {
                    showErrors({
                        Error: "Could not process your request! Please try again later."
                    });
                }
            });
        });
    });

</script>