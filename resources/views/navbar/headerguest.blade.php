<nav class="navbar navbar-expand-lg bg-light navbar-dark bg-black fixed-top">
   <div class="container-fluid">
      <a class="navbar-brand m-1" href="/">
         <H3>MAIBOUTIQUE</H3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
         aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
         <div class="navbar-nav">
            <a href="{{ route('auth.login') }}"><button type="button" class="btn btn-primary"
                  style="margin-left: 1200px">Sign In</button></a>
         </div>
      </div>
   </div>
</nav>
