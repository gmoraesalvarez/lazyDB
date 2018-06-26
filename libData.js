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
