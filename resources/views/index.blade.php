<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/public/js/app.js"></script>
</head>
<body>
<table id="table1">

</table>


<form id="form_data">
   @csrf
    <input type="text" name="name" placeholder="Имя">
    <input type="email" name="email" placeholder="Почта">
    <input type="tel" name="phone" placeholder="Телефон">
    <input type="password" name="password" placeholder="Пароль">
    <input type="file" name="photo">
    <input type="submit" value="Submit">
</form>

<button id="show-more" data-page="1" data-max=>Show more</button>



</body>
</html>
