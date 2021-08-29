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
        <div class="row">
            <div class="col-sm12">
                <table border="1px">
                    <thead>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                           <?php
                           $i=0;
                           if($ref >0)
                           {
                               $i++

                            ?>
                        @foreach ($ref as $key => $reff)

                        <tr>
                            <td>{{$i++}}</td>
                             <td>{{$reff['name']}} </td>
                             <td>{{$reff['email']}}</td>
                             <td><a href="{{url('edit',$key)}}">edit</a></td>

                         </tr>
                         @endforeach
                         <?php
                         }?>
                    </tbody>
                </table>
                <br>
                <a href="{{url('class')}}" class="btn btn-success">insert</a>
            </div>
         </div>
    </div>
</body>
</html>
