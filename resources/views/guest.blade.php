<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Senha</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>Gerar Senha</h1>
    <select id="queueSelect">
        @foreach($queueNames as $queueName)
            <option value="{{ $queueName }}">{{ $queueName }}</option>
        @endforeach
    </select>
    <label>
        <input type="checkbox" id="isPreferential"> Preferencial
    </label>
    <button id="generateTicket">Gerar Nova Senha</button>
    <p id="ticketNumber"></p>

    <script>
        document.getElementById('generateTicket').addEventListener('click', function() {
            this.disabled = true;
            const queueName = document.getElementById('queueSelect').value;
            const isPreferential = document.getElementById('isPreferential').checked;

            axios.post('{{ route('generate.ticket') }}', {
                queue_name: queueName,
                is_preferential: isPreferential
            })
            .then(function (response) {
                const ticket = response.data;
                document.getElementById('ticketNumber').textContent = `Sua senha é: ${ticket.ticket_number} (${ticket.queue_name}, ${ticket.is_preferential ? 'Preferencial' : 'Normal'})`;
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(() => {
                this.disabled = false;
            });
        });
    </script>
</body>
</html>
