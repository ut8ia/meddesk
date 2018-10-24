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

            jsonrpcWrapper('/desk/rpc/jsonrpc', 'patientProfile', {'patientId': [$(this).val()]}, function (data) {

                // patient profile data
                if(typeof(data.responseJSON.result.profile) != "undefined" && data.responseJSON.result.profile !== null){
                    var profile = data.responseJSON.result.profile;

                    $('#statticketform-patient_id').val(profile.id);
                    $('#statticketform-name').val(profile.name);
                    $('#statticketform-surname').val(profile.surname);
                    $('#statticketform-patronymic').val(profile.patronymic);
                    $('#statticketform-card_number').val(profile.card_number);
                    $('#statticketform-birthdate').val(profile.birthdate);
                    $('#statticketform-sex').val(profile.sex);
                    $('#statticketform-address').val(profile.address);
                    $('#statticketform-region_id').val(profile.region_id);
                    $('#statticketform-phone').val(profile.phone);
                    $('#statticketform-address').val(profile.address);
                    $('#statticketform-birthdate').kvDatepicker('update');

                    // set main diagnose id
                    $('#statticketform-diagnose_id').val(data.responseJSON.result.mainDiagnoseId).trigger('change');

                    $('#statticketform-first_meet').prop('checked',!data.responseJSON.result.hasMeets);

                    $('#statticketform-first_meet_in_year').prop('checked',!data.responseJSON.result.hasThisYearMeets);

                }

            });

        })


    }
);