<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../assets/img/apple-icon.png"
    />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Stock Manager Login</title>
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
      rel="stylesheet"
    />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/42d5adcbca.js"
      crossorigin="anonymous"
    ></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link
      href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1"
      rel="stylesheet"
    />
  </head>

  <body
    class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500"
  >
    <div class="container sticky top-0 z-sticky">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
          <!-- Navbar -->
          <nav
            class="absolute top-0 left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 m-6 mb-0 shadow-sm rounded-xl bg-white/80 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start"
          >
            <div
              class="flex items-center justify-between w-full p-0 px-6 mx-auto flex-wrap-inherit"
            >
              <a
                class="py-1.75 text-sm mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 lg:ml-0"
                href="/"
              >
                Rani Retail - Stock
              </a>
              <button
                navbar-trigger
                class="px-3 py-1 ml-2 leading-none transition-all ease-in-out bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg lg:hidden"
                type="button"
                aria-controls="navigation"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span
                  class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none"
                >
                  <span
                    bar1
                    class="w-5.5 rounded-xs relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"
                  ></span>
                  <span
                    bar2
                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"
                  ></span>
                  <span
                    bar3
                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"
                  ></span>
                </span>
              </button>
              <div
                navbar-menu
                class="items-center flex-grow transition-all duration-500 lg-max:overflow-hidden ease lg-max:max-h-0 basis-full lg:flex lg:basis-auto"
              >
                <ul
                  class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto"
                >
                  <li>
                    <a
                      class="flex items-center px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                      aria-current="page"
                      href="/"
                    >
                      <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                      Go Back
                    </a>
                  </li>

                  <li>
                    <a
                      class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                      href="/stock-manager-register"
                    >
                      <i class="mr-1 fas fa-user-circle opacity-60"></i>
                      Sign Up
                    </a>
                  </li>

                  <li>
                    <a
                      class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                      href="/stock-manager-login"
                    >
                      <i class="mr-1 fas fa-key opacity-60"></i>
                      Sign In
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <main class="mt-0 transition-all duration-200 ease-in-out">
      <section>
        <div
          class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover"
        >
          <div class="container z-1">
            <div class="flex flex-wrap -mx-3">
              <div
                class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12"
              >
                <div
                  class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border"
                >
                  <div class="p-6 pb-0 mb-0">
                    <h4 class="font-bold" style="font-size: 2rem">
                      Hello, Stock Manager!
                    </h4>
                    <p class="mb-0" style="text-align: justify">
                      Log in to manage product entries, monitor inventory, and
                      keep your store stocked efficiently.
                    </p>
                  </div>
                  <div class="flex-auto p-6">
                    <form role="form" action="{{ route('verify.stock-manager-login') }}" method="POST">
                      @csrf

                      <div class="mb-4">
                        <input
                          type="email"
                          placeholder="Email"
                          class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                          name="email"
                          id="email"
                        />
                      </div>
                      <div class="mb-4">
                        <input
                          type="password"
                          placeholder="Password"
                          class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                          name="password"
                          id="password"
                        />
                      </div>
                      <div
                        class="flex items-center pl-12 mb-0.5 text-left min-h-6"
                      >
                        <input
                          id="rememberMe"
                          class="mt-0.5 rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-zinc-700/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                          type="checkbox"
                        />
                        <label
                          class="ml-2 font-normal cursor-pointer select-none text-sm text-slate-700"
                          for="rememberMe"
                          >Remember me</label
                        >
                      </div>
                      <div class="text-center">
                        <button
                          type="submit"
                          class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25"
                        >
                          Sign in
                        </button>
                      </div>
                    </form>
                  </div>
                  <div
                    class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6"
                  >
                    <p class="mx-auto mb-6 leading-normal text-sm">
                      Don't have an account?
                      <a
                        href="/stock-manager-register"
                        class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500"
                        >Sign up</a
                      >
                    </p>
                  </div>
                </div>
              </div>
              <div
                class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex"
              >
                <div
                  class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden rounded-xl"
                  style="
                    background: url(../assets/img/stock.png);
                    background-position: center;
                  "
                >
                  <span
                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover opacity-60"
                  ></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="py-12">
      <div class="container">
        <div class="flex flex-wrap -mx-3">
          <div
            class="flex-shrink-0 w-full max-w-full mx-auto mb-6 text-center lg:flex-0 lg:w-8/12"
          >
            <a
              href="javascript:;"
              target="_blank"
              class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
            >
              Company
            </a>
            <a
              href="javascript:;"
              target="_blank"
              class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
            >
              About Us
            </a>
            <a
              href="javascript:;"
              target="_blank"
              class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
            >
              Team
            </a>
            <a
              href="javascript:;"
              target="_blank"
              class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
            >
              Products
            </a>
            <a
              href="javascript:;"
              target="_blank"
              class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
            >
              Blog
            </a>
            <a
              href="javascript:;"
              target="_blank"
              class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
            >
              Pricing
            </a>
          </div>
          <div
            class="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12"
          >
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-dribbble"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-pinterest"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-github"></span>
            </a>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3">
          <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
            <p class="mb-0 text-slate-400">
              Copyright ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              Rani Retail.
            </p>
          </div>
        </div>
      </div>
    </footer>
  </body>
  <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</html>
