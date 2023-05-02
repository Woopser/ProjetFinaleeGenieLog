let targetBoutonNav = document.getElementsByName('boutonNav');
targetBoutonNav.forEach(this.addEventListener('mouseover',mouseOver(this)));
targetBoutonNav.forEach(this.addEventListener('mouseout',mouseOut(this)));

function mouseOver(element){
    element.classList.remove('navTxt');
    element.classList.add('navTxtOver');
}

function mouseOut(element){
    element.classList.remove('navTxtOver');
    element.classList.add('navTxt');
}