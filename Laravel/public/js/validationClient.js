// Validation Nom du client
    let nomInput = document.getElementById('nomClient');
    let errorNom = document.getElementById('errorNom');
    

    nomInput.addEventListener('input', function(){
        let nomRegex = /^([a-zA-ZÀ-ÿ]+-? ?)+$/;
        let nom = nomInput.value.trim();
        let isValidNomClient = nomRegex.test(nom);
        if (nom.length < 3 || nom.length > 100) {
            errorNom.textContent = "Le nom doit contenir entre 3 et 20 caractères et pas d'accents";
            nomInput.classList.add('is-invalid');
        } else {
            errorNom.textContent = '';
            nomInput.classList.remove('is-invalid');
        }
    });

// Validation Prenom du client
    let prenomInput = document.getElementById('prenomClient');
    let errorPrenom = document.getElementById('errorPrenom');
    prenomInput.addEventListener('input', function(){
        let prenomRegex = /^([a-zA-ZÀ-ÿ]+-? ?)+$/;
        let prenom = prenomInput.value.trim();
        let isValidPrenomClient = prenomRegex.test(prenom);
        if (prenom.length < 3 || prenom.length > 100) {
            errorPrenom.textContent = "Le prenom doit contenir entre 3 et 20 caractères et pas d'accents";
            prenomInput.classList.add('is-invalid');
        } else {
            errorPrenom.textContent = '';
            prenomInput.classList.remove('is-invalid');
        }
    });

// Validation addresse courriel du client
    let emailInput = document.getElementById('emailClient');
    let errorEmail = document.getElementById('errorEmail');
    emailInput.addEventListener('input', () => {
        let email = emailInput.value.trim();
        if (email.length < 3 || email.length > 100) {
            errorEmail.textContent = " L'adresse courriel peut contenir un maximum de 100 caractères";
            emailInput.classList.add('is-invalid');
        } else {
            errorEmail.textContent = '';
            emailInput.classList.remove('is-invalid');
        }
    });


    // Validation Mot de passe du client
    let motDePasseInput = document.getElementById('motDePasse');
    let errorMotDePasse = document.getElementById('errorMotDePasse');
    motDePasseInput.addEventListener('input', function() {
        let motDePasseRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}$/;
        let motDePasse = motDePasseInput.value;
        let isValidMotDePasse = motDePasseRegex.test(motDePasse);
        if(isValidMotDePasse){
            errorMotDePasse.textContent = '';
            motDePasseInput.classList.remove('is-invalid');
        } else{
            errorMotDePasse.textContent ='Le mot de passe doit contenir au moins 8 caractères, incluant au moins une lettre, un chiffre et un symbole.';
            motDePasseInput.classList.add('is-invalid');
        }
    });