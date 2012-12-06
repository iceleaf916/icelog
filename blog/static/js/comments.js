function bindPostCommentHandler() {
    //$('#').remove();
    $('#respond form').submit(function() {
        $.ajax({
            type: "POST",
            data: $('#respond form').serialize(),
            url: "/comments/post/",
            cache: false,
            dataType: "html",
            success: function(html, textStatus) {
                $('#respond form').replaceWith(html);
                bindPostCommentHandler();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('Your comment was unable to be posted at this time. \nWe apologise for the inconvenience.');
            }
        });
        return false;
    });
}
 
$(document).ready(function() {
    bindPostCommentHandler();
});
