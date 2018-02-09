function jsonrpcWrapper(url, method, params, successCallback) {
    var csrf = $('meta[name="csrf-token"]').attr("content");
    return $.ajax({
        url: url,
        data: JSON.stringify({
            "jsonrpc": "2.0",
            "id": '<?= md5(microtime()) ?>',
            "method": method,
            "params": params
        }),
        type: 'POST',
        dataType: 'JSON',
        contentType: 'application/json-rpc',
        complete: successCallback,
        headers: {'X-CSRF-Token': csrf}
    });
}