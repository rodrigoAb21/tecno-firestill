<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Lista de Productos </title>
    <style>
        body{
            font-family: "Helvetica";
        }
        table.minimalistBlack {
            border: 0px solid #000000;
            width: 100%;
            border-collapse: collapse;
        }
        table.minimalistBlack td, table.minimalistBlack th {
            border: 1px solid #000000;
            padding: 5px 4px;
        }
        table.minimalistBlack tbody td {
            font-size: 13px;
        }
        table.minimalistBlack thead {
            background: #CFCFCF;
            background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
            background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
            background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
            border-bottom: 0px solid #000000;
        }
        table.minimalistBlack thead th {
            font-size: 15px;
            font-weight: bold;
            color: #000000;
            text-align: center;
        }
        .container {
            position: relative;
            text-align: center;
            color: black;
        }

        /* Centered text */
        .centered {
            position: absolute;
            top: 4%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
<div class="container">
    <img src="{{public_path('img/ifsc.png')}}" style="width: 100%"/>
    <div class="centered">
        <h2>Inventario de Productos {{date('d/M/Y')}}</h2>
    </div>
    <div style="clear: both;" />
</div>
<br>
<div>
    <div>
        <table class="minimalistBlack">
            <thead>
            <tr>
                <th style="width: 5%">COD</th>
                <th>NOMBRE</th>
                <th>CATEGORIA</th>
                <th>EXISTENCIAS</th>
                <th>PRECIO U. Bs</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td style="width: 5%; text-align: center">{{$producto->id}}</td>
                    <td style="text-align: center">{{$producto->nombre}}</td>
                    <td style="text-align: center">{{$producto->categoria->nombre}}</td>
                    <td style="text-align: center">{{$producto->cantidad}}</td>
                    <td style="text-align: center">{{$producto->precio}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>