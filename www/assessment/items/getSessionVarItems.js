/*jslint browser:true*/
/*global $, jQuery, window*/
$(document).ready(function () {
    "use strict";
    $("#submit").click(function () {
        var itemID = $("#itemID").val();
        var dataString = 'itemID1=' + itemID;
        if (itemID === '') {
            window.alert("Please Fill in Item ID Field");
        } else {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "ajaxsubmit.php",
                data: dataString,
                cache: false,
                success: function () {
                    window.location.reload();
                }
            });
        }
        return false;
    });
});
