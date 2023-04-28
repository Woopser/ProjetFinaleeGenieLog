let targetDimension = document.getElementById('dimension');
targetDimension.addEventListener('input',function(){
    targetError = document.getElementById('errorDimension')
    if(targetDimension.value.length > 100){
        targetError.textContent = "La dimension utiliser est trop long soit plus de 100 caractères";
        targetDimension.classList.add('is-invalid');
    }
    else if(targetDimension.value.length == 0){
        targetError.textContent = "Rentrez une dimension";
        targetDimension.classList.add('is-invalid');
    }
    else{
        targetError.textContent = "";
        targetDimension.classList.remove('is-invalid');
    }
});