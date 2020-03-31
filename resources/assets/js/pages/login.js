$(document).ready(function () {
    //Square blue color scheme for iCheck
    $('input[type="checkbox"].square-blue').iCheck({
        checkboxClass: 'icheckbox_square-blue'
    });

    $("#signup").click(function() {
        $("#notific").remove();
    });
});