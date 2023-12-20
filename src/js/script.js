let assigneeSelect = document.getElementById("assignees");
let selectedAssignees = [];
assigneeSelect.addEventListener("change", function () {
    let selectedOption = this.options[this.selectedIndex];
    selectedAssignees.push(selectedOption.value);
    selectedOption.style.display = "none";
});

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