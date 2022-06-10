$(document).ready(function() {
    $(document).on('change', '#sort-property', function(e) {
        $(this).parents('form').submit();
    });

    $('.search-state').on('change', function() {
        var name = $(this).val();
        var val = $(this).data("value");
        var dependent = $(this).data('dependent');

        if (name == "") {
            $("." + dependent).html('<option value="">Select City</option>');
        } else {
            var select = $(this).attr('id');
            $.ajax({
                url: "get-city",
                method: "POST",
                async: false,
                data: { name: name, select: select },
                success: function(result) {
                    console.log(dependent)
                    $("." + dependent).html(result);
                    $('.' + dependent).val(val);
                },
            })
        }
    })
    $('.search-state').trigger('change');

    if ($('#no-propety').val() != undefined) {
        swal({
            title: "No Property Found",
            text: "Sorry for the inconvenience. Chekout Our featured properties.",
            icon: "error",
            button: "OK",
        });
    }
})