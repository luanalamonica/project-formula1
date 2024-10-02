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
            background: linear-gradient(135deg, #ff0000 0%, #2e2e2e 50%, #b0b0b0 100%);
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

        h1{
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }



        .hero {
            text-align: left;
            padding: 50px 0;
            background-image: url('/ferrari.png');
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
            font-size: 6em;
            margin: 20px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2{
            font-size: 3em;
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
        }

        .up-next article h3 {
            margin: 0 0 10px 0;
        }

        .up-next article p {
            color: #ddd; 
            margin: 0;
        }

        h1{
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .news-container {
            padding: 50px 0;
        }

        .news-item {
            background-color: rgba(255, 255, 255, 0.1); 
            color: white;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .news-item h3 {
            margin-bottom: 10px;
            font-size: 1.5em;
            font-weight: normal; 
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff0000;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #cc0000;
        }

        .news-item {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .news-item.show {
            opacity: 1;
            transform: translateY(0);
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
                            <li><a href="{{ url('/') }}">Home</a></li>
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
            <h1>Latest News</h1>
        </section>

        <div class="news-container">
            <div class="news-item">
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


             <div class="news-item">
                <h2>‘I’m not very good’ – Hamilton ‘furious’ with himself as he claims he should have taken pole for Italian GP</h2>

                <h4>News</h4>

                <h3>Despite returning to winning ways for the first time since 2021 this season, Hamilton has struggled with qualifying,<br>
                    with Russell heading the team mate head-to-head battle 12-4 – despite Hamilton having a record 104 career<br>
                    pole positions to his name.</h3>

                <h3>But after ending up sixth in qualifying at Monza – albeit just 0.186s off Lando Norris’s pole position, and only 0.073s off<br>
                    third-placed team mate Russell – Hamilton slammed his performance, saying: “I’m not very good… it’s as simple as that.</h3>

                <a href="https://www.formula1.com/en/latest/article/im-not-very-good-hamilton-furious-with-himself-as-he-claims-he-should-have.2I0DW1CW49KwNPTbnlLSPR" class="btn">For more</a>
             </div>


            <div class="news-item">
                <h2>HIGHLIGHTS: Catch the action from FP1 at Monza as Verstappen goes fastest while rookie Antonelli crashes out</h2>

                <h4>Video</h4>

               <h3>Max Verstappen found his feet during FP1 at the Italian Grand Prix, leading the way from Ferrari favourite Charles Leclerc and Lando Norris as the drivers readjusted<br>
                to the latest circuit changes – while hotly-tipped Mercedes prospect Kimi Antonelli found the barriers on his FP1 debut.</h3>

                <h3>After a tough weekend on home soil in Zandvoort, Verstappen bounced back to set the pace with a timed lap of 1m 21.676s.</h3>
                
                <a href="https://www.formula1.com/en/latest/article/highlights-catch-the-action-from-fp1-at-monza-as-verstappen-goes-fastest.6sPbbhtpjWrf9hjlyghqh7" class="btn">For more</a>
            </div>

            <div class="news-item">
                <h2>‘I keep repeating myself’ – Leclerc left frustrated by Ferrari’s deficit to rivals during low-key Dutch GP qualifying</h2>

                <h4>News</h4>

               <h3>Charles Leclerc cut a downbeat figure after Saturday’s qualifying session for the Dutch Grand Prix, with the Monegasque racer<br>
                and Ferrari left to ponder a gap of almost a second to pole position.</h3>

                <h3>Leclerc headed into the weekend playing down Ferrari’s chances, admitting the Scuderia still faced “quite a bit of work” to<br>
                    recover from a challenging mid-season phase and get their campaign back on track.</h3>
                
                <a href="https://www.formula1.com/en/latest/article/i-keep-repeating-myself-leclerc-left-frustrated-by-ferraris-deficit-to.5JR3jl9hhixJeSD8xcLBaL" class="btn">For more</a>
            </div>

            <div class="news-item">
                <h2>Verstappen expecting his toughest Dutch Grand Prix yet as he assesses challenge posed by ‘many more teams’</h2>

                <h4>News</h4>

               <h3>Max Verstappen has admitted that he is feeling less certain about his prospects of winning the Dutch Grand Prix than during F1’s<br>
                last visit to Zandvoort 12 months ago, with “many more teams” now in with a chance of taking victory.</h3>

                <h3>Verstappen arrived into his home event with a 125-point lead in the drivers’ championship back in 2023, while Red Bull held<br> 
                    a sizeable 256-point advantage over their rivals in the teams’ standings.</h3>
                
                <a href="https://www.formula1.com/en/latest/article/verstappen-expecting-his-toughest-dutch-grand-prix-yet-as-he-assesses.1y1I8gs54yFmgfqeFGzyfs" class="btn">For more</a>
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
