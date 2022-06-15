/* javascriptのコードを記載 */

$(document).ready(function() {
    console.log( "ready!" );

    $('#btn-lead').on('click', function() {
        $('#popup').fadeIn(300);
    });

    $('#popup-bg').on('click', function() {
        $('#popup').hide();
    });
});