    {{-- NAVBAR --}}
    <div class="container">
        <header class="navbar navbar-expand-lg d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <a href="/" class="navbar-brand d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"/>
            </svg>
            <img src="{{ asset('storage/img/logo.png') }}" alt="" style="width: 40px">
            {{-- <span class="fs-4"></span> --}}
          </a>

          <ul class="nav nav-pills align-items-center">
            <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="/about" class="nav-link">About Me</a></li>
          </ul>

        </header>
    </div>
    {{-- END NAVBAR --}}
