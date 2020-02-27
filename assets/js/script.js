function send() {
    var text = $('#msg').val().toLowerCase();

    $.ajax({
        type: "post",
        url: "search.php",
        data: {
            text: text
        },
        success: function (data) {
            $('#ref').load(' #ref');
        }
    });
}