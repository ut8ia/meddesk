$(document).ready(function () {
    window.expertSearch = new expertSearch();
});

function expertSearch() {
    this.requestAutocomplete = function (request, response) {
        jsonrpcWrapper('/desk/rpc/jsonrpc', 'expertsAutocomplete', {
                'request': request
            },
            function (xhr, status) {
                response(xhr.responseJSON.result.response_list);
            });
    };

    this.selectItem = function (a, b) {
        $('.expert_id_value').val(b.item.id).trigger("change");
    };


}