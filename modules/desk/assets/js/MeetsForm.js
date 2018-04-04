$(document).ready(
    function () {


        $('.expert_id_value').change(function (evt) {
            var el = $(this);
            $('#w2').fullCalendar('removeEvents');
            jsonrpcWrapper('/desk/rpc/jsonrpc', 'meetsExpert', {'expertId': [el.val()]}, function (data) {

                //expert group selector
                var options = [];
                $.each(data.responseJSON.result.expertGroups, function (i, val) {
                    options.push(new Option(val.name, val.id));
                });
                $('#meetsform-expert_group_id').html(options).trigger('change');

                //place selector
                options = [];
                $.each(data.responseJSON.result.places, function (i, val) {
                    options.push(new Option(val.name, val.id));
                });
                $('#meetsform-place_id').html(options).trigger('change');

                //refresh fullcalendar
                var events = data.responseJSON.result.expertMeets;
                $('#w2').fullCalendar('removeEventSource', events);
                $('#w2').fullCalendar('addEventSource', events);
                $('#w2').fullCalendar('refetchEvents');

            });
        });

        $('.patient_id_value').change(function (evt) {

            $('#w1').fullCalendar('removeEvents');
            jsonrpcWrapper('/desk/rpc/jsonrpc', 'patientMeets', {'patientId': [$(this).val()]}, function (data) {

                //refresh fullcalendar
                var events = data.responseJSON.result;
                $('#w1').fullCalendar('removeEventSource', events);
                $('#w1').fullCalendar('addEventSource', events);
                $('#w1').fullCalendar('refetchEvents');

            });

        })


    }
);