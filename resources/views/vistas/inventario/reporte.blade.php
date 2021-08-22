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
    </style>
</head>
<body>
<div>
    <div style="width: 20%; float: left; border-left: 2px solid #687578; padding-left: 5px" align="center">

    </div>
    <div style="text-align: center">
        <h2 align="center">Inventario - {{date('d-m-Y H:i:s')}}</h2>
    </div>
    <div style="width: 20%; float: left; border-left: 2px solid #687578; padding-left: 5px" align="center">

    </div>
    <div style="clear: both;" />
</div>
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