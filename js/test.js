function showDeck(){
	var decks = document.getElementById('decks').value;
	
	if (decks ==""){
		document.getElementById("deckList").innerHTML = "";
		return;
	}
	else{
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("deckList").innerHTML = this.responseText;
			
			}
		};
		
	xmlhttp.open("GET", "getdeck.php?q="+decks,true);
	xmlhttp.send();		
	
	}
}

function showHands(){
	 var hands = document.getElementById('drawCards').value;
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("cardHands").innerHTML = this.responseText;
			
			}
		};
		
	xmlhttp.open("GET", "draw.php?q="+hands,true);
	xmlhttp.send();		
	$("#addHands").empty(); 
}

function addHand(){
	
	var list = document.getElementById('addCard').value;
	
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
	
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("addHands").innerHTML = this.responseText;
			}
		};
	xmlhttp.open("GET", "add.php?q="+list,true);
	xmlhttp.send();	
	

}