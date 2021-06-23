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