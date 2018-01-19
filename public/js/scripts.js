$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    error: function(response) {
        msgShow(response.responseText);
    }
});

var msgShow = function(msg) {
    $('.msg-container p').html(msg);
    $('.msg-container').slideDown();
}
var msgHide = function(msg) {
    $('.msg-container p').html('');
    $('.msg-container').slideUp();
}

$(document).ready(function() {
    $('#frm_shorten').submit(function(e) {
        e.preventDefault();

        var url = $('#txt_url').val();
        //url can be validated here
        if( url ) {
            $('#btn_shorten').attr('disabled', 'disabled');
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize()
            }).done(function(response) {
                $('#txt_url').val('');
                msgShow(response.short_url);
                $('#btn_shorten').removeAttr('disabled');
            }).fail(function() {
                $('#btn_shorten').removeAttr('disabled');
            });
        } else {
            msgShow('Please enter valid URL');
        }

        return false;
    });
});