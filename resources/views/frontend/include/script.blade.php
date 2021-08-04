  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>       
        <!-- Bootstrap core JS-->
        <script src="{{url('/')}}/public/admin/assets/js/bootstrap.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{url('/')}}/public/admin/assets/js/scripts.js"></script>
        <script>
            $('.menuclose').click(function () {
                $('body').removeClass('sb-sidenav-toggled');
    
            });
        </script>

<script>
    $(document).on("click", ".browse", function() {
  var file = $(this)
    .parent()
    .parent()
    .parent()
    .find(".file");
  file.trigger("click");
});
$(document).on("change", ".file", function() {
  $(this)
    .parent()
    .find(".form-control")
    .val(
      $(this)
        .val()
        .replace(/C:\\fakepath\\/i, "")
    );
});

</script>s
        