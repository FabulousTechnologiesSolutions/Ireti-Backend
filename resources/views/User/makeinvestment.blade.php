<!DOCTYPE html>
<html lang="en">

<head>
    @include('../Template.csslinks')
    <title>Make Investment</title>
</head>

<body>
    <div class="section">
        <div class="maindiv">
            @include('../Template.usersidebar')
            <div class="rightmain">
                @include('../Template.usernav')
                <div class="rightbottom">
                    <div class="container-fluid pb-5">
                        <form action="{{route('user.createinvestment')}}" method="POST">
                            @csrf
                            <div class="row px-3 px-md-5">
                                <h4>Alternative Investment</h4>
                                <div class="col-12">
                                    <p class="mb-0 ftsize">Ireti Capital network can provide information and find
                                        attractive investment
                                        opportunities that can match your needs. If you wish to diversify your portfolio
                                        asset allocation, enhance your treasury optimization or be exposed to different
                                        Geographical area, we could have the right solution with our partners.</p>
                                </div>
                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="name">Fund Type</label>
                                        <select name="fund" id="name" class="form-control" required>
                                            <option value="" selected disabled hidden>Select Fund Type</option>
                                            <option value="Listed Funds">Listed Funds</option>
                                            <option value="Non Listed Fund">Non Listed Fund</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="yield">Target Yield</label>
                                        <select required name="yeild" id="yield" class="form-control" required>
                                            <option value="" selected disabled hidden>Select Target Yield</option>
                                            <option value="0-5%">0-5%</option>
                                            <option value="5-10%">5-10%</option>
                                            <option value="10%+">10%+</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mt-3">
                                        <label for="exposure">Geographical Exposure</label>
                                        <input type="text" name="geographical" id="exposure" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-3">
                                        <label for="amount">Amount Wish to Invest (in USD)</label>
                                        <input type="text" name="amount" id="amount" class="form-control" required>
                                    </div>
                                </div>
                                <h5 class="mt-3">Book Call Meeting</h5>
                                <div class="col-sm-6">
                                    <div class="mt-3">
                                        <label for="Date">Date</label>
                                        <input type="date" name="date" id="Date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-3">
                                        <label for="Time">Time</label>
                                        <input type="time" name="time" id="Time" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 d-none">
                                    <input type="text" value="Pending" name="status" readonly>
                                </div>
                                <div class="col-12">
                                    <div class="mt-3 d-flex justify-content-end">
                                        <button type="submit"
                                            class=" px-4 py-2 border-0 rounded-3 green text-white font-semi">
                                            Invest
                                        </button>
                                    </div>
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
    @include('../Template.jslinks')
    <script>
        function spaceonly(input) {
            let value = input.value.replace(/\s/g, '').replace(/[^0-9.]/g, '');
            let parts = value.split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
            input.value = parts.join('.');
        }

        document.getElementById('amount').addEventListener('input', function (e) {
            spaceonly(e.target);
        });
    </script>
</body>

</html>