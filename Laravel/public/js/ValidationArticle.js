let targetNom = document.getElementById('nom');
let targetPrix = document.getElementById('prix');
let targetNb_max = document.getElementById('nb_max');
let targetBouton = document.getElementById('bouton');
//Vérification nom
targetNom.addEventListener('input', function(){
    let targetError = document.getElementById('errorNom');
    if(targetNom.value.length > 100){
        targetError.textContent = "Le nom utiliser est trop long soit plus de 100 caractères";
        targetNom.classList.add('is-invalid');
    }
    else if(targetNom.value.length == 0){
        targetError.textContent = "Rentrez un nom";
        targetNom.classList.add('is-invalid');
    }
    else{
        targetError.textContent = "";
        targetNom.classList.remove('is-invalid');
    }
});
//Vérification prix
targetPrix.addEventListener('input', function(){
    let targetError = document.getElementById('errorPrix');
    let re = /^([0-9]+\.?[0-9]?[0-9]?)?$/;
    let match = re.test(targetPrix.value);
    if(!match){
        targetError.textContent = "Respectez le format de dollar soit : 00.00";
        targetPrix.classList.add("is-invalid");
    }
    else if(targetPrix.value.length >= 100){
        targetError.textContent = "Le prix est trop long soit plus de 100 caractères";
        targetPrix.classList.add("is-invalid");
    }
    else{
        targetError.textContent = "";
        targetPrix.classList.remove("is-invalid");
    }
});
//Vérification quantité
targetNb_max.addEventListener('input', function(){
    let targetError = document.getElementById('errorNbMax');
    
    if(targetNb_max.value.length >= 3){
        targetError.textContent = "La quantité maximun ne peux pas dépasser 100";
        targetNb_max.classList.add("is-invalid");
    }
    else{
        targetError.textContent = "";
        targetNb_max.classList.remove("is-invalid");
    }
});
