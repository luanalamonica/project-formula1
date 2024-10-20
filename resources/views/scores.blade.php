<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/scores.css') }}">
    <script src="{{ asset('js/scores.js') }}"></script>
    <title>Scores</title>
</head>

<body>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <main>
        <section class="hero">
            <header>
                <nav>
                    <div class="logo-container">
                        <a href="{{ url('/') }}">
                            <img src="logo.png" alt="Logo" class="logo">
                        </a>
                    </div>
                    <div class="links">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ url('/news') }}">News</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ url('/scores') }}">Scores</a></li>
                        </ul>

                        @auth
                        <ul>
                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                        </ul>
                        @endauth

                        @guest
                        <ul>
                            <li><a href="{{ url('/login') }}">Sign in</a></li>
                        </ul>
                        @endguest
                    </div>
                </nav>
            </header>
            <h1>Stay up to date <br>
                with the scores <br>
                of teams and <br>
                drivers from <br>
                recent seasons
        </section>
    </main>

    <a href="{{ url('/create_scores_drivers') }}" class="btn">Add Scores Drivers</a>
    <a href="{{ url('/create_scores_team') }}" class="btn">Add Scores Team</a>

    <h1 class="builders-title">Team Table</h1>

    <section class="builders-tabela-container tabelas-container">
        @php
        $lastTemporada = null; // Variável para controlar a última temporada exibida
        @endphp

        @foreach ($equipes as $equipe)
        @if ($lastTemporada != $equipe->temporada)
        @if ($lastTemporada != null)
        </tbody>
        </table> <!-- Fecha a tabela da última temporada -->
        @endif
        <table>
            <caption>{{ $equipe->temporada }}</caption>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Builders</th>
                    <th>Points</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @endif

                <tr id="equipe-{{ $equipe->id }}">
                    <td>{{ $equipe->posicao }}</td>
                    <td>{{ $equipe->nome }}</td>
                    <td>{{ $equipe->pontuacao }}</td>
                    <td>
                        <!-- Botão Editar -->
                        <a href="{{ route('equipes.edit', $equipe->id) }}" class="btn btn-primary">Editar</a>

                        <!-- Botão Excluir -->
                        <button class="btn btn-danger btn-delete-equipe" data-id="{{ $equipe->id }}">Excluir</button>
                    </td>
                </tr>

                @php
                $lastTemporada = $equipe->temporada; // Atualiza a temporada atual
                @endphp
                @endforeach
    </section>

    </tbody>
    </table> <!-- Fecha a última tabela -->
    </section>

    <!--------------------------------------------------------------------------------------------------------------------->

    <h1 class="drivers-title">Drivers Table</h1>

    <section class="drivers-tabela-container tabelas-container">
        @php
        $lastTemporada = null; // Variável para controlar a última temporada exibida
        @endphp

        @foreach ($drivers as $driver)
        @if ($lastTemporada != $driver->temporada)
        @if ($lastTemporada != null)
        </tbody>
        </table> <!-- Fecha a tabela da última temporada -->
        @endif
        <table>
            <caption>{{ $driver->temporada }}</caption>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Drivers</th>
                    <th>Points</th>
                    <th>Actions</th> <!-- Adiciona uma coluna para Ações -->
                </tr>
            </thead>
            <tbody>
                @endif

                <tr id="driver-{{ $driver->id }}">
                    <td>{{ $driver->posicao }}</td>
                    <td>{{ $driver->nome }}</td>
                    <td>{{ $driver->pontuacao }}</td>
                    <td> <!-- Coluna para os botões -->
                        <!-- Botão Editar -->
                        <a href="{{ route('piloto.edit', $driver->id) }}" class="btn btn-primary">Editar</a>

                        <!-- Botão Excluir -->
                        <button class="btn btn-danger btn-delete-piloto" data-id="{{ $driver->id }}">Excluir</button>

                    </td>
                </tr>

                @php
                $lastTemporada = $driver->temporada; // Atualiza a temporada atual
                @endphp
                @endforeach

            </tbody>
        </table> <!-- Fecha a última tabela -->
    </section>

         <!-- Inclua o jQuery se ainda não estiver incluído -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Seu código JavaScript para manipulação de exclusão -->
<script>
    $(document).ready(function() {
        // Manipulação do clique no botão "Excluir" para equipes
        $('.btn-delete-equipe').click(function(e) {
            e.preventDefault(); // Prevenir o comportamento padrão do botão

            var equipeId = $(this).data('id'); // Obter o ID da equipe a ser excluída

            if (confirm('Tem certeza que deseja excluir esta equipe?')) {
                $.ajax({
                    url: '/equipes/' + equipeId, // URL para exclusão
                    type: 'DELETE', // Método HTTP DELETE
                    data: {
                        _token: '{{ csrf_token() }}' // Necessário para autenticação da requisição
                    },
                    success: function(response) {
                        // Remove a linha correspondente à equipe excluída da tabela
                        $('#equipe-' + equipeId).remove();
                        alert(response.success); // Exibe mensagem de sucesso
                    },
                    error: function(xhr) {
                        console.error('Ocorreu um erro. Tente novamente.'); // Log de erro no console
                    }
                });
            }
        });

        // Manipulação do clique no botão "Excluir" para pilotos
        $('.btn-delete-piloto').click(function(e) {
            e.preventDefault(); // Prevenir o comportamento padrão do botão

            var driverId = $(this).data('id'); // Obter o ID do driver a ser excluído

            if (confirm('Tem certeza que deseja excluir este piloto?')) {
                $.ajax({
                    url: '/pilotos/' + driverId, // URL para exclusão
                    type: 'DELETE', // Método HTTP DELETE
                    data: {
                        _token: '{{ csrf_token() }}' // Necessário para autenticação da requisição
                    },
                    success: function(response) {
                        // Remove a linha correspondente ao piloto excluído da tabela
                        $('#driver-' + driverId).remove();
                        alert(response.success); // Exibe mensagem de sucesso
                    },
                    error: function(xhr) {
                        console.error('Ocorreu um erro. Tente novamente.'); // Log de erro no console
                    }
                });
            }
        });
    });
</script>

    <!--------------------------------------------------------------------------------------------------------------------->
</body>

</html>