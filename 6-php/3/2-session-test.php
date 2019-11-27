<?php
    if (isset($_SESSION['username'])) {
        echo "Bonjour ".$_SESSION['username'];
    }
    else {
        echo "Vous n'êtes pas connecté.";
    }
