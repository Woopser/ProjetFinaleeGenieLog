

let nom = document.getElementById("nomCamp");
nom.addEventListener('input',verifierNom);

function verifierNom()
{
            
    
    let long = nom.value.length;
    console.log(long);
    if(long < 5)
    {
        console.log(long);
        let err = document.getElementById("nomErr"); 
        err.textContent = "Le nom de la camapgne doit etre au minimum 5 lettres.";
    }
    if(long > 5){
        let err = document.getElementById("nomErr"); 
        err.textContent = "";
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
    }
    else if(deb > currentD)
    {
        dateErr.textContent = "";
    }
    
 }

 let debFond = document.getElementById("dateDebFond");
 debFond.addEventListener('input',verifierDebF);

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
    }
    else if(debF < deb)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date de debut";
    }
    else if(debF >  deb && debF > currentD)
    {
        dateErr.textContent = "";
    }


 }

 let FinFond = document.getElementById("dateFinFond");
 FinFond.addEventListener('input',verifierFF);

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
    }
    else if(finF < deb)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date de debut";
    }
    else if(finF < debF)
    {
        dateErr.textContent = "Votre date ne peut pas etre plus tot que la date de debut de collecte";
    }
    else if(finF >  deb && finF > currentD && finF > debF)
    {
        dateErr.textContent = "";
    }


 }

