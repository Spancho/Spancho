/**
 *  (SL08) This function returns a list of certain types of elements in a div.
 *  The general idea is that you grab parent div, and then it finds all
 *  input/checkbox elements.  It puts the names in an array, allowing for
 *  auto saving based on what is in the parent div.
 *  Takes a parent div id, and returns an array of arrays
 *  @return an array containing arrays (example: return[0] is a checkbox element name array  
 */
function getArraysOfElements(parentDivName){
  // return an array of arrays (object)
  var myElementList=document.getElementById(parentDivName);
  var myElementListItems= myElementList.getElementsByTagName("input");
  var myElementListItemsB = myElementList.getElementsByTagName("textarea"); //have to join text areas separately
  
  
  var listOfCBElements = new Array();
  for (i=0; i<myElementListItems.length; i++){
    // Get checkbox input type elements
	if(myElementListItems[i].type == 'checkbox'){
	  listOfCBElements.push(myElementListItems[i].id);
	}
  }
  for (i=0; i<myElementListItemsB.length; i++){
    // Get checkbox input type elements
	if(myElementListItemsB[i].type == 'checkbox'){
	  listOfCBElements.push(myElementListItemsB[i].id);
	}
  }
  
  var listOfDateElements = new Array();
  for (i=0; i<myElementListItems.length; i++){
    // Get date input type elements
	if(myElementListItems[i].id.substr(-5, 5).indexOf('_date') != -1){
	  listOfDateElements.push(myElementListItems[i].id);
	}   
  }
  for (i=0; i<myElementListItemsB.length; i++){
    // Get date input type elements
	if(myElementListItemsB[i].id.substr(-5, 5).indexOf('_date') != -1){
	  listOfDateElements.push(myElementListItemsB[i].id);
	}   
  }
  
  var listOfTextElements = new Array();
  for (i=0; i<myElementListItems.length; i++){
    // Get text input type elements
	if(myElementListItems[i].id.substr(-5, 5).indexOf('_text') != -1){
	  listOfTextElements.push(myElementListItems[i].id);
	}
  }
  for (i=0; i<myElementListItemsB.length; i++){
    // Get text input type elements
	if(myElementListItemsB[i].id.substr(-5, 5).indexOf('_text') != -1){
	  listOfTextElements.push(myElementListItemsB[i].id);
	}
  }
  
  var finalArray = new Array();
  finalArray[0] = (listOfCBElements);  // position 0 - checkbox elements
  finalArray[1] = (listOfDateElements);  // position 1 - date elements
  finalArray[2] = (listOfTextElements); // position 2 - text elements
  return finalArray;
}


/**
 * This method creates an object with the values from arrayString.<br><br> 
 *
 *
 * @param arrayString - a string formatted so can be split into an array, containing the values to populate an object 
 * @param fieldDelimiter - field delimiter, used to delimit one field from another: default '<|*f^|>'
 * @param valueDelimiter - value delimiter, used to delimit values (key from value) within a field: default '<|*v^|>'
 * @param array - if array is null, then it will return an object, if array is not null, then it will return an array
 * @return - an object (or array: see param array) with values populated from values from arrayString
 */
function createObjectFromArrayString(arrayString, fieldDelimiter, valueDelimiter, arrayInd) {
	if (fieldDelimiter == null || fieldDelimiter == ''){
		fieldDelimiter = "<|*f^|>";
	}
	if (valueDelimiter == null || valueDelimiter == ''){
		valueDelimiter = "<|*v^|>";
	}

	var object = new Object();
	if (arrayInd != null){
		//alert("is array");
		object = new Array();
	} 
	
	if (arrayString == null || arrayString == ""){
		return null;
	}
	
	var topArray = arrayString.split(fieldDelimiter);
	for (var i = 0; i < topArray.length; i++){
		var inArray = topArray[i].split(valueDelimiter);
		if (i == 0 && inArray.length == 1){
			object = null;
			break;
		}
		object[inArray[0]] = inArray[1];
	}
	
	  
	return object;
}

/**
 * This method creates an object with the values from arrayString.<br><br> 
 *
 *
 * @param arrayString - a string formatted so can be split into an array, containing the values to populate an object 
 * @param fieldDelimiter - field delimiter, used to delimit one field from another: default '<|*f^|>'
 * @param valueDelimiter - value delimiter, used to delimit values (key from value) within a field: default '<|*v^|>'
 * @param array - if array is null, then it will return an object, if array is not null, then it will return an array
 * @return - an object (or array: see param array) with values populated from values from arrayString
 */
function createObjectFromArrayString(arrayString, fieldDelimiter, valueDelimiter, arrayInd) {
	if (fieldDelimiter == null || fieldDelimiter == ''){
		fieldDelimiter = "<|*f^|>";
	}
	if (valueDelimiter == null || valueDelimiter == ''){
		valueDelimiter = "<|*v^|>";
	}

	var object = new Object();
	if (arrayInd != null){
		//alert("is array");
		object = new Array();
	} 
	
	if (arrayString == null || arrayString == ""){
		return null;
	}
	
	var topArray = arrayString.split(fieldDelimiter);
	for (var i = 0; i < topArray.length; i++){
		var inArray = topArray[i].split(valueDelimiter);
		if (i == 0 && inArray.length == 1){
			object = null;
			break;
		}
		object[inArray[0]] = inArray[1];
	}
	
	return object;
}
/**
 * takes string and returns string with 'bad' characters replaced with 'good' characters.
 */
function filterBadCharacters(string){
	//alert(string);
	string = string.replace(/&/g,'%26'); // replace & (ampersand) with hexidecimal value so it can go through to php
	string = string.replace(/%/g,'%25'); // replace % (percent) with hexidecimal value so it can go through to php
	
	//unescape('%26');
    //String.fromCharCode(38);
    //string = string.replace("\n", " ");
    //string = string.replace(/%0D/, ""); // \r 
	
	return string;
}

function isObjEmpty(object){
	for(var prop in object){
		return false;
	}
	return true;
}

/**
 * This method compares two objects with identical variable fields and checks against differences in variable values.<br>
 * Case 1: object 1 values are identical to object 2 values = return null <br> 
 * Case 2: object 1 values are identical to object 2 values = builds new arrays containing only the variable properties and values that have changed. <br><br> 
 *
 * Note: object1 and object2 are interchangeable.  The return will be in the same order as the input. 
 *   
 * 
 * @param object1 - object to compare
 * @param object2 - object to compare
 * @param fieldDelimiter - field delimiter, used to delimit one field from another: default '<|*f^|>'
 * @param valueDelimiter - value delimiter, used to delimit values (key from value) within a field: default '<|*v^|>' 
 * @return - an array of arrays if there are changes, or null if no changes <br>
 *		The Array has the following objects in it (numbered by position): <br>
 *			[0] Object of object1 containing only fields that have changed
 *			[1] Object of object2 containing only fields that have changed
 *			[2] arrayString of object1 keys and values of fields that have changed (to pass to PHP)
 *			[3] arrayString of object2 keys and values of fields that have changed (to pass to PHP)
 */

function compareForSave(object1, object2, fieldDelimiter, valueDelimiter) {
	
	if (fieldDelimiter == null || fieldDelimiter == ''){
		fieldDelimiter = "<|*f^|>";
	}
	if (valueDelimiter == null || valueDelimiter == ''){
		valueDelimiter = "<|*v^|>";
	}
	
	//Create new objects to populate with only data that has changed
	var object1ChangesObject = new Object();
	var object2ChangesObject = new Object();
	
	//Create strings that can be sent to php to build the same array as we will build here
	var obj1ArrayString = new String();
	var obj2ArrayString = new String();
	
	//Make sure that we run the loop on an object that has data (in case one is empty; if both are empty it won't matter)
	var priLoopObject = object1;
	var secLoopObject = object2;
	
	var priChangesObject = object1ChangesObject;
	var secChangesObject = object2ChangesObject;
	
	var priArrayString = obj1ArrayString;
	var secArrayString = obj2ArrayString;
	
	if (isObjEmpty(priLoopObject)){

		priLoopObject = object2;
		secLoopObject = object1;
		
		priChangesObject = object2ChangesObject;
		secChangesObject = object1ChangesObject;
		
		priArrayString = obj2ArrayString;
		secArrayString = obj1ArrayString;
	}
	//End of section to make sure method is reversible
		

	var i = 0; //to keep count of loop#

	for(var prop in priLoopObject){
		if(prop[0] == '_'){
			continue;
		}
		
		//If the field is undefined, set is as blank - this will fix comparisons
		if (typeof(priLoopObject[prop])=="undefined"){
			priLoopObject[prop] = '';
		} 
		if (typeof(secLoopObject[prop])=="undefined"){
			secLoopObject[prop] = '';
		}
		
		if (priLoopObject[prop] == secLoopObject[prop]){
			//alert("field is same  :  " + prop + ' = ' + priLoopObject[prop] + ' / ' + secLoopObject[prop] + " doesFieldExist? " + (typeof(priLoopObject[prop])=="undefined") + " / " + (typeof(secLoopObject[prop])=="undefined"));
			continue; //can take out if need to put something in below the else, otherwise this works
		} else {
			//Add values to objects
			priChangesObject[prop] = priLoopObject[prop];
			secChangesObject[prop] = secLoopObject[prop];
			
			//Build string representations of objects
			if (i != 0){
				priArrayString = priArrayString + fieldDelimiter;
				secArrayString = secArrayString + fieldDelimiter;
			}
			priArrayString = priArrayString + prop + valueDelimiter + priLoopObject[prop];
			secArrayString = secArrayString + prop + valueDelimiter + secLoopObject[prop];
		}
		
		
		i++;
		//if (i>=5){ // just for testing 
		//	break;
		//}
	}
	//Because JavaScript doesn't update strings, only objects (if given a different name), I have to reverseLookup and set the strings

	if (!isObjEmpty(priLoopObject)){
		obj1ArrayString = priArrayString;
		obj2ArrayString = secArrayString;
	} else {
		obj2ArrayString = priArrayString;
		obj1ArrayString = secArrayString;
	}
	//If the two change objects have data, then return them.  Otherwise there have not been changes so return null.
	if (!isObjEmpty(object1ChangesObject) && !isObjEmpty(object2ChangesObject)){
		return new Array(object1ChangesObject, object2ChangesObject, filterBadCharacters(obj1ArrayString), filterBadCharacters(obj2ArrayString)); 
	} else {
		
		return null;
	}

	//return new Array(object1ChangesObject, object2ChangesObject);
}

