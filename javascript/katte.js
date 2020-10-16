var indexCurrent=0;
autoSlide();
function plusSlide(tranNum){
    showSlide(indexCurrent+=tranNum);
}

function currentSlide(dotNum){
    showSlide(indexCurrent=dotNum);
}

function showSlide(n){
    var i;
    var x=document.getElementsByClassName("slides");
    var y=document.getElementsByClassName("dot");
    if(n>x.length){
        indexCurrent=1;
    }
    if(n<1){
        indexCurrent=x.length;
    }
    for(i=0;i<x.length;i++){
        x[i].style.display="none";
    }
    for(i=0;i<y.length;i++){
        y[i].className=y[i].className.replace(" active","");
    }
    x[indexCurrent-1].style.display="block";
    y[indexCurrent-1].className+=" active";
}

function autoSlide(){
    var i;
    var x=document.getElementsByClassName("slides");
    var y=document.getElementsByClassName("dot");
    indexCurrent++;
    if(indexCurrent>x.length){
        indexCurrent=1;
    }
    if(indexCurrent<1){
        indexCurrent=x.length;
    }
    for(i=0;i<x.length;i++){
        x[i].style.display="none";
    }
    for(i=0;i<y.length;i++){
        y[i].className=y[i].className.replace(" active","");
    }
    x[indexCurrent-1].style.display="block";
    y[indexCurrent-1].className+=" active";
    setTimeout(autoSlide,3000); 
}


