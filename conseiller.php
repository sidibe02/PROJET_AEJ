<?php
include("config.php");
include("nav.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $prenoms = $_POST["prenoms"];
    $email = $_POST["email"];
    $fonction = $_POST["fonction"];
    $contact = $_POST["contact"];

    $stmt = $conn->prepare("INSERT INTO conseiller (nom, prenoms, email, fonction, contact) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nom, $prenoms, $email, $fonction, $contact);

    if ($stmt->execute()) {
        $message = "Conseiller enregistré avec succès.";
    } else {
        $message = "Erreur : " . $conn->error;
    }

    $stmt->close();
}
?>

<?php include("header.php"); ?>

<div class="container">

<h2>Enregistrement du Conseiller</h2>

<?php if(isset($message)) echo "<p style='color:green;'>$message</p>"; ?>

<form method="POST">

    <label>Nom</label>
    <input type="text" name="nom" required>

    <label>Prénoms</label>
    <input type="text" name="prenoms" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Fonction</label>
    <select name="fonction">
        <option value="Conseiller">Conseiller</option>
        <option value="Responsable">Chef</option>
    </select>

    <label>Contact</label>
    <input type="text" name="contact">

    <button type="submit">Enregistrer</button>

</form>

</div>

</body>
</html>