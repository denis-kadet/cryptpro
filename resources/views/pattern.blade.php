@php
$printContents = Storage::disk('local')->get('private/img/print.png');
$signatureContents = Storage::disk('local')->get('private/img/signature.png');

$printImg = '<img src="data:image/png;base64,' . base64_encode($printContents) . '"  width="141" height="140" />';
$signatureImg = '<img src="data:image/png;base64,' . base64_encode($signatureContents) . '"  width="80" height="50" />';
@endphp

<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Справка_121215</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: dejavu serif;
            font-size: 14px;
        }

        .page-break {
            page-break-after: always;
        }

        body {
            padding: 50px 30px;
        }

        table.iksweb {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            table-layout: fixed;
        }

        table.iksweb th {
            background: #347c99;
            color: #fff;
            font-weight: normal;
        }
    </style>
</head>

<body>
    <table class="iksweb">
        <tbody>
            <tr>
                <td colspan="3" style="height: 35px; text-align: center; vertical-align: bottom; font-weight: bold;">
                    Открытое
                    акционерное общество "Буревестник"</td>
            </tr>
            <tr>
                <td colspan="2" style="height: 35px; text-align: left; vertical-align: bottom;">г. Хабаровск</td>
                <td colspan="1" style="height: 35px; text-align: right; vertical-align: bottom;">17 ноября 2024</td>
            </tr>
            <tr>
                <td style="height: 35px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center; vertical-align: bottom; font-weight: bold;">Справка
                    №123456</td>
            </tr>
            <tr>
                <td style="height: 35px;"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <p style="text-indent: 25px; text-align: justify;">
                        Справка дана Иванову Иван Ивановичу в том, что он(а) действительно
                        работает в ОАО "Буревестник" на условиях совместительства с 1 августа 2022 года
                        в должности юриста департамента внешних связей.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="height: 35px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left; vertical-align: bottom">Справка дaна для предъявления по
                    месту требования.</td>
            </tr>
            <tr>
                <td style="height: 35px;"></td>
            </tr>
            <tr>
                <td colspan="1" style="text-align: left; vertical-align: bottom">Начальние отдела кадров</td>
                <td colspan="1" style="position: relative;"><span style="position: absolute; right: 25%">{!! $signatureImg !!}</span></td>
                <td colspan="1" style="text-align: right; vertical-align: bottom">М.М. Гаврилова</td>
            </tr>
            <tr>
                <td style="height: 35px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left; vertical-align: bottom; position: relative;">МП <span style="position: absolute;  top: -90px;">{!! $printImg !!}</span></td>
            </tr>
        </tbody>
    </table>

    {{-- <table class="iksweb">
    <body>
    <tr>
        <td>
            @isset($subject)
                @include('components/first-print-component', [
                'subject' => $subject,
                'serial_number'=> $serial_number,
                'from_date' => $from_date,
                'till_date'=> $till_date,
            ])
            @endisset
        </td>
        <td>
            @isset($sign2_subject)
                @include('components/first-print-component', [
                    'subject' => $sign2_subject,
                    'serial_number'=> $sign2_serial_number,
                    'from_date' => $sign2_from_date,
                    'till_date'=> $sign2_till_date,
                ])
            @endisset
        </td>
    </tr>
    </body>
</table> --}}
</body>
