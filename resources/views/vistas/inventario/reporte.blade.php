<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
    <img src="{{public_path('img/ifsc2.png')}}" style="width: 100%"/>
    <div class="centered">
        <h2>Inventario de Productos - {{date('d/M/Y')}}</h2>
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
                <th>ORIGEN</th>
                <th>EXISTENCIAS</th>
                <th>PRECIO U. Bs</th>
                <th>DESCRIPCION</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td style="width: 5%; text-align: center">{{$producto->id}}</td>
                    <td style="text-align: center">{{$producto->nombre}}</td>
                    <td style="text-align: center">{{$producto->categoria->nombre}}</td>
                    <td style="text-align: center">{{$producto->origen}}</td>
                    <td style="text-align: center">{{$producto->cantidad}}</td>
                    <td style="text-align: center">{{$producto->precio}}</td>
                    <td style="text-align: center">{{$producto->descripcion}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script('
            $text = sprintf(_("Página %d de %d"),  $PAGE_NUM, $PAGE_COUNT);
            // Uncomment the following line if you use a Laravel-based i18n
            //$text = __("Página :pageNum de :pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
            $font = null;
            $size = 9;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default

            // Compute text width to center correctly
            $textWidth = $fontMetrics->getTextWidth($text, $font, $size);

            $x = ($pdf->get_width() - $textWidth) / 2;
            $y = $pdf->get_height() - 35;

            $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        '); // End of page_script
    }
</script>
</body>
</html>