<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    <title>Formula 1</title>
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
            <h1>Latest News</h1>
        </section>

        <div class="news-container">

            <a href="{{ url('/create_news') }}" class="btn">Add News</a>

            <div class="news-item" >
                <h2>Wolff shuts down further talk of Verstappen joining Mercedes as he insists team won't be ‘flirting outside’</h2>

                <h4>News</h4>

                <h3>Following Lewis Hamilton’s shock announcement back in February that he would make the switch to Ferrari for 2025,<br>
                    speculation quickly mounted over who might fill his vacant seat at the Silver Arrows alongside Russell next season.</h3>

                <h3>One of the names linked to the position was Max Verstappen, with Wolff making no secret of the fact that he would<br>
                    be open to signing the Dutchman despite him holding a contract with Red Bull through to the end of 2028.</h3>

                <h3>However, the rumours came to an end when Antonelli was announced as a Mercedes driver for 2025 during the Italian<br>
                    Grand Prix weekend, and Wolff has confirmed that the squad will now be entirely focused on their new pairing<br>
                    rather than trying to chase Verstappen.</h3>

                <a href="https://www.formula1.com/en/latest/article/wolff-shuts-down-further-talk-of-verstappen-joining-mercedes-as-he-insists.2KH3G0D9lBZbEr4RfVfgAh" class="btn">For more</a>
            </div>

        </div>
    </main>
</body>
<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    });
    const newsItems = document.querySelectorAll('.news-item');
    newsItems.forEach((item) => observer.observe(item));
</script>

</html>