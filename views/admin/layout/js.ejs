<script type="text/javascript">
    function numbersonly(e) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
        var unicode = e.charCode ? e.charCode : e.keyCode;

        if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
            if (unicode < 48 || unicode > 57) //if not a number
                return false //disable key press
        }
    }

    function alphaonly(evt) {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
            return false;
    }
</script>
<script type="text/javascript">
    $(document).on('submit', 'form.formSubmit', function(e) {

        e.preventDefault();
        var data = new FormData(this);
        $('.loderIcon').show();
        $('.loderButton').prop("disabled", true);
        $.ajax({
            cache: false,
            contentType: false,
            processData: false,
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            dataType: "json",
            data: data,
            beforeSend: function() {
                $('.preloader').show();
            },
            complete: function() {
                $('.preloader').hide();
            },
            success: function(response) {
                $('.loderIcon').hide();
                $('.loderButton').prop("disabled", false);
                if (response.responseCode == 200) {
                    toastr.success(response.responseMessage);
                    if (response.responseUrl) {
                        location.href = response.responseUrl;
                    } else {
                        location.reload();
                    }

                } else {
                    toastr.error(response.responseMessage);
                    if(response.responseUrl)
                        {
                            location.href = response.responseUrl;
                        }
                }
            }
        });
    });


    $(document).on('click', 'button.edit_model', function() {
        $("div.edit_model").load($(this).data('href'), function() {
            $('div.edit_model').modal('show');
            $('.select-single-edit').select2({
                selectOnClose: true,
                dropdownParent: $(".modalwithselectedit")
            });
        });
    });



    $(document).on('click', 'button#deactivateBtn', function(e) {
        e.preventDefault();

        swal({
                title: "Are You Sure",
                text: "Do You Want To Active ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: $(this).attr("href"),
                        method: 'POST',
                        dataType: "json",
                        data: {
                            "_token": "{{ csrf_token() }}",

                        },
                        success: function(response) {
                            if (response.success == 200) {

                                swal("", "" + response.message + "", "success").then(
                                    function() {
                                        location.reload();
                                    })



                            } // end success if
                        } // end success function.
                    }); // end ajax .
                } else {
                    // Write something here.
                }
            }); // End then.
    }); // end Document.

    // Status Active Code
    $(document).on('click', 'button#activateBtn', function(e) {
        e.preventDefault();

        swal({
                title: "Are You Sure",
                text: "Do You Want To InActive ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: $(this).attr("href"),
                        method: 'POST',
                        dataType: "json",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.success == 200) {

                                swal("", "" + response.message + "", "success").then(
                                    function() {
                                        location.reload();
                                    })



                            } // end success if
                        } // end success function.
                    }); // end ajax .
                } else {
                    // Write something here.
                }
            }); // End then.
    });

    $(document).on('click', 'button#delete', function(e) {
        e.preventDefault();

        swal({
                title: "Are You Sure",
                text: "Do You Want To Remove",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: $(this).attr("href"),
                        method: 'GET',
                        dataType: "json",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.success == 200) {

                                swal("", "" + response.message + "", "success");

                                setInterval(function() {
                                    location.reload(true);
                                }, 2000);

                            }
                        }
                    });
                } else {

                }
            });
    });

    $(document).ready(function() {
        $('.select-single').select2({
            selectOnClose: true,
            dropdownParent: $(".modalwithselect2")
        });


    });
</script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
<script>
    $(document).ready(function() {
        $('#summernote1').summernote();
    });
</script>
<script>
    $(document).ready(function() {
        $('#summernote2').summernote();
    });
</script>
<script>
    $(document).ready(function() {
        $('.summernote1').summernote();
    });
</script>

<script>
    $(document).ready(function() {
        // Function to add a new row
        $(document).on('click', '.add-button', function() {
            var newRow = `
                <div class="dynamic-row">
                    <div class="row">
                    <div class="col-md-12>
                        <label class="col-form-label">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="titles[]" placeholder="Enter Title" required>
                    </div>
                    <br>
                    <div class="col-md-12>
                        <label class="col-form-label">Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="descriptions[]"   rows="4" placeholder="Enter Description" required></textarea>
                    </div>

                    </div>
                     <div class="mb-3 col-md-12 col-sm-12">
                        <button type="button" class="btn btn-danger remove-button">Remove</button>
                    </div>
                </div>
            `;
            $('#dynamic-field-wrapper').append(newRow);
        });

        // Function to remove a row
        $(document).on('click', '.remove-button', function() {
            $(this).closest('.dynamic-row').remove();
        });
    });
</script>
