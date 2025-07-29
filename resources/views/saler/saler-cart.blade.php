<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Cart Items</title>
    <!--     Fonts and icons     -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
        rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script
        src="https://kit.fontawesome.com/42d5adcbca.js"
        crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link
        href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1"
        rel="stylesheet" />
    <style>
        .floating-btn-delete {
            position: fixed;
            bottom: 100px;
            right: 10px;
            z-index: 9999;
            padding: 12px 20px;
            border: none;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div
        class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span
            class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
    </div>

    <!-- sidenav  -->
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-19">
            <i
                class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                sidenav-close></i>
            <a
                class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
                href="/saler/saler-dashboard">
                <span
                    class="ml-1 font-semibold transition-all duration-200 ease-nav-brand"
                    style="font-size: 1.2rem; font-weight: bolder">Rani Retail - Sales</span>
            </a>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div
            class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <a
                        class="py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                        href="/saler/saler-dashboard">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i
                                class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a
                        class="py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                        href="/saler/saler-all-products">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i
                                class="relative top-0 text-sm leading-normal text-red-600 ni ni-box-2"></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease">All Products</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/saler/saler-find-products">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i
                                class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease">Product Sale</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a
                        class="bg-blue-500/13 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/saler/saler-cart-items">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i
                                class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-cart"></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease">Cart Items</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/saler/saler-sales-report.html">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i
                                class="relative top-0 text-sm leading-normal text-red-600 ni ni-chart-bar-32"></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sales Report</span>
                    </a>
                </li>

                <li class="w-full mt-4">
                    <h6
                        class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">
                        Account Details
                    </h6>
                </li>

                <li class="mt-0.5 w-full">
                    <a
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/saler/saler-profile.html">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i
                                class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main
        class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        <nav
            class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main
            navbar-scroll="false">
            <div
                class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol
                        class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="text-white opacity-50" href="javascript:;">Sales</a>
                        </li>
                        <li
                            class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                            aria-current="page">
                            Items
                        </li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">Cart Items</h6>
                </nav>

                <div
                    class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div
                            class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                            <span
                                class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                <i class="fas fa-search"></i>
                            </span>
                            <input
                                type="text"
                                class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                placeholder="Type here..." />
                        </div>
                    </div>
                    <ul
                        class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                        <li class="flex items-center">
                            <a
                                href=""
                                class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                                <i class="fa fa-user sm:mr-1"></i>
                                <span class="sm:inline">Logout</span>
                            </a>
                        </li>
                        <li class="flex items-center pl-4 xl:hidden">
                            <a
                                href="javascript:;"
                                class="block p-0 text-sm text-white transition-all ease-nav-brand"
                                sidenav-trigger>
                                <div class="w-4.5 overflow-hidden">
                                    <i
                                        class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i
                                        class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i
                                        class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                </div>
                            </a>
                        </li>
                        <li class="flex items-center px-4">
                            <a
                                href="javascript:;"
                                class="p-0 text-sm text-white transition-all ease-nav-brand">
                                <i
                                    fixed-plugin-button-nav
                                    class="cursor-pointer fa fa-cog"></i>
                                <!-- fixed-plugin-button-nav  -->
                            </a>
                        </li>

                        <!-- notifications -->

                        <li class="relative flex items-center pr-2">
                            <p class="hidden transform-dropdown-show"></p>
                            <a
                                href="javascript:;"
                                class="block p-0 text-sm text-white transition-all ease-nav-brand"
                                dropdown-trigger
                                aria-expanded="false">
                                <i class="cursor-pointer fa fa-bell"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="w-full px-6 py-6 mx-auto">
            <!-- content -->
            <div class="flex flex-wrap -mx-3">
                <!-- Cart Items -->
                <div class="w-full max-w-full px-3 mt-6 md:w-8/12 md:flex-none">

                    <form method="POST" action="{{ route('addToBill') }}"
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        @csrf
                        <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl flex justify-between">
                            <h6 class="mb-0 dark:text-white">Selected Items Billing Amount: ₹ <span id="totalAmount"></span></h6>
                            <button type="submit"
                                class="px-8 py-2 font-bold text-white bg-blue-500 rounded-lg shadow-md text-xs hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                Save for Bill
                            </button>
                        </div>

                        <div class="flex-auto p-4 pt-6">
                            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                @foreach($cartProducts as $cartProduct)
                                @php
                                $fields = is_string($cartProduct->product->field_values) ? json_decode($cartProduct->product->field_values, true) : $cartProduct->product->field_values;
                                $otherDetails = collect($fields)->map(function($value, $key) { return "$key: $value"; })->implode(', ');
                                @endphp
                                <li class="relative flex p-6 mb-2 border-0 rounded-xl bg-gray-50 dark:bg-slate-850 justify-between">
                                    <div class="flex flex-col">
                                        <h6 class="mb-2 text-sm dark:text-white">{{ $cartProduct->product->product_name }}</h6>
                                        <span class="text-sm dark:text-white/80">Other Details: {{ $otherDetails ?: 'N/A' }}</span>

                                        <input type="hidden" name="cart[{{ $cartProduct->id }}][id]" value="{{ $cartProduct->product->id }}">
                                        <input type="hidden" name="cart[{{ $cartProduct->id }}][name]" value="{{ $cartProduct->product->product_name }}">
                                        <input type="hidden" name="cart[{{ $cartProduct->id }}][purchase_rate]" value="{{ $cartProduct->purchase_rate }}">
                                        <input type="hidden" name="cart[{{ $cartProduct->id }}][other_details]" value="{{ $otherDetails }}">
                                        <input type="hidden" id="total-amount-{{ $cartProduct->id }}" name="cart[{{ $cartProduct->id }}][total_amount]" value="">
                                    </div>

                                    <div class="flex-col">
                                        <div class="flex mb-2">
                                            <div class="mr-2">
                                                <label class="text-sm dark:text-white">Rate: ₹</label>
                                                <input type="number" readonly id="rate-{{ $cartProduct->id }}" value="{{ $cartProduct->purchase_rate }}"
                                                    class="quantity-input w-full px-3 py-2 border rounded-lg dark:bg-slate-850 dark:text-white text-sm" data-rate="{{ $cartProduct->purchase_rate }}" data-target="{{ $cartProduct->id }}">
                                            </div>

                                            <div>
                                                <label class="text-sm text-red-600 dark:text-white">Selling price: ₹</label>
                                                <input type="number" readonly name="cart[{{ $cartProduct->id }}][selling_price]"
                                                    id="selling-price-{{ $cartProduct->id }}" value="{{ $cartProduct->selling_price }}"
                                                    class="selling-price-output w-full px-3 py-2 border text-red-600 rounded-lg dark:bg-slate-850 dark:text-white text-sm">
                                            </div>
                                        </div>

                                        <input type="number" placeholder="Enter Quantity" name="cart[{{ $cartProduct->id }}][quantity]"
                                            class="quantity-input w-full px-3 py-2 mb-2 border rounded-lg dark:bg-slate-850 dark:text-white text-sm"
                                            data-rate="{{ $cartProduct->purchase_rate }}" data-target="{{ $cartProduct->id }}">

                                        <input type="number" placeholder="Enter percentage" name="cart[{{ $cartProduct->id }}][profit_percentage]"
                                            class="percentage-input w-full px-3 py-2 border rounded-lg dark:bg-slate-850 dark:text-white text-sm"
                                            data-target="{{ $cartProduct->id }}">
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </form>


                </div>


                <!-- Show Billings -->
                <div
                    class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                    <form action="{{ route('generate.bill') }}" method="POST" class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                        @csrf
                        @if($lastBill)
                        <input type="hidden" name="bill_id" value="{{ $lastBill->id }}">
                        @endif

                        <div class="p-4 pb-0 rounded-t-4">
                            <h6 class="mb-0 dark:text-white">Bill Details</h6>
                        </div>
                        <div class="flex-auto p-4">
                            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                @if($lastBill)
                                @php
                                $billItems = json_decode($lastBill->bill_data, true);
                                @endphp

                                @foreach($billItems as $item)
                                <li
                                    class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                                    <div class="flex">
                                        <div
                                            class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                                            <i
                                                class="text-white ni ni-box-2 relative top-0.75 text-xxs"></i>
                                        </div>
                                        <div class="flex flex-wrap ">
                                            <h6
                                                class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">
                                                Products: &nbsp;

                                            </h6>
                                            <span class="font-semibold text-red-600 dark:text-white text-sm">{{ $item['name'] }}</span>,&nbsp;
                                            <span class="font-semibold text-red-600 dark:text-white text-sm">Quantity: {{ $item['quantity'] }}</span>,&nbsp;
                                            <span class="font-semibold text-red-600 dark:text-white text-sm">Details: {{ $item['other_details'] }}</span>
                                        </div>
                                    </div>

                                </li>
                                @endforeach

                                @endif



                                <li
                                    class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                                    <div class="flex items-center">
                                        <div
                                            class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                                            <span
                                                class="text-white relative top-0.75 text-sm font-bold">&#8377;</span>
                                        </div>
                                        <div class="flex flex-col">


                                            <h6
                                                class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">
                                                Total billing amount:
                                                @if($lastBill)
                                                <span
                                                    class="font-semibold text-red-600 dark:text-white">₹ {{ $lastBill->total_amount }}</span>
                                                @else
                                                <span
                                                    class="font-semibold text-red-600 dark:text-white">₹ 0</span>
                                                @endif
                                            </h6>

                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <!-- Customer Details -->
                            <div class="p-4 pb-0 rounded-t-4">
                                <h6 class="mb-0 dark:text-white">Customer Details</h6>
                            </div>

                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap -mx-3">
                                    <div
                                        class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                        <div class="mb-4">
                                            <label
                                                for="customer_name"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Customer's Name</label>
                                            <input
                                                type="text"
                                                name="customer_name"
                                                placeholder="Enter Name"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                        </div>
                                    </div>
                                    <div
                                        class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                        <div class="mb-4">
                                            <label
                                                for="email"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Email ID</label>
                                            <input
                                                type="email"
                                                name="email"
                                                placeholder="Enter Email ID"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                        </div>
                                    </div>
                                    <div
                                        class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                                        <div class="mb-4">
                                            <label
                                                for="mobile_number"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Mobile Number</label>
                                            <input
                                                type="text"
                                                name="mobile_number"
                                                placeholder="Enter Mobile Number"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button
                                class="px-8 w-full py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-blue-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"
                                style="font-size: 1rem" type="submit">
                                Generate Bill
                            </button>
                        </div>
                    </form>



                    <!-- Floating Dropdown Menu Button -->
                    <div class="floating-btn-delete fixed bottom-6 right-6 z-50">
                        <div class="relative inline-block text-left">
                            <button
                                style="font-size: 0.8rem; background-color: red;"
                                onclick="toggleDropdown()"
                                class="px-4 py-2 text-white text-sm font-semibold bg-red-500 rounded-md shadow hover:bg-red-700 focus:outline-none">
                                Delete Actions
                            </button>

                            <!-- DROPDOWN -->
                            <div id="cartDropdown"
                                class="hidden origin-bottom-right absolute right-0 bottom-full mb-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">

                                <div class="py-1 text-sm text-gray-700" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    @if($cartProducts && count($cartProducts) > 0)
                                    <button
                                        style="font-size: 0.8rem; background-color: gray; color: white;"
                                        class="px-4 py-2 text-white text-sm font-semibold bg-red-500 rounded-md shadow hover:bg-red-700 focus:outline-none"
                                        id="emptyCart"
                                        type="button"
                                        onclick="emptyCart()">
                                        Empty Cart
                                    </button>
                                    @endif
                                </div>

                                <div style="height: 45px; overflow-y: auto;">
                                    @if($cartProducts && count($cartProducts) > 0)
                                    @foreach($cartProducts as $item)
                                    <form action="{{ route('cart.delete', $item->id) }}" method="POST" style="font-size: 0.8rem; background-color: gray; color: white; border-bottom: 1px solid white; margin-top: 5px;"
                                        class="px-4 py-2 text-white text-sm font-semibold bg-red-500 rounded-md shadow hover:bg-red-700 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">
                                            {{ \Illuminate\Support\Str::limit($item->product->product_name, 10) }}
                                        </button>
                                    </form>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>




                </div>


            </div>
        </div>
    </main>


    <script>
        function addToCart(productId, rate) {
            const quantityInput = document.querySelector(`.quantity-input[data-id='${productId}']`);
            const quantity = parseInt(quantityInput.value) || 0;

            if (quantity > 0) {
                cart[productId] = {
                    id: productId,
                    quantity: quantity,
                    rate: rate,
                    total: quantity * rate
                };
            }
        }
    </script>

    <script>
        const cartState = {};

        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('input', () => {
                const id = input.dataset.target;
                const rate = parseFloat(input.dataset.rate);
                const qty = parseFloat(input.value) || 0;
                if (!cartState[id]) cartState[id] = {};
                cartState[id].quantity = qty;
                cartState[id].rate = rate;
                updatePrice(id);
            });
        });

        document.querySelectorAll('.percentage-input').forEach(input => {
            input.addEventListener('input', () => {
                const id = input.dataset.target;
                const profit = parseFloat(input.value) || 0;
                if (!cartState[id]) cartState[id] = {};
                cartState[id].profit = profit;
                updatePrice(id);
            });
        });

        function updatePrice(id) {
            const state = cartState[id];
            if (!state.quantity || !state.rate) return;
            const cost = state.quantity * state.rate;
            const profit = (cost * (state.profit || 0)) / 100;
            const total = cost + profit;

            document.getElementById(`selling-price-${id}`).value = total.toFixed(2);
            document.getElementById(`total-amount-${id}`).value = total.toFixed(2);

            calculateTotal();
        }

        function calculateTotal() {
            let total = 0;
            Object.values(cartState).forEach(item => {
                const cost = item.quantity * item.rate;
                const profit = (cost * (item.profit || 0)) / 100;
                total += cost + profit;
            });
            document.getElementById('totalAmount').textContent = total.toFixed(2);
        }

        window.addEventListener('DOMContentLoaded', calculateTotal);
    </script>


    <script>
        function emptyCart() {
            if (confirm("Are you sure you want to empty the cart?")) {
                fetch("{{ route('admin.empty-cart') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert("Cart emptied successfully.");
                            location.reload();
                        } else {
                            alert("Failed to empty cart.");
                        }
                    })
                    .catch(err => {
                        alert("Error: " + err);
                    });
            }
        }
    </script>



    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById("cartDropdown");
            dropdown.classList.toggle("hidden");
        }

        document.addEventListener("click", function(event) {
            const dropdown = document.getElementById("cartDropdown");
            const button = event.target.closest("button");

            const isDropdownOpen = !dropdown.classList.contains("hidden");
            const clickedInsideDropdown = dropdown.contains(event.target);
            const clickedToggleButton = event.target.closest(".floating-btn-delete");

            if (isDropdownOpen && !clickedInsideDropdown && !clickedToggleButton) {
                dropdown.classList.add("hidden");
            }
        });
    </script>





</body>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>