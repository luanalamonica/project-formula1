<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Formula 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
            overflow-x: hidden;
            background-color: #1e1e1e;
        } 

        header {
            background-color: rgba(51, 51, 0, 0);
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            z-index: 10; 
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 50px;
            box-sizing: border-box; 
        }

        h1{
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .logo {
            max-height: 40px;
            height: auto; 
        }

        nav {
            display: flex;
            width: 100%; 
            align-items: center; 
        }

        nav .logo-container {
            display: flex;
            align-items: center; 
        }

        nav .links {
            display: flex;
            align-items: center;
            margin-left: auto; 
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 20px;
        }

        .hero {
            text-align: left;
            padding: 50px 0;
            background-image: url('/redbull3.png');
            background-size: cover;
            background-position: center;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding-left: 50px;
            position: relative;
            z-index: 1; 
        }

        .hero h1 {
            font-size: 4em;
            margin: 20px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .hero img {
            width: 100%;
            max-width: 800px;
            height: auto;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            background-color: transparent;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border: none;
        }

        .btn i {
            margin-left: 8px;
            font-size: 18px;
        }

        .btn:hover {
            color: #ccc;
        }
        
        .up-next {
            padding: 20px;  
            color: white; 
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 5;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .up-next h1 {
            margin: 0 0 20px 0;
            text-align: right; 
            font-size: 2em;
            color: white;
        }

        .up-next .articles {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end; 
            gap: 20px;
        }

        .up-next article {
            background-color: rgba(255, 255, 255, 0.1); 
            color: white; 
            padding: 20px;
            width: 300px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .up-next article.show {
            opacity: 1;
            transform: translateY(0);
        }

        .up-next article h3 {
            margin: 0 0 10px 0;
        }

        .up-next article p {
            color: #ddd; 
            margin: 0;
        }

        .up-next .articles a {
            color: white; /* Cor branca para o link */
            text-decoration: none; /* Remove o sublinhado */
            transition: color 0.3s ease;
        }

        .up-next .articles a:hover {
            color: #ccc; /* Cor ao passar o mouse */
        }

        .up-next .articles p {
            color: #4F4F4F;
        }

    </style>
</head>
<body>
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
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                        </ul>

                        <ul>
                            <li><a href="{{ url('/news') }}">News</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ url('/scores') }}">Scores</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ url('/login') }}">Sign in</a></li>
                        </ul>
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

                function slugify($text) {
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
