function showHxContent(pNumber){
	vDiv = document.getElementById("title" + pNumber);
	vDiv.style.display = "block";
  }

function hideAllDivs () {
	vDivs = document.getElementsByTagName ("div");
	for (var i=0; i<vDivs.length; i++) {
		vDivs.item(i).style.display ="none";
	}
}

function alertTitle() {
	vHx = document.getElementsByTagName("h1");
	vIndice = document.getElementById("title").value;
	vIndice = vIndice - 1;
	alert(vHx[vIndice].innerHTML);
}

function deleteTitle() {
	document.body.removeChild(document.getElementById("essai"));
}

function defineTitle() {
	let titre = h1
	if (document.getElementsByTagName("h1"))
	document.body.removeChild(document.getElementById("essai"));
	let = prompt("Tapez votre nouveau titre")
	/*utilisé condition pour dire "si titre existe, 
	effacer puis ecrire" */
}