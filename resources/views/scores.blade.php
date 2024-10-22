<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/scores.css') }}">
    <script src="{{ asset('js/scores.js') }}"></script>
    <link rel="icon" type="image/png" href="logo1.png">
    <title>Scores - Formula 1</title>
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
            <h1>Stay up to date with the<br>
                scores of teams and <br>
                drivers<br>
        </section>
    </main>

    @if(auth()->check() && auth()->user()->is_admin)
    <a href="{{ url('/create_scores_drivers') }}" class="btn">Add Scores Drivers</a>
    <a href="{{ url('/create_scores_team') }}" class="btn">Add Scores Team</a>
    @endif

    <h1 class="builders-title">Team</h1>

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
                        @if(auth()->check() && auth()->user()->is_admin)
                        <a href="{{ route('equipes.edit', $equipe->id) }}" class="btn btn-primary">Edit</a>
                        @endif

                        <!-- Botão Excluir -->
                        @if(auth()->check() && auth()->user()->is_admin)
                        <button class="btn btn-danger btn-delete-equipe" data-id="{{ $equipe->id }}">Delete</button>
                        @endif
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

    <h1 class="drivers-title">Drivers</h1>

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
                        @if(auth()->check() && auth()->user()->is_admin)
                        <a href="{{ route('piloto.edit', $driver->id) }}" class="btn btn-primary">Edit</a>
                        @endif

                        <!-- Botão Excluir -->
                        @if(auth()->check() && auth()->user()->is_admin)
                        <button class="btn btn-danger btn-delete-piloto" data-id="{{ $driver->id }}">Delete</button>
                        @endif

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

                if (confirm('Are you sure you want to delete this team?')) {
                    $.ajax({
                        url: '/equipes/' + equipeId, // URL para exclusão
                        type: 'DELETE', // Método HTTP DELETE
                        data: {
                            _token: '{{ csrf_token() }}' // Necessário para autenticação da requisição
                        },
                        success: function(response) {
                            // Remove the corresponding row for the deleted team from the table
                            $('#equipe-' + equipeId).remove();
                            alert("Team deleted successfully!"); // Displays success message in English
                        },
                        error: function(xhr) {
                            console.error('An error has occurred. Please try again.'); // Log de erro no console
                        }
                    });
                }
            });

            // Manipulação do clique no botão "Excluir" para pilotos
            $('.btn-delete-piloto').click(function(e) {
                e.preventDefault(); // Prevenir o comportamento padrão do botão

                var driverId = $(this).data('id'); // Obter o ID do driver a ser excluído

                if (confirm('Are you sure you want to delete this driver?')) {
                    $.ajax({
                        url: '/pilotos/' + driverId, // URL para exclusão
                        type: 'DELETE', // Método HTTP DELETE
                        data: {
                            _token: '{{ csrf_token() }}' // Necessário para autenticação da requisição
                        },
                        success: function(response) {
                            // Remove the corresponding row for the deleted driver from the table
                            $('#driver-' + driverId).remove();
                            alert("Driver deleted successfully!"); // Displays success message in English
                        },
                        error: function(xhr) {
                            console.error('An error has occurred. Please try again.'); // Log de erro no console
                        }
                    });
                }
            });
        });
    </script>

    <!--------------------------------------------------------------------------------------------------------------------->
</body>

</html>