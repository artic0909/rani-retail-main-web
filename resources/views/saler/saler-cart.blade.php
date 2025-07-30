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

                    <form method="POST" action="{{ route('checkouts.store') }}" class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
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

                                @foreach ($cartItems as $item)
                                @foreach ($item->products as $product)
                                <li class="relative flex p-6 mb-2 border-0 rounded-xl bg-gray-50 dark:bg-slate-850 justify-between">
                                    <div class="flex flex-col">
                                        <h6 class="m-0 p-0 text-sm dark:text-white" style="text-transform: capitalize;">Product Name: {{ $product->product_name }}</h6>
                                        @php
                                        $fields = is_string($product->field_values)
                                        ? json_decode($product->field_values, true)
                                        : $product->field_values;

                                        $formattedFields = [];

                                        if (!empty($fields) && is_array($fields)) {
                                        foreach ($fields as $label => $value) {
                                        $formattedFields[] = "$label: $value";
                                        }
                                        }
                                        @endphp

                                        <h6 class="m-0 p-0 text-sm dark:text-white" style="text-transform: capitalize;">Product Details:</h6>
                                        <span class="text-sm dark:text-white/80 p-0 m-0">
                                            {!! implode('<br>', $formattedFields) !!}
                                        </span>
                                    </div>

                                    <div class="flex-col">
                                        <div class="flex mb-2">

                                            @php
                                            $rate = $product->purchase_rate + $product->transport_cost;
                                            $targetId = 'product-' . $product->id;
                                            $productId = $product->id;
                                            @endphp

                                            <input type="hidden" name="products[{{ $productId }}][product_id]" value="{{ $productId }}">

                                            <div class="mr-2">
                                                <!-- it get the purchase_rate + transport_cost from products table = this field data  -->
                                                <label class="text-sm dark:text-white">Rate: ₹</label>
                                                <input type="number" readonly id="" value="{{ $rate }}"
                                                    class="quantity-input w-full px-3 py-2 border rounded-lg dark:bg-slate-850 dark:text-white text-sm" data-rate="" data-target=""  name="products[{{ $productId }}][customer_product_rate]">
                                            </div>
                                            <!-- it show selling price of products table each product after input quantity & profit_percentage-->
                                            <div>
                                                <label class="text-sm text-red-600 dark:text-white">Selling price: ₹</label>
                                                <input type="number" readonly name="products[{{ $productId }}][customer_product_selling_price]" id="selling-price-{{ $targetId }}" class="selling-price-output w-full px-3 py-2 border text-red-600 rounded-lg dark:bg-slate-850 dark:text-white text-sm">
                                            </div>
                                        </div>
                                        <!-- it allow input quantity by default 1 -->
                                        <input type="number" placeholder="Enter Quantity"  name="products[{{ $productId }}][customer_purchase_quantity]" class="quantity-input w-full px-3 py-2 mb-2 border rounded-lg dark:bg-slate-850 dark:text-white text-sm"
                                            data-rate="{{ $rate }}" data-target="{{ $targetId }}">
                                        <!-- it allow input profit percentage -->
                                        <input type="number" placeholder="Enter percentage" name="products[{{ $productId }}][customer_profit_percentage]"
                                            class="percentage-input w-full px-3 py-2 border rounded-lg dark:bg-slate-850 dark:text-white text-sm"
                                            data-rate="{{ $rate }}" data-target="{{ $targetId }}">
                                    </div>
                                </li>
                                @endforeach
                                @endforeach

                            </ul>
                        </div>
                    </form>


                </div>


                <!-- Show Billings -->
                <div
                    class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                    <form action="" method="POST" class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">


                     


                        <div class="p-4 pb-0 rounded-t-4">
                            <h6 class="mb-0 dark:text-white">Bill Details</h6>
                        </div>
                        <div class="flex-auto p-4">
                            <ul class="flex flex-col pl-0 mb-0 rounded-lg">


                                
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
                                            <span class="font-semibold text-red-600 dark:text-white text-sm"></span>,&nbsp;
                                            <span class="font-semibold text-red-600 dark:text-white text-sm">Quantity: </span>,&nbsp;
                                            <span class="font-semibold text-red-600 dark:text-white text-sm">Details: </span>
                                        </div>
                                    </div>

                                </li>



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
                                                <span
                                                    class="font-semibold text-red-600 dark:text-white">₹ 0</span>

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





                </div>


            </div>
        </div>
    </main>



    <!-- calculation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.quantity-input, .percentage-input').forEach(input => {
                input.addEventListener('input', function() {
                    const target = this.dataset.target;
                    const rate = parseFloat(this.dataset.rate) || 0;

                    const quantityInput = document.querySelector(`.quantity-input[data-target="${target}"]`);
                    const percentageInput = document.querySelector(`.percentage-input[data-target="${target}"]`);
                    const sellingPriceOutput = document.getElementById(`selling-price-${target}`);

                    const quantity = parseFloat(quantityInput?.value) || 0;
                    const percentage = parseFloat(percentageInput?.value) || 0;

                    const baseAmount = rate * quantity;
                    const profitAmount = baseAmount * (percentage / 100);
                    const finalAmount = baseAmount + profitAmount;

                    sellingPriceOutput.value = finalAmount.toFixed(2);
                });
            });
        });
    </script>




</body>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>