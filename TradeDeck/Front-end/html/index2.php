<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TradeDeck - Zacznij inwestować</title>
    <link rel="stylesheet" href="css/style-index2.css">
</head>
<body>

<header>
    <nav class="navbar">
        <div class="logo">
            <img src="css/img/TradeDeck-Logo.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="menu.php">Strona główna</a></li>
            <li><a href="index2.php">Jak zacząć inwestować</a></li>
            <li><a href="#">Analiza kursów</a></li>
        </ul>
        <div class="login-button">
            <a href="#">Zaloguj</a>
        </div>
    </nav>

    <div class="hero">
        <div class="hero-overlay">
            <h1 class="hero-text">Rozpocznij z nami<br>naukę!</h1>
            <h5 class="hero-text2">Naucz się słownika giełdy.<br>Dzięki stworzonym przez nas fiszkom<br>zapamiętasz je bez problemu</h5>
        </div>
    </div>
</header>

<div class="container">
    <h2>Fiszki</h2>
    <div class="options">

    </div>

    <div class="cards">
        <div class="sub-card" >
            🟢 Poziom 1 – Podstawowy<br>
            (dla początkujących)<br><br>
            <div class="card-beginer" id="openModal">
                <div class="card__overlay"></div>
                <div class="card__wrapper">
                    <div class="card__title">10 POJĘĆ</div>
                </div>
            </div>
        </div>

        <div class="sub-card">
            🟡 Poziom 2 – Średnio<br>zaawansowany<br><br>
            <div class="card-intermediate">
                <div class="card__overlay"></div>
                <div class="card__wrapper">
                    <div class="card__title" >10 POJĘĆ</div>
                </div>
            </div>
        </div>

        <div class="sub-card">
            🔵 Poziom 3 – Zaawansowany<br><br><br>
            <div class="card-advanced">
                <div class="card__overlay"></div>
                <div class="card__wrapper">
                    <div class="card__title">10 POJĘĆ</div>
                </div>
            </div>
        </div>

        <div class="sub-card">
            🔴 Poziom 4 – Ekspercki<br>
            (najbardziej złożone pojęcia)<br><br>
            <div class="card-expert">
                <div class="card__overlay"></div>
                <div class="card__wrapper">
                    <div class="card__title">10 POJĘĆ</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Zacznij Nauke!</h2>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <p class="title" id="pojecie">Pojęcie</p>
                </div>
                <div class="flip-card-back">
                    <p id="definicja">Definicja</p>
                </div>
            </div>
        </div>

    </div>
    <button id="nextBtn" style="margin-top: 20px;">Zapamiętałem</button>

</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const cards = document.querySelectorAll(".sub-card");

        cards.forEach(card => {
            const title = card.querySelector(".card__title");

            card.addEventListener("mouseenter", () => {
                title.textContent = "Zaczynajmy! ;)";
                title.classList.add("highlight-text");
            });

            card.addEventListener("mouseleave", () => {
                title.textContent = "10 POJĘĆ";
                title.classList.remove("highlight-text");
            });
        });

        const modal = document.getElementById("myModal");
        const closeBtn = modal.querySelector(".close");

        function loadFiszki(level = 1) {
    fetch(`get_fiszki.php?level=${level}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                let index = 0;
                let isFlipped = false;

                const pojecie = document.getElementById("pojecie");
                const definicja = document.getElementById("definicja");
                const flipCard = document.querySelector('.flip-card');
                const nextBtn = document.getElementById("nextBtn");

                function showFront(i) {
                    pojecie.textContent = data[i].nazwa;
                    definicja.textContent = "";
                    flipCard.classList.remove('flipped');
                    isFlipped = false;
                    nextBtn.disabled = true; // przycisk nieaktywny przed odwróceniem
                }

                function showBack(i) {
                    definicja.textContent = data[i].tresc;
                    flipCard.classList.add('flipped');
                    isFlipped = true;
                    nextBtn.disabled = false; // aktywuj przycisk
                }

                // Pokaż pierwszą fiszkę
                showFront(index);

                flipCard.onclick = () => {
                    if (!isFlipped) {
                        showBack(index);
                    }
                };

                nextBtn.onclick = () => {
                    if (isFlipped) {
                        index = (index + 1) % data.length;
                        showFront(index);
                    }
                };
            }
        });
}

        // Obsługa kliknięć na wszystkie poziomy
        document.getElementById("openModal").addEventListener("click", () => {
            modal.style.display = "block";
            loadFiszki(1); // Poziom 1
        });

        document.querySelector(".card-intermediate").addEventListener("click", () => {
            modal.style.display = "block";
            loadFiszki(2); // Poziom 2
        });

        document.querySelector(".card-advanced").addEventListener("click", () => {
            modal.style.display = "block";
            loadFiszki(3); // Poziom 3
        });

        document.querySelector(".card-expert").addEventListener("click", () => {
            modal.style.display = "block";
            loadFiszki(4); // Poziom 4
        });

        // Zamknij modal (X)
        closeBtn.addEventListener("click", () => {
            modal.style.display = "none";
        });
    });
</script>

<footer>
    <div class="footer1">
        <h1>Przydatne informacje</h1>
        <ul>
            <li><a href="#">Kursy walut</a></li>
            <li><a href="#">Pogoda</a></li>
            <li><a href="#">Sport</a></li>
            <li><a href="#">Dieta</a></li>
            <li><a href="#">Horoskop</a></li>
            <li><a href="#">Oferta</a></li>
            <li><a href="#">Powódź 2024</a></li>
        </ul>
    </div>

    <div class="O_nas">
        <h1>Nazwa</h1>
        <ul>
            <li><a href="#">O nas</a></li>
            <li><a href="#">Kariera</a></li>
            <li><a href="#">Aktualności</a></li>
            <li><a href="#">Biuro prasowe</a></li>
            <li><a href="#">System partnerski</a></li>
            <li><a href="#">Obsługa klienta</a></li>
        </ul>
    </div>

    <div class="Pomoc">
        <h1>Pomoc i kontakt</h1>
        <ul>
            <li><a href="#">Kontaktuj się online</a></li>
            <li><a href="#">Nasza placówka</a></li>
            <li><a href="#">Telefon: 1 9999</a></li>
            <p>24h / 7 dni</p>
            <li><a href="#">Pytania i odpowiedzi</a></li>
        </ul>
    </div>

    <div class="footer2">
        <h1>Znajdziesz nas też na</h1>
        <img class="facb" src="icons/facebook.png" alt="Facebook">
        <img class="facb" src="icons/instagram.png" alt="Instagram">
        <img class="facb" src="icons/x-twitter-s.svg" alt="X">
        <img class="facb" src="icons/youtube.png" alt="YouTube">

        <div class="wersja">
            <h2>Wersja językowa</h2>
            <a href="#">PL</a>
            <a href="#">EN</a>
            <a href="#">ES</a>
        </div>
    </div>

    <div class="footer3">
        <p>2024 &copy; Nazwa. Wszelkie prawa zastrzeżone. Nazwa i logo są zarejestrowanymi znakami towarowymi.</p>
        <p>Opłata za połączenie z infolinią wiadomości zgodna z taryfą danego operatora. <br>
            Słowniczek pojęć i definicji dotyczących usług reprezentatywnych, wynikających z rozporządzenia
            Ministra Rozwoju i Finansów z dnia 14 lipca 2017 r. w sprawie wykazu usług reprezentatywnych
            powiązanych z rachunkiem płatniczym, dostępny jest na stronie <br>
            <a href="#">strona.pl/PAD</a> oraz w placówkach.</p>
    </div>

    <div class="footer4">
        <img src="logo_stopka.png" alt="Logo stopki">
        <a href="#">Regulamin serwisu</a>
        <a href="#">Polityka prywatności</a>
        <a href="#">Polityka przetwarzania danych osobowych (RODO)</a>
        <a href="#">Polityka cookies</a>
    </div>
</footer>

<div class="chatbot-button">
    <span class="tooltip">Zapytaj nasze AI o pomoc!</span>
    <span class="text">ChatBot</span>
</div>


</body>
</html>
