function matriceClick(e){ 
	if (e.target.className == "positionVide")
    	e.target.className = "positionBouteille";
    else
    	e.target.className = "positionVide";

    var positionBouteile = document.getElementsByClassName("positionBouteille");
    var emplacement = document.getElementById("emplacement");
    var i;
		for (i = 0; i < positionBouteile.length; i++) {
		    emplacement.value += positionBouteile[i].id;
		}

	alert(emplacement.value);
}