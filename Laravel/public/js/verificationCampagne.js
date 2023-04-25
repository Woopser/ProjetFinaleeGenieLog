

let nom = document.getElementById("nomCamp");
nom.addEventListener('input',verifierNom);

function verifierNom()
{
            
    
    let long = nom.value.length;
    if(long > 50)
    {
        let err = document.getElementById("nomErr"); 
        err.textContent = "Le nom de la campagne doit etre au maximum 50 lettres.";
        nom.classList.add('is-invalid');
    }
    if(long > 50){
        let err = document.getElementById("nomErr"); 
        err.textContent = "";
        nom.classList.add('is-invalid');
    }

 }

 let debut = document.getElementById("dateDeb");
 
 debut.addEventListener('input',verifierDeb);

 function verifierDeb()
 {
    let string = debut.value;
    let deb = new Date(string);
    deb.setHours(deb.getHours() + 4);//compense pour fuseau horaire
    let current = new Date();
    let cDate = current.getFullYear() + '-' + (current.getMonth() + 1) + '-' + current.getDate();
    let currentD = new Date(cDate);
    let dateErr = document.getElementById("dateDebErr");
    if(deb < currentD)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date d'aujourd'hui";
        debut.classList.add('is-invalid');
    }
    else if(deb > currentD)
    {
        dateErr.textContent = "";
        debut.classList.remove('is-invalid');
    }
 }

 let debFond = document.getElementById("dateDebFond");
 debFond.addEventListener('input', verifierDebF);

 function verifierDebF()
 {
    let string = debFond.value;
    let debF = new Date(string);
    debF.setHours(debF.getHours() + 4);//compense pour fuseau horaire
    let dateErr = document.getElementById("dateDebFondErr");

    //Re-definition des variables des autres fonctions
    //Deb
    let string1 = debut.value;
    let deb = new Date(string1);
    deb.setHours(deb.getHours() + 4);//compense pour fuseau horaire
    //Date Courante
    let current = new Date();
    let cDate = current.getFullYear() + '-' + (current.getMonth() + 1) + '-' + current.getDate();
    let currentD = new Date(cDate);
    //Fin Re-definition

    if(debF < currentD)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date d'aujourd'hui";
        debFond.classList.add('is-invalid');
    }
    else if(debF < deb)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date de debut";
        debFond.classList.add('is-invalid');
    }
    else if(debF >  deb && debF > currentD)
    {
        dateErr.textContent = "";
        debFond.classList.remove('is-invalid');
    }
 }

 let FinFond = document.getElementById("dateRemiseFond");
 FinFond.addEventListener('input', verifierFF);

 function verifierFF()
 {
    let string2 = FinFond.value;
    let finF = new Date(string2);
    finF.setHours(finF.getHours() + 4);//compense pour fuseau horaire
    let dateErr = document.getElementById("dateFinFondErr");

    //Re-definition des variables des autres fonctions
    //Deb
    let string1 = debut.value;
    let deb = new Date(string1);
    deb.setHours(deb.getHours() + 4);//compense pour fuseau horaire
    //Date Courante
    let current = new Date();
    let cDate = current.getFullYear() + '-' + (current.getMonth() + 1) + '-' + current.getDate();
    let currentD = new Date(cDate);
    //DebF
    let string = debFond.value;
    let debF = new Date(string);
    debF.setHours(debF.getHours() + 4);//compense pour fuseau horaire
    //Fin Re-definition

    if(finF < currentD)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date d'aujourd'hui";
        FinFond.classList.add('is-invalid');
    }
    else if(finF < deb)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date de debut";
        FinFond.classList.add('is-invalid');
    }
    else if(finF < debF)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date de debut de collecte";
        FinFond.classList.add('is-invalid');
    }
    else if(finF >  deb && finF > currentD && finF > debF)
    {
        dateErr.textContent = "";
        FinFond.classList.remove('is-invalid');
    }


 }

 let Fin = document.getElementById("dateFin");
 Fin.addEventListener('input', verifierF);

 function verifierF()
 {
     //Re-definition des variables des autres fonctions
    //Deb
    let string1 = debut.value;
    let deb = new Date(string1);
    deb.setHours(deb.getHours() + 4);//compense pour fuseau horaire
    //Date Courante
    let current = new Date();
    let cDate = current.getFullYear() + '-' + (current.getMonth() + 1) + '-' + current.getDate();
    let currentD = new Date(cDate);
    //DebF
    let string = debFond.value;
    let debF = new Date(string);
    debF.setHours(debF.getHours() + 4);//compense pour fuseau horaire
    //FinF
    let string2 = FinFond.value;
    let finF = new Date(string2);
    finF.setHours(finF.getHours() + 4);//compense pour fuseau horaire
    //Fin Re-definition
    
    let dateErr = document.getElementById("dateFinErr");

    let string3 = Fin.value;
    let fin = new Date(string3);
    fin.setHours(fin.getHours() + 4);//compense pour fuseau horaire


    if(fin < currentD)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date d'aujourd'hui";
        Fin.classList.add('is-invalid');
    }
    else if(fin < deb)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date de debut";
        Fin.classList.add('is-invalid');
    }
    else if(fin < debF)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date de debut de collecte";
        Fin.classList.add('is-invalid');
    }
    else if(fin < finF)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date de fin de collecte";
        Fin.classList.add('is-invalid');
    }
    else if(fin >  deb && fin > currentD && fin > debF && fin > finF)
    {
        dateErr.textContent = "";
        Fin.classList.remove('is-invalid');
    }
 }