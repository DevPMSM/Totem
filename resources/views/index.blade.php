<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto-atendimento</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/attendenceModal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/serviceTypeModal.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body style="z-index:-999">
    <div class="container mt-25">
        <div class="container_grid">
            <!--Cards -->
            <button id="assistencia-button" class="container_cards assistencia"
                onclick="openModal('Assistência Social')">
                <div class="service-card bg-white texts_buttons" data-digit="Digite 1" style="--card-color: #F56565;">
                    <h2>Assistência Social</h2>
                    <div class="postits">
                        <h3>Digite 1</h3>
                        <span class="material-symbols-outlined">
                            group
                        </span>
                    </div>
                </div>
            </button>

            <button id="cadastro-button" class="container_cards cadastro" onclick="openModal('Cadastro Imobiliário')">
                <div class="service-card bg-white texts_buttons" data-digit="Digite 2" style="--card-color: #ED8936;">
                    <h2>Cadastro Imobiliário</h2>
                    <div class="postits">
                        <h3>Digite 2</h3>
                        <span class="material-symbols-outlined">
                            apartment
                        </span>
                    </div>
                </div>
            </button>

            <button id="protocolo-button" class="container_cards protocolo" onclick="openModal('Protocolo')">
                <div class="service-card bg-white texts_buttons" data-digit="Digite 3" style="--card-color: #4299E1;">
                    <h2>Protocolo</h2>
                    <div class="postits">
                        <h3>Digite 3</h3>
                        <span class="material-symbols-outlined" style="transform: rotate(90deg);">
                            local_activity
                        </span>
                    </div>
                </div>
            </button>

            <button id="planejamento-button" class="container_cards planejamento" onclick="openModal('Planejamento')">
                <div class="service-card bg-white texts_buttons" data-digit="Digite 4" style="--card-color: #48BB78;">
                    <h2>Planejamento</h2>
                    <div class="postits">
                        <h3>Digite 4</h3>
                        <span class="material-symbols-outlined">
                            clinical_notes
                        </span>
                    </div>
                </div>
            </button>

            <button id="procuradoria-button" class="container_cards procuradoria" onclick="openModal('Procuradoria')">
                <div class="service-card bg-white texts_buttons" data-digit="Digite 5" style="--card-color: #ED64A6;">
                    <h2>Procuradoria</h2>
                    <div class="postits">
                        <h3>Digite 5</h3>
                        <span class="material-symbols-outlined">
                            gavel
                        </span>
                    </div>
                </div>
            </button>

            <button id="tributario-button" class="container_cards tributario" onclick="openModal('Tributário')">
                <div class="service-card bg-white texts_buttons" data-digit="Digite 6" style="--card-color: #9F7AEA;">
                    <h2>Tributário</h2>
                    <div class="postits">
                        <h3>Digite 6</h3>
                        <span class="material-symbols-outlined">
                            request_quote
                        </span>
                    </div>
                </div>
            </button>

            <button id="sine-button" class="container_cards sine" onclick="openModal('SINE')">
                <div class="service-card bg-white texts_buttons" data-digit="Digite 7" style="--card-color: #3182CE;">
                    <h2>SINE</h2>
                    <div class="postits">
                        <h3>Digite 7</h3>
                        <span class="material-symbols-outlined">
                            work
                        </span>
                    </div>
                </div>
            </button>

        </div>
    </div>

    <!-- Modal de Seleção de Tipo de Atendimento -->
    <div id="attendanceTypeModal" class="fixed hidden" style="z-index:999">
        <div class="col p-8 rounded-lg modalbox shadow-xl">
            <div class="cardTitle">
                <h2 id="attendanceTypeTitle" class="text-2xl font-bold mb-4">Retire sua Senha</h2>
                <h3>Digite o Número da Opção Desejada</h3>
            </div>
            <div class="cardButtons">
                <div class="col-6 button_container">
                    <label for="normalButton">
                        <img src="{{ asset('assets/img/comum.svg') }}" alt="">
                    </label>
                    <span>ATENDIMENTO</span>
                    <span>COMUM</span>
                    <p style="color:#FF8899">DIGITE 1</p>
                    <button id="normalButton" onclick="selectAttendanceType(false)" hidden></button>
                </div>
                <div class="col-6 button_container">
                    <label for="normalButton">
                        <img src="{{ asset('assets/img/preferencial.svg') }}" alt="">
                    </label>
                    <span>ATENDIMENTO</span>
                    <span>PREFERENCIAL</span>
                    <p style="color: #4390f5">DIGITE 2</p>
                    <button onclick="selectAttendanceType(true)" hidden></button>
                </div>
            </div>
            <div class="cardClose">
                <button onclick="redirectToHome();"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full">Cancelar</button>
            </div>
        </div>
    </div>


    <!-- Modal de Seleção de Serviço -->
    <div id="serviceSelectionModal" class="container fixed hidden"
        style="z-index: 999">
        <div class="col serviceModalContainer">
            <div class="serviceModalTitle">
                <h2 id="serviceSelectionTitle"></h2>
            </div>
            <div class="row servicesBoxesModal">
                <div id="serviceButtons" class="grid grid-cols-3 gap-8 mb-4">
                    <!-- Service buttons will be dynamically inserted here -->
                </div>
            </div>
            <div class="closeButtons row">
                <button onclick="confirmSelection()"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Confirmar</button>
                <button onclick="redirectToHome();"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2">Cancelar</button>
            </div>
            <p id="ticketNumber" class="mt-4 text-lg font-semibold"></p>
        </div>
    </div>

    <!-- Modal de Exibição de Senha -->
    <div id="ticketModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center"
        style="z-index: 99999">
        <div class="bg-white p-8 rounded-lg shadow-xl text-center">
            <h2 class="text-2xl font-bold mb-4">Sua senha é:</h2>
            <p id="ticketNumberDisplay" class="text-3xl font-semibold mb-4"></p>
            <p id="countdown" class="text-lg font-semibold mb-4">Fechando em 30 segundos...</p>
            <a href="/" onclick="redirectToHome();"
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Fechar Agora</a>
        </div>
    </div>

    <script>
        let currentQueue = '';
        let selectedService = null;
        let currentOpenModal = null;
        let isPreferential = false;
        let countdownInterval;
        let currentModalState = 'none';
        let procuradoriaTimeout;
        let tributarioTimeout;

        function preventShiftKey(event) {
            if (event.shiftKey) {
                event.preventDefault();
                console.log('Uso da tecla Shift bloqueado');
            }
        }

        document.addEventListener('keydown', preventShiftKey);

        function redirectToHome() {
            window.location.href = '/';
        }
        document.addEventListener('keyup', function(event) {
            if (event.key === 'Escape') {
                redirectToHome();
            }
        });

        const services = {
            'Assistência Social': [{
                    id: 1,
                    name: 'Acessuas'
                },
                {
                    id: 2,
                    name: 'Acolhimento'
                },
                {
                    id: 3,
                    name: 'Cadastro Único'
                },
                {
                    id: 4,
                    name: 'CCI'
                },
                {
                    id: 5,
                    name: 'CRAS'
                },
                {
                    id: 6,
                    name: 'CREAS'
                },
                {
                    id: 7,
                    name: 'Habitação'
                },
                {
                    id: 8,
                    name: 'SEMAS'
                },
                {
                    id: 9,
                    name: 'Outros'
                }
            ],
            'Cadastro Imobiliário': [{
                    id: 1,
                    name: 'IPTU'
                },
                {
                    id: 2,
                    name: 'IBTI'
                },
                {
                    id: 3,
                    name: 'IPTU/ITBI'
                },
                {
                    id: 4,
                    name: 'Avaliação'
                },
                {
                    id: 5,
                    name: 'Averbação'
                },
                {
                    id: 6,
                    name: 'Imóveis'
                },
                {
                    id: 7,
                    name: 'Outros'
                }
            ],
            'Protocolo': [{
                    id: 1,
                    name: 'Consulta de Protocolos'
                },
                {
                    id: 2,
                    name: 'Consulta de Processos'
                },
                {
                    id: 3,
                    name: 'Outros'
                }
            ],
            'Planejamento': [{
                    id: 1,
                    name: 'SEBRAE'
                },
                {
                    id: 2,
                    name: 'Pav'
                },
                {
                    id: 3,
                    name: 'Nosso Crédito'
                },
                {
                    id: 4,
                    name: 'Outros'
                }
            ],
            'SINE': [{
                    id: 1,
                    name: 'Vagas'
                },
                {
                    id: 2,
                    name: 'Cadastro'
                },
                {
                    id: 3,
                    name: 'CTD'
                },
                {
                    id: 4,
                    name: 'Desemprego'
                },
                {
                    id: 5,
                    name: 'Agendamento'
                },
                {
                    id: 6,
                    name: 'Outros'
                }
            ],
        };


        function showProcuradoriaInfo() {
            const infoModal = document.createElement('div');
            infoModal.id = 'procuradoriaInfoModal';
            infoModal.className = 'fixed';
            infoModal.style.zIndex = '99999';
            infoModal.innerHTML = `
                <div class="procuradoria_container">
                    <div class="flex_procuradoria">
                        <div class="row title_box">
                            <span class="title">
                                Procuradoria
                            </span>
                        </div>
                        <div class="row cards_procuradoria">
                            <div class="col qrContainer">
                                <span class="qrTitle">Leia o QrCode</span>
                                <span class="qrInfos">e tenha informações da secretaria.</span>
                                <img style="overflow: hidden;" src="{{ asset('assets/img/frame_1.svg') }}" alt="">
                            </div>
                            <div class="col contact_container">
                                <span class="qrTitle">Contato</span>
                                <span class="info_title">Número:</span>
                                <span class="info">(11)4002-8922</span>
                                <span class="info_title">Email:</span>
                                <span class="info">emaildoemail@email.com</span>
                                <span class="info_title">Secretário:</span>
                                <span class="info">Gabriel Medina Tirando foto Voando</span>
                            </div>
                        </div>
                    </div>
                </div>

            `;
            document.body.appendChild(infoModal);

            let countdown = 30;
            const countdownElement = document.getElementById('procuradoriaCountdown');
            procuradoriaTimeout = setInterval(() => {
                countdown--;
                countdownElement.textContent = `Este modal fechará em ${countdown} segundos.`;
                if (countdown <= 0) {
                    redirectToHome();
                }
            }, 1000);
        }

        function closeProcuradoriaModal() {
            const modal = document.getElementById('procuradoriaInfoModal');
            if (modal) modal.remove();
            clearInterval(procuradoriaTimeout);
        }

        function showTributarioInfo() {
            const infoModal = document.createElement('div');
            infoModal.id = 'tributarioInfoModal';
            infoModal.className = 'fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center';
            infoModal.style.zIndex = '99999';
            infoModal.innerHTML = `
                <div class="bg-white p-8 rounded-lg shadow-xl text-center max-w-lg">
                    <h2 class="text-2xl font-bold mb-4">Informações sobre Tributário</h2>
                    <p class="mb-4">O setor Tributário é responsável pela administração dos tributos municipais, incluindo IPTU, ISS, e taxas diversas.</p>
                    <p class="mb-4">Para consultas sobre débitos, emissão de guias ou esclarecimentos, visite nossa secretaria</p>
                    <p id="tributarioCountdown" class="mb-4">Este modal fechará em 30 segundos.</p>
                    <button onclick="redirectToHome();" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Fechar</button>
                </div>
            `;
            document.body.appendChild(infoModal);

            let countdown = 30;
            const countdownElement = document.getElementById('tributarioCountdown');
            tributarioTimeout = setInterval(() => {
                countdown--;
                countdownElement.textContent = `Este modal fechará em ${countdown} segundos.`;
                if (countdown <= 0) {
                    redirectToHome();
                }
            }, 1000);
        }

        function closeTributarioModal() {
            const modal = document.getElementById('tributarioInfoModal');
            if (modal) modal.remove();
                redirectToHome();
        }

        function openAttendanceTypeModal(queueName) {
            if (queueName === 'Procuradoria') {
                showProcuradoriaInfo();
            } else if (queueName === 'Tributário') {
                showTributarioInfo();
            } else {
                currentQueue = queueName;
                document.getElementById('attendanceTypeModal').classList.remove('hidden');
                document.getElementById('attendanceTypeModal').classList.add('flex');
                currentModalState = 'attendanceType';
            }
        }

        function selectAttendanceType(isPriority) {
            isPreferential = isPriority;
            document.getElementById('attendanceTypeModal').classList.add('hidden');
            document.getElementById('attendanceTypeModal').classList.remove('flex');
            openServiceSelectionModal();
        }
        function openServiceSelectionModal() {
            document.getElementById('serviceSelectionTitle').textContent = `${currentQueue}`;
            document.getElementById('serviceSelectionModal').classList.remove('hidden');
            document.getElementById('serviceSelectionModal').classList.add('flex');
            currentModalState = 'serviceSelection';

            const serviceButtons = document.getElementById('serviceButtons');
            serviceButtons.innerHTML = '';
            services[currentQueue].forEach(service => {
                const button = document.createElement('button');
                button.innerHTML = `
                    <span class="service-name">${service.name}</span>
                    <span class="service-id">Digite ${service.id}</span>
                `;
                button.className = 'service-button rounded';
                button.setAttribute('data-service-id', service.id);
                button.onclick = () => selectService(service);
                serviceButtons.appendChild(button);
            });
        }

        function selectService(service) {
            selectedService = service;
            const buttons = document.querySelectorAll('#serviceButtons button');
            buttons.forEach(button => {
                button.classList.remove('bg-green-500');
                button.classList.add('bg-blue-500');
            });
            const selectedButton = Array.from(buttons).find(button => button.getAttribute('data-service-id') == service.id);
            if (selectedButton) {
                selectedButton.classList.remove('bg-blue-500');
                selectedButton.classList.add('bg-green-500');
            }

            // Chama confirmSelection imediatamente após a seleção do serviço
            confirmSelection();
        }

        function confirmSelection() {
            if (!selectedService) {
                alert('Por favor, selecione um serviço.');
                return;
            }

            axios.post('{{ route('generate.ticket') }}', {
                    queue_name: currentQueue,
                    is_preferential: isPreferential,
                    service_id: selectedService.id,
                    service_name: selectedService.name
                })
                .then(function(response) {
                    const ticket = response.data;
                    showTicketModal(
                        `${ticket.ticket_number} (${isPreferential ? 'Prioritário' : 'Normal'}) - ${ticket.service_name}`
                    );
                })
                .catch(function(error) {
                    console.error('Erro ao gerar ticket:', error);
                    alert('Ocorreu um erro ao gerar o ticket. Por favor, tente novamente.');
                });
        }

        function closeModals() {
            document.getElementById('attendanceTypeModal').classList.add('hidden');
            document.getElementById('attendanceTypeModal').classList.remove('flex');
            document.getElementById('serviceSelectionModal').classList.add('hidden');
            document.getElementById('serviceSelectionModal').classList.remove('flex');
            document.getElementById('ticketNumber').textContent = '';
            selectedService = null;
            isPreferential = false;
            currentModalState = 'none';
            redirectToHome();

        }

        function showTicketModal(ticketNumber) {
            document.getElementById('ticketNumberDisplay').textContent = ticketNumber;
            document.getElementById('ticketModal').classList.remove('hidden');
            document.getElementById('ticketModal').classList.add('flex');
            currentModalState = 'ticket';

            let countdown = 30;
            document.getElementById('countdown').textContent = `Fechando em ${countdown} segundos...`;
            countdownInterval = setInterval(() => {
                countdown--;
                document.getElementById('countdown').textContent = `Fechando em ${countdown} segundos...`;
                if (countdown <= 0) {
                    redirectToWelcome();
                }
            }, 1000);
        }

        function closeTicketModal() {
            clearInterval(countdownInterval);
            document.getElementById('ticketModal').classList.add('hidden');
            document.getElementById('ticketModal').classList.remove('flex');
            closeModals();
        }

        // Event listener para teclas
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                redirectToHome();
            } else if (currentModalState === 'none' && event.key >= '1' && event.key <= '7') {
                const queueNames = [
                    'Assistência Social', 'Cadastro Imobiliário', 'Protocolo',
                    'Planejamento', 'Procuradoria', 'Tributário', 'SINE'
                ];
                const index = parseInt(event.key) - 1;
                if (index < queueNames.length) {
                    openAttendanceTypeModal(queueNames[index]);
                }
            } else if (currentModalState === 'attendanceType') {
                if (event.key === '1') {
                    selectAttendanceType(false);
                } else if (event.key === '2') {
                    selectAttendanceType(true);
                }
            } else if (currentModalState === 'serviceSelection') {
                if (event.key >= '1' && event.key <= '9') {
                    const serviceIndex = parseInt(event.key) - 1;
                    if (serviceIndex < services[currentQueue].length) {
                        selectService(services[currentQueue][serviceIndex]);
                    }
                } else if (event.key === 'Enter') {
                    confirmSelection();
                }
            } else if (currentModalState === 'ticket') {
                if (event.key === 'Enter') {
                    closeTicketModal();
                }
            }
        });

        // Atualizar os onclick dos botões
        document.querySelectorAll('.container_cards').forEach((button, index) => {
            button.onclick = () => openAttendanceTypeModal(['Assistência Social', 'Cadastro Imobiliário',
                'Protocolo', 'Planejamento', 'Procuradoria', 'Tributário', 'SINE'
            ][index]);
        });

        function redirectToWelcome() {
            window.location.href = '{{ route('welcome') }}';
        }

        function closeTributarioModal() {
            const modal = document.getElementById('tributarioInfoModal');
            if (modal) modal.remove();
        }

    </script>
</body>

</html>
