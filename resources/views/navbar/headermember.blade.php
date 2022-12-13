<nav class="navbar navbar-expand-lg bg-black navbar-dark">
   <div class="container-fluid m-1">
      <a class="navbar-brand" href="{{ route('index') }}">
         <h3>MAI BOTIQUE</h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link {{ Route::is('index') ? 'active' : '' }}" aria-current="page"
                  href="{{ route('index') }}">
                  <h5>Home</h5>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Route::is('index.search') ? 'active' : '' }} " href="{{ route('index.search') }}">
                  <h5>Search</h5>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Route::is('cart.index') ? 'active' : '' }}" href="{{ route('cart.index') }}">
                  <h5>Cart</h5>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Route::is('trx') ? 'active' : '' }}" href="{{ route('trx') }}">
                  <h5>History</h5>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Route::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                  <h5>Profile</h5>
               </a>
            </li>
         </ul>
         <div class="d-flex">
            <a href="/logout"><button class="btn btn-primary">Sign Out</button></a>
         </div>
      </div>
   </div>
</nav>
