<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Multindo</title>
  <meta name="description" content="The small framework with powerful features">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/image/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
  body {
    background: linear-gradient(to right,rgb(121, 176, 235),rgb(2, 3, 83));
    height: 100vh;
  }

  .navbar {
    background: transparent !important;
  }

  .hero-section {
    text-align: center;
    color: white;
    padding: 100px 20px;
  }

  .hero-section h1 {
    font-weight: bold;
  }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand text-white fw-bold" href="/"><img src="/image/logo.png" alt="Logo Multindo"
          height="60"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <!-- Button trigger modal -->
          <a class="nav-link text-white" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            E-Recruitment
          </a>
          <!-- Modal -->
          <div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="login.php" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">LOGIN</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                    <button type="button" class="btn btn-primary">LOGIN</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownMenu" role="button"
              data-bs-toggle="dropdown">
              E-Training
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">SERTIFIKASI</a></li>
              <li><a class="dropdown-item" href="<?= base_url('/e-training/materi') ?>">MATERI</a></li>
              <li><a class="dropdown-item" href="#">SOP</a></li>
              <li><a class="dropdown-item" href="#">DOWNLOAD</a></li>
              <li><a class="dropdown-item" href="<?= base_url('/e-training/diskusi-umum') ?>">DISKUSI UMUM</a></li>
              <li><a class="dropdown-item" href="#">EVALUASI</a></li>
              <li><a class="dropdown-item" href="<?= base_url('/e-training/video') ?>">VIDEO</a></li>
              <li class="nav-item dropdown">
            </a>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownMenu" role="button"
              data-bs-toggle="dropdown">
              Daftar Karyawan
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?=base_url('/karyawan/calon-karyawan') ?>">CALON KARYAWAN</a></li>
              <li><a class="dropdown-item" href="#">KARYAWAN</a></li>
            </ul>
          </li>
          <li class="nav-item">
    <a class="nav-link text-white" href="/penggajian">
        Penggajian Karyawan
    </a>
</li>

            </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="text-white py-5">
    <?= $this->renderSection('content') ?>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
  </script>
  <script>
  const myModal = document.getElementById('myModal')
  const myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
  })
  </script>
</body>

</html>