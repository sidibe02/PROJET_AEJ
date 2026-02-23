<?php
include("config.php");
include("nav.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libelle = $_POST["libelle"];
    $type = $_POST["type"];
    $description = $_POST["description"];

    $sql = "INSERT INTO dispositif (libelle, type, description)
            VALUES ('$libelle', '$type', '$description')";

    if ($conn->query($sql) === TRUE) {
        $message = "Dispositif enregistré avec succès.";
    } else {
        $message = "Erreur : " . $conn->error;
    }
}

include("header.php");
?>

<div class="container">
<h2>Enregistrement d'un Dispositif</h2>
<?php if(isset($message)) echo "<p style='color:green;'>$message</p>"; ?>

<form method="POST">
    <label>Libellé du dispositif</label>
    <input type="text" name="libelle" required>

    <label>Type</label>
    <select name="type" required>
        <option value="formation">Formation</option>
        <option value="stage">Stage</option>
        <option value="emploi">Emploi</option>
        <option value="auto-emploi">Auto-emploi</option>
    </select>

    <label>Description</label>
    <textarea name="description"></textarea>

    <button type="submit">Enregistrer</button>
</form>
</div>