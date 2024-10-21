<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="icon" type="image/png" href="logo1.png">
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
            <h1>New RedBull wind<br>
                tunnel 'critical' to<br>
                future performance</h1>
        </section>

        <section class="up-next">
            <h1>Up Next</h1>
            <div class="articles">
                <?php
                $news = [
                    ["title" => "Wolff shuts down further talk of Verstappen joining Mercedes as he insists team won't be ‘flirting outside’", "date" => "04 September 2024"],
                    ["title" => "‘I’m not very good’ – Hamilton ‘furious’ with himself as he claims he should have taken pole for Italian GP", "date" => "31 August 2024"],
                    ["title" => "HIGHLIGHTS: Catch the action from FP1 at Monza as Verstappen goes fastest while rookie Antonelli crashes out", "date" => "30 August 2024"],
                    ["title" => "‘I keep repeating myself’ – Leclerc left frustrated by Ferrari’s deficit to rivals during low-key Dutch GP qualifying", "date" => "24 August 2024"],
                    ["title" => "Verstappen expecting his toughest Dutch Grand Prix yet as he assesses challenge posed by ‘many more teams’", "date" => "22 August 2024"]
                ];

                function slugify($text)
                {
                    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
                }

                foreach ($news as $article):
                    $slug = slugify($article['title']); ?>
                    <article>
                        <h3>
                            <a href="/news?article=<?php echo urlencode($slug); ?>">
                                <?php echo $article['title']; ?>
                            </a>
                        </h3>
                        <p><?php echo $article['date']; ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

    </main>

    <script>
        const articles = document.querySelectorAll('.up-next article');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        });
        articles.forEach(article => {
            observer.observe(article);
        });
    </script>
</body>

</html>