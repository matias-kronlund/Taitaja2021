let states = {
    Merkki: [],
    Koko: [],
    Tyyppi: []
}
let selected = {
    Merkki: [],
    Koko: [],
    Tyyppi: []
}
let getStuff = (ob)=>{
    for(let ring of ob){
        let m = ring.Merkki.replace(" ", "");
        if(!states.Merkki.includes(m)){
            states.Merkki.push(m)
        }
        if(!states.Koko.includes(ring.Koko)){
            states.Koko.push(ring.Koko)
        }
        if(!states.Tyyppi.includes(ring.Tyyppi)){
            states.Tyyppi.push(ring.Tyyppi)
        }
    }
}

let getSelected = ()=>{
    let selectedTiers = [];
    for(let ring of tiers){
        let mkt_s = [false, false, false];
        let i = 0;
        for(let selector of Object.keys(selected)){
            if(selected[selector].length != 0){
                if(selected[selector].includes(ring[selector].replace(" ", ""))){
                    mkt_s[i] = true;
                }
            }else{
                mkt_s[i] = true;
            }
            i++;
        }
        if(mkt_s[0] == true && mkt_s[1] == true && mkt_s[2] == true){
            selectedTiers.push(ring);
        }
    }
    return(selectedTiers);
}

let createFilters = ()=>{
    for(let key of Object.keys(states)){
        let catDiv = document.createElement("div");
        catDiv.classList.add("category");
        let h2 = document.createElement("h2");
        h2.innerHTML = key;
        let ul = document.createElement("ul");
        let lis = "";
        for(let v of states[key]){
            lis += '<li><h3>'+ v +'<input type="checkbox" onclick="addSelected(\''+ key + '\',\'' + v +  '\')" ></h3></li>'
        }
        ul.innerHTML = lis;
        catDiv.appendChild(h2);
        catDiv.appendChild(ul);
        document.getElementById("props").appendChild(catDiv);
    }
}

let addSelected = (type, value)=>{
    if(selected[type].includes(value)){
        for(let i = 0; i < selected[type].length; i++){
            if(selected[type][i] == value){
                selected[type].splice(i,1);
            }
        }
    }else{
        selected[type].push(value);
    }
    console.log(getSelected());
    rederTiers();
}
let rederTiers = (sorter) => {
    let selected_tiers = getSelected().sort(sorter);
    let prodcontainer = document.getElementById("products");
    prodcontainer.innerHTML = "";
    for(let item of selected_tiers){
        let product = document.createElement("div");
        product.innerHTML =  `<img src="src/images/${item.Merkki.toLowerCase().replace(" ", "")}.jpg" alt=""></img>`;
        let productTitle = document.createElement("h2");
        productTitle.innerHTML = `${item.Merkki} ${item.Malli}`;
        let props = document.createElement("ul")
        let productType = document.createElement("li");
        let productSize = document.createElement("li");
        let productPrice = document.createElement("li");
        productType.innerHTML = item.Tyyppi;
        productSize.innerHTML = item.Koko;
        productPrice.innerHTML = `${item.Hinta}€`;
        props.appendChild(productType);
        props.appendChild(productSize);
        props.appendChild(productPrice);
        product.appendChild(productTitle);
        product.appendChild(props);
        let addbutton = document.createElement("button");
        addbutton.innerHTML = "Lisää ostoskoriin"
        addbutton.onclick = () => cartAdd(item);
        product.appendChild(addbutton);
        prodcontainer.appendChild(product);
    }
}
let sortNameA = (a, b) => {
    var nameA = a.Merkki.toUpperCase();
    var nameB = b.Merkki.toUpperCase();
    if (nameA < nameB) {
      return -1;
    }
    if (nameA > nameB) {
      return 1;
    }
  
    // names must be equal
    return 0;
};
let sortNameB = (b, a) => {
    var nameA = a.Merkki.toUpperCase();
    var nameB = b.Merkki.toUpperCase();
    if (nameA < nameB) {
      return -1;
    }
    if (nameA > nameB) {
      return 1;
    }
  
    // names must be equal
    return 0;
};
let sortHintaa = function (a, b) {
    return a.Hinta - b.Hinta;
};
let sortHintab = function (b, a) {
    return a.Hinta - b.Hinta;
};
let sorter = sortNameA;
let cahngesorter = (new_sorter, clicked)=>{
    let buttons = document.getElementsByClassName("filterbutton");
    let i = 0;
    for(let button of buttons){
        if(button.classList.contains("current")){
            button.classList.remove("current");
        }
        if(i == clicked){
            button.classList.add("current");
        }
        i++;
    }
    sorter = new_sorter;
    rederTiers(sorter);
}
getStuff(tiers)
getSelected();
createFilters();
rederTiers(sorter);