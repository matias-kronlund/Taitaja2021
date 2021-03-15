let cart = [];
let cartAdd = (item)=> {
    let e = false;
    let i2 = 0;
    for(let i of cart){
        let t = item.Merkki+item.Malli;
        t = t.replace(" ","");
        if(i.mn == t){
            cart[i2].amount++;
            e = true;
        }
        i2++;
    }
    if(!e){
        let t = item.Merkki+item.Malli;
        t = t.replace(" ","");
        cart.push({mn:t, amount:1})
        console.log(t.replace(" ", ""))
    }
}
let gotoCart= ()=>{
    let st = "d="
    let i2 = 0;
    for(let i of cart){
        if(i2 != cart.length-1){
            st += i.mn + "|" + i.amount + "-";
        }else{
            st += i.mn + "|" + i.amount;
        }
        i2++;
    }
    window.location.href = "kassa.php?"+st;
}