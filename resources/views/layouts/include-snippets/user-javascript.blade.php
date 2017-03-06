<script src="/js/app.js"></script>
<script src="/js/materialize.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Side Nav on mobile
        $('.button-collapse').sideNav({
            closeOnClick: true
        });

        // Dropdown nav items
        $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrain_width: false,
            hover: true,
            alignment: 'right'
        });

        Materialize.updateTextFields();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        initializeFacultyCVDropzone();

        $('#cv-area-after-faculty-user-upload').hide();

        function initializeFacultyCVDropzone() {
            $('#faculty-user-cv-dropzone').dropzone({
                url: "api/team/store/faculty-team-member/cv",
                paramName: 'cv',
                maxFiles: 1,
                maxFilesize: 3,
                acceptedFiles: ".pdf",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
                },
                init: function() {
                    var cvDropzone = this;

                    this.on('sending', function(file, xhr, formData) {
                        formData.append("eraiderID", $('#eraiderID').val());
                    });

                    this.on('success', function(file, response) {
                        Materialize.toast("CV uploaded successfully", 4000, 'blue');

                        $('#cv-after-faculty-user-upload').attr("href", response.cvpath);

                        setTimeout(function() {
                            $('#cv-area-before-faculty-user-upload').hide();
                            $('#cv-area-after-faculty-user-upload').css("display", "block")
                        }, 4000);

                    });

                    this.on('error', function() {
                        Materialize.toast("CV upload failed", 4000, 'red');
                    });
                }
            });
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Form must be modified to click the update button
        $('form')
            .each(function() {
                $(this).data('serialized', $(this).serialize());
            })
            .on('change input', function() {
                $(this)
                    .find('input:submit, button:submit')
                        .attr('disabled', $(this).serialize() == $(this).data('serialized'));
            })
            .find('input:submit, button:submit')
                .attr('disabled', true);
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $('#success-status').hide();
        }, 5000);
    })
</script>
