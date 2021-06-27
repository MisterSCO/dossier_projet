; (function () {
    'use strict';

    //on recupère tous les boutons supprimer et on les stock dans un tableau
    let supprBtn = document.querySelectorAll(".confirm_delete");

    //on boucle sur le tableau
    for (let i = 0; i < supprBtn.length; i++) {
        //evenement d'écoute sur le bouton suppr
        supprBtn[i].addEventListener('click', function (event) {
            //confirmation utilisateur pour la sécurité
            let isConfirmed = window.confirm('Voulez-vous vraiment supprimer ?');
            //si l'utilisateur annule, l'évènement s'annule
            if (isConfirmed === false) {
                event.preventDefault();
            }
        });
    }

    
})();

function GetId(id) {
    return document.getElementById(id);
}
var i = false; // La variable i nous dit si la bulle est visible ou non

function move(e) {
    if (i) { // Si la bulle est visible, on calcul en temps reel sa position ideale

        if (document.documentElement.clientWidth > 0) {
            GetId("curseur").style.left = 20 + event.x + document.documentElement.scrollLeft + "px";
            GetId("curseur").style.top = 10 + event.y + document.documentElement.scrollTop + "px";
        } else {
            GetId("curseur").style.left = 20 + event.x + document.body.scrollLeft + "px";
            GetId("curseur").style.top = 10 + event.y + document.body.scrollTop + "px";
        }
    }
}


function montre(text) {
    if (i == false) {
        GetId("curseur").style.visibility = "visible"; // Si il est cacher (la verif n'est qu'une securité) on le rend visible.
        GetId("curseur").innerHTML = text; // on copie notre texte dans l'élément html
        i = true;
    }
}

function cache() {
    if (i == true) {
        GetId("curseur").style.visibility = "hidden"; // Si la bulle est visible on la cache
        i = false;
    }
}
document.onmousemove = move; // dès que la souris bouge, on appelle la fonction move pour mettre à jour la position de la bulle.
//