$(document).ready(function () {
    window.patientSearch = new patientSearch();
});

function patientSearch() {
    this.requestAutocomplete = function (request, response) {
        jsonrpcWrapper('/desk/rpc/jsonrpc', 'patientsAutocomplete', {
                'request': request
            },
            function (xhr, status) {
                response(xhr.responseJSON.result.response_list);
            });
    };

    this.selectItem = function (a, b) {
        $('.patient_id_value').val(b.item.id);
        $('.patient_id_value').trigger("change");
    };


}