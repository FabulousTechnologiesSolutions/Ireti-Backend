<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main2.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Map</title>
    <style>
        .mail-sec p {
            font-weight: 400;
            font-size: 16px;
        }

        .mail-sec h1 {
            font-size: 30px !important;
            margin-bottom: 10px;
        }

        .mail-sec h2 {
            font-size: 20px;
            color: green;
        }

        .mail-sec .fw-bold {
            font-weight: 700
        }

        .mail-sec .p2 {
            padding-bottom: 66px;
            border-bottom: 1px solid black;
        }

        .mail-sec .p3 {
            padding-bottom: 66px;
            border-bottom: 1px solid black;
        }

        .mail-sec .p4 {
            padding-bottom: 66px;
        }
    </style>
</head>

<body>
    <section class="py-4 mail-sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="mb-0">Dear {{ $requestMail['fname'] }},</p>
                    <p class="mb-0 mt-3 p2">We are pleased to inform you that your order with Ireti Capital has been
                        successfully processed. The funds have been transferred to your beneficiary account. Please find
                        the details of your transaction below:</p>
                </div>
            </div>
            <div class="row p3">
                <div class="col-12">
                    <div class="mt-5 border-top border-bottom border-dark border-3">
                        <p class="mb-0 fw-bold">Transaction Details</p>
                        <ul>
                            <li>
                              <p class="mb-0">
                                <span class="fw-bold">Date of Conversion:</span>
                                {{ \Carbon\Carbon::parse($requestMail['orderdate'])->format('Y-m-d') }}
                            </p>
                            </li>
                            @if ($requestMail['FundType'] == 'FX')
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Currency pair:
                                        </span>{{ $requestMail['firstcurrency'] }} /
                                        {{ $requestMail['secondcurrency'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Currency Buy:
                                        </span>{{ $requestMail['currencytb'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Amount to buy:
                                        </span>{{ $requestMail['amountb'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Amount to sell:
                                        </span>{{ $requestMail['amountts'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Target Exchange Rate:
                                        </span>{{ $requestMail['targetp'] }}</p>
                                </li>
                            @elseif($requestMail['FundType'] == 'Soft Commodities')
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Underlying:
                                        </span>{{ $requestMail['underlying'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Country of Origin:
                                        </span>{{ $requestMail['country'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Grade: </span>{{ $requestMail['grade'] }}
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Buy/Sell:
                                        </span>{{ $requestMail['buysell'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Quantity:
                                        </span>{{ $requestMail['quantity'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Unit of Measurement:
                                        </span>{{ $requestMail['unit'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Price Target per Unit:
                                        </span>{{ $requestMail['targetp'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Incoterm:
                                        </span>{{ $requestMail['Incoterm'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Details:
                                        </span>{{ $requestMail['details'] }}</p>
                                </li>
                            @else
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Underlying:
                                        </span>{{ $requestMail['underlying'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Country of Origin:
                                        </span>{{ $requestMail['country'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Grade: </span>{{ $requestMail['grade'] }}
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Buy/Sell:
                                        </span>{{ $requestMail['buysell'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Quantity:
                                        </span>{{ $requestMail['quantity'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Unit of Measurement:
                                        </span>{{ $requestMail['unit'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Price Target per Unit:
                                        </span>{{ $requestMail['targetp'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Incoterm:
                                        </span>{{ $requestMail['Incoterm'] }}</p>
                                </li>
                                <li>
                                    <p class="mb-0"><span class="fw-bold">Details:
                                        </span>{{ $requestMail['details'] }}</p>
                                </li>
                            @endif
                            <li>
                                <p class="mb-0"><span class="fw-bold">Payment Reference Number:
                                    </span>{{ $requestMail['pid'] }}</p>
                            </li>
                            <li>
                              <p class="mb-0">
                                <span class="fw-bold">Payment’s date:</span>
                                {{ \Carbon\Carbon::parse($requestMail['pdate'])->format('Y-m-d') }}
                            </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>If you have any questions regarding this transaction or need further assistance, please don't
                        hesitate to contact our support team at info@ireticapital.com.</p>
                    <p>Thank you for choosing Ireti Capital, we look forward to serving you again.</p>
                    <p class="mb-0">Best regards</p>
                    <p class="mb-0">Ireti Capital Team</p>
                    <a href="mailto:info@ireticapital.com" class="d-flex">info@ireticapital.com</a><br>
                    <a href="https://www.ireticapital.com" target="_blank">www.ireticapital.com</a>
                </div>
            </div>
    </section>
</body>

</html>