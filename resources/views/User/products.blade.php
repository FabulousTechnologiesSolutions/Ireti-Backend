<!DOCTYPE html>
<html lang="en">

<head>
    @include('../Template.csslinks')
    <title>Products</title>
</head>

<body>
    @if (session('success'))
    <script>
        swal("Good Job!", "{{session('success')}}", "success");
    </script>
    @endif
    <div class="section">
        <div class="maindiv">
            @include('../Template.usersidebar')
            <div class="rightmain">
                @include('../Template.usernav')
                <div class="rightbottom">
                    <div class="container-fluid pb-5">
                        <div class="col-12 px-3 px-md-5">
                            <h4>Products</h4>
                            <div class="mt-3">
                                <label for="selectOption">Product type</label>
                                <select id="selectOption" class="form-control">
                                    <option value="FX">FX</option>
                                    <option value="commodities">Soft Commodities</option>
                                    <option value="oil">Oil and oil Derivatives</option>
                                    <option value="Metals">Metals and Precious Metals</option>
                                </select>
                            </div>
                        </div>

                        <div class="row px-3 px-md-5">

                            <div id="FX" class="product-fields">
                                <form action="{{ route('user.submitorder') }}" method="POST" id="OrderForm">
                                    @csrf
                                    <div class="col-sm-6">
                                        <div class="mt-3">
                                            <input type="number" readonly value="0" name="status" id="status"
                                                class="form-control d-none">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mt-3">
                                            <input type="text" readonly name="FundType" id="OrderType" value="FX"
                                                class="form-control d-none">
                                        </div>
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="col-sm-5">
                                            <div class="mt-3">
                                                <label for="firstcurrency">Choose First Currency</label>
                                                <select name="firstcurrency" required id="firstcurrency" class="form-control text-center">
                                                    <option selected disabled hidden>Choose currency</option>
                                                    @foreach ($currencies as $currency)
                                                        <option value="{{ $currency['currency'] }}">
                                                            {{ $currency['currency'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="mt-3">
                                                <p class="mb-0 text-center">/</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="mt-3">
                                                <label for="secondcurrency">Choose second Currency</label>
                                                <select name="secondcurrency" required id="secondcurrency"
                                                    class="form-control text-center">
                                                    <option selected disabled hidden>Choose currency</option>
                                                    @foreach ($currencies as $currency)
                                                    <option value="{{ $currency['currency']}}" {{ $currency['currency']}}>{{ $currency['currency']}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="targetp">Target Price</label>
                                                <input type="text" id="targetprice" required name="targetp" id="targetp"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="currencytb">Choose Currency to buy</label>
                                                <select id="currencytb" name="currencytb" class="form-control">
                                                    <!-- Options will be dynamically added here -->
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <p class="mt-3 mb-0" id="rate"></p>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="amountb">Amount to Buy</label>
                                                <input type="text" id="buyamount" required name="amountb"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="amounts">Amount to Sell</label>
                                                <input type="text" id="sellamount" required name="amountts" id="amounts"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <p id="rate"></p>
                                    <div class="col-12">
                                        <div class="mt-3">
                                            <input type="text" name="filled" value="No" id="" readonly class="d-none">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mt-3 d-flex justify-content-end">
                                            <button type="submit"
                                                class=" px-4 py-2 me-3 border-0 rounded-3 green text-white font-semi">
                                                Validate Order
                                            </button>
                                            <button type="reset" id="resetButton"
                                                class=" px-4 py-2 border-0 rounded-3 green text-white font-semi">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="commodities" class="product-fields">
                                <form action="{{ route('user.submitorder') }}" method="POST" id="OrderForm">
                                    @csrf
                                    <div class="col-sm-6">
                                        <div class="mt-3">
                                            <input type="number" readonly value="0" name="status" id="status"
                                                class="form-control d-none">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mt-3">
                                            <input type="text" readonly name="FundType" value="Soft Commodities"
                                                class="form-control d-none">
                                        </div>
                                    </div>
                                    @if ($softs->count() > 0)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="underlying">Select underlying commodity</label>
                                                <select name="underlying" id="underlying" class="form-control">
                                                    @foreach ($softs as $soft)
                                                    <option {{ $soft['underlaying']}}>{{ $soft['underlaying']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="country">Country of Origin</label>
                                                <input type="text" required name="country" id="country"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="grade">Grade</label>
                                                <input type="text" required name="grade" id="grade"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="cell">Buy/Sell</label>
                                                <input type="text" required name="buysell" id="cell"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" required name="quantity" id="quantity"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="unit">Unit of Measurement</label>
                                                <select name="unit" id="unit" class="form-control">
                                                    <option value="choose" selected disabled hidden>choose</option>
                                                    <option value="Gram">Gram</option>
                                                    <option value="Kg">Kg</option>
                                                    <option value="Ton">Ton</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="targetp">Price Target per Unit</label>
                                                <input type="text" required name="targetp" id="targetp"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="Incoterm">Incoterm</label>
                                                <input type="text" required name="Incoterm" id="Incoterm"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="details">Additional Details</label>
                                                <textarea id="details" required name="details" cols="30" rows="5"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mt-3">
                                            <input type="text" name="filled" value="No" id="" readonly class="d-none">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mt-3 d-flex justify-content-end">
                                            <button type="submit"
                                                class=" px-4 py-2 border-0 rounded-3 green text-white font-semi">
                                                Validate Order
                                            </button>
                                        </div>
                                    </div>
                                    @else
                                    <p class="text-danger">There is no underlying commodity for soft commodity</p>
                                @endif
                                </form>
                            </div>
                            <div id="oil" class="product-fields">
                                <form action="{{ route('user.submitorder') }}" method="POST" id="OrderForm">
                                    @csrf
                                    <div class="col-sm-6">
                                        <div class="mt-3">
                                            <input type="number" readonly value="0" name="status" id="status"
                                                class="form-control d-none">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <input type="text" readonly name="FundType" class="d-none"
                                            value="Oil and oil Derivatives" class="form-control">
                                    </div>
                                    <div class="row">
                                    @if ($oils->count() > 0)
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="underlying">Select underlying commodity</label>
                                                <select name="underlying" id="underlying" class="form-control">
                                                    @foreach ($oils as $oil)
                                                    <option {{ $oil['underlaying']}}>{{ $oil['underlaying']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="country">Country of Origin</label>
                                                <input type="text" required name="country" id="country"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="grade">Grade</label>
                                                <input type="text" required name="grade" id="grade"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="cell">Buy/Sell</label>
                                                <input type="text" required name="buysell" id="cell"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" required name="quantity" id="quantity"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="unit">Unit of Measurement</label>
                                                <select name="unit" id="unit" class="form-control">
                                                    <option value="choose" selected disabled hidden>choose</option>
                                                    <option value="Gram">Gram</option>
                                                    <option value="Kg">Kg</option>
                                                    <option value="Ton">Ton</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="targetp">Price Target per Unit</label>
                                                <input type="text" required name="targetp" id="targetp"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="Incoterm">Incoterm</label>
                                                <input type="text" required name="Incoterm" id="Incoterm"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="details">Additional Details</label>
                                                <textarea id="details" required name="details" cols="30" rows="5"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <input type="text" name="filled" value="No" id="" readonly
                                                    class="d-none">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3 d-flex justify-content-end">
                                                <button type="submit"
                                                    class=" px-4 py-2 border-0 rounded-3 green text-white font-semi">
                                                    Validate Order
                                                </button>
                                            </div>
                                        </div>
                                        @else
                                        <p class="text-danger">There is no underlying commodity for oil and oil derivatives</p>
                                    @endif
                                    </div>
                                </form>
                            </div>
                            <div id="Metals" class="product-fields">
                                <form action="{{ route('user.submitorder') }}" method="POST" id="OrderForm">
                                    @csrf
                                    <div class="col-sm-6">
                                        <div class="mt-3">
                                            <input type="number" readonly value="0" name="status" id="status"
                                                class="form-control d-none">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <input type="text" readonly name="FundType" class="d-none"
                                            value="Metals" class="form-control">
                                    </div>
                                    <div class="row">
                                    @if ($metals->count() > 0)
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="underlying">Select underlying commodity</label>
                                                <select name="underlying" id="underlying" class="form-control">
                                                    @foreach ($metals as $metal)
                                                    <option {{ $metal['underlaying']}}>{{ $metal['underlaying']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="country">Country of Origin</label>
                                                <input type="text" required name="country" id="country"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="grade">Grade</label>
                                                <input type="text" required name="grade" id="grade"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="cell">Buy/Sell</label>
                                                <input type="text" required name="buysell" id="cell"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" required name="quantity" id="quantity"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="unit">Unit of Measurement</label>
                                                <select name="unit" id="unit" class="form-control">
                                                    <option value="choose" selected disabled hidden>choose</option>
                                                    <option value="Gram">Gram</option>
                                                    <option value="Kg">Kg</option>
                                                    <option value="Ton">Ton</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="targetp">Price Target per Unit</label>
                                                <input type="text" required name="targetp" id="targetp"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="Incoterm">Incoterm</label>
                                                <input type="text" required name="Incoterm" id="Incoterm"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="details">Additional Details</label>
                                                <textarea id="details" required name="details" cols="30" rows="5"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <input type="text" name="filled" value="No" id="" readonly
                                                    class="d-none">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3 d-flex justify-content-end">
                                                <button type="submit"
                                                    class=" px-4 py-2 border-0 rounded-3 green text-white font-semi">
                                                    Validate Order
                                                </button>
                                            </div>
                                        </div>
                                        @else
                                        <p class="text-danger">There is no underlying commodity for Metals and Precious Metals</p>
                                    @endif
                                    </div>
                                </form>
                            </div>

                        </div>
                        </form>


                    </div>
                </div>
                <div class="ftr text-center">
                    <p class="mb-0 text-muted">©2024 Ireti Capital. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        var selectOption = document.getElementById('selectOption');
        var productFields = document.querySelectorAll('.product-fields');
        productFields.forEach(function(field) {
            if (field.id !== 'FX') {
                field.style.display = 'none';
            }
        });
        var selectedProductField = document.getElementById('FX');
        if (selectedProductField) {
            selectedProductField.style.display = 'block';
        }
        selectOption.addEventListener('change', function() {
            document.getElementById('OrderForm').reset()
            productFields.forEach(function(field) {
                field.style.display = 'none';
            });
            var selectedOption = selectOption.value;
            document.getElementById('OrderType').value = selectedOption;
            var selectedProductField = document.getElementById(selectedOption);
            if (selectedProductField) {
                selectedProductField.style.display = 'block';
            }
        });
    </script>
    <script>
        let firstcurrency = document.getElementById('firstcurrency');
        let secondcurrency = document.getElementById('secondcurrency');
        let targetPrice = document.getElementById('targetprice');
        let currencytb = document.getElementById('currencytb');
        let buyamount = document.getElementById('buyamount');
        let sellAmount = document.getElementById('sellamount');
        let rate = document.getElementById('rate');
        let resetButton = document.getElementById('resetButton');

        secondcurrency.disabled = true;
        targetPrice.disabled = true;
        currencytb.disabled = true;
        buyamount.disabled = true;
        sellAmount.disabled = true;

        firstcurrency.addEventListener('input', function() {
            firstcurrency.disabled = true;
            secondcurrency.disabled = false;
            targetPrice.disabled = true;
            currencytb.disabled = true;
            buyamount.disabled = true;
            sellAmount.disabled = true;
        });

        secondcurrency.addEventListener('input', function() {
            firstcurrency.disabled = true;
            secondcurrency.disabled = true;
            targetPrice.disabled = false;
            currencytb.disabled = true;
            buyamount.disabled = true;
            sellAmount.disabled = true;
            let rate = firstcurrency.value + '/' + secondcurrency.value;
            document.getElementById('rate').innerHTML =  'Conversion Rate is ' + rate;
        });

        targetPrice.addEventListener('input', function() {
            firstcurrency.disabled = true;
            secondcurrency.disabled = true;
            targetPrice.disabled = false;
            currencytb.disabled = false;
            buyamount.disabled = false;
            sellAmount.disabled = false;
            updateAmounts();
        });

        currencytb.addEventListener('input', function() {
            firstcurrency.disabled = true;
            secondcurrency.disabled = true;
            targetPrice.disabled = false;
            currencytb.disabled = false;
            buyamount.disabled = false;
            sellAmount.disabled = false;
        });

        buyamount.addEventListener('input', function() {
            currencytb.disabled = false;
            updateSellAmount();
            // ------remove---
            firstcurrency.disabled = false;
            secondcurrency.disabled = false;
        });

        sellAmount.addEventListener('input', function() {
            currencytb.disabled = false;
            updateBuyAmount(); 
            // ------remove---
            firstcurrency.disabled = false;
            secondcurrency.disabled = false;
        });

        document.getElementById('resetButton').addEventListener('click', function() {
            location.reload();
        });

        function updateSellAmount() {
            let bav = parseFloat(buyamount.value.replaceAll(" ", ""));
            let tpv = parseFloat(targetPrice.value.replaceAll(" ", ""));
            if (currencytb.value == firstcurrency.value) {
                sellAmount.value = tpv * bav;
            } else {
                sellAmount.value = bav / tpv;
            }
        }

        function updateBuyAmount() {
            let sav = parseFloat(sellAmount.value.replaceAll(" ", ""));
            let tpv = parseFloat(targetPrice.value.replaceAll(" ", ""));
            if (currencytb.value == firstcurrency.value) {
                buyamount.value = sav / tpv;
            } else {
                buyamount.value = tpv * sav;
            }
        }

        function updateAmounts() {
            buyamount.value = 0;
            sellAmount.value = 0;
            if (buyamount.value) {
                updateSellAmount();
            }
            if (sellAmount.value) {
                updateBuyAmount();
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        let currencyBuy = document.getElementById('firstcurrency');
        let currencySell = document.getElementById('secondcurrency');
        let originalSellOptions = Array.from(currencySell.options);
        currencyBuy.addEventListener('change', function () {
            let selectedCurrency = this.value;
            while (currencySell.options.length > 0) {
                currencySell.remove(0);
            }
            originalSellOptions.forEach(option => {
                if (option.value !== selectedCurrency) {
                    currencySell.add(new Option(option.text, option.value));
                }
            });
            });
        });
    </script>
    <script>
        function updatecurrencytb() {
            let firstCurrencyValue = firstcurrency.value;
            let secondCurrencyValue = secondcurrency.value;

            currencytb.innerHTML = `
                <option value="0" hidden>Choose currency</option>
                <option value="${firstCurrencyValue}">${firstCurrencyValue}</option>
                <option value="${secondCurrencyValue}">${secondCurrencyValue}</option>
            `;
        }

        firstcurrency.addEventListener('change', updatecurrencytb);
        secondcurrency.addEventListener('change', updatecurrencytb);
        updatecurrencytb();

    </script>
    <script>
        function addCommas(value) {
            let parts = value.split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ','); 
            return parts.join('.');
        }

        function restrictDecimals(value) {
            let parts = value.split('.');
            if (parts[1]) {
                parts[1] = parts[1].slice(0, 2); 
            }
            return parts.join('.');
        }

        function formatWithCommas(input) {
            let value = input.value.replace(/\s/g, '').replace(/[^0-9.]/g, ''); 
            input.value = addCommas(value);
        }

        function formatWithCommasAndDecimals(input) {
            let value = input.value.replace(/\s/g, '').replace(/[^0-9.]/g, ''); 
            value = restrictDecimals(value); 
            input.value = addCommas(value); 
        }

        document.getElementById('buyamount').addEventListener('input', function (e) {
            formatWithCommasAndDecimals(e.target);
        });

        document.getElementById('sellamount').addEventListener('input', function (e) {
            formatWithCommasAndDecimals(e.target);
        });

        document.getElementById('targetprice').addEventListener('input', function (e) {
            formatWithCommas(e.target);
        });
    </script>


    @include('../Template.jslinks')
</body>

</html>
