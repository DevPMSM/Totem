<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - ConectaSama</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../static/img/favicon.png" rel="icon">
  <link href="../static/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../static/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../static/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../static/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../static/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../static/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../static/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

</head>

<body>


  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex flex-column justify-content-center ">
                <a class="logo d-flex flex-column align-items-center w-auto">
                  <img src="../static/img/logo2.png" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                  <p></p>
                  <form class="row g-3 needs-validation" method="POST" action="/" novalidate>
                    <div class="col-12">
                      <label for="username" class="form-label">Usuário</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="username" required>
                        <div class="invalid-feedback">Entrar com seu usuário.</div>
                      </div>
                    </div>


                    <div class="col-12">
                      <label for="password" class="form-label">Senha</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Entrar com sua senha!</div>
                    </div>


                    <div class="col-12">
                      <button type="submit" class="btn btn-primary w-100" {% if whatsapp_not_connected %}disabled{% endif %}>
                        Entrar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="text-center" >
                Desenvolvido por <a href="https://www.saomateus.es.gov.br/secretaria/ciencia-tecnologia-inovacao-educacao-profissional-e-trabalho" target="_blank">Secretaria Municipal de Ciência, Tecnologia, Inovação, Educação Profissional e Trabalho
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../static/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../static/vendor/chart.js/chart.umd.js"></script>
  <script src="../static/vendor/echarts/echarts.min.js"></script>
  <script src="../static/vendor/quill/quill.min.js"></script>
  <script src="../static/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../static/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../static/js/main.js"></script>

</body>

</html>
