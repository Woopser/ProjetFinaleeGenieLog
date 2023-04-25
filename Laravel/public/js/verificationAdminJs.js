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
// verifiaction email
let targetEmail;
targetEmail = document.getElementById('emailCompte');
targetEmail.addEventListener('input', function(){
    let targetError = document.getElementById('errorEmail');
    let re = /^([a-zA-ZÀ-ÿ]+\.)+[a-zA-ZÀ-ÿ]+\.[0-9]{2}@cegeptr\.qc\.ca$/;
    let match = re.test(targetEmail.value);
    if(targetEmail.value.length == 0){
        targetError.textContent = "Rentrez un email du cegep";
        targetEmail.classList.add('is-invalid');
    }
    else if(targetEmail.value.length > 100){
        targetError.textContent = "Le email utiliser est trop long";
        targetEmail.classList.add('is-invalid');
    }
    else if(!match){
        targetError.textContent = "Le email ne correspond pas au email du cegep";
        targetEmail.classList.add('is-invalid');
    }
    else{
        targetError.textContent = "";
        targetEmail.classList.remove('is-invalid');
    }

});


