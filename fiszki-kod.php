<?php
$pdo = new PDO('mysql:host=localhost;dbname=twoja_baza', 'uzytkownik', 'haslo');
$stmt = $pdo->query("SELECT * FROM cards");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '
    <div class="flip-card" onclick="this.classList.toggle(\'flipped\')">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <p class="title">'.htmlspecialchars($row['front_text']).'</p>
                <p>Click Me</p>
            </div>
            <div class="flip-card-back">
                <p class="title">'.htmlspecialchars($row['back_text']).'</p>
                <p>Click Again</p>
            </div>
        </div>
    </div>
    ';
}
?>
