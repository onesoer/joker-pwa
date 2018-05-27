// Let us open our database
var DBOpenRequest = window.indexedDB.open("joker", 4);

DBOpenRequest.onsuccess = function(event) {
  db = DBOpenRequest.result;
  // Run the addData() function to add the data to the database
  addData();
};

function addData() {
  // Create a new object ready to insert into the IDB
  var user = [ { nama: "akakom", email: "akakom@gmail.com", pass : "akakom", noKontak : "021-3191000"} ];

  // open a read/write db transaction, ready for adding the data
  var transaction = db.transaction(["joker"], "readwrite");

  // create an object store on the transaction
  var objectStore = transaction.objectStore("toDoList");

  // Make a request to add our newItem object to the object store
  var objectStoreRequest = objectStore.add(user[0]);
};
