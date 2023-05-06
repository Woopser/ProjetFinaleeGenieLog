let targetNom = document.getElementById('nom');
let targetCodeRGB = document.getElementById('codeRGB');
//Vérification nom de la couleur
targetNom.addEventListener('input',function(){
    targetError = document.getElementById('errorNom');
    if(targetNom.value.length > 100){
        targetError.textContent = "Le nom de la couleur utiliser est trop long soit plus de 100 caractères";
        targetNom.classList.add('is-invalid');
    }
    else if(targetNom.value.length == 0){
        targetError.textContent = "Rentrez un nom de couleur";
        targetNom.classList.add('is-invalid');
    }
    else{
        targetError.textContent = "";
        targetNom.classList.remove('is-invalid');
    }
});
//Vérification codeRGB
targetCodeRGB.addEventListener('input', function(){
    targetError = document.getElementById('errorCodeRGB');
    let re = /^([0-9]?a?b?c?d?e?f?A?B?C?D?E?F?)+$/;
    let match = re.test(targetCodeRGB.value);
    if(targetCodeRGB.value.length > 6){
        targetError.textContent = "Le code hexadecimal doit être de 6 caractère";
        targetCodeRGB.classList.add('is-invalid');
    }
    else if(targetCodeRGB.value.length == 0){
        targetError.textContent = "Rentrez un code hexadecimal pour la couleur";
        targetCodeRGB.classList.add('is-invalid');
    }
    else if(!match){
        targetError.textContent = "Le code de couleur doit être hexadecimal";
        targetCodeRGB.classList.add('is-invalid');
    }
    else{
        targetError.textContent = "";
        targetCodeRGB.classList.remove('is-invalid');
    }
});