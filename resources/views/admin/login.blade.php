<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Admin</title>


  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: url('{{ asset('img/bg3.png') }}') no-repeat center center/cover;
      
    }
    .card {
      background-color: rgba(75, 64, 64, 0.795);
      backdrop-filter: blur(5px);
    }
  </style>
</head>
<body>

    <div class="card shadow px-4 rounded-4" style="width: 350px">
        <h1 class="text-center mt-4 mb-4 fw-bold text-light">Login</h1>
        @if (session('error'))
          <div class="text-light small fw-xs bg-danger bg-opacity-50 small form-control border-0 py-2 mb-2">{{ session('error') }}</div>
        @endif
        <form action="{{ route('proses.login') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label fw-semibold text-light">Email</label>
            <input type="email" name="email" class="form-control form-control-sm p-2 bg-light bg-opacity-25 border-0 text-light" id="email" placeholder="Masukan email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label fw-semibold text-light">Password</label>
            <input type="password" name="password" class="form-control form-control-sm p-2 bg-light bg-opacity-25 border-0 text-light" placeholder="Masukan password" id="password" required>
          </div>
          <button type="submit" class="btn btn-primary form-control p-2 fw-semibold mt-2">Masuk</button>
        </form>
        <p class="text-center mt-3 small text-light">&copy 2025 Pepustakaan Mini</p>
      </div>
    </div>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // const validEmail = "nazrilhilmy";
    // const validPassword = "27";

    // document.getElementById('loginForm').addEventListener('submit', function(e) {
    //   e.preventDefault();

    //   const email = document.getElementById('email').value.trim();
    //   const password = document.getElementById('password').value;

    //   if (email === validEmail && password === validPassword) {
    //     localStorage.setItem('loggedIn', 'true');
    //     localStorage.setItem('userEmail', email);

    //     // Redirect ke folder admin
    //     window.location.href = 'admin';
    //   } else {
    //     document.getElementById('error-msg').style.display = 'block';
    //   }
    // });
  </script>

</body>
</html>
