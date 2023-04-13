// Validation Nom du client
    let nomInput = document.getElementById('nomClient');
    let errorNom = document.getElementById('errorNom');

    nomInput.addEventListener('input', () => {
        let nom = nomInput.value.trim();
        if (nom.length < 3 || nom.length > 100) {
            errorNom.textContent = 'Le nom doit contenir entre 3 et 20 caractères';
            nomInput.classList.add('is-invalid');
        } else {
            errorNom.textContent = '';
            nomInput.classList.remove('is-invalid');
        }
    });

// Validation Prenom du client
    let prenomInput = document.getElementById('prenomClient');
    let errorPrenom = document.getElementById('errorPrenom');

    prenomInput.addEventListener('input', () => {
        let prenom = prenomInput.value.trim();
        if (prenom.length < 3 || prenom.length > 100) {
            errorPrenom.textContent = 'Le prenom doit contenir entre 3 et 20 caractères';
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
        if (email.length < 3 || email.length > 20) {
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

    motDePasseInput.addEventListener('input', () => {
        let motDePasse = motDePasseInput.value.trim();
        if (motDePasse.length < 8 || motDePasse.length > 20) {
            errorMotDePasse.textContent = 'Le mot de passe doit contenir entre 8 et 20 caractères';
            motDePasseInput.classList.add('is-invalid');
        } else {
            errorMotDePasse.textContent = '';
            motDePasseInput.classList.remove('is-invalid');
        }
    });