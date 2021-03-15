let adds = ["src/images/Kumho-Talvisomepohja19-IG1080x1080-FIN-4.png", "src/images/Kumho-Talvisomepohja19-IG1080x1080-FIN-2.png"];
let add = document.getElementById("adds");
let id = true;
setInterval(() => {
    if(id){
        add.src = adds[1];
        id= false;
    }else{
        add.src = adds[0]
        id= true
    }
}, 1000*5);