<div class="row">
    <div class="col-md-12 col-xs-10 px-0" style="background-color:lightgreen;">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:lightgreen;">
                <h1 class="index_level1" class="navbar-brand">FURNITURE</h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Food</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">新規会員登録</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">ログイン</a>
                    </li>
                    <li class="antialiased">
                      <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                      @if (Route::has('login'))
                          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                              @auth
                                  <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                              @else
                                  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                  @if (Route::has('register'))
                                      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                  @endif
                              @endauth
                          </div>
                      @endif
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-black" type="submit">Search</button>
                </form>
                </div>
            </nav>
    </div>
</div>