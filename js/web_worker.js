

function listPropeties(){
    var latest_properties=[{'title':'Villa Brezovice','loc':'Brezovice','price':'$10,000','image':'img/properties/house.jpg'},
                        {'title':'Penthouse','loc':'Prishtine','price':'$500,000','image':'img/properties/winterhouse.jpg'},
                        {'title':'Shtepi Familjare','loc':'Tirana','price':'$84,000','image':'img/properties/summerhouse.jpg'}]

    for (let index = 0; index < latest_properties.length; index++) {
        postMessage(latest_properties[index]);    
    }
}

if(window!=self)
{
    listPropeties();
}
