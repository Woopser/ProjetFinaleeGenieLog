let targetNom = document.getElementById('nom');
let targetPrix = document.getElementById('prix');
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