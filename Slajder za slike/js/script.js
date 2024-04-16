let i = 0;
setInterval(() => {

    if(i < document.getElementById("slike").children.length - 1){
        document.getElementById("slike").children[i].style.display = "none";
        document.getElementById("slike").children[i + 1].style.display = "block";
        FadeIn(document.getElementById("slike").children[i + 1]);
        document.getElementById("slike").children[i].style.opacity = 0;

        document.getElementById("opisi").children[i].style.display = "none";
        document.getElementById("opisi").children[i + 1].style.display = "block";

        document.getElementById("kruzici").children[i].classList.remove("active");
        document.getElementById("kruzici").children[i + 1].classList.add("active");
        i++;
    }
    else{
        document.getElementById("slike").children[i].style.display = "none";
        document.getElementById("kruzici").children[i].classList.remove("active");

        document.getElementById("opisi").children[i].style.display = "none";
        document.getElementById("slike").children[i].style.opacity = 0;

        i = 0;

        document.getElementById("opisi").children[i].style.display = "block";
        FadeIn(document.getElementById("slike").children[i]);

        document.getElementById("slike").children[i].style.display = "block";
        document.getElementById("kruzici").children[i].classList.add("active");
    }
    
}, 3000);

function FadeIn(el){
    setInterval(function() {
        var opacity = 0;
        if (opacity <= 1) {
           opacity += 0.1;
           el.style.opacity = opacity;
        }
    }, 50);
}