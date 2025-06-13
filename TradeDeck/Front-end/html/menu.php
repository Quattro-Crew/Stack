<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TradeDeck - Zacznij inwestować</title>
    <link rel="stylesheet" href="css/style-menu.css">
</head>

<?php
session_start();
?>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            // rejestracja
            const urlParams = new URLSearchParams(window.location.search);
            const registerError = urlParams.get('register_error');

            if (registerError) {
            switch (registerError) {
                case 'empty':
                    alert('Wszystkie pola są wymagane przy rejestracji!');
                    break;
                case 'user_or_email_exists':
                    alert('Nazwa lub adres E-mail już jest zajęty.');
                    break;
                case 'weak_password':
                    alert('Hasło musi mieć co najmniej 12 znaków i maksymalnie 128.');
                    break;
                case 'password_mismatch':
                    alert('Hasła nie są zgodne. Wpisz ponownie.');
                    break;
                case 'server':
                    alert('Wystąpił błąd serwera podczas rejestracji. Spróbuj ponownie później.');
                    break;
                case 'invalid_request':
                    alert('Nieprawidłowe żądanie rejestracji.');
                    break;
                case 'invalid_email':
                    alert('Niepoprawny adres E-mail.');
                    break;
                default:
                    alert('Wystąpił nieznany błąd podczas rejestracji.');
            }
        }

        // logowanie
        const loginerror = urlParams.get('login_error');

            if (loginerror) {
                switch (loginerror) {
                    case 'empty':
                        alert('Wszystkie pola są wymagane!');
                        break;
                    case 'invalid':
                        alert('Niepoprawna nazwa użytkownika lub hasło.');
                        break;
                    case 'server':
                        alert('Wystąpił błąd serwera. Spróbuj ponownie później.');
                        break;
                    case 'invalid_request':
                        alert('Nieprawidłowe żądanie.');
                        break;
                    default:
                        alert('Wystąpił nieznany błąd.');
                }
            }

            const resetError = urlParams.get('error');
            const resetSuccess = urlParams.get('success');

            if (resetError) {
                switch (resetError) {
                    case 'invalid_email':
                        alert('Niepoprawny adres E-mail. Proszę wprowadzić poprawny adres.');
                        break;
                    case 'email_not_found':
                        alert('Podany adres E-mail nie istnieje w naszej bazie danych.');
                        break;
                    case 'server':
                        alert('Wystąpił błąd serwera. Spróbuj ponownie później.');
                        break;
                    case 'invalid_request':
                        alert('Nieprawidłowe żądanie. Spróbuj ponownie.');
                        break;
                    default:
                        alert('Wystąpił nieznany błąd podczas próby wysłania linku do resetowania hasła.');
                }
            }

            if (resetSuccess) {
                switch (resetSuccess) {
                    case 'reset_link_sent':
                        alert('Link do resetowania hasła został wysłany na Twój adres e-mail.');
                        break;
                    default:
                        alert('Wysłanie linku zakończone sukcesem, ale wystąpił nieoczekiwany problem.');
                }
            }
 const resetPasswordError = urlParams.get('error');
            const resetPasswordSuccess = urlParams.get('success');

            if (resetPasswordError) {
                switch (resetPasswordError) {
                    case 'password_mismatch':
                        alert('Hasła nie są zgodne. Wpisz ponownie.');
                        break;
                    case 'weak_password':
                        alert('Hasło musi mieć co najmniej 12 znaków i maksymalnie 128 znaków.');
                        break;
                    case 'invalid_token':
                        alert('Link do resetowania hasła jest nieprawidłowy lub wygasł.');
                        break;
                    case 'server':
                        alert('Wystąpił błąd serwera podczas resetowania hasła. Spróbuj ponownie później.');
                        break;
                    case 'invalid_request':
                        alert('Nieprawidłowe żądanie resetowania hasła.');
                        break;
                    default:
                        alert('Wystąpił nieznany błąd podczas resetowania hasła.');
                }
            }

            if (resetPasswordSuccess) {
                switch (resetPasswordSuccess) {
                    case 'password_reset':
                        alert('Hasło zostało pomyślnie zresetowane! Możesz teraz się zalogować.');
                        break;
                    default:
                        alert('Resetowanie hasła zakończone sukcesem, ale wystąpił nieoczekiwany problem.');
                }
            }

            const changePasswordError = urlParams.get('error');
            const changePasswordSuccess = urlParams.get('success');

            if (changePasswordError) {
                switch (changePasswordError) {
                    case 'password_mismatch':
                        alert('Nowe hasła nie są zgodne. Wpisz ponownie.');
                        break;
                    case 'weak_password':
                        alert('Nowe hasło musi mieć co najmniej 12 znaków i maksymalnie 128 znaków.');
                        break;
                    case 'incorrect_old_password':
                        alert('Podane stare hasło jest nieprawidłowe.');
                        break;
                    case 'server':
                        alert('Wystąpił błąd serwera podczas zmiany hasła. Spróbuj ponownie później.');
                        break;
                    default:
                        alert('Wystąpił nieznany błąd podczas zmiany hasła.');
                }
            }

            if (changePasswordSuccess) {
                switch (changePasswordSuccess) {
                    case 'password_changed':
                        alert('Hasło zostało pomyślnie zmienione!');
                        break;
                    default:
                        alert('Zmiana hasła zakończona sukcesem, ale wystąpił nieoczekiwany problem.');
                }
            }
        })         
    </script>


<body>
 <header>
        <nav class="navbar">
            <div class="logo">
                <img src="css/img/TradeDeck-Logo.png" alt="Logo">
            </div>
            <ul class="nav-links">
                <li><a href="#">Strona główna</a></li>
                <li><a href="#">Jak zacząć inwestować</a></li>
                <li><a href="#">Analiza kursów</a></li>
            </ul>

             <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
                <a href="" id="registerLink">Załóż konto</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <a class="welcome">Witaj <?php echo htmlspecialchars($_SESSION['username']);?>!</a>
            <?php endif;?>

            <script>
                document.getElementById('registerForm').addEventListener('submit', function (e) {
                const password = document.getElementById('password').value;
                const passwordConfirm = document.getElementById('password_confirm').value;

                const passwordPolicy = /^[A-Za-z0-9!@#$%^&* \s]{12,128}$/u;
                

                if (!passwordPolicy.test(password)) {
                    alert('Hasło musi mieć co najmniej 12 znaków i maksymalnie 128.');
                    e.preventDefault();
                    return;
                }

                if (password !== passwordConfirm) {
                    alert('Hasła nie są zgodne. Wpisz ponownie.');
                    e.preventDefault();
                }
                });
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                const registerLink = document.getElementById('registerLink');
                const registerModal = document.getElementById('registerModal');
                const closeRegisterModal = document.getElementById('closeRegisterModal');
                const content = document.getElementById('content');

                registerLink.addEventListener('click', (event) => {
                    event.preventDefault();
                    registerModal.style.display = 'flex';
                    content.style.display = 'none';
                });

                if (closeRegisterModal) {
                    closeRegisterModal.addEventListener('click', () => {
                        registerModal.style.display = 'none';
                        content.style.display = 'flex';
                    });
                }
                });
            </script>

            
            <div class="login-button">
                <?php else: ?>
                <a href="#" id="loginLink">Zaloguj się</a>
                <?php endif; ?>
            </div>
        </nav>

        <div class="hero">
            <div class="hero-overlay">
                <h1 class="hero-text">Zacznij inwestować
                    <br>dzięki TradeDeck</h1>
                <h5 class="hero-text2" >U nas znajdziesz artykuły edukacyjne,
                    <br>fiszki słownika giełdy oraz wiele więcej</h5>
            </div>
        </div>
    </header>

<div class="container">
    <section class="about-us">
      <h2 class="about-us-text">O nas</h2>
        <div class="line"></div>
      <div class="about-us-content">
          <div class="about-us-description">
             <p><strong>Witaj na TradeDeck!</strong><br>Twoje miejsce do nauki i rozwoju inwestycyjnego.</p>
              <div class="about-us-text-content">
                <p>Z TradeDeck zyskujesz:</p>
                <ul>
                  <li><img class="about-us-icons" src="css/img/brain.svg">  Wiedzę i praktyczne narzędzia</li>
                  <li><img class="about-us-icons" src="css/img/chart.svg">  Lepsze decyzje inwestycyjne</li>
                  <li><img class="about-us-icons" src="css/img/hand.svg">  Wsparcie na każdym etapie</li>
                </ul>
                <p>Dla początkujących i doświadczonych. Inwestuj pewnie!</p>
              </div>
        </div>
          <div class="about-us-img">
              <img src="css/img/about-us-img.png" alt="O nas">
          </div>
      </div>
    </section>

    <section class="dark-section">
            <h2>Dlaczego my?</h2>
        <div class="line"></div>
            <!-- Tutaj można dodać treść -->
    </section>

    <section class="tools">
        <h2>Nasze narzędzia</h2>
        <div class="line"></div>
        <div class="cards">
            <div class="card">
                <div class="card-top">
                    <span>Artykuły<br>edukacyjne</span>
                </div>
                <div class="card-bottom">
                    <span>bottom</span>
                </div>
            </div>

            <div class="card">
                <div class="card-top2">
                    <span>Fiszki słownika<br>giełdy</span>
                </div>
                <div class="card-bottom2">
                    <span>bottom</span>
                </div>
            </div>

            <div class="card">
                <div class="card-top">
                    <span>Symulator<br>giełdy</span>
                </div>
                <div class="card-bottom">
                    <span>bottom</span>
                </div>
            </div>
        </div>

    </section>
</div>

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
                <li><a href="#">Telefon: 1 9999</a></li><p>24h / 7dni</p>
                <li><a href="#">Pytania i odpowiedzi</a></li>
            </ul>   
        </div>

        <div class="footer2">
            <h1>Znajdziesz nas też na</h1>
            <img class="facb" src="icons/facebook.png" alt="">
            <img class="facb" src="icons/instagram.png" alt="">
            <img class="facb" src="icons/x-twitter-s.svg" alt="">
            <img class="facb" src="icons/youtube.png" alt="">

            <div class="wersja">
                <h2>Wersja językowa</h2>

                <a href="#">PL</a>
                <a href="#">EN</a>
                <a href="#">ES</a>
            </div>
        </div>

        <div class="footer3">
            <p>2024 &copy; Nazwa. Wszelkie prawa zastrzeżone.
            Nazwa i logo są zarejestrowanymi znakami towarowymi.</p>

            <p>Opłata za połączenie z infolinią wiadomości zgodna z taryfą danego operatora.
            Słowniczek pojęć i definicji dotyczących usług reprezentatywnych, wynikających z rozporządzenia
            <br>Ministra Rozwoju i Finansów z dnia 14 lipca 2017 r. w sprawie wykazu usług reprezentatywnych
                powiązanych z rachunkiem płatniczym,
            dostępny jest na stronie<br> strona.pl/PAD oraz w placówkach.</p>

        </div>

        <div class="footer4">
            <img src="logo_stopka.png" alt="">
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