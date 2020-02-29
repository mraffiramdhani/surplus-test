function ajaxPost(Url, FormData, Type = "POST") {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    return $.ajax({
        url: Url,
        type: Type,
        data: FormData,
        dataType: "json"
    });
}

function ajaxGet(Url) {
    return $.ajax({
        url: Url,
        type: "GET",
        dataType: "json"
    });
}
