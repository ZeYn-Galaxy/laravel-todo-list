const taskItem = document.querySelector("#task-item");
const taskUpdate = document.querySelector("#task-update");
const formUpdate = document.querySelector("#formUpdate");

formUpdate.addEventListener("submit", () => {
    taskUpdate.value = taskItem.value
})