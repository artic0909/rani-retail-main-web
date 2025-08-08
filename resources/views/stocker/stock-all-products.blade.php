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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Filter Search Products</title>
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
        .custom-success-popup,
        .custom-error-popup {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 5px;
            color: white;
            z-index: 9999;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            animation: fadeInOut 4s ease-in-out forwards;
        }

        .custom-success-popup {
            background-color: #4CAF50;
        }

        .custom-error-popup {
            background-color: #f44336;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            10% {
                opacity: 1;
                transform: translateY(0);
            }

            90% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body
    class="m-0 font-sans antialiased font-normal dark:bg-slate-900 text-base leading-default bg-gray-50 text-slate-500">
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
                href="/stock/stock-dashboard">
                <span
                    class="ml-1 font-semibold transition-all duration-200 ease-nav-brand"
                    style="font-size: 1.2rem; font-weight: bolder">Rani Retail - Stock</span>
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
                        href="/stock/stock-dashboard">
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
                        class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-add-main-category">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i
                                class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease">Add Categories</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-list-all-products">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i
                                class="relative top-0 text-sm leading-normal text-orange-500 ni ni-archive-2"></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease">All Products</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a
                        class="bg-blue-500/13 bg-blue-500/13dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-all-products">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <i
                                class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-box-2"></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease">Filter Products</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-stock-report">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i
                                class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-single-copy-04"></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease">Stock Manage</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-sales-report">
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
                        href="/stock/stock-profile">
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

    <div
        class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68">
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
                            <a class="text-white font-bold" href="#">Back</a>
                        </li>
                        <li
                            class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                            aria-current="page">
                            Add
                        </li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">Show Products</h6>
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
                            <form method="POST" action="{{ route('stock-manager.logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                                    <i class="fa fa-user sm:mr-1"></i>
                                    <span class="sm:inline">Logout</span>
                                </button>
                            </form>
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

        <!-- Products Show -->
        <div class="w-full p-6 mx-auto">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div
                            class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                            <div class="flex items-center">
                                <p class="mb-0 dark:text-white/80">
                                    Select Product Categories To Show Products
                                </p>
                            </div>
                        </div>
                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap -mx-3">
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label
                                            for="username"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Choose Main Category *</label>

                                        <select
                                            name=""
                                            id="main-category"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                            <option value="" selected>Select Main Category</option>
                                            @foreach ($mainCategories as $mainCategory)
                                            <option value="{{$mainCategory->id}}">{{$mainCategory->main_category_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label
                                            for=""
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Choose Sub Category *</label>

                                        <select
                                            name=""
                                            id="sub-category"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                            <option value="" selected>Select Sub Category</option>
                                        </select>

                                        <div
                                            style="
                          display: flex;
                          justify-content: center;
                          margin-top: 20px;
                        ">
                                            <button
                                                id="show-products-btn"
                                                type="submit"
                                                class="ml-4 px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-blue-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"
                                                style="font-size: 14px">
                                                SHOW
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- All Products Show -->
                <div class="w-full max-w-full px-3 shrink-0 md:flex-0 mt-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex-none w-full max-w-full px-3">
                            <div
                                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                                <div
                                    class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between">
                                    <h6 class="dark:text-white">Filter Products</h6>
                                </div>
                                <div class="flex-auto px-0 pt-0 pb-2">
                                    <div class="p-0 overflow-x-auto">
                                        <table
                                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                            <thead class="align-bottom">

                                                <tr style="text-align:center; border-bottom: 1px solid #ccc;">
                                                    <th>Product Name</th>
                                                    <th>Decriptive Fields</th>
                                                    <th>Purchase Details</th>
                                                    <th>Unit</th>
                                                    <th>Purchase Rate</th>
                                                    <th>Transport Cost</th>
                                                    <th colspan="2">Actions</th>
                                                </tr>

                                            </thead>
                                            <tbody id="products-table-body">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const mainCategorySelect = document.querySelector("#main-category");
            const subCategorySelect = document.querySelector("#sub-category");
            const showButton = document.querySelector("#show-products-btn");

            // Load subcategories when main category changes
            mainCategorySelect.addEventListener("change", function() {
                const mainCategoryId = this.value;

                fetch(`/stock/get-subcategories/${mainCategoryId}`)
                    .then(res => res.json())
                    .then(data => {
                        subCategorySelect.innerHTML = '<option value="">Select Sub Category</option>';
                        data.forEach(sub => {
                            subCategorySelect.innerHTML += `<option value="${sub.id}">${sub.sub_category_name}</option>`;
                        });
                    });
            });

            // Load products when "SHOW" button is clicked
            showButton.addEventListener("click", function() {
                const subCategoryId = subCategorySelect.value;

                fetch('/stock/get-products', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            sub_category_id: subCategoryId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        const tableBody = document.querySelector("#products-table-body");
                        tableBody.innerHTML = "";

                        data.forEach(product => {
                            let fieldsHtml = '';

                            if (product.field_values && typeof product.field_values === 'object') {
                                for (const [key, value] of Object.entries(product.field_values)) {
                                    let displayValue;
                                    if (Array.isArray(value)) {
                                        displayValue = value.join(', ');
                                    } else if (typeof value === 'object') {
                                        displayValue = JSON.stringify(value);
                                    } else {
                                        displayValue = value ?? 'N/A';
                                    }

                                    fieldsHtml += `<div><strong>${key}:</strong> ${displayValue}</div>`;
                                }
                            } else {
                                fieldsHtml = 'N/A';
                            }


                            // Format stock display
                            const unit = product.unit_type ?? '';
                            const purchaseUnit = parseFloat(product.purchase_unit ?? 0);
                            let stockDisplay = '';
                            let stockStyle = '';

                            if (purchaseUnit === 0) {
                                stockDisplay = 'Out of Stock';
                                stockStyle = 'color: red; font-weight: bold;';
                            } else if (purchaseUnit <= 3) {
                                stockDisplay = `${purchaseUnit} ${unit} Refill`;
                                stockStyle = 'color: orange; font-weight: bold;';
                            } else {
                                stockDisplay = `${purchaseUnit} ${unit}`;
                                stockStyle = 'color: green;';
                            }

                            tableBody.innerHTML += `
                        <tr style="text-align:center; border-bottom: 1px solid #ccc;">
                            <td>${product.product_name}</td>
                            <td>${fieldsHtml}</td>
                            <td>${product.purchase_details ?? 'N/A'}</td>
                             <td style="${stockStyle}">${stockDisplay}</td>
                            <td>${product.purchase_rate ?? 'N/A'}</td>
                            <td>${product.transport_cost ?? 'N/A'}</td>
                            <td><a href="/stock/products/${product.id}/edit" class="text-green-600">Edit</a></td>
                            <td><a href="#" onclick="deleteProduct(${product.id})" class="text-red-600">Delete</a></td>
                        </tr>`;
                        });
                    });
            });
        });
    </script>

    <script>
        function deleteProduct(id) {
            if (!confirm("Are you sure you want to delete this product?")) return;

            fetch(`/stock/delete-product/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    }
                    location.reload();
                })
                .catch(error => {
                    console.error("Error deleting product:", error);
                    alert("Something went wrong.");
                });
        }
    </script>

    @if (session('success'))
    <div id="successPopup" class="custom-success-popup">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div id="errorPopup" class="custom-error-popup">
        {{ session('error') }}
    </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successPopup = document.getElementById('successPopup');
            const errorPopup = document.getElementById('errorPopup');

            if (successPopup) setTimeout(() => successPopup.remove(), 4000);
            if (errorPopup) setTimeout(() => errorPopup.remove(), 4000);
        });
    </script>




</body>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>