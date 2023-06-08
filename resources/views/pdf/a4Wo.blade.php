<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>RADNI NALOG br. {{ $workingOrder->number }} </title>
    <style>
        @page {
            margin-bottom: 1cm;
        }
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: normal;
            src: local('Source Sans Pro'), local('Source Sans Pro'), url(http://fonts.gstatic.com/s/sourcesanspro/v9/ODelI1aHBYDBqgeIAH2zlNRl0pGnog23EMYRrBmUzJQ.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: bold;
            src: local('Source Sans Pro Bold'), local('Source Sans Pro-Bold'), url(http://fonts.gstatic.com/s/sourcesanspro/v9/toadOcfmlt9b38dHJxOBGOiMeWyi5E_-XkTgB5psiDg.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: normal;
            src: local('Source Sans Pro Italic'), local('Source Sans Pro-Italic'), url(http://fonts.gstatic.com/s/sourcesanspro/v9/M2Jd71oPJhLKp0zdtTvoMwRX4TIfMQQEXLu74GftruE.ttf) format('truetype');
        }
        body {
            font-family: 'Source Sans Pro';
            font-size: 14pt;
        }
        /** Define the margins of your page **/
        table.start, table.start td, table.start tr {
            border: 1px solid rgb(122, 122, 122);
            border-collapse: collapse;
            text-align: center;
            font-size: 14pt;
            padding: 5px;
        }
        table.items, table.items td, table.items tr {
            border: 1px solid rgb(122, 122, 122);
            border-collapse: collapse;
            font-size: 12pt;
            padding: 5px;
        }
    </style>
</head>
<body>
    <table class="start" width="100%">
        <tr>
            <td colspan="2" style=" background-color: #000; color: white;">
                <strong>TVRTKA</strong>
            </td>
            <td colspan="2" style=" background-color: #000; color: white;">
                <strong>NARUČITELJ</strong>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                {{ $workingOrder->host }}
            </td>
            <td colspan="2">
                {{ $workingOrder->client }}
            </td>
        </tr>
        @if($workingOrder->vehicle_model || $workingOrder->vehicle_km || $workingOrder->vehicle_reg_plate)
        <tr>
            <td colspan="4" style="font-size: 10pt;">
                Vozilo: {{ $workingOrder->vehicle_model }} / KM: {{ $workingOrder->vehicle_km }} / Reg.: {{ $workingOrder->vehicle_reg_plate }}
            </td>
        </tr>
        @endif
        <tr>
            <td colspan="4" style="font-size: 24pt; background-color: #000; color: white;">
                <strong>RADNI NALOG br. {{ $workingOrder->number }}</strong>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 0px; font-size: 12pt;">
                DATUM TRANSAKCIJE:
            </td>
            <td colspan="2" style="padding: 0px; font-size: 12pt;">
                {{ $workingOrder->date->format('d.m.Y.') }}
            </td>
        </tr>
    </table>
    <table class="items" width="100%">
        <tr>
            <td style="text-align: center;">
                <strong>Stavka</strong>
            </td>
            <td style="text-align: center;">
                <strong>Količina</strong>
            </td>
            <td style="text-align: center;">
                <strong>Poj. cijena</strong>
            </td>
            <td style="text-align: center;">
                <strong>Ukupno</strong>
            </td>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td style="text-align: left;">
                {{ $item->description }}
            </td>
            <td style="text-align: center;">
                {{ $item->amount }}
            </td>
            <td style="text-align: right;">
                {{ number_format($item->price, 2, ',', '.') }}
            </td>
            <td style="text-align: right;">
                {{ number_format($item->total, 2, ',', '.') }}
            </td>
        </tr>
        @endforeach
        </table>
        <table class="items" width="100%">
        <tr>
            <td colspan="1" style="text-align: center; padding: 5px;">
                <strong>Ukupno:</strong>
            </td>
            <td colspan="3" style="text-align: center; padding: 5px;">
                <strong>{{ number_format($items->sum('total'), 2, ',', '.') }} EUR</strong>
            </td>
        </tr>
    </table>
</body>
</html>