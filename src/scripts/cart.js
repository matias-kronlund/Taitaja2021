let transdata = []
let shipping = "";
let url_str = window.location.href;
let url = new URL(url_str);
let data = url.searchParams.get("d");
console.log(data);
let renderTable = ()=> {
    let i = data.split("-");
    for(let it of i){
        for(let td of tiers){
            let t = td.Merkki+td.Malli;
            t = t.replace(" ","");
            if(t == it.split("|")[0]){
                let row = document.createElement("div");
                let rm = document.createElement("div");
                rm.innerHTML = td.Merkki;
                let rk = document.createElement("div");
                rk.innerHTML = td.Koko;
                let tm = document.createElement("div");
                tm.innerHTML = it.split("|")[1];
                let hinta = document.createElement("div");
                hinta.innerHTML = td.Hinta;
                row.appendChild(rm)
                row.appendChild(rk)
                row.appendChild(tm)
                row.appendChild(hinta)
                row.classList.add("table");
                transdata.push(
                    [
                        `${td.Merkki} ${td.Malli}`,
                        td.Hinta,
                        it.split("|")[1]
                    ]
            )
                document.getElementById("tablecon").appendChild(row);
            }
        }
    }

    
    //for(let )
}
console.log(transdata);
renderTable();
let shippingButtons = ()=>{
    let btns = document.getElementsByClassName("shipb");
    for(let btn of btns){
        btn.onclick = ()=>{
            for(let b of btns){
                b.classList.remove("activeb");
            }
            btn.classList.add("activeb");
            shipping = btn.innerHTML;
        }
    }
}
shippingButtons();