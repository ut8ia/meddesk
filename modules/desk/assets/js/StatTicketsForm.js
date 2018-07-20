$(document).ready(
    function () {


        $('.expert_id_value').change(function (evt) {
            var el = $(this);
            jsonrpcWrapper('/desk/rpc/jsonrpc', 'meetsExpert', {'expertId': [el.val()]}, function (data) {

                //expert group selector
                var options = [];
                $.each(data.responseJSON.result.expertGroups, function (i, val) {
                    options.push(new Option(val.name, val.id));
                });
                $('#statticketform-expert_group_id').html(options).trigger('change');

                //place selector
                options = [];
                $.each(data.responseJSON.result.places, function (i, val) {
                    options.push(new Option(val.name, val.id));
                });
                $('#statticketform-place_id').html(options).trigger('change');

            });
        });

        $('.patient_id_value').change(function (evt) {

            jsonrpcWrapper('/desk/rpc/jsonrpc', 'patientMeets', {'patientId': [$(this).val()]}, function (data) {

            });

        })


    }
);