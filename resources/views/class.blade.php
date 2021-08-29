<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="col-sm-12">
            <form action="{{route('get.data')}}" method="post">
                @csrf
            <input type="text" name="name">
            <input type="email" name="email">
            <input type="submit" value="submit">
        </form>
        </div>
    </div>
</body>
</html>
