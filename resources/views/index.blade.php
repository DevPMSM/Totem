<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto-atendimento</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($queueNames as $index => $queue)
                <div class="service-card bg-white" data-digit="Digite {{ $index + 1 }}" style="--card-color: {{ $queue['color'] }};">
                    <h2 class="text-xl font-semibold mb-4" style="color: {{ $queue['color'] }};">{{ $queue['name'] }}</h2>
                    <button onclick="openModal('{{ $queue['name'] }}')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Gerar Senha</button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="ticketModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-xl">
            <h2 id="modalTitle" class="text-2xl font-bold mb-4"></h2>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" id="isPreferential" class="form-checkbox">
                    <span class="ml-2">Senha Preferencial</span>
                </label>
            </div>
            <button onclick="generateTicket()" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Confirmar</button>
            <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2">Cancelar</button>
            <p id="ticketNumber" class="mt-4 text-lg font-semibold"></p>
        </div>
    </div>

    <script>
        let currentQueue = '';

        function openModal(queueName) {
            currentQueue = queueName;
            document.getElementById('modalTitle').textContent = `Gerar Senha - ${queueName}`;
            document.getElementById('ticketModal').classList.remove('hidden');
            document.getElementById('ticketModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('ticketModal').classList.add('hidden');
            document.getElementById('ticketModal').classList.remove('flex');
            document.getElementById('ticketNumber').textContent = '';
            document.getElementById('isPreferential').checked = false;
        }

        function generateTicket() {
            const isPreferential = document.getElementById('isPreferential').checked;

            axios.post('{{ route('generate.ticket') }}', {
                queue_name: currentQueue,
                is_preferential: isPreferential
            })
            .then(function (response) {
                const ticket = response.data;
                document.getElementById('ticketNumber').textContent = `Sua senha é: ${ticket.ticket_number} (${ticket.is_preferential ? 'Preferencial' : 'Normal'})`;
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    </script>
</body>
</html>
