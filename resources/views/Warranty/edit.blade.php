<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table" >
    <thead>
        <tr >
            <th>proyecto</th>
            <th>fecha inicio</th>
            <th>fecha final</th>
        </tr>
    </thead>
    <tbody id="myTable" name="myTable">
        @foreach($tickets as $conulta_dbdad)
        <tr>
            <td>{{$conulta_dbdad->proyecto}} </td>
            <td>{{$conulta_dbdad->fecha_inicio}}</td>
            <td>{{$conulta_dbdad->fecha_final}}</td>
            <td> <input type="button" value="Editar" class="btn btn-warning"> </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>