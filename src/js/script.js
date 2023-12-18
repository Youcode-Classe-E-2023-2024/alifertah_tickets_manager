let assigneeSelect = document.getElementById("assignees");
let selectedAssignees = [];
assigneeSelect.addEventListener("change", function () {
  console.log(selectedAssignees);
    let selectedOption = this.options[this.selectedIndex];
    selectedAssignees.push(selectedOption.value);
    selectedOption.style.display = "none";
});