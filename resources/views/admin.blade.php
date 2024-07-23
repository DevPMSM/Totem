<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração da Fila</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>Administração da Fila</h1>
    @foreach($queueNames as $queueName)
        <div>
            <h2>{{ $queueName }}</h2>
            <p>Senha Atual: <span id="currentTicket_{{ $queueName }}">
                {{ $currentTickets[$queueName] ? $currentTickets[$queueName]->ticket_number . ($currentTickets[$queueName]->is_preferential ? ' (Preferencial)' : '') : 'Nenhuma' }}
            </span></p>
            <button onclick="callNext('{{ $queueName }}')">Chamar Próximo</button>
        </div>
    @endforeach

    <script>
        function updateTicketDisplay(queueName, ticket) {
            const displayElement = document.getElementById(`currentTicket_${queueName}`);
            if (ticket) {
                displayElement.textContent = `${ticket.ticket_number}${ticket.is_preferential ? ' (Preferencial)' : ''}`;
            } else {
                displayElement.textContent = 'Nenhuma';
            }
        }

        function callNext(queueName) {
            axios.post('{{ route('call.next') }}', { queue_name: queueName })
                .then(function (response) {
                    updateTicketDisplay(queueName, response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function checkCurrentTickets() {
            axios.get('{{ route('current.tickets') }}')
                .then(function (response) {
                    const currentTickets = response.data;
                    for (const [queueName, ticket] of Object.entries(currentTickets)) {
                        updateTicketDisplay(queueName, ticket);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        // Verifica as senhas atuais a cada 2 segundos
        setInterval(checkCurrentTickets, 2000);
    </script>
</body>
</html>
