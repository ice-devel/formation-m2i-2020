<?php
    if (isset($_COOKIE['username'])) {
        echo "Bonjour ".$_COOKIE['username'];
    }
    else {
        echo "Vous n'êtes pas connecté.";
    }

