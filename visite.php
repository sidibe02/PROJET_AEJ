<?php
include("config.php");
include("nav.php");

// On récupère les demandeurs pour la liste déroulante
$demandeurs = $conn->query("SELECT id_demandeur, nom, prenoms FROM demandeur");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_demandeur = $_POST["id_demandeur"];
    $date_visite = $_POST["date_visite"];
    $motif = $_POST["motif"];
    $observations = $_POST["observations"];

    $sql = "INSERT INTO visite (id_demandeur, date_visite, motif, observations)
            VALUES ('$id_demandeur', '$date_visite', '$motif', '$observations')";

    if ($conn->query($sql) === TRUE) {
        $message = "Visite enregistrée avec succès.";
    } else {
        $message = "Erreur : " . $conn->error;
    }
}

include("header.php");
?>

<div class="container">
<h2>Enregistrement d'une Visite</h2>
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

    <label>Date de visite</label>
    <input type="date" name="date_visite" required>

    <label>Motif</label>
    <input type="text" name="motif" required>

    <label>Observations</label>
    <textarea name="observations"></textarea>

    <button type="submit">Enregistrer</button>
</form>
</div>