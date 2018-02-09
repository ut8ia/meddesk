$(document).ready(
    function () {
        $('.expert_id_value').change(function (evt) {
            var el = $(this);
            jsonrpcWrapper('/desk/rpc/jsonrpc', 'meetsExpert', {'expertId': [el.val()]}, function (data) {
                var options = [];
                $.each(data.responseJSON.result.expertGroups, function (i, val) {
                    options.push(new Option(val.name, val.id));
                });
                $('#meetsform-expert_group_id').html(options).trigger('change');

                options = [];
                $.each(data.responseJSON.result.places, function (i, val) {
                    options.push(new Option(val.name, val.id));
                });
                $('#meetsform-place_id').html(options).trigger('change');

            });
        });
    }
);