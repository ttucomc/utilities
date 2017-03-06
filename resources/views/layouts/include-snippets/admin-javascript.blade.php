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

        $('.collapsible').collapsible();

        // Login modal will display if user is not logged in
        @if(! Auth::check())
            $('#login-modal').openModal({dismissible:false});
        @endif
    });
</script>
