<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        .borders {
            border: #b2b2b2 1px solid;
            border-collapse: collapse;
        }
        .letter {
            font-size: 13px;
            font-family: Helvetica;
            font-weight: bold;
            margin-top: 4px;
        }
        .letter2 {
            font-size: 13px;
            font-family: Helvetica;
        }
        hr {
            height: 4px;
            background-color: black;
            border: none;
        }
        .table-bordered td {
            border: 1px solid #000;
            text-align: center; /* Centrar horizontalmente */
            vertical-align: middle; /* Centrar verticalmente */
            padding: 10px;
            width: 100%; 
        }
        /* .divcenter {
            width: 100%;
            text-align: center;
        } */
        .table-bordered {
            width: 100%;
        }
        .centertd {
            
        }
        /* .divbarcode {
            
            margin-left: 30px;
        } */
    </style>
</head>
<body>
    <div class="row" style="margin-top:3px;text-align: center;">
        <h3 class="text-success border-2 border-bottom text-center" style="font-family: Helvetica;font-weight: bold;">IMPRESIÓN DE ETIQUETAS</h3>
    </div>
    <div class="row" style="margin-top:3px;">
        <table class="table table-bordered">
            <tbody class="borders">
                @for ($i = 0; $i < count($productsArray); $i += 3)
                    <tr>
                        <td class="centertd">
                            <div>{{ substr($productsArray[$i]['nombre'], 0, 20) }}</div>
                            <div class="divbarcode">{!! $productsArray[$i]['barcode'] !!}</div>
                            <div>$ {{ $productsArray[$i]['pventa'] }}</div>
                        </td>
                        @if (isset($productsArray[$i + 1]))
                            <td>
                                <div>{{ substr($productsArray[$i]['nombre'], 0, 20) }}</div>
                                <div class="divbarcode">{!! $productsArray[$i + 1]['barcode'] !!}</div>
                                <div>$ {{ $productsArray[$i + 1]['pventa'] }}</div>
                            </td>
                        @else
                            <td></td>
                        @endif
                        @if (isset($productsArray[$i + 2]))
                            <td>
                                <div>{{ substr($productsArray[$i]['nombre'], 0, 20) }}</div>
                                <div class="divbarcode">{!! $productsArray[$i + 2]['barcode'] !!}</div>
                                <div>$ {{ $productsArray[$i + 2]['pventa'] }}</div>
                            </td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</body>
</html>