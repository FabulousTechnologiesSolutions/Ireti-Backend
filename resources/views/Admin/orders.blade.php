<!DOCTYPE html>
<html lang="en">

<head>
    @include('../Template.csslinks')
    <title>Orders</title>
</head>

<body>
    <div class="section">
        <div class="maindiv">
            @include('../Template.sidebar')
            <div class="rightmain">
                @include('../Template.adminnav')
                @include('Template.status-alert')
                <div class="rightbottom">
                    <div class="container-fluid">
                        <div class="row px-3 ">
                            <h4>Orders</h4>
                            @if ($orders->count() > 0)
                                <div class="table-responsive tbl-800 mt-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Product</th>
                                                <th>Currency Pair</th>
                                                <th>Amount to Buy</th>
                                                <th>Currency Buy</th>
                                                <th>Amount to Sell</th>
                                                <th>Currency Sell</th>
                                                <th>Target Price</th>
                                                <th>Order Date</th>
                                                <th>Order Filled</th>
                                                <th>Amount in USD</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr class="align-middle">
                                                <td>{{$order['fname']}}</td>
                                                <td>
                                                    <div>
                                                        <p class="mb-0 font-semi">{{ $order['FundType'] !== null && $order['FundType'] !== '' ? $order['FundType'] : '/' }}</p>
                                                        <p class="mb-0">{{ $order['underlying']}}</p>
                                                    </div>
                                                </td>
                                                <td>{{ $order['firstcurrency']}}{{' / '}}{{ $order['secondcurrency']}}</td>
                                                <td>{{ $order['amountb'] !== null && $order['amountb'] !== '' ? $order['amountb'] : '/' }}</td>
                                                <td>{{ $order['currencytb'] !== null && $order['currencytb'] !== '' ? $order['currencytb'] : '/' }}</td>
                                                <td>{{ $order['amountts'] !== null && $order['amountts'] !== '' ? $order['amountts'] : '/' }}</td>
                                                <td>
                                                    @if (is_null($order['currencyts']) && $order['FundType'] == 'FX')
                                                        {{ $order['firstcurrency'] !== $order['currencytb'] ? $order['firstcurrency'] : ($order['secondcurrency'] !== null && $order['secondcurrency'] !== '' ? $order['secondcurrency'] : '/') }}
                                                    @else
                                                        {{ $order['currencyts'] !== null && $order['currencyts'] !== '' ? $order['currencyts'] : '/' }}
                                                    @endif
                                                </td>
                                                <td>{{ $order['targetp'] !== null && $order['targetp'] !== '' ? $order['targetp'] : '/' }}</td>
                                                <td>{{ $order['created_at'] !== null && $order['created_at'] !== '' ? $order['created_at'] : '/' }}</td>
                                                <td>
                                                    <button
                                                        class="{{ $order['filled'] === 'Yes' ? 'btngreen' : 'btnred' }}">
                                                        {{ $order['filled'] !== null && $order['filled'] !== '' ? $order['filled'] : '/' }}
                                                    </button>
                                                </td>
                                                <td>{{ $order['converted'] !== null && $order['converted'] !== '' ? $order['converted'] : '/' }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <i class="fa-solid fa-ellipsis-vertical pointer"
                                                            id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                            aria-expanded="false"></i>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            @if ($order['filled'] == 'No')
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ 'editorders/' . $order['id'] }}">
                                                                    <i class="fa-solid text-muted me-2 fa-pen-to-square"></i>
                                                                    Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ 'CancelOrder/' . $order['id'] }}">
                                                                    <i class="fa-regular text-muted me-2 fa-circle-xmark"></i>
                                                                    Cancel
                                                                </a>
                                                            </li>
                                                            @endif
                                                            @if ($order['filled'] == 'Cancel')
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ 'DeleteOrder/' . $order['id'] }}">
                                                                    <i class="fa-regular text-muted me-2 fa-trash-can"></i>
                                                                    Delete
                                                                </a>
                                                            </li>
                                                            @endif
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ 'orderdeatils/' . $order['id'] }}">
                                                                    <i class="fa-solid text-muted me-2 fa-eye"></i>
                                                                    View
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-danger">No Orders Available.</p>
                            @endif
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