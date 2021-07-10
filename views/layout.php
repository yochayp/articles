<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
  </script>

<body class=" vh-100">

  <?php
  require_once "navbar.php";
  ?>
</body>
<script>
    $(function() {
        $('.modal').on('hidden.bs.modal', function(){
          console.log('inside function');
            $(this).removeData('.modal');
        });
        $('body').on('hidden.bs.modal', '.modal', function () {
          console.log('inside function');

    $(this).removeData('.odal');
});
    });
</script>

</html>