<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Saya</title>
  <!-- Tambahkan link ke file CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
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
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="#" class="nav-link">About Me</a></li>
          </ul>

        </header>
    </div>
    {{-- END NAVBAR --}}

    {{-- PROFILE --}}
    <div class="container my-5">
        <div class="row justify-content-around grid gap-3">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="text-center">
                    <img src="{{ asset('storage/img/profile.jpg') }}" class="rounded-circle " alt="ianganteng" style="width: 400px">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h1 class="my-5">Hi, I am Ian,Web Developer</h2>
                <p class="my-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur odio repellendus, iste aliquid sint ullam cumque vero, iusto rem deleniti est optio nihil, vitae numquam ipsam maxime saepe consequuntur libero.</p>

                <div class="text-center">
                    <button type="button" class="btn btn-primary">Download CV</button>
                </div>
            </div>
        </div>
    </div>
    {{-- END PROFILE --}}

    <div class="container">
        <div class="row">
          <div class="col col-sm-6 mx-auto p-3">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Judul</h5>
                <p class="card-text">Deskripsi singkat mengenai card.</p>
                <p class="card-text"><small class="text-muted">Tanggal dibuat: 29 April 2023</small></p>
                <a href="#" class="btn btn-primary">Go to page</a>
              </div>
            </div>
          </div>
          <div class="col col-sm-6 mx-auto p-3">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Judul</h5>
                <p class="card-text">Deskripsi singkat mengenai card.</p>
                <p class="card-text"><small class="text-muted">Tanggal dibuat: 29 April 2023</small></p>
                <a href="#" class="btn btn-primary">Go to page</a>
              </div>
            </div>
          </div>
          <div class="col col-sm-6 mx-auto p-3">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Judul</h5>
                <p class="card-text">Deskripsi singkat mengenai card.</p>
                <p class="card-text"><small class="text-muted">Tanggal dibuat: 29 April 2023</small></p>
                <a href="#" class="btn btn-primary">Go to page</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- CARD -->
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row g-3">
                @foreach ($articles as $art)
                <div class="col-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title text-center">{{ $art->title }}</h2>
                            {{-- <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6> --}}
                            {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                            <small class="text-muted">{{ $art->created_at }}</small>

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <a href="#" class="btn btn-sm btn-outline-secondary">Go to Page</a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- END CARD -->

    {{-- FOOTER --}}
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Company, Inc</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
        </ul>
        </footer>
    </div>
    {{-- END FOOTER --}}
</body>

</html>
