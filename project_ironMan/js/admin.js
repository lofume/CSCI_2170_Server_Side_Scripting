/** By Crystal Parker cr838048@dal.ca */

/*
This code to implement ajax delete for admin page has been used with some modification from the submission for 
Assignment 3 by Student Crystal Parker in CSCI 2170 (Fall 2021).
Crystal, Assignment 4: CSCI 2170 (Fall 2021), Faculty of Computer Science, Dalhousie 
University. Available online on Gitlab at [URL]: https://git.cs.dal.ca/courses/2021-fall/csci-2170/a3/cparker/-/blob/master/A3/js/scripts.js
Date accessed: Dec 6th 2021.
*/ 

$(document).ready(function(){
    $("#database-table").on('click', '.deleteItem', function(){
        console.log("Clicked");
        // This is easier with buttons... had to figure out where to find value.
		//console.log($(this)[0].attributes.value.value);
		// using jquery to delete item when button clicked.
			// get the value/l_id
			let val = $(this)[0].attributes.value.value;
			//console.log(val);
			url = "includes/adminProcessing.php?delete="+val;
			getDataFromServer(url);
});
});

// Followed along with video/lecture week 5, modified and reused from ass#3
function getDataFromServer(url) {
	// get the list container
	let databaseTable = document.querySelector("#database-table");

	// (1) Create the Ajax/Async request object (XMLHttpRequest)
	let ajaxObject = new XMLHttpRequest();

	// (2) Open the connection with the server
	// open("METHOD", "name-of-script-on-the-server-to-handle-request", "async-or-not-boolean")
	ajaxObject.open("GET", url, true);

	// (3) Configure event handling/management when data is received from the server
	// readyState = 4 | status = 200 (OK)
	// onreadystatechange (event listener)
	ajaxObject.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			// Only change the content if you delete content
			if(this.responseText!=""){
				databaseTable.innerHTML = this.responseText;
            }
		}
	}

	// (4) Send the request to the server
	ajaxObject.send();
}