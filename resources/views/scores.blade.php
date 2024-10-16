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
                with the scores of <br>
                constructors and <br>
                drivers from recent <br>
                seasons
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
                        </tr>
                    </thead>
                    <tbody>
            @endif

            <tr>
                <td>{{ $equipe->posicao }}</td>
                <td>{{ $equipe->nome }}</td>
                <td>{{ $equipe->pontuacao }}</td>
            </tr>

            @php
                $lastTemporada = $equipe->temporada; // Atualiza a temporada atual
            @endphp
        @endforeach

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
                        </tr>
                    </thead>
                    <tbody>
            @endif

            <tr>
                <td>{{ $driver->posicao }}</td>
                <td>{{ $driver->nome }}</td>
                <td>{{ $driver->pontuacao }}</td>
            </tr>

            @php
                $lastTemporada = $driver->temporada; // Atualiza a temporada atual
            @endphp
        @endforeach

        </tbody>
        </table> <!-- Fecha a última tabela -->
    </section>

    <!--------------------------------------------------------------------------------------------------------------------->

</body>

</html>
