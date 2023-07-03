<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Breakfast Voucher {{ $breakfast->number }} </title>
    <style>
        @page {
            margin-bottom: 1cm;
        }
        @font-face {
            font-family: 'Exo 2';
            font-style: normal;
            font-weight: normal;
            src: local('Exo 2'), local('Exo 2'), url(http://fonts.gstatic.com/s/exo2/v3/Pf_kZuIH5c5WKVkQUaeSWQ.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Exo 2';
            font-style: normal;
            font-weight: bold;
            src: local('Exo 2 Bold'), local('Exo 2-Bold'), url(http://fonts.gstatic.com/s/exo2/v3/2DiK4XkdTckfTk6we73-bQ.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Exo 2';
            font-style: italic;
            font-weight: normal;
            src: local('Exo 2 Italic'), local('Exo 2-Italic'), url(http://fonts.gstatic.com/s/exo2/v3/xxA5ZscX9sTU6U0lZJUlYA.ttf) format('truetype');
        }
        body {
            font-family: 'Exo 2';
            font-size: 12pt;
        }
        footer {
            position: fixed;
            bottom: 1.5em;
            left: 0px;
            right: 0px;
            height: 8mm;

            /** Extra personal styles **/
            border-top: 1px solid #000000;
            color: rgb(70, 70, 70);
            text-align: center;
            padding-top: 1mm;
            font-size: 7pt;
        }
        /** Define the margins of your page **/

    </style>
</head>
<body>
    <table style="width:100%">
        <tr>
            <td>
                <img src="img/logo.png" style="max-height:60px;" alt="Logo">
            </td>
            <td style="text-align: right;">
                <h2>Breakfast Voucher #{{ $breakfast->number }}</h2>
            </td>
        </tr>
    </table>
    <table style="width:100%; margin-top: 1cm">
        <tr>
            <td style="text-align:left;">
                <label><strong>Breakfast Service:</strong></label>
                <br>
                {{ $breakfast->breakfastService->name }}
                <br>
                <label><strong>Location:</strong></label>
                <br>
                {{ $breakfast->breakfastLocation->name }}
                <br>
                <label><strong>Number of People:</strong></label>
                <br>
                {{ $breakfast->people_amount}}
                <br>
                <label><strong>First Date:</strong></label>
                <br>
                {{ $breakfast->first_date->format('d.m.Y.') }}
                <br>
                <label><strong>Last Date:</strong></label>
                <br>
                {{ $breakfast->last_date->format('d.m.Y.') }}
                <br>
                <label><strong>Days:</strong></label>
                <br>
                {{ $breakfast->days }}
            </td>
            <td style="text-align:right;vertical-align: top;">
                <label><strong>Name:</strong></label>
                <br>
                {{ $breakfast->guest_name}}
                <br>
                <label><strong>Address:</strong></label>
                <br>
                {{ $breakfast->guest_address}}
                <br>
                <label><strong>Phone:</strong></label>
                <br>
                {{ $breakfast->guest_phone}}
                <br>
                <label><strong>Voucher created by:</strong></label>
                <br>
                <i>{{ $breakfast->user->name}}</i>
                <br>
            </td>
        </tr>
        @if (!is_null($breakfast->note) && !empty($breakfast->note))
        <tr>
            <td colspan="2">
                <strong>** Note:</strong> {{ $breakfast->note }}
            </td>
        </tr>
        @endif
    </table>
    <table style="width:100%; margin-top: 1cm">
        <tr>
            <td style="text-align:left;">
                <img src="img/qr_kairos_web.png" style="max-height:90px;" alt="Contact">    
            </td>
            <td style="text-align:right;">
                @if( $breakfast->discount)
                <label><strong>Discount:</strong></label>
                {{ $breakfast->discount }}%
                <br>
                @endif
                <label><strong>Total price:</strong></label>
                {{ number_format($breakfast->total_price, 2, ',', '.') }} €
                <br>
                <label><strong>Paid amount:</strong></label>
                {{ number_format($breakfast->paid_amount, 2, ',', '.') }} €
                <br>
                <label><strong>Rest to pay:</strong></label>
                {{ number_format($breakfast->rest_to_pay_amount, 2, ',', '.') }} €
                <br>
            </td>
        </tr>
    </table>
    <footer>
        Datum i mjesto izdavanja: {{ $breakfast->created_at->format('d.m.Y. H:i') }}, Trogir <br>
        Podaci prodajnog mjesta: Putnička agencija Kairos, Trg Sv. Jakova 15, Trogir <br>
        Podaci tvrtke: Kamerlengo d.o.o., Cesta Plano 96, Plano (Grad Trogir), OIB 59968700742<br>
        mob: +385 91 9222 330, tel: +385 21 796 290 mail: info@kairos-trogir.com, web: kairos-trogir.com<br>
        UUID: {{ $breakfast->uuid }}
    </footer>
</body>
</html>