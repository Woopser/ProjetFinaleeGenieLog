// verification nom
let targetPrenom;
targetPrenom = document.getElementById('prenomCompte');
targetPrenom.addEventListener('input', function(){
    let targetError = document.getElementById('errorPrenom');
    let re = /^([a-zA-ZÀ-ÿ]+-? ?)+$/;
    let match = re.test(targetPrenom.value);
    if(targetPrenom.value.length == 0){
        targetError.textContent = "Rentrez un prenom";
        targetPrenom.classList.add('is-invalid');
    }
    else if(targetPrenom.value.length > 100){
        targetError.textContent = "Le prenom utiliser est trop long";
        targetPrenom.classList.add('is-invalid');
    }
    else if(targetPrenom.value.length < 3){
        targetError.textContent = "vous devez avoir un minimun de 3 lettre";
        targetPrenom.classList.add('is-invalid');
    }
    else if(!match){
        targetError.textContent = "Erreur caractère pas accepter";
        targetPrenom.classList.add('is-invalid');
    }
    else if(targetPrenom.value.length >= 3){
        targetError.textContent = "";
        targetPrenom.classList.remove('is-invalid');
    }
});
// verification nom
let targetNom;
targetNom = document.getElementById('nomCompte');
targetNom.addEventListener('input', function(){
    let targetError = document.getElementById('errorNom');
    let re = /^([a-zA-ZÀ-ÿ]+-? ?)+$/;
    let match = re.test(targetNom.value);
    if(targetNom.value.length == 0){
        targetError.textContent = "Rentrez un nom";
        targetNom.classList.add('is-invalid');
    }
    else if(targetNom.value.length > 100){
        targetError.textContent = "Le nom utiliser est trop long";
        targetNom.classList.add('is-invalid');
    }
    else if(targetNom.value.length < 3){
        targetError.textContent = "vous devez avoir un minimun de 3 lettre";
        targetNom.classList.add('is-invalid');
    }
    else if(!match){
        targetError.textContent = "Erreur caractère pas accepter";
        targetNom.classList.add('is-invalid');
    }
    else if(targetNom.value.length >= 3){
        targetError.textContent = "";
        targetNom.classList.remove('is-invalid');
    }
});
let targetPassword;
targetPassword = document.getElementById('password');
targetPassword.addEventListener('input', function(){
    let targetError = document.getElementById('errorPassword');
    let re = /^([a-zA-ZÀ-ÿ]+-? ?)+$/;
    let match = re.test(targetPassword.value);
    if(targetPassword.value.length == 0){
        targetError.textContent = "Rentrez un mot de passe";
        targetPassword.classList.add('is-invalid');
    }
    else if(targetPassword.value.length > 100){
        targetError.textContent = "Le nom utiliser est trop long";
        targetPassword.classList.add('is-invalid');
    }
    else if(targetPassword.value.length < 3){
        targetError.textContent = "vous devez avoir un minimun de 3 caractère";
        targetPassword.classList.add('is-invalid');
    }
    else if(!match){
        targetError.textContent = "Erreur caractère pas accepter";
        targetPassword.classList.add('is-invalid');
    }
    else if(targetPassword.value.length >= 3){
        targetError.textContent = "";
        targetPassword.classList.remove('is-invalid');
    }
});


