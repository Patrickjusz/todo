$btnClear = $("#btn-clear");
$btnSave = $("#btn-save");
$btnAdd = $("#btn-add");
$btnSearch = $("#search-input");
$closeModal = $(".close-modal");
btnActionSelector = ".btn-action";
checkboxDoneSelector = ".checkbox-done";

$($btnClear).click(function () {
    task.clearEndedTasks();
});

$($btnSave).click(function () {
    task.save(this);
});

$($btnAdd).click(function () {
    task.add(this);
});

$($closeModal).click(function () {
    task.hideModalAndClearData();
});

$(document).on("click", checkboxDoneSelector, function () {
    task.updateState(this);
});

$(document).on("click", btnActionSelector, function (ev) {
    var id = $(this).data("id");
    var action = $(this).data("action");

    if (id > 0) {
        if (action == "delete") {
            task.deleteTask(id);
        } else if (action == "edit") {
            task.editTask(id);
        }
    }
});

$($btnSearch).keyup(
    delay(function (e) {
        console.log("Time up!", this.value);
        let searchValue = this.value;
        task.reloadTasks(searchValue);
    }, 400)
);

function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}
