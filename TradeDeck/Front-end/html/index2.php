<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TradeDeck - Zacznij inwestować</title>
    <link rel="stylesheet" href="css/style-index2.css">
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
                <li><a href="menu.php">Strona główna</a></li>
                <li><a href="index2.php">Jak zacząć inwestować</a></li>
                <li><a href="index3.php">Analiza kursów</a></li>
            </ul>

            
            <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
                <div class = "rejestracja">
                <a href="" id="registerLink">Załóż konto</a>
                </div>
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

             <div id="registerModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeRegisterModal">&times;</span>
                    <h2>Rejestracja</h2>
                    <form id="registerForm" action="register.php" method="post">
                        <input type="text" name="username" placeholder="Login" required>
                        <input type="email" name="email" placeholder="Adres e-mail" required>
                        <input type="password" name="password" placeholder="Hasło" required id="password">                   

                            <label for="password">
                                <span class="toggle-password" onclick="togglePassword()">
                                    <i class="fa-solid fa-eye"></i>
                                </span>
                            </label>

                        <script>
                            function togglePassword() {
                            const passwordField = document.getElementById("password");
                            const type = passwordField.type === "password" ? "text" : "password";
                            passwordField.type = type;
                            }
                        </script>

                        <input type="password" name="password_confirm" placeholder="Powtórz hasło" required id="password_confirm">
                            <label for="password_confirm">
                                <span class="toggle-confirm_password" onclick="togglePasswordConfirm()">
                                    <i class="fa-solid fa-eye"></i>
                                </span>
                            </label>

                        <script>
                            function togglePasswordConfirm() {
                            const passwordField = document.getElementById("password_confirm");
                            const type = passwordField.type === "password" ? "text" : "password";
                            passwordField.type = type;
                            }
                        </script>

                        <div></div>
                        <progress max="100" value="0" id="meter"></progress>
                        <div class="textbox">Siła hasła</div>
                        <button type="submit">Zarejestruj się</button>
                    </form>                   

                    <script>
                        var code = document.getElementById("password");

                        var strengthbar = document.getElementById("meter");
                        var display = document.getElementsByClassName("textbox")[0];

                        code.addEventListener("keyup", function() {
                            checkpassword(code.value);
                        });

                        function checkpassword(password) {
                            var strength = 0;
                            if (password.match(/[a-z]+/)) {
                                strength += 1;
                            }
                            if (password.match(/[A-Z]+/)) {
                                strength += 1;
                            }
                            if (password.match(/[0-9]+/)) {
                                strength += 1;
                            }
                            if (password.match(/[$@#&!]+/)) {
                                strength += 1;
                            }

                            if (password.length < 12){
                                display.innerHTML="Minimalna liczba znaków to 12";
                            }

                            if (password.length > 128){
                                display.innerHTML="Maksymalna liczba znaków to 128";
                            }

                        switch (strength) {
                            case 0:
                                strengthbar.value = 0;
                                break;

                            case 1:
                                strengthbar.value = 25;
                                break;

                            case 2:
                                strengthbar.value = 50;
                                break;

                            case 3:
                                strengthbar.value = 75;
                                break;

                            case 4:
                                strengthbar.value = 100;
                                break;
                            }
                        }
                        </script>

                </div>
            </div>

        <div class="rejestracja">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <div id="welcome">
             
                    <a href="logout.php" id="logoutButton">Wyloguj się</a>
                </div>

            <div class="login-button">
                <?php else: ?>
                <a href="#" id="loginLink" class="login-button">Zaloguj</a>
                <?php endif; ?>
            </div>

             <div id="loginModal" class="modal">
            <div class="modal-content">

            <span class="close" id="closeModal">&times;</span>
            <h2>Logowanie</h2>

            <form id="loginForm" action="login.php" method="post">
                <input type="text" name="username" placeholder="Login" required>
                <input type="password" name="password" placeholder="Hasło" required>
                <div id="recaptcha-container"></div>
                

                <button type="submit">Zaloguj się</button>
                <button type="button" id="forgotPasswordLink">Zapomniałem Hasła</button>
            </form>

            </div>
            </div>

            <div id="forgotPasswordModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeForgotPasswordModal">&times;</span>
                    <h2>Zapomniałem hasła</h2>
                    <form id="forgotPasswordForm" action="send_reset_link.php" method="post">
                        <input type="email" name="email" placeholder="Adres e-mail" required>
                        <button type="submit">Wyślij link do resetowania hasła</button>
                    </form>
                </div>
            </div>           

        </div>

        <script>
            const loginLink = document.getElementById('loginLink');
            const loginModal = document.getElementById('loginModal');
            const closeModal = document.getElementById('closeModal');
            const forgotPasswordLink = document.getElementById('forgotPasswordLink');
            const forgotPasswordModal = document.getElementById('forgotPasswordModal');
            const closeForgotPasswordModal = document.getElementById('closeForgotPasswordModal');
            const content = document.getElementById('content');
            const welcome = document.getElementById('welcome');
            const compareLink = document.querySelector('.shared_chart a');
            const mustBeLoggedInModal = document.getElementById('mustBeLoggedInModal');
            const closeMustBeLoggedInModal = document.getElementById('closeMustBeLoggedInModal');
            
            // Pokaż modal logowania i ukryj content
            if (loginLink) {
                loginLink.addEventListener('click', (event) => {
                    event.preventDefault();
                    loginModal.style.display = 'flex';
                    content.style.display = 'none';
                });
            }

            if (forgotPasswordLink) {
                forgotPasswordLink.addEventListener('click', (event) => {
                    event.preventDefault();
                    forgotPasswordModal.style.display = 'flex';
                    content.style.display = 'none';                   
                });
            }

            if (closeModal) {
                closeModal.addEventListener('click', () => {
                    loginModal.style.display = 'none';
                    content.style.display = 'flex';
                });
            }

            if (closeForgotPasswordModal) {
                closeForgotPasswordModal.addEventListener('click', () => {
                    forgotPasswordModal.style.display = 'none';
                    loginModal.style.display = 'none';
                    content.style.display = 'flex';
                });
            }

            <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
                    if (compareLink) {
                        compareLink.addEventListener('click', (event) => {
                            event.preventDefault();
                            mustBeLoggedInModal.style.display = 'flex';
                        });
                    }
                <?php endif; ?>

                if (closeMustBeLoggedInModal) {
                    closeMustBeLoggedInModal.addEventListener('click', () => {
                        mustBeLoggedInModal.style.display = 'none';
                    });
                }
        </script>

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

<div id="myModal" class="modal-flashcards">
    <div class="modal-flashcards-content">
        <span class="close">&times;</span>
        <h2>Rozpocznij Nauke!</h2>

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
        <div class="buttons-modal">
            <button id="nextBtn" style="margin-top: 20px;">Zapamiętałem 🫡</button>
            <button id="nextBtn-false" style="margin-top: 20px;">Nie Pamiętam 🫣</button>
        </div>
    </div>
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
         const flipCard = document.querySelector(".flip-card");
         const pojecie = document.getElementById("pojecie");
         const definicja = document.getElementById("definicja");
         const nextBtn = document.getElementById("nextBtn");
         const nextBtnFalse = document.getElementById("nextBtn-false");

         let data = [];
         let index = 0;
         let isFlipped = false;

         function showFront(i) {
             pojecie.textContent = data[i].nazwa;
             definicja.textContent = "";
             flipCard.classList.remove("flipped");
             isFlipped = false;
             nextBtn.disabled = true;
             nextBtnFalse.disabled = true;
         }

         function showBack(i) {
             definicja.textContent = data[i].tresc;
             flipCard.classList.add("flipped");
             isFlipped = true;
             nextBtn.disabled = false;
             nextBtnFalse.disabled = false;
         }

         function loadFiszki(level = 1) {
             modal.classList.remove("level-1", "level-2", "level-3", "level-4");
             flipCard.classList.remove("level-1", "level-2", "level-3", "level-4");

             modal.classList.add(`level-${level}`);
             flipCard.classList.add(`level-${level}`);

             fetch(`get_fiszki.php?level=${level}`)
                 .then(response => response.json())
                 .then(fiszki => {
                     if (fiszki.length > 0) {
                         data = fiszki;
                         index = 0;
                         showFront(index);
                     }
                 });
         }

         // Obsługa kliknięcia karty
         flipCard.addEventListener("click", () => {
             if (!isFlipped && data.length > 0) {
                 showBack(index);
             }
         });

         // Obsługa przycisków
         nextBtn.addEventListener("click", () => {
             if (isFlipped) {
                 index = (index + 1) % data.length;
                 showFront(index);
             }
         });

         nextBtnFalse.addEventListener("click", () => {
             if (isFlipped) {
                 // Można tu dodać logikę np. zapisu błędnych fiszek
                 index = (index + 1) % data.length;
                 showFront(index);
             }
         });

         // Otwarcie modala
         document.getElementById("openModal")?.addEventListener("click", () => {
             modal.style.display = "block";
             loadFiszki(1);
         });

         document.querySelector(".card-intermediate")?.addEventListener("click", () => {
             modal.style.display = "block";
             loadFiszki(2);
         });

         document.querySelector(".card-advanced")?.addEventListener("click", () => {
             modal.style.display = "block";
             loadFiszki(3);
         });

         document.querySelector(".card-expert")?.addEventListener("click", () => {
             modal.style.display = "block";
             loadFiszki(4);
         });

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

<script>
        console.log("Strona załadowana");
        
        window.addEventListener("DOMContentLoaded", () => {
            console.log("Uruchamiam bota...");
            fetch("chatbot_start.php")
            .then(res => console.log("Bot start: ", res.status))
            .catch(err => console.error("Bot start error: ", err));
        });
    </script>

    <div class="chatbot-button">
        <span class="tooltip">Zapytaj nasze AI o pomoc!</span>
        <span class="text">ChatBot</span>
    </div>
    <div class="chatbot-popup" id="chatbotPopup">
        <div class="chatbot-header">
            <span>Asystent AI</span>
            <div class="header-buttons">
                <a href="chatIndex.php" target="popup-chat" class="open-full-chat">Otwórz w osobnej stronie</a>
                <button id="closeChatbot">&times;</button>
            </div>
        </div>
        <div class="chatbot-body" id="chatMessages">
            <div class="chat-message bot">Cześć! Jestem Sebastian -  w czym mogę pomóc?</div>
        </div>
        <div class="chatbot-footer">
            <input type="text" id="userInput" placeholder="Napisz wiadomość..." />
            <button id="sendMessage">
                <img src="icons/sendIcon.svg" alt="Wyślij">
            </button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chatbotButton = document.querySelector('.chatbot-button');
            const chatbotPopup = document.getElementById('chatbotPopup');
            const closeBtn = document.getElementById('closeChatbot');
            const sendBtn = document.getElementById('sendMessage');
            const userInput = document.getElementById('userInput');
            const chatMessages = document.querySelector('.chatbot-body');

            chatbotButton.addEventListener('click', () => {
                chatbotButton.style.display = 'none';
                chatbotPopup.style.display = 'flex';

                void chatbotPopup.offsetWidth;

                chatbotPopup.classList.add('active');
            });

            closeBtn.addEventListener('click', () => {
                chatbotPopup.classList.remove('active');
                setTimeout(() => {
                    chatbotPopup.style.display = 'none';
                    chatbotButton.style.display = 'block';
                }, 300);
            });

            sendBtn.addEventListener('click', sendMessage);
            userInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') sendMessage();
            });

            function appendMessage(text, sender) {
                const msgDiv = document.createElement('div');
                msgDiv.className = `chat-message ${sender}`;
                msgDiv.innerText = text;
                chatMessages.appendChild(msgDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            function sendMessage() {
                const message = userInput.value.trim();
                if (!message) return;

                appendMessage(message, 'user');
                userInput.value = '';

                fetch('http://localhost:5000/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ message })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Błąd odpowiedzi serwera.");
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.reply) {
                        appendMessage(data.reply, 'bot');
                    } else if (data.error) {
                        appendMessage("Błąd serwera: " + data.error, 'bot');
                    }
                })
                .catch(err => {
                    console.error("Błąd fetch:", err);
                    appendMessage("Błąd połączenia z serwerem.", 'bot');
                });
            }
        });
    </script>
</body>
</html>
