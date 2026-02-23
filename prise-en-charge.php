<?php
include("config.php");
include("nav.php");

// Récupérer demandeurs et conseillers pour listes déroulantes
$demandeurs = $conn->query("SELECT id_demandeur, nom, prenoms FROM demandeur");
$conseillers = $conn->query("SELECT id_conseiller, nom, prenoms FROM conseiller");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_demandeur = $_POST["id_demandeur"];
    $id_conseiller = $_POST["id_conseiller"];
    $date_prise = $_POST["date_prise"];
    $motif = $_POST["motif"];
    $resultat = $_POST["resultat"];

    $sql = "INSERT INTO prise_en_charge (id_demandeur, id_conseiller, date_prise, motif, resultat)
            VALUES ('$id_demandeur', '$id_conseiller', '$date_prise', '$motif', '$resultat')";

    if ($conn->query($sql) === TRUE) {
        $message = "Prise en charge enregistrée avec succès.";
    } else {
        $message = "Erreur : " . $conn->error;
    }
}

include("header.php");
?>

<div class="container">
<h2>Enregistrement d'une Prise en Charge</h2>
<?php if(isset($message)) echo "<p style='color:green;'>$message</p>"; ?>

<form method="POST">
    <label>Demandeur</label>
    <select name="id_demandeur" required>
        <?php while($row = $demandeurs->fetch_assoc()): ?>
            <option value="<?php echo $row['id_demandeur']; ?>">
                <?php echo $row['nom']." ".$row['prenoms']; ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label>Conseiller</label>
    <select name="id_conseiller" required>
        <?php while($row = $conseillers->fetch_assoc()): ?>
            <option value="<?php echo $row['id_conseiller']; ?>">
                <?php echo $row['nom']." ".$row['prenoms']; ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label>Date</label>
    <input type="date" name="date_prise" required>

    <label>Motif</label>
    <input type="text" name="motif" required>

    <label>Résultat</label>
    <input type="text" name="resultat">

    <button type="submit">Enregistrer</button>
</form>
</div>