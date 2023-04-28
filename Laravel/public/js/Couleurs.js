let targetBouton = document.getElementById('bouton');
let targetFormSupprimer = document.getElementById('formSupprimer');
let targetRadioSupprimer = document.getElementById('radioSupprimer');
let targetRadioModifier = document.getElementById('radioModifier');
let targetFormModifier = document.getElementById('formModifier');
targetRadioModifier.addEventListener('click', function(){
    //targetBouton.textContent = "modifier";
    targetFormSupprimer.style.visibility = "collapse";
    targetFormModifier.style.visibility = "visible";
});
targetRadioSupprimer.addEventListener('click', function(){
    //targetBouton.textContent = "supprimer";
    //targetForm.action = "{{route('Couleurs.destroy')}}";
    targetFormSupprimer.style.visibility = "visible";
    targetFormModifier.style.visibility = "collapse";
});