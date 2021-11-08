$btnReload = $("#btn-reload");
btnActionSelector = ".btn-action";

$($btnReload).click(function () {
    task.reloadTasks();
});

$(document).on("click", btnActionSelector, function (ev) {
    var id = $(this).data("id");
    if (id > 0) {
        task.deleteTask(id);
    }
});
