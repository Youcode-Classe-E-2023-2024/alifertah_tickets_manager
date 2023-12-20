let assigneeSelect = document.getElementById("assignees");
let tags = document.getElementById("tags");

let selectedTags = [];
let selectedAssignees = [];

assigneeSelect.addEventListener("change", function () {
    let selectedOption = this.options[this.selectedIndex];
    selectedAssignees.push(selectedOption.value);
    selectedOption.style.display = "none";
});


tags.addEventListener("change", function(){
  let selectedTag = this.options[this.selectedIndex];
  selectedTags.push(selectedTag.value);
  selectedTag.style.display = "none";
})

function submitForm() {
 fetch("process.php", {
  method: "POST",
  headers: {
    "Content-Type" : "application/json",
  },
  body: JSON.stringify({items: selectedAssignees})
 })

 .then(response => response.json())
 .then(data =>{
  console.log("Success", data);
 })
 .catch((error) => {
      console.error('Error:', error);
  });
}

function submitTags() {
  fetch("processTags.php", {
   method: "POST",
   headers: {
     "Content-Type" : "application/json",
   },
   body: JSON.stringify({items: selectedAssignees})
  })
 
  .then(response => response.json())
  .then(data =>{
   console.log("Success", data);
  })
  .catch((error) => {
       console.error('Error:', error);
   });
 }