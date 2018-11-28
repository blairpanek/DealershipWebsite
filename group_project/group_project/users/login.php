<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
  <body>
    <form action="handle_login.php" method="get">
      Username: <input type="text" name="username"><br>
      Password: <input type="text" name="password"><br>
      <input type="submit">
    </form>
    <br>
    <button onclick="location.href = 'http://students.cs.ndsu.nodak.edu/~blpanek/CSCI366/DealershipWebsite/group_project/group_project/users/AddUser.php';" id= "myButton" class= "float-left submit-button" > New User</button>
  </body>
</html>
