/*
Adds a missing functionality in JS, searching indexOf in multidimensional arrays.
I hope they do this in spec someday, harder, better, faster, stronger.
*/
function indexofM(array,col,match){
    index = -1;
    for (k=0;k<array.length;k++){ if(array[k][col].toLowerCase() == match.toLowerCase()) {index = k;} }
    if (index > -1) {
    	return index;
    }
    else { return -1; }
}
function writedata(server,nome,data){
	////////// SEND DADOS TO SERVER
    /// Requires save.php to be present
    saveremote = new XMLHttpRequest();
    saveremote.open("POST", server+'save.php', true);
    saveremote.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    saveremote.send('save='+nome+'&dados='+JSON.stringify(data));
    console.log('sent: '+JSON.stringify(data));
    console.log('going for the save');
    saveremote.onload = function(){ 
    	remotedebug=saveremote.responseText;
    	console.log('save feedback:\n '+remotedebug);
    }
}
