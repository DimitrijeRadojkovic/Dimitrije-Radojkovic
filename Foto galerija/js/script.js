let opisi = [];

fetch("../Foto galerija/opisi.txt")
  .then((res) => res.text())
  .then((text) => {
        console.log(text);
        opisi = text.split('\n');
        document.getElementById("opis").innerHTML = opisi[0];

        [...document.getElementsByClassName("slika")].forEach(x => {
            x.addEventListener("click", () => {
                document.getElementById("central").src = x.src;
                let id = x.src.charAt(x.src.length - 5);
                console.log(id);
                document.getElementById("opis").innerHTML = opisi[id - 1];
            });
        });
   })
  .catch((e) => console.error(e));

