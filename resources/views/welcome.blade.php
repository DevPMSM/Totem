<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">

        <title>Bem-vindo</title>
    </head>

    <body>
        <div class="container">
            <div class="col caixa_texto">
                <div class="row title">
                    <div class="welcome">
                        <h1>Bem-Vindo!</h1>
                    </div>
                    <ul class="first_line">Para navegar, use o teclado <span class="foco">numérico</span>:</ul>
                        <li class="first_line"><span class="foco">Digite um número</span> e pressione <span class="enter">ENTER</span> </li>
                        <li class="first_line"><span class="foco">Para voltar</span> pressione <span class="cancela">CANCELA</span></li>
                </div>
                <br class="paragrafo">
                <div class="row alert_container">
                    <div class="col-8 text_box">
                        <div class="col">
                            <p class="first_line"><span class="foco">Atenção:</span> A tela NÃO é touch!</p>
                            <p class="first_line"><span class="foco">Precisa de ajuda?</span> Procure a Secretaria responsável.</p>
                        </div>
                            <p class="last_line">Aperte <span class="enter">ENTER</span> para navegar pelo Totem!</p>
                    </div>
                    <div class="col-4 img_container">
                        <img src="{{ asset('assets/img/atendente2.png') }}" alt="">
                    </div>
                </div>

            </div>

        </div>

        <script>
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    window.location.href = '{{ route('index') }}';
                }
            });
        </script>
    </body>

</html>
