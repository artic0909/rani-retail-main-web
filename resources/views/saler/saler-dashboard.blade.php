<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Sales | Dashboard</title>
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
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
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
                        class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
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
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
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
                        href="/saler/saler-sales-report">
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
    <!-- end sidenav -->

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
                            Dashboard
                        </li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">Dashboard</h6>
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
                            <form method="POST" action="{{ route('saler.logout') }}">
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

                            <ul
                                dropdown-menu
                                class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:shadow-dark-xl dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                <!-- add show class on dropdown open js -->
                                <li class="relative mb-2">
                                    <a
                                        class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                        href="javascript:;">
                                        <div class="flex py-1">
                                            <div class="my-auto">
                                                <img
                                                    src="../assets/img/team-2.jpg"
                                                    class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6
                                                    class="mb-1 text-sm font-normal leading-normal dark:text-white">
                                                    <span class="font-semibold">New message</span> from
                                                    Laur
                                                </h6>
                                                <p
                                                    class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                                    <i class="mr-1 fa fa-clock"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="relative mb-2">
                                    <a
                                        class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                                        href="javascript:;">
                                        <div class="flex py-1">
                                            <div class="my-auto">
                                                <img
                                                    src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="inline-flex items-center justify-center mr-4 text-sm text-white bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 h-9 w-9 max-w-none rounded-xl" />
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6
                                                    class="mb-1 text-sm font-normal leading-normal dark:text-white">
                                                    <span class="font-semibold">New album</span> by
                                                    Travis Scott
                                                </h6>
                                                <p
                                                    class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                                    <i class="mr-1 fa fa-clock"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="relative">
                                    <a
                                        class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                                        href="javascript:;">
                                        <div class="flex py-1">
                                            <div
                                                class="inline-flex items-center justify-center my-auto mr-4 text-sm text-white transition-all duration-200 ease-nav-brand bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                                                <svg
                                                    width="12px"
                                                    height="12px"
                                                    viewBox="0 0 43 36"
                                                    version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g
                                                        stroke="none"
                                                        stroke-width="1"
                                                        fill="none"
                                                        fill-rule="evenodd">
                                                        <g
                                                            transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF"
                                                            fill-rule="nonzero">
                                                            <g
                                                                transform="translate(1716.000000, 291.000000)">
                                                                <g
                                                                    transform="translate(453.000000, 454.000000)">
                                                                    <path
                                                                        class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path
                                                                        class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6
                                                    class="mb-1 text-sm font-normal leading-normal dark:text-white">
                                                    Payment successfully completed
                                                </h6>
                                                <p
                                                    class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                                    <i class="mr-1 fa fa-clock"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- end Navbar -->

        <!-- cards -->
        <div class="w-full px-6 py-6 mx-auto">
            <!-- row 1 -->
            <div class="flex flex-wrap -mx-3">
                <!-- card1 -->
                <div
                    class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                            Today's Sales
                                        </p>
                                        <h5 class="mb-2 font-bold dark:text-white">₹3,000</h5>
                                        <p class="mb-0 dark:text-white dark:opacity-60">
                                            <span
                                                class="text-sm font-bold leading-normal text-emerald-500">+55%</span>
                                            since yesterday
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                        <i
                                            class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card2 -->
                <div
                    class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                            Today's Selling Products
                                        </p>
                                        <h5 class="mb-2 font-bold dark:text-white">30</h5>
                                        <p class="mb-0 dark:text-white dark:opacity-60">
                                            <span
                                                class="text-sm font-bold leading-normal text-emerald-500">+3%</span>
                                            since yesterday
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                        <i
                                            class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card3 -->
                <div
                    class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <a href="sales-stock-refill.html"
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                            Stock refill
                                        </p>
                                        <h5 class="mb-2 font-bold text-red-600">+62</h5>
                                        <p class="mb-0 dark:text-white dark:opacity-60">
                                            <span
                                                class="text-sm font-bold leading-normal text-red-600">12/06/2025</span>
                                            last refill
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                        <i
                                            class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- card4 -->
                <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                            Last Month Sales
                                        </p>
                                        <h5 class="mb-2 font-bold dark:text-white">₹10,030</h5>
                                        <p class="mb-0 dark:text-white dark:opacity-60">
                                            <span
                                                class="text-sm font-bold leading-normal text-emerald-500">+5%</span>
                                            May
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                        <i
                                            class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- cards row 2 -->
            <div class="flex flex-wrap mt-6 -mx-3">
                <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
                    <div
                        class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                        <div
                            class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                            <h6 class="capitalize dark:text-white">Sales overview</h6>
                            <p
                                class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                                <i class="fa fa-arrow-up text-emerald-500"></i>
                                <span class="font-semibold">4% more</span> in 2021
                            </p>
                        </div>
                        <div class="flex-auto p-4">
                            <div>
                                <canvas id="chart-line" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
                    <div
                        slider
                        class="relative w-full h-full overflow-hidden rounded-2xl">
                        <!-- slide 1 -->
                        <div
                            slide
                            class="absolute w-full h-full transition-all duration-500">
                            <img
                                class="object-cover h-full"
                                src="../assets/img/saller-reg.png"
                                alt="carousel image" />
                            <div
                                class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                                <div
                                    class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                                    <i
                                        class="top-0.75 text-xxs relative text-slate-700 ni ni-camera-compact"></i>
                                </div>
                                <h5 class="mb-1 text-white">
                                    Welcome to Rani Retail – Salesman Portal
                                </h5>
                                <p class="dark:opacity-80">
                                    Sell products smarter and faster! Browse by category, track
                                    your sales, and manage customer inquiries — all from one
                                    easy-to-use dashboard designed just for sales professionals.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- cards row 3 -->

            <div class="flex flex-wrap mt-6 -mx-3">
                <!-- sales -->
                <div
                    class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-12/12 lg:flex-none">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 rounded-t-4">
                            <div class="flex justify-between">
                                <h6 class="mb-2 dark:text-white">Recent Sales Details</h6>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table
                                class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                                <tbody>
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Name:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        Customer Name
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Mobile:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        123456790
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Item Purchased:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    4
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Amount:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    ₹8,900
                                                </h6>
                                            </div>
                                        </td>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Invoice:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    <a href="" class="text-blue-500 underline">PDF</a>
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Name:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        Customer Name
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Mobile:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        123456790
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Item Purchased:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    4
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Amount:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    ₹8,900
                                                </h6>
                                            </div>
                                        </td>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Invoice:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    <a href="" class="text-blue-500 underline">PDF</a>
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Name:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        Customer Name
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Mobile:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        123456790
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Item Purchased:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    4
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Amount:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    ₹8,900
                                                </h6>
                                            </div>
                                        </td>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Invoice:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    <a href="" class="text-blue-500 underline">PDF</a>
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Name:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        Customer Name
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Mobile:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        123456790
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Item Purchased:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    4
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Amount:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    ₹8,900
                                                </h6>
                                            </div>
                                        </td>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Invoice:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    <a href="" class="text-blue-500 underline">PDF</a>
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Name:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        Customer Name
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Mobile:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        123456790
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Item Purchased:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    4
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Amount:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    ₹8,900
                                                </h6>
                                            </div>
                                        </td>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Invoice:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    <a href="" class="text-blue-500 underline">PDF</a>
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Name:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        Customer Name
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="ml-6">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                        Mobile:
                                                    </p>
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                        123456790
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Item Purchased:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    4
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Amount:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    ₹8,900
                                                </h6>
                                            </div>
                                        </td>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Invoice:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white">
                                                    <a href="" class="text-blue-500 underline">PDF</a>
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="pt-4">
                <div class="w-full px-6 mx-auto">
                    <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                        <div
                            class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                            <div
                                class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                                ©
                                <script>
                                    document.write(new Date().getFullYear() + ",");
                                </script>
                                all rights reserved by
                                <a
                                    href="#"
                                    class="font-semibold text-slate-700 dark:text-white"
                                    target="_blank">Rani Retail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end cards -->
    </main>
</body>
<!-- plugin for charts  -->
<script src="../assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>