<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Stock Report</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />


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
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
    </div>

    <!-- sidenav  -->
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
                href="/stock/stock-dashboard">
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand"
                    style="font-size: 1.2rem; font-weight: bolder">Rani Retail - Stock</span>
            </a>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                        href="/stock/stock-dashboard">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-add-main-category">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Add Categories</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-list-all-products">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-archive-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">All Products</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-all-products">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-box-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Filter Products</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="bg-blue-500/13 dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-stock-report">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-single-copy-04"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Stock Manage</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-sales-report">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-chart-bar-32"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sales Report</span>
                    </a>
                </li>

                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">
                        Account Details
                    </h6>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/stock/stock-profile">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="text-white font-bold" href="#">Back</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                            aria-current="page">
                            Stock
                        </li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">Stock Report</h6>
                </nav>
                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                            <span
                                class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text"
                                class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                placeholder="Search here..." />
                        </div>
                    </div>
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                        <li class="flex items-center">
                            <form method="POST" action="{{ route('stock-manager.logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                                    <i class="fa fa-user sm:mr-1"></i>
                                    <span class="sm:inline">Logout</span>
                                </button>
                            </form>
                        </li>
                        <li class="flex items-center pl-4 xl:hidden">
                            <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                                sidenav-trigger>
                                <div class="w-4.5 overflow-hidden">
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                </div>
                            </a>
                        </li>
                        <li class="flex items-center px-4">
                            <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                                <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                                <!-- fixed-plugin-button-nav  -->
                            </a>
                        </li>

                        <!-- notifications -->

                        <li class="relative flex items-center pr-2">
                            <p class="hidden transform-dropdown-show"></p>
                            <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                                dropdown-trigger aria-expanded="false">
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

                </div>

                <!-- All Products Show -->
                <div class="w-full max-w-full px-3 shrink-0 md:flex-0 mt-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex-none w-full max-w-full px-3">
                            <div
                                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                    <h6 class="dark:text-white mb-4">Stock Report</h6>

                                    <!-- Filter Form -->
                                    <form method="GET" action="{{ route('stock.stock-report') }}" id="filterForm"
                                        class="mb-4">
                                        <div class="flex flex-wrap gap-3 items-end">
                                            <!-- Start Date -->
                                            <div class="flex-1 min-w-[150px]">
                                                <label for="start_date"
                                                    class="block text-xs font-bold mb-1 text-slate-700 dark:text-white/80">Start
                                                    Date</label>
                                                <input type="date" name="start_date" id="start_date"
                                                    value="{{ request('start_date') }}"
                                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg dark:bg-slate-850 dark:text-white dark:border-white/40 focus:border-blue-500 focus:outline-none">
                                            </div>

                                            <!-- End Date -->
                                            <div class="flex-1 min-w-[150px]">
                                                <label for="end_date"
                                                    class="block text-xs font-bold mb-1 text-slate-700 dark:text-white/80">End
                                                    Date</label>
                                                <input type="date" name="end_date" id="end_date"
                                                    value="{{ request('end_date') }}"
                                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg dark:bg-slate-850 dark:text-white dark:border-white/40 focus:border-blue-500 focus:outline-none">
                                            </div>

                                            <!-- Main Category -->
                                            <div class="flex-1 min-w-[180px]">
                                                <label for="main_category"
                                                    class="block text-xs font-bold mb-1 text-slate-700 dark:text-white/80">Main
                                                    Category</label>
                                                <select name="main_category_id" id="main_category"
                                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg dark:bg-slate-850 dark:text-white dark:border-white/40 focus:border-blue-500 focus:outline-none">
                                                    <option value="">All Categories</option>
                                                    @foreach($allMainCategories as $category)
                                                        <option value="{{ $category->id }}" {{ request('main_category_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->main_category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Sub Category -->
                                            <div class="flex-1 min-w-[180px]">
                                                <label for="sub_category"
                                                    class="block text-xs font-bold mb-1 text-slate-700 dark:text-white/80">Sub
                                                    Category</label>
                                                <select name="sub_category_id" id="sub_category"
                                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg dark:bg-slate-850 dark:text-white dark:border-white/40 focus:border-blue-500 focus:outline-none">
                                                    <option value="">All Sub Categories</option>
                                                </select>
                                            </div>

                                            <!-- Export Button -->
                                            <div>
                                                <button type="button" onclick="exportReport()"
                                                    class="px-6 py-2 text-sm font-bold text-white bg-cyan-500 rounded-lg hover:bg-cyan-600 transition-colors">
                                                    <i class="fas fa-download mr-1"></i> Export
                                                </button>
                                            </div>

                                            <!-- Clear Button -->
                                            <div>
                                                <button type="button" onclick="clearFilters()"
                                                    class="px-6 py-2 text-sm font-bold text-white bg-red-500 rounded-lg hover:bg-red-600 transition-colors">
                                                    <i class="fas fa-times mr-1"></i> Clear
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="flex-auto px-0 pt-0 pb-2">
                                    <div class="p-0 overflow-x-auto">
                                        <table
                                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                            <thead class="align-bottom">
                                                <tr>
                                                    <th
                                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                        Main Category
                                                    </th>
                                                    <th
                                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                        Sub Category
                                                    </th>
                                                    <th
                                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                        Total Products
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($mainCategories as $mainCategory)
                                                    @foreach($mainCategory->subCategories as $subCategory)
                                                        <tr style="text-align: center">
                                                            <!-- Main Category -->
                                                            <td
                                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                <div class="flex px-2 py-1">
                                                                    <div class="flex flex-col justify-center">
                                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                                            {{ $mainCategory->main_category_name }}
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <!-- Sub Category -->
                                                            <td
                                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                <div class="flex px-2 py-1">
                                                                    <div class="flex flex-col justify-center">
                                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                                            {{ $subCategory->sub_category_name }}
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <!-- Total Products in this Sub Category -->
                                                            <td
                                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                @php $count = $subCategory->products->count(); @endphp
                                                                @if($count === 0)
                                                                    <p
                                                                        class="mb-0 text-xs font-semibold leading-tight text-red-600 dark:text-red-400">
                                                                        Empty</p>
                                                                @else
                                                                    <p
                                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                        {{ $count }}</p>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
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
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.querySelector('input[placeholder="Search here..."]');
            const rows = document.querySelectorAll('table tbody tr');
            const mainCategorySelect = document.getElementById('main_category');
            const subCategorySelect = document.getElementById('sub_category');
            const filterForm = document.getElementById('filterForm');

            // Search functionality
            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    const searchTerm = this.value.toLowerCase();

                    rows.forEach(row => {
                        const text = row.innerText.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }

            // Load subcategories when main category changes
            if (mainCategorySelect) {
                mainCategorySelect.addEventListener('change', function () {
                    const mainCategoryId = this.value;
                    subCategorySelect.innerHTML = '<option value="">All Sub Categories</option>';

                    if (mainCategoryId) {
                        fetch(`/stock/get-subcategories/${mainCategoryId}`)
                            .then(response => response.json())
                            .then(data => {
                                data.forEach(subCategory => {
                                    const option = document.createElement('option');
                                    option.value = subCategory.id;
                                    option.textContent = subCategory.sub_category_name;
                                    // Preserve selected subcategory if exists
                                    if ('{{ request("sub_category_id") }}' == subCategory.id) {
                                        option.selected = true;
                                    }
                                    subCategorySelect.appendChild(option);
                                });
                            })
                            .catch(error => console.error('Error loading subcategories:', error));
                    }

                    // Auto-submit form when category changes
                    filterForm.submit();
                });

                // Auto-submit when subcategory changes
                subCategorySelect.addEventListener('change', function () {
                    filterForm.submit();
                });

                // Auto-submit when dates change
                document.getElementById('start_date').addEventListener('change', function () {
                    filterForm.submit();
                });

                document.getElementById('end_date').addEventListener('change', function () {
                    filterForm.submit();
                });

                // Load subcategories on page load if main category is selected
                if (mainCategorySelect.value) {
                    const mainCategoryId = mainCategorySelect.value;
                    fetch(`/stock/get-subcategories/${mainCategoryId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(subCategory => {
                                const option = document.createElement('option');
                                option.value = subCategory.id;
                                option.textContent = subCategory.sub_category_name;
                                if ('{{ request("sub_category_id") }}' == subCategory.id) {
                                    option.selected = true;
                                }
                                subCategorySelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error loading subcategories:', error));
                }
            }
        });

        // Export filtered data
        function exportReport() {
            const params = new URLSearchParams();
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            const mainCategory = document.getElementById('main_category').value;
            const subCategory = document.getElementById('sub_category').value;

            if (startDate) params.append('start_date', startDate);
            if (endDate) params.append('end_date', endDate);
            if (mainCategory) params.append('main_category_id', mainCategory);
            if (subCategory) params.append('sub_category_id', subCategory);

            window.location.href = '{{ route("stock.report.export") }}?' + params.toString();
        }

        // Clear all filters
        function clearFilters() {
            window.location.href = '{{ route("stock.stock-report") }}';
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
        document.addEventListener('DOMContentLoaded', function () {
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