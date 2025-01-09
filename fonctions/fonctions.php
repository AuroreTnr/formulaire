<?php
/**
 * creer un lien pour les bar de menu
 * @param string $link chemin du lien
 * @param string $name_link nom du lien
 * @return string l' html avec un lien complet
 */
function create_link(string $link, string $name_link): string {
    return "<li class='nav-item'><a class='nav-link' href='$link'>$name_link</a></li>";
}

?>