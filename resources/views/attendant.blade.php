<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Atendente - {{ $user->queue }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Painel do Atendente - {{ $user->queue }}</h1>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Senha Atual</h2>
            <p id="currentTicket" class="text-2xl font-bold mb-4">
                @if($currentTicket)
                    <p>Próxima senha: {{ $currentTicket->ticket_number }} ({{ $currentTicket->is_preferential ? 'Preferencial' : 'Normal' }})</p>
                    <p>Serviço: {{ $currentTicket->service_name }}</p>
                @else
                    <p>Nenhuma senha na fila.</p>
                @endif
            </p>
            <button onclick="callNext()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Chamar Próximo</button>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="mt-8">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
        </form>
    </div>

    <script>
        function updateTicketDisplay(ticket) {
            const displayElement = document.getElementById('currentTicket');
            if (ticket) {
                displayElement.textContent = `${ticket.ticket_number}${ticket.is_preferential ? ' (Preferencial)' : ''}`;
            } else {
                displayElement.textContent = 'Nenhuma';
            }
        }

        function callNext() {
            axios.post('{{ route('call.next') }}')
                .then(function (response) {
                    updateTicketDisplay(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function checkCurrentTicket() {
            axios.get('{{ route('current.ticket') }}')
                .then(function (response) {
                    updateTicketDisplay(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        // Verifica a senha atual a cada 2 segundos
        setInterval(checkCurrentTicket, 2000);
    </script>
</body>
</html>
