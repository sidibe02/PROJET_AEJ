<?php
include("config.php");
include("nav.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $prenoms = $_POST["prenoms"];
    $date_naissance = $_POST["date_naissance"];
    $contact = $_POST["contact"];
    $niveau_etude = $_POST["niveau_etude"];
    $situation_pro = $_POST["situation_pro"];

    // Préparation de la requête pour éviter injection SQL
    $stmt = $conn->prepare("INSERT INTO demandeur (nom, prenoms, date_naissance, contact, niveau_etude, situation_pro) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nom, $prenoms, $date_naissance, $contact, $niveau_etude, $situation_pro);

    if($stmt->execute()){
        $message = "Demandeur enregistré avec succès.";
    } else {
        $message = "Erreur : " . $stmt->error;
    }

    $stmt->close();
}
?>

<?php include("header.php"); ?>

<div class="container">

<h2>Enregistrement du Demandeur</h2>

<?php if(isset($message)) echo "<p style='color:green;'>$message</p>"; ?>

<form method="POST">

    <label>Nom</label>
    <input type="text" name="nom" required>

    <label>Prénoms</label>
    <input type="text" name="prenoms" required>

    <label>Date de naissance</label>
    <input type="date" name="date_naissance">

    <label>Contact</label>
    <input type="text" name="contact">

    <label>Niveau d'étude</label>
    <select name="niveau_etude">
        <option value="aucun">AUCUN</option>
        <option value="primaire">PRIMAIRE / CEP</option>
        <option value="primaire">BEPC</option>
        <option value="secondaire">BAC</option>
        <option value="universitaire">BTS / LICENCE</option>
        <option value="primaire">MASTER</option>
    </select>

    <label>Situation professionnelle</label>
    <select name="situation_pro">
        <option value="chomeur">CHOMEUR</option>
        <option value="employe">EMPLOYE</option>
        <option value="etudiant">ETUDIANT</option>
        <option value="sans emploi">SANS_EMPLOI</option>
    </select>

    <button type="submit">Enregistrer</button>

</form>

</div>

</body>
</html>