<!DOCTYPE html>
<html lang="en">

<head>
    @include('../Template.csslinks')
    <title>Products</title>
</head>

<body>
    <div class="section">
        <div class="maindiv">
            @include('../Template.usersidebar')
            <div class="rightmain">
                @include('../Template.usernav')
                <div class="rightbottom">
                    <div class="container-fluid pb-5">
                        <h4>Products</h4>
                        <div class="col-12 px-3 px-md-5">
                            <div class="mt-3">
                                <label for="selectOption">Fund type</label>
                                <select id="selectOption" class="form-control">
                                    <option value="fx">FX</option>
                                    <option value="commodities">Soft Commodities</option>
                                    <option value="oil">Oil and oil Derivatives</option>
                                </select>
                            </div>
                        </div>

                        <div class="row px-3 px-md-5">
                     
                            <div id="fx" class="product-fields">
                                <form action="{{ route('user.submitorder') }}" method="POST" id="OrderForm">
                                    @csrf
                                    <div class="col-12">
                                        <div class="mt-3">
                                            <input type="text" readonly name="FundType" id="OrderType" value="fx"
                                                class="form-control d-none">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="currency">Currency Buy</label>
                                                <input type="text" required name="currencytb" id="currency"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="amountb">Amount to Buy</label>
                                                <input type="number" required name="amountb" id="amountb"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="currencys">Currency Sell</label>
                                                <input type="text" required name="currencyts" id="currencys"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="amounts">Amount to Sell</label>
                                                <input type="number" required name="amountts" id="amounts"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="targetp">Target Price</label>
                                                <input type="number" required name="targetp" id="targetp"
                                                    class="form-control">
                                            </div>
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
                                </form>
                            </div>
                            <div id="commodities" class="product-fields">
                                <form action="{{ route('user.submitorder') }}" method="POST" id="OrderForm">
                                    @csrf
                                    <div class="col-12">
                                        <div class="mt-3">
                                            <input type="text" readonly name="FundType"  value="Soft Commodities"
                                                class="form-control d-none">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="underlying">Select underlying commodity</label>
                                                <select name="underlying" id="underlying" class="form-control">
                                                    <option value="choose" selected disabled hidden>choose</option>
                                                    <option value="Clinker">Clinker</option>
                                                    <option value="Cocoa">Cocoa</option>
                                                    <option value="Coffee">Coffee</option>
                                                    <option value="Cotton">Cotton</option>
                                                    <option value="Used Cooking Oil">Used Cooking Oil</option>
                                                    <option value="Wheat">Wheat</option>
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
                                                <label for="targetpu">Price Target per Unit</label>
                                                <input type="text" required name="targetpu" id="targetpu"
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
                                                <textarea id="details" required name="details" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
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
                                    
                                </form>
                            </div>
                            <div id="oil" class="product-fields">
                                <form action="{{ route('user.submitorder') }}" method="POST" id="OrderForm">
                                    @csrf
                                    <div class="mt-3">
                                        <input type="text" readonly name="FundType" class="d-none" value="Oil and oil Derivatives"
                                            class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <label for="underlying">Select underlying commodity</label>
                                                <select name="underlying" id="underlying" class="form-control">
                                                    <option value="choose" selected disabled hidden>choose</option>
                                                    <option value="Fuel">Fuel</option>
                                                    <option value="Fuel Oil">Fuel Oil</option>
                                                    <option value="LPG">LPG</option>
                                                    <option value="Lubricants">Lubricants</option>
                                                    <option value="Gasoline">Gasoline</option>
                                                    <option value="Kerosene">Kerosene</option>
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
                                                <label for="targetpu">Price Target per Unit</label>
                                                <input type="text" required name="targetpu" id="targetpu"
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
                                                <textarea id="details" required name="details" cols="30" rows="5" class="form-control"></textarea>
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
            if (field.id !== 'fx') {
                field.style.display = 'none';
            }
        });
        var selectedProductField = document.getElementById('fx');
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
    @include('../Template.jslinks')
</body>

</html>
