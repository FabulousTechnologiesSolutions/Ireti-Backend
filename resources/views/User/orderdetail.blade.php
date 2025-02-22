<!DOCTYPE html>
<html lang="en">

<head>
    @include('../Template.csslinks')
    <title>Validate Order</title>
</head>

<body>
    <div class="section">
        <div class="maindiv">
            @include('../Template.usersidebar')
            <div class="rightmain">
                @include('../Template.usernav')
                <div class="rightbottom">
                    <div class="container-fluid">
                        <div class="row px-3 px-md-5">
                            <h4>Validate Order</h4>
                            <div class="col-md-8 pb-5">
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <p class="font-semi small mb-0">Order Details</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <p class="font-semi small mb-0">Product Type</p>
                                    <p class="mb-0 small">{{ $orderData->FundType }}</p>
                                </div>
                                @if(isset($orderData['FundType']) && $orderData['FundType']== "FX")
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Date</p>
                                        <p class="mb-0 small">{{ $orderData->created_at }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Currency Pair</p>
                                        <p class="mb-0 small">{{ $orderData->firstcurrency ." / ". $orderData->secondcurrency}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Currency Buy</p>
                                        <p class="mb-0 small">{{ $orderData->currencytb }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Target Exchange Rate</p>
                                        <p class="mb-0 small">{{ $orderData->targetp }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi small mb-0">Amount to Buy</p>
                                        <p class="mb-0 small">{{ $orderData->amountb }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Amount to Sell</p>
                                        <p class="mb-0 small">{{ $orderData->amountts }}</p>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Underlying</p>
                                        <p class="mb-0 small">{{ $orderData->underlying }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Country of Origin</p>
                                        <p class="mb-0 small">{{ $orderData->country }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Grade</p>
                                        <p class="mb-0 small">{{ $orderData->grade }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Buy/Sell</p>
                                        <p class="mb-0 small">{{ $orderData->buysell }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Quantity</p>
                                        <p class="mb-0 small">{{ $orderData->quantity }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Unit of Measurement</p>
                                        <p class="mb-0 small">{{ $orderData->unit }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Price Target Per Unit</p>
                                        <p class="mb-0 small">{{ $orderData->targetp }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Incoterm</p>
                                        <p class="mb-0 small">{{ $orderData->Incoterm }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="font-semi mb-0 small">Details</p>
                                        <p class="mb-0 small">{{ $orderData->details }}</p>
                                    </div>
                                @endif
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <p class="font-semi small mb-0  mt-3">Do You Wish to Validate This Order ?</p>
                                    <div class="d-flex align-items-center  mt-3">
                                        <a href="{{ 'validateOrder/' . $orderData->id }}"
                                            class="px-3 py-1 me-2 border-0 rounded-3 green text-white font-semi text-decoration-none">Yes</a>
                                        <a href="{{route('user.products')}}">
                                            <button
                                                class=" px-3 py-1 ms-2  border-0 rounded-3 bg-secondary text-white font-semi">
                                                No
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ftr text-center">
                    <p class="mb-0 text-muted">©2024 Ireti Capital. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
    @include('../Template.jslinks')
</body>

</html>