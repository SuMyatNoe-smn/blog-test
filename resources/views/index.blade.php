<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 30px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Exchange Rate
                </div>
                <table class="table table-bordered">
                            <thead style="background-color: #f8fafc;">
                                <!-- <tr>
                                  <td><strong>DATE</strong></td>
                                  <td><strong>BANK</strong></td>
                                  <td></td>
                                  <td><strong>USD</strong></td>
                                  <td><strong>SDG</strong></td>
                                  <td><strong>EUR</strong></td>
                                  <td><strong>THB</strong></td>
                                </tr> -->
                            </thead>
                            <tbody>
                            @if (count($currencies) === 0)
                                <tr>
                                    <td colspan="9">Result not found.</td>
                                </tr>
                            @elseif (count($currencies) >= 1)
                                @foreach($currencies as $currency)
                                <tr>
                                    <td></td>
                                    @foreach($banks as $bank)
                                        @if ($bank->id === $currency->bank_id)
                                            <td>{{$bank->bank_name}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{$currency->bank_id}}</td>
                                    <td>{{$currency->currency_name}}</td>
                                    <td>Buy Rate</td>
                                    <td>{{$currency->buy_rate}}Ks</td>
                                    <td>Sell Rate</td>
                                    <td>{{$currency->sell_rate}}Ks</td>
                                   
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
            </div>
        </div>
    </body>
</html>
