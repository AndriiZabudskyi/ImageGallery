$(document).ready(function() {
    /**
     * Init ajax request to fetch tags from server
     * @returns {*|{getAllResponseHeaders, abort, setRequestHeader, readyState, getResponseHeader, overrideMimeType, statusCode}}
     */
    function loadAvailableTags() {
        return $.ajax({
            type: 'GET',
            url: '/get-all-tags',
        });
    }

    /**
     * Init select2 tags function
     */
    function initSelect2() {
        $(".tags").select2({
            tags: true,
            width: '100%',
            tokenSeparators: [',', ' '],
            allowClear: true,
            placeholder: 'Add your tags here',
            escapeMarkup: function (text) {
                return text;
            },
            "language": {
                "noResults": function(){
                    return "Select tag if exist or add your own";
                }
            }
        });
    }

    /**
     * Create options for select tag
     * @param data
     * @returns {string}
     */
    function createSelectOptions(data){
        var selectOptions = '';

        $.each(data.tags, function (index, item) {
            selectOptions += "<option value='" + item['name'] + "'>" + item['name'] +  "</option>";
        });

        return selectOptions;
    }

    /**
     * Create files preview with additional fields
     * @param files
     * @param tagsSelectOptions
     */
    function createFilesPreview(files, tagsSelectOptions) {
        $.each(files, function(index, file){
            if(/(\.|\/)(jpe?g|png)$/i.test(file.type)) {
                var fRead = new FileReader();

                fRead.onload = (function(){
                    return function(e) {
                        var src = e.target.result;
                        var imageContainer =
                            "<div class='col-lg-4 col-md-12 mb-5 mb-lg-5'>" +
                            "<div class='imageBlock mt-4'>" +
                            "<div class='text-center'>" +
                            "<input class='form-control' type='text' placeholder='Title' name='title'>" +
                            "</div>" +
                            "<img class='w-100 mb-3 mt-3 shadow-1-strong rounded' name='image' data-file-name='" + file.name + "' src=" + src + ">" +
                            "<div class='text-center'>" +
                            "<select class='tags form-control' name='tags[]' multiple='multiple'>" +
                            tagsSelectOptions +
                            "</select>" +
                            "</div>" +
                            "</div>" +
                            "</div>";

                        $('#thumb-output .row').append(imageContainer);
                        initSelect2();
                    };
                })(file);

                fRead.readAsDataURL(file);
            }
        });
    }

    /**
     * Build formData object for Ajax request
     * @returns {FormData}
     */
    function getFormData() {
        var formData = new FormData();

        $('#thumb-output').find('div[class="imageBlock mt-4"]').each(function (index) {
            var image = dataURLtoFile($(this).find('img[name="image"]').attr('src'),$(this).find('img[name="image"]').attr('data-file-name'));

            formData.append('images[' + index + '][image]', image);
            formData.append('images[' + index + '][title]', $(this).find('input[name="title"]').val());
            formData.append('images[' + index + '][tags]', $(this).find('select[name="tags[]"]').val());
        });

        formData.set('_token', $('meta[name="csrf-token"]').attr('content'));

        return formData;
    }

    /**
     * Create File from data URL
     * @param src
     * @param filename
     * @returns {File}
     */
    function dataURLtoFile(src, filename) {
        var arr = src.split(','),
            mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]),
            length = bstr.length,
            u8arr = new Uint8Array(length);

        while(length--){
            u8arr[length] = bstr.charCodeAt(length);
        }

        return new File([u8arr], filename, {type:mime});
    }

    /**
     * Parse errors for user-friendly view
     *
     * @param errorsToParse
     * @returns {string}
     */
    function parseErrors(errorsToParse) {
        var errors = [];

        $.each(errorsToParse, function (index, error) {
            $.each(error, function (ind, err) {
                errors.push(err);
            })
        });

        errors = errors.filter((value, index, number) => number.indexOf(value) === index);

        var parsedErrors = '';

        $.each(errors, function (index, error) {
            parsedErrors += "<strong>" + error + "</strong><br>";
        });

        return parsedErrors;
    }

    /**
     * Handle adding files by loading tags and create preview
     */
    $('#file-input').on('change', function (e) {
        $('#upload-error').html('').hide();

        loadAvailableTags()
            .then(response => {
                var tagsSelectOptions = createSelectOptions(response);
                createFilesPreview($(this)[0].files, tagsSelectOptions);
            });
    });

    /**
     * Custom rule for file size validation
     */
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0}');

    /**
     * File input validator
     */
    $('#file-upload-form').validate({
        rules: {
            "image[]": {
                extension: "jpg|jpeg|png|jfif|pjpeg|pjp",
                filesize: 20971520,
            }
        },
        messages: {
            "image[]": {
                extension: "Please enter an image with one of valid extension: .jpg, .jpeg, .png"
            }
        }
    });

    /**
     * Upload button handler
     */
    $('#multiple-upload').on('click', function (e) {
        e.preventDefault();
        $('.alert-success').hide();
        $('#upload-error').html('').hide();

        if($('#file-upload-form').valid()) {
            $.ajax({
                type: 'POST',
                url: '/image-gallery',
                data: getFormData(),
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                beforeSend: function() {
                    $('#multiple-upload').prop('disabled', true);
                },
                success: function (response) {
                    $('#message').html(response.message);
                    $('#multiple-upload').prop('disabled', false);
                    $('#clear-files').trigger('click');
                    $('.alert-success').show();
                },
                error: function (response) {
                    $('#multiple-upload').prop('disabled', false);
                    $('#upload-error').html(parseErrors(response.responseJSON.errors))
                        .show();
                    e.preventDefault();
                }
            });
        }
    });

    /**
     * Clear file input
     */
    $('#clear-files').on('click', function () {
        $('#file-input').val('');
        $('#thumb-output .row').empty();
        $('#upload-error').html('').hide();
    });
});