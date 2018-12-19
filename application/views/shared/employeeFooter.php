<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="<?php echo base_url();?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#datepickerFrom').datepicker({
            uiLibrary: 'bootstrap4',
            minDate: today,
            maxDate: function () {
                return $('#datepickerTo').val();
            }
        });
        $('#datepickerTo').datepicker({
            uiLibrary: 'bootstrap4',
            minDate: function () {
                return $('#datepickerFrom').val();
            }
        });
    </script>

</html>