[...document.getElementsByClassName("drzava")].forEach(x => {
    let audio;

    let drzave;

    fetch("./drzave.json")
    .then(res => res.json())
    .then((data) => drzave = data);

    x.addEventListener("mouseover", () => {
        audio = new Audio("./zvukovi/" + x.id + ".mp3");
        console.log("./zvukovi/" + x.id + ".mp3");
        audio.play();
    });

    x.addEventListener("mouseout", () => {
        if (audio) {
            audio.pause();
            audio.currentTime = 0;
        }
    });

    x.addEventListener("click", () => {
        
        let win = window.open("", "", "width=400, height=300");
        win.document.body.style.backgroundColor = "#FEFA99";
        win.document.body.style.fontFamily = "Arial, Helvetica, sans-serif";
        win.document.body.style.display = "flex";
        win.document.body.style.flexDirection = "column";
        win.document.body.style.alignItems = "center";

        let h2 = win.document.createElement("h2");
        h2.style.color = "#537938";
        if(x.id == "crnagora"){
            h2.innerHTML = "Crna Gora";
        }
        else if(x.id == "bosna"){
            h2.innerHTML = "Bosna i Hercegovina";
        }
        else
            h2.innerHTML = x.id.replace(x.id, x.id[0].toUpperCase() + x.id.slice(1, x.id.length));
        win.document.body.appendChild(h2);

        let p1 = win.document.createElement("p");
        p1.style.textAlign = "center";
        p1.style.margin = "0";
        p1.innerHTML = "Glavni grad: " + drzave[x.id].glavni_grad;

        let p2 = win.document.createElement("p");
        p2.style.textAlign = "center";
        p2.style.margin = "0";
        p2.innerHTML = "Broj stanovnika: " + drzave[x.id].br_stanovnika;

        let p3 = win.document.createElement("p");
        p3.style.textAlign = "center";
        p3.style.margin = "0";
        p3.innerHTML = "Povrsina: " + drzave[x.id].povrsina + " km<sup>2</sup>";

        win.document.body.appendChild(p1);
        win.document.body.appendChild(p2);
        win.document.body.appendChild(p3);
    });

});