<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('dashboard.layout.head')
</head>

<body class="bg-light">

    @include('dashboard.layout.navbar')

    <div class="container ps-5 pe-5">
        <div class="row">
            <div class="col-12 p-2 text-left mt-4">
                <h1 class="p-2">{{ $title }}</h1>

                <div class="p-2 mt-4 mb-4 border-bottom-black border-top-black">
                    <button type="button" class="btn btn-sm btn-dark rounded-3" onclick="clearForm(); $UsersModal.show();">
                        New User
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="dataTableErrorContainer">
                    <ul class="text-danger" id="dataTableErrorsUl"></ul>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-stripeed table-bordered responsive text-dark w-100" id="dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
    @include("dashboard.users.form")
    <script>

        let tableUrl = "/api/dashboard/users/index";

        let $UsersModal = new bootstrap.Modal(
            $("#UsersModal"),
            {
                keyboard: false,
                focus: true,
                backdrop: true,
            }
        );

        function editItem(itemId) {
            $.ajax({
                url: "/api/dashboard/users/" + itemId,
                type: "GET",
                success: function (response) {
                    $("#itemId").val(response["id"]);
                    $("#userName").val(response["name"]);
                    $("#userEmail").val(response["email"]);
                    $UsersModal.show();
                },
                error: function (response) {
                    alert("Error: Could not get item.");
                },
            });
        }
        
        function deleteItem(itemId) {
            $.ajax({
                url: "/api/dashboard/users/" + itemId,
                type: "DELETE",
                success: function (response) {
                    $("#dataTable").DataTable().ajax.reload();
                },
                error: function (response) {
                    alert("Error: Could not delete item.");
                },
            });
        }

        function createDataTable(tableId, url, columns) {
            return $("#" + tableId).DataTable({
                ajax: {
                    url: url,
                    type: "GET",
                    complete: function (jqXHR){
                        if (jqXHR.statu === 200){
                            $("#dataTableErrorsUl").empty();
                            $("#dataTableErrorContainer").hide();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown){
                        $("#dataTableErrorsUl").empty();
                        $("#dataTableErrorsUl").append(
                            "<li>" +
                                "An error occured. Please try again later. If the problem persists, contact our support." + 
                            "</li>"
                        );
                        $("#dataTableErrorContainer").show();
                    },
                },
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: true,
                deferRender: true,
                columns: columns,
            });
        }

        $(document).ready(function () {
            let dataTable = createDataTable(
                "dataTable",
                tableUrl,
                [
                    {
                        data: "name",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "email",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "actions",
                        orderable: true,
                        searchable: true,
                        className: "text-end"
                    },
                ]
            );
        });
    </script>

</body>

</html>
