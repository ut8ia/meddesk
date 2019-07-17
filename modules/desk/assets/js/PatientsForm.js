$(document).ready(
    function () {
        $('#patientsform-region_id').change(function (evt) {
            var regionId = $(this).val();

            if(regionId ==26 ){
                $('#districtRow').removeClass('hidden');
                $('#patientsform-city_type').val('city');
                $('#patientsform-city').val('Київ');
            }
            else {
                $('#districtRow').addClass('hidden');
            }

        });

    }
);