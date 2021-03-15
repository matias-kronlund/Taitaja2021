let pricetotal = 0;
let renderTable = ()=> {
    for(let prod of prods){
        console.log(prod)
        let row = document.createElement("div");
        let img = document.createElement("img");
        console.log(prod.name.split(" ")[0]);
        img.src = `src/images/${prod.name.split(" ")[0].toLowerCase()}.jpg`;
        row.classList.add("table");
        let pname = document.createElement("div")
        pname.classList.add("pname")
        let pprice = document.createElement("div")
        pprice.classList.add("pprice")
        pname.innerHTML = prod.name;
        pprice.innerHTML = `${prod.price}€/kpl x ${prod.amount}`
        for(let i = 0; i < parseInt(prod.amount); i++){
            console.log(prod.price)
            pricetotal += parseFloat(prod.price);
        }
        row.appendChild(img)
        row.appendChild(pname);
        row.appendChild(pprice);
        document.getElementById("tablecon").appendChild(row)
    }

    
    //for(let )
}
let renderData = ()=>{
    document.getElementById("name").innerHTML = persdata.nimi;
    document.getElementById("address").innerHTML = persdata.post;
    document.getElementById("email").innerHTML = persdata.email;
    document.getElementById("phone").innerHTML = persdata.tel;
    document.getElementById("deli").innerHTML = persdata.del;
    document.getElementById("total").innerHTML = pricetotal + "€";
    
}
renderTable();
renderData();