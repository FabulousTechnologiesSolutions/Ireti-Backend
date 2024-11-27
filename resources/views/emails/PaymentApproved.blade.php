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
    </style>
</head>

<body>
    <section class="py-4 mail-sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($requestMail['role'] == 'admin')
                        <p><span class="mb-0 fw-bold">Subject: </span>Payment Approved – Funds to Be Released</p>
                        <p class="mb-0">Dear Admin,</p>
                        <p class="mb-0 mt-3 p2">Payment of {{ $requestMail['fname'] }} has been approved
                            and will be released shortly.</p>
                    @else
                        <p><span class="mb-0 fw-bold">Subject: </span>Payment Approved – Funds to Be Released</p>
                        <p class="mb-0">Dear {{ $requestMail['fname'] }},</p>
                        <p class="mb-0 mt-3 p2">Congratulations! Your payment has been approved and will be released shortly. </p>
                    @endif
                </div>
            </div>
            <div class="row p3">
                <div class="col-12">
                    <div class="mt-5 border-top border-bottom border-dark border-3">
                        <p class="mb-0 fw-bold">Payment recap :</p>
                        <ul>
                            <li>
                                <p class="mb-0">
                                    <span class="fw-bold">Beneficiary Name:</span>
                                    {{ $requestMail['accountname'] }}
                                </p>
                            </li>
                            <li>
                                <p class="mb-0">
                                    <span class="fw-bold">Beneficiary Number:</span>
                                    {{ $requestMail['accountnumber'] }}
                                </p>
                            </li>
                            <li>
                                <p class="mb-0">
                                    <span class="fw-bold">Amount:</span>
                                    {{ $requestMail['amount'] }}
                                </p>
                            </li>
                            <li>
                                <p class="mb-0">
                                    <span class="fw-bold">Currency:</span>
                                    {{ $requestMail['currency'] }}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if ($requestMail['role'] == 'user')
                    <p>If you have any questions or need assistance, feel free to contact us.</p>
                    @endif
                    <p class="mb-0">Best regards,</p>
                    <p class="mb-0">Ireti Operations Team</p>
                </div>
            </div>
    </section>
</body>

</html>