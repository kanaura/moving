/* javascriptのコードを記載 */

$(document).ready(function() {
    $('#btn-submit').on('click', function() {
        if (!$('#chk-agree').is(':checked')) {
            alert('「同意します」をチェックしてください。');
        } else {
            $('#form-price').submit();
        }
        return false;
    });
});