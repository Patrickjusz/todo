$btnClear = $("#btn-clear");
$btnSave = $("#btn-save");
$btnAdd = $("#btn-add");
$btnSearch = $("#search-input");
btnActionSelector = ".btn-action";

$($btnClear).click(function () {
    task.clearEndedTasks();
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

$(document).on("click", ".checkbox-done", function () {
    task.updateState(this);
});

$($btnSave).click(function () {
    task.save(this);
});

$($btnAdd).click(function () {
    task.add(this);
});

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

// Example usage:

$($btnSearch).keyup(
    delay(function (e) {
        console.log("Time elapsed!", this.value);
        let searchValue = this.value;
        task.reloadTasks(searchValue);
    }, 400)
);
