<!-- SENHAS -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">   
    <link rel="stylesheet" href="{{ asset('assets/css/password.css') }}">   
    <title>Document</title>
</head>
<body>
    <div class="conteiner">
        <h2>Senhas</h2>
        <div  class="page">
            <a class="page_filho" href="#">
                <div >
                    <h4>Nome</h4>
                    <span>Larissa Ribeiro</span>
                </div>
                <div>
                    <h4>Tipo</h4>
                    <span class="prioritario">Prioritário</span>
                </div>
                <div>
                    <h4>Número</h4>
                    <span>1</span>
                </div>
               
            </a>
            <a class="page_filho" href="#">
                <div>
                    <h4>Nome</h4>
                    <span>Lucas Preto</span>
                </div>
                <div>
                    <h4>Tipo</h4>
                    <span class="normal">Normal</span>
                </div>
                <div>
                    <h4>Número</h4>
                    <span>3</span>
                </div>
            </a>
            <a class="page_filho" href="#">
                <div >
                    <h4>Nome</h4>
                    <span>Larissa Ribeiro</span>
                </div>
                <div>
                    <h4>Tipo</h4>
                    <span class="prioritario">Prioritário</span>
                </div>
                <div>
                    <h4>Número</h4>
                    <span>1</span>
                </div>
               
            </a>
            <a class="page_filho" href="#">
                <div >
                    <h4>Nome</h4>
                    <span>Larissa Ribeiro</span>
                </div>
                <div>
                    <h4>Tipo</h4>
                    <span class="prioritario">Prioritário</span>
                </div>
                <div>
                    <h4>Número</h4>
                    <span>1</span>
                </div>
               
            </a>
            
            

        </div>             
    </div>  -->
    


<!-- TELA DE LOGIN  -->
<!-- <html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">   
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">   
    <title>Document</title>
</head>
<body>

    <div class="page">
    
            <form method="POST" class="formLogin">
                <h1>Login</h1>
                <p>Digite os seus dados de acesso no campo abaixo.</p>
                <label for="email">E-mail</label>
                <input type="email" placeholder="Digite seu e-mail" autofocus="true" />
                <label for="password">Senha</label>
                <input type="password" placeholder="Digite sua senha" />
                <a href="/">Esqueci minha senha</a>
                <input type="submit" value="Acessar" class="btn" />
            </form>
    </div> 
 </body>
</html>  

<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">

<h1>DESLOGADO</h1>
@if (Route::has('login'))
    <nav class="-mx-3 flex flex-1 justify-end">
        @auth
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Dashboard
            </a>
        @else
            <a
                href="{{ route('login') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Log in
            </a>
        @endauth
    </nav>
@endif -->


<!-- MODAL SENHAS -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Senhat</title>
    <link rel="stylesheet" href="{{asset('assets/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/modal.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="conteiner">
        <div class="conteiner_filho">


        <h1>Senha</h1>
        <hr class="linha"/>
        <div class="nome_modal">
        <h2>Nome</h2>
        <p>Felicio Rodinei</p>
        </div>
        <div class="numero_modal" >
        <h2>Número</h2>
        <p>1</p>
        </div>
        <p class="prioritario">Prioritário</p>
        <button>Concluir</button>
        </div>
    </div>
    
</body>
</html>