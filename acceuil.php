<?php include("header.php"); ?>#!/bin/bash
cd /workspaces/PROJET_AEJ
git add -A
git commit -m "Auto-save $(date +'%Y-%m-%d_%H:%M')" || true
git push origin main
<div class="home-container">

    <div class="region-box">
        Agence Régionale de Minignan
    </div>

    <h1 class="a">BIENVENUE</h1>

    <div class="dashboard">
        <div class="card">
            <h3>Demandeurs</h3>
            <p>Gestion des enregistrements</p>
            <a href="demandeur.php">Accéder</a>
        </div>

        <div class="card">
            <h3>Conseillers</h3>
            <p>Gestion du personnel</p>
            <a href="conseiller.php">Accéder</a>
        </div>

        <div class="card">
            <h3>Visites</h3>
            <p>Suivi des consultations</p>
            <a href="visite.php">Accéder</a>
        </div>

        <div class="card">
            <h3>Prise en Charge</h3>
            <p>Orientation et accompagnement</p>
            <a href="prise-en-charge.php">Accéder</a>
        </div>

        <div class="card">
            <h3>Dispositifs</h3>
            <p>Programmes disponibles</p>
            <a href="dispositif.php">Accéder</a>
        </div>
    </div>

</div>

</body>
</html>