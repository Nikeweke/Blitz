<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Slim php template</title>
  </head>
  <body>

    <h2>Hello there</h2>
    <h3>It is a Slim php template</h3>

    <hr>

   <h4>Users</h4>

   <ul>

     <?php foreach ($users as $key => $user) { ?>

           <li>Email: <?= $user['email'] ?> </li>

    <?php } ?>

   </ul>




  </body>
</html>
