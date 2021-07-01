; (function () {
    'use strict';
    function deleteConfirm() {
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
    }
    

    function tooltips() {

        if(window.matchMedia("(hover: none)").matches){
            return;
        }
        let popovers = document.querySelectorAll('.popover');

        // Calcule du placement de la souris pour toutes les popovers
        window.onmousemove = function (e) {
            let x = (e.clientX + 20) + 'px';
            let y = (e.clientY + 20) + 'px';
            for (let i = 0; i < popovers.length; i++) {
                popovers[i].style.top = y;
                popovers[i].style.left = x;
            }
        };

    }

    
    // Confirmation de suppression
    window.addEventListener('load', deleteConfirm);

    // Calcule du positionnement de la souris pour l'affichage de l'infobulle
    window.addEventListener('load', tooltips);

    // Recharger la page au redimmension de la fenetre
    window.addEventListener('resize',function(){

        document.location.reload();

    });
})();
