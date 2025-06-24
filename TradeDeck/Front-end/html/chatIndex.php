<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Czat z asystentem</title>
    <link rel="stylesheet" href="css/chatIndex.css"/>
</head>
<?php
session_start()
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
    });
</script>
<body>
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
                    <input id="navinput" type="text" name="username" placeholder="Login" required>
                    <input id="navinput" type="email" name="email" placeholder="Adres e-mail" required>
                    <input id="navinput" type="password" name="password" placeholder="Hasło" required id="password">

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

                    <input id="navinput" type="password" name="password_confirm" placeholder="Powtórz hasło" required id="password_confirm">
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
                    <button id="navbutton" type="submit">Zarejestruj się</button>
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
                        <input id="navinput" type="text" name="username" placeholder="Login" required>
                        <input id="navinput" type="password" name="password" placeholder="Hasło" required>
                        <div id="recaptcha-container"></div>
                

                        <button id="navbutton" type="submit">Zaloguj się</button>
                        <button id="navbutton" type="button" id="forgotPasswordLink">Zapomniałem Hasła</button>
                    </form>

                </div>
            </div>

            <div id="forgotPasswordModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeForgotPasswordModal">&times;</span>
                    <h2>Zapomniałem hasła</h2>
                    <form id="forgotPasswordForm" action="send_reset_link.php" method="post">
                        <input id="navinput" type="email" name="email" placeholder="Adres e-mail" required>
                        <button id="navbutton" type="submit">Wyślij link do resetowania hasła</button>
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
    <div class="container">
        <div id="history" class="history"></div>
        <div class="input1">
            <input type="text" id="input2" placeholder="Napisz wiadomość..."/>
            <button onclick="toggleDarkMode()" id="darkModeToggle">
                <img src="Icons/darkModeIcon.svg" alt="Tryb Ciemny" id="themeIcon"/>
            </button>
            <button onclick="sendMessage()" id="send">
                Wyślij
                <img src="icons/sendIcon.svg" alt="Wyślij">
            </button>
        </div>
    </div>
    <script>
        const chatHistory = document.getElementById("history");
        const userInput = document.getElementById("input2");

        function sendMessage() {
            const text = userInput.value.trim();
            if (text === "") return;

            appendMessage("user", text);
            userInput.value = "";

            fetch("http://127.0.0.1:5000/chat", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({message: text})
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Błąd odpowiedzi serwera");
                }
                return response.json();
            })
            .then(data => {
                if (data.reply) {
                    appendMessage("bot", data.reply);
                } else {
                    appendMessage("bot", "Brak odpowiedzi od serwera");
                }
            })
            .catch(err => {
                appendMessage("bot", "Błąd połączenia z serwerem.");
                console.error("Błąd fetch:", err);
            });
        }

        function appendMessage(sender, text) {
            const msg = document.createElement("div");
            msg.classList.add("message", sender);
            msg.textContent = text;
            chatHistory.appendChild(msg);
            chatHistory.scrollTop = chatHistory.scrollHeight;
        }

        userInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                sendMessage();
            }
        });
    </script>
    <script>
        const themeIcon = document.getElementById("themeIcon");

        window.addEventListener("DOMContentLoaded", () => {
            const dark = localStorage.getItem("dark-mode") === "true";
            if (dark) {
                document.body.classList.add("dark-mode");
                themeIcon.src = "icons/lightModeIcon.svg";
            }
        });

        function toggleDarkMode() {
            const body = document.body;
            const isDark = body.classList.toggle("dark-mode");
            localStorage.setItem("dark-mode", isDark);

            if (isDark) {
                themeIcon.src = "icons/lightModeIcon.svg";
            } else {
                themeIcon.src = "icons/darkModeIcon.svg";
            }
        }
    </script>
    <script>
        console.log("Strona załadowana");
        
        window.addEventListener("DOMContentLoaded", () => {
            console.log("Uruchamiam bota...");
            fetch("chatbot_start.php")
            .then(res => console.log("Bot start: ", res.status))
            .catch(err => console.error("Bot start error: ", err));
        });
    </script>
</body>