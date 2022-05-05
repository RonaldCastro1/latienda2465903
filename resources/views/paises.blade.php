<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paises</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <center><h1>Paises de la region</h1><hr> 
    <table class="table table-bordered table-stripped">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Capital</th>
                <th>Moneda</th>
                <th>Poblacion</th>
                <th>Ciudades</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $pais => $infopais)
            <tr>
                <td  rowspan='{{ count($infopais["ciudades"]) }}'>
                {{$pais}}
                </td>
                <td style="color:pink" rowspan='{{ count($infopais["ciudades"]) }}'>
                    {{$infopais["capital"]}}
                </td>
                <td style="color:yellow" rowspan='{{ count($infopais["ciudades"]) }}'>
                    {{$infopais["moneda"]}}
                </td>
                <td style="color:blue" rowspan='{{ count($infopais["ciudades"]) }}'>
                    {{$infopais["poblacion"]}} millones hab
                </td>
                @foreach($infopais["ciudades"] as $ciudad)
                <th style="color:red">
                    {{ $ciudad}}
                </th>
            </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot></tfoot>
    </table></center>
</body>
</html>