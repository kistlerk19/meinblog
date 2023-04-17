$("#logoutButton").click(function (e){
    $.get({
        url: "/api/logout",
        success: function () {
            window.location.href = "/";
        },
        error: function () {
            // window.location.href = "/";
        }
    });
});

$(".navbar-nav a.active").removeClass("active");
$(".navbar-nav a[href='" + location.href + "']").addClass("active");