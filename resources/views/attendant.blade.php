<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Atendente - {{ $user->queue }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Painel do Atendente - {{ $user->queue }}</h1>
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Senha Atual</h2>
            <div id="currentTicketInfo" class="mb-4">
                <p id="currentTicketDetails" class="text-2xl font-bold"></p>
                <p id="currentServiceName" class="text-xl mt-2"></p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Próxima Senha</h2>
            <div id="nextTicketInfo" class="mb-4">
                <p id="nextTicketDetails" class="text-2xl font-bold"></p>
                <p id="nextServiceName" class="text-xl mt-2"></p>
            </div>
        </div>
        <div class="row mr-0 ml-0 justify-content-between">
            <button onclick="callNext()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ">Chamar Próximo</button>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
            </form>
        </div>
    </div>

    <script>
        function updateTicketDisplay(data) {
            updateTicketInfo(data.current, 'current');
            updateTicketInfo(data.next, 'next');
        }

        function updateTicketInfo(ticket, type) {
            const ticketDetails = document.getElementById(`${type}TicketDetails`);
            const serviceName = document.getElementById(`${type}ServiceName`);

            if (ticket) {
                const preferentialText = ticket.is_preferential ? 'Preferencial' : 'Normal';
                ticketDetails.textContent = `Senha ${ticket.ticket_number} - ${preferentialText}`;
                serviceName.textContent = `Serviço: ${ticket.service_name}`;
            } else {
                ticketDetails.textContent = 'Nenhuma senha na fila';
                serviceName.textContent = '';
            }
        }

        function callNext() {
            axios.post('{{ route('call.next') }}')
                .then(function (response) {
                    checkCurrentAndNextTicket();
                })
                .catch(function (error) {
                    console.error('Erro ao chamar próxima senha:', error);
                });
        }

        function checkCurrentAndNextTicket() {
            axios.get('{{ route('current.and.next.ticket') }}')
                .then(function (response) {
                    updateTicketDisplay(response.data);
                })
                .catch(function (error) {
                    console.error('Erro ao verificar senhas:', error);
                });
        }

        // Verifica as senhas a cada 2 segundos
        setInterval(checkCurrentAndNextTicket, 2000);

        // Chama a função imediatamente para exibir os dados iniciais
        checkCurrentAndNextTicket();

        // Adiciona um listener para o evento de armazenamento
        window.addEventListener('storage', function(e) {
            if (e.key === 'newTicketGenerated') {
                checkCurrentAndNextTicket();
            }
        });
    </script>
</body>
</html>
