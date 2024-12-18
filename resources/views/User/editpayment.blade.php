<!DOCTYPE html>
<html lang="en">

<head>
    @include('../Template.csslinks')
    <title>Add Payments</title>
</head>

<body>
    <div class="section">
        <div class="maindiv">
            @include('../Template.usersidebar')
            <div class="rightmain">
                @include('../Template.usernav')
                <div class="rightbottom">
                    <div class="container-fluid">
                        <div class="row px-3 ">
                            <h4>Edit Payment</h4>
                                <form action="{{ route('user.updatepayment') }}" method="POST">
                                    @csrf
                                <input type="text" name="id" class="d-none" value="{{$payment['pid']}}" readonly>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="Beneficiary">Beneficiary</label>
                                                <select name="Beneficiary" id="Beneficiary" class="form-control"
                                                    required onchange=" fetchCurrencies()">
                                                    <option value="" selected disabled hidden>Choose Beneficiary</option>
                                                    @foreach ($Beneficiaries as $Beneficiary)
                                                        <option value="{{ $Beneficiary['id'] }}" 
                                                            {{ $Beneficiary['id'] == $payment['Beneficiary'] ? 'selected' : '' }}>
                                                            {{ $Beneficiary['accountname'] }}
                                                        </option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="Currency">Currency</label>
                                                <select name="currency" id="Currency" class="form-control" required >
                                                    <option value="{{ $payment['currency'] }}" selected>
                                                        {{ $payment['currency'] }}
                                                </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <label for="amount">Amount</label>
                                                <input type="text" required name="amount" id="amount"
                                                    class="form-control" value="{{ $payment['amount'] }}">
                                            </div>
                                        </div>
                                       
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <button type="submit"
                                                    class=" px-4 py-2 border-0 rounded-3 green text-white font-semi">
                                                    Update Payment
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    <script>
        async function fetchCurrencies() {
            const bid = document.getElementById('Beneficiary').value;
            let Currency = document.getElementById('Currency');
            Currency.innerHTML = '';

            if (bid) { // Only fetch if both customer and beneficiary are selected
                try {
                    const response = await fetch(`/user/getCurrency/${bid}`);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const data = await response.json();
                    for (let currency of data) {
                        console.log(currency);
                        Currency.insertAdjacentHTML("beforeend",
                            `<option value="${currency.currency}" >${currency.currency}</option>`);
                    }
                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                }
            }
        }

    </script>

    <script>
        function formatNumbers(input) {
            let value = input.value.replace(/\s/g, '').replace(/[^0-9.]/g, '');
            let parts = value.split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
            if (parts[1]) parts[1] = parts[1].slice(0, 2);
            input.value = parts.join('.');
        }

        function spaceonly(input) {
            let value = input.value.replace(/\s/g, '').replace(/[^0-9.]/g, '');
            let parts = value.split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
            input.value = parts.join('.');
        }

        document.getElementById('amount').addEventListener('input', function(e) {
            spaceonly(e.target);
        });
    </script>

</body>

</html>
