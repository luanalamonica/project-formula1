<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Scores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
            overflow-x: hidden;
            background-color: #555;       
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

        .hero {
            text-align: left;
            padding: 50px 0;
            background-image: url('/mercedes.png');
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
        }

        .up-next article h3 {
            margin: 0 0 10px 0;
        }

        .up-next article p {
            color: #ddd; 
            margin: 0;
        }

        .tabelas-container {
          
            padding: 20px;
            border-radius: 15px;
            width: 90%;
            margin: 40px auto; 
            display: flex;
            justify-content: space-around;
        }

        table {
            width: 30%;
            background-color: rgba(255, 255, 255, 0.8); 
            border-collapse: collapse;
            color: #000;
            text-align: left;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #555;
            color: white;
            text-align: center;
        }

        table caption {
            font-size: 1.5em;
            margin-bottom: 10px;
            text-align: center;
            color: white;
        }

        .builders-title {
            text-align: center;
            color: white;
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 3em;
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
            <h1>Stay up to date <br>
                with the scores of <br> 
                constructors and <br> 
                drivers from recent <br> 
                seasons.
        </section>
    </main>

    <h1 class="builders-title">Builders Table</h1>

    <section class="tabelas-container">       
            <table>
                <caption>Season 2024</caption>
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Builders</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>RedBull</td>
                        <td>446</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>McLaren</td>
                        <td>438</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Ferrari</td>
                        <td>407</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Mercedes</td>
                        <td>292</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Aston Martin Aramco-Mercedes</td>
                        <td>74</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Visa Cash App RB</td>
                        <td>34</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Haas</td>
                        <td>28</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Alpine</td>
                        <td>13</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Williams</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Sauber</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <caption>Season 2023</caption>
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Builders</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>1</td>
                        <td>RedBull</td>
                        <td>860</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mercedes</td>
                        <td>409</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Ferrari</td>
                        <td>406</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>McLaren</td>
                        <td>302</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Aston Martin Aramco-Mercedes</td>
                        <td>280</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Alpine</td>
                        <td>120</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Williams</td>
                        <td>28</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>AlphaTauri</td>
                        <td>25</td>
                    </tr>   
                    <tr>
                        <td>9</td>
                        <td>Alpha Romeo</td>
                        <td>16</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Haas</td>
                        <td>12</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <caption>Season 2022</caption>
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Builders</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>1</td>
                        <td>RedBull</td>
                        <td>759</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ferrari</td>
                        <td>554</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mercedes</td>
                        <td>515</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Alpine</td>
                        <td>173</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>McLaren</td>
                        <td>159</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Alpha Romeo</td>
                        <td>55</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Aston Martin Aramco-Mercedes</td>
                        <td>55</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Haas</td>
                        <td>37</td>
                    </tr>   
                    <tr>
                        <td>9</td>
                        <td>AlphaTauri</td>
                        <td>35</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Williams</td>
                        <td>8</td>
                    </tr>   
                </tbody>
            </table>
    </section>

    <!--------------------------------------------------------------------------------------------------------------------->
    
    <h1 class="builders-title">Drivers Table</h1>

    <section class="tabelas-container">       
            <table>
                <caption>Season 2024</caption>
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Drivers</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>M. Verstappen</td>
                        <td>303</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>L. Norris</td>
                        <td>241</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>C. Leclerc</td>
                        <td>217</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>O. Piastri</td>
                        <td>197</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>C. Sainz Jr.</td>
                        <td>184</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>L. Hamilton</td>
                        <td>164</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>S. Perez</td>
                        <td>143</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>G. Russel</td>
                        <td>128</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>F. Alonso</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>L. Stroll</td>
                        <td>24</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>N. Hulkenberg</td>
                        <td>22</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Y. Tsunoda</td>
                        <td>22</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>D. Ricciardo</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>P. Gasly</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>O. Bearman</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>K. Magnussen</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>A. Albon</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>E. Ocon</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>G. Zhou</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>L. Sargeant</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>F. Colapinto</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>V. Bottas</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <caption>Season 2023</caption>
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Drivers</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <tr>
                        <td>1</td>
                        <td>M. Verstappen</td>
                        <td>575</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>S. Perez</td>
                        <td>285</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>L. Hamilton</td>
                        <td>234</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>F. Alonso</td>
                        <td>206</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>C. Leclerc</td>
                        <td>206</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>L. Norris</td>
                        <td>205</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>C. Sainz Jr.</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>G. Russel</td>
                        <td>175</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>O. Piastri</td>
                        <td>97</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>L. Stroll</td>
                        <td>74</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>P. Gasly</td>
                        <td>62</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>E. Ocon</td>
                        <td>58</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>A. Albon</td>
                        <td>27</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Y Tsunoda</td>
                        <td>17</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>V. Bottas</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>N. Hulkenberg</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>D. Ricciardo</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>G. Zhou</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>K. Magnussen</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>L. Lawson</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>L. Sargeant</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>N. de Vries</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <caption>Season 2022</caption>
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Drivers</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>1</td>
                        <td>M. Verstappen</td>
                        <td>454</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>C. Leclerc</td>
                        <td>308</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>S. Perez</td>
                        <td>305</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>G. Russel</td>
                        <td>275</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>C. Sainz Jr.</td>
                        <td>246</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>L. Hamilton</td>
                        <td>240</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>L. Norris.</td>
                        <td>122</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>E. Ocon</td>
                        <td>92</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>F. Alonso</td>
                        <td>81</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>V. Bottas</td>
                        <td>49</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>D. Ricciardo</td>
                        <td>37</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>S. Vettel</td>
                        <td>37</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>K. Magnussen</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>P. Gasly</td>
                        <td>23</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>L. Stroll</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>M. Schumacher</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>Y. Tsunoda</td>
                        <td>12  </td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>G. Zhou</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>A. Albon</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>N. Latifi</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>N. de Vriest</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>N. Hulkenberg</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
    </section>

</body>
</html>