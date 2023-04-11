<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
</head>

<body class="bg-light">

    @include('layout.navbar')

    <div class="container">
        <div class="row justify-content-center p-3">
            <div class="col-12">
                <h1 class="text-dark text-center">LOGIN</h1>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-5">
                <form name="login" class="mt-2">
                    @csrf
                    <div class="mt-2">
                        <div class="col-12">
                            <div id="formErrors" class="alert alert-danger text-start" role="alert" style="display:none;">
                                <ul class="m-0">

                                </ul>
                            </div>
                        </div>
                            <!-- Email input -->
                        <div class="rounded round-3">
                            <div class="form-outline mb-4">
                                <label class="form-label" >Email address:</label>
                                <input type="email" id="email" class="form-control" />
                            </div>
                        </div>
                        
                        <!-- Password input -->
                        <div class="rounded round-3">
                            <div class="form-outline mb-4">
                                <label class="form-label">Password:</label>
                                <input type="password" id="password" class="form-control" />
                            </div>
                        </div>
                        
                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" checked />
                                <label class="form-check-label"> Remember me </label>
                            </div>
                            </div>
                        
                            <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                            </div>
                        </div>
                        
                        <!-- Submit button -->
                        <button type="button" class="btn btn-dark font-weight-bolder w-100 btn-block mb-4 rounded rounded-4" id="signInButton">Sign in</button>
                        
                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="#!">Register</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        let loginSubmitted =  false;

        function clearErrors() {
            $("#formErrors ul").empty();
            $("#formErrors").hide();
        }

        function addErrors(errorArray) {
            if (Array.isArray(errorArray) && errorArray.length > 0) {
                for (let i = 0; i < errorArray.length; i++) {
                    $("#formErrors ul").append("<li>" + errorArray[i] +  "</li>");
                }
                $("#formErrors").show();
            }
        }

        function formatErrors(errorArray) {
            let errorList = [];

            for (const key in errorArray) {
                if (errorArray.hasOwnProperty(key)) {
                    errorList.push(errorArray[key]);
                }
            }

            return errorList;
        }

        $(document).ready(function () {
            $("#signInButton").click(function (e){
                e.preventDefault();

                clearErrors();

                if (loginSubmitted !== true) {
                    loginSubmitted = true;

                    $.post({
                        "url": "/api/login",
                        "data": {
                            "_token": "{{ csrf_token() }}",
                            "email": $("#email").val(),
                            "password": $("#password").val(),
                        },
                        success: function (response){
                            loginSubmitted = false;
                            window.location.href = "/dashboard";
                        },
                        error: function (response){
                            loginSubmitted = false;
                            
                            if (response.status == 422) {
                                addErrors(formatErrors(response.responseJSON.errors));
                            } else {
                                addErrors(["Unable to process your request."]);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
