$(document).ready(function () {

    $('#book__file-input').on('change', function () {

        $('#book__upload-wrapper').css('display', 'none');
        $('#book__properties').css('display', 'block');

        var url = $(this).data('url');

        var book = this.files[0];
        var bookId = $(this).data('book-id');
        var bookName = book.name.split('.').slice(0, -1).join('.');
        $('#book__name').val(bookName);

        var formData = new FormData();
        formData.append('book_id', bookId);
        formData.append('name', bookName);
        formData.append('book', book);

        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            success: function (bookBeforeProcessing) {

                var interval = setInterval(function () {

                    $.ajax({
                        url: `/dashboard/books/${bookBeforeProcessing.id}`,
                        method: 'GET',
                        success: function (bookWhileProcessing) {

                            $('#book__upload-status').html('Processing');
                            $('#book__upload-progress').css('width', bookWhileProcessing.percent + '%');
                            $('#book__upload-progress').html(bookWhileProcessing.percent + '%');

                            if (bookWhileProcessing.percent == 100) {
                                clearInterval(interval); //break interval
                                $('#book__upload-status').html('Done Processing');
                                $('#book__upload-progress').parent().css('display', 'none');
                                $('#book__submit-btn').css('display', 'block');
                            }
                        },
                    });//end of ajax call

                }, 3000)

            },
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = Math.round(evt.loaded / evt.total * 100) + "%";
                        $('#book__upload-progress').css('width', percentComplete).html(percentComplete)
                    }
                }, false);
                return xhr;
            },
        });//end of ajax call

    });//end of file input change

});//end of document ready