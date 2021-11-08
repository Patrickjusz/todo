const { default: Swal } = require("sweetalert2");

$renderTasksWrapper = $("#render-tasks-wrapper");
$tashTitle = $("#task-title");
$taskDescription = $("#task-description");
$errorsWrapper = $("#task-edit-errors");
$btnSave = $("#btn-save");
$editModal = $("#editModal");
$formControl = $(".form-control");
$searchInput = $("#search-input");
taskClassName = "task-priority";

class Task {
    // config
    apiUrl = "/api/tasks";
    httpHeaders = { "X-Authorization": API_KEY };
    data = {};
    allowedSaveAction = ["add", "edit"];

    //Method
    reloadTasks(search) {
        if (search != "undefined") {
            data = { search: search };
        }

        $.ajax({
            method: "GET",
            url: this.apiUrl,
            headers: this.httpHeaders,
            data: data,
        })
            .done(function (data) {
                let html = "";
                let priority = 0;

                $(data).each(function (index, task) {
                    let injectData = {
                        id: task.id,
                        title: task.title,
                        description: task.description ? task.description : "-",
                        priority: task.priority,
                        special_css_class: task.state == "done" ? "done" : "",
                        checked: task.state == "done" ? "checked" : "",
                        time_area: task.state == "done" ? "hide" : "",
                    };

                    if (priority != task.priority) {
                        html =
                            html + handlebarsTemplatePriorityBadge(injectData);
                        priority = task.priority;
                    }

                    html = html + handlebarsTemplateItem(injectData);
                });

                $($renderTasksWrapper).empty();
                if (html) {
                    $($renderTasksWrapper).append(html);
                } else {
                    $($renderTasksWrapper).append(
                        "<div class='alert alert-warning'>Task not found!</div>"
                    );
                }
                console.log("Reload tasks...");
            })
            .fail(function (data) {
                //
            });
    }

    clearEndedTasks() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#4dbd74",
            cancelButtonColor: "#D0211C",
            confirmButtonText: "Yes, clear it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: this.apiUrl,
                    headers: this.httpHeaders,
                    async: false,
                    data: { all: 1 },
                })
                    .done()
                    .fail(function (data) {
                        //
                    });

                this.reloadTasks();
            }
        });
    }

    updateState(btn) {
        let isChecked = $(btn).is(":checked") ? true : false;
        let id = $(btn).data("id");

        data = { id: id, state: isChecked };

        if (isChecked) {
            $(".desc-" + id).addClass("done");
            $(".time-" + id).addClass("hide");
        } else {
            $(".desc-" + id).removeClass("done");
            $(".time-" + id).removeClass("hide");
        }

        $.ajax({
            method: "PUT",
            url: this.apiUrl,
            headers: this.httpHeaders,
            data: data,
            async: false,
        })
            .done(function (data, ev) {
                //
            })
            .fail(function (data) {
                //
            });
    }

    deleteTask(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#4dbd74",
            cancelButtonColor: "#D0211C",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: this.apiUrl + "/" + id,
                    headers: this.httpHeaders,
                    async: false,
                })
                    .done(function () {
                        var audio = new Audio("media/trash.mp3");
                        audio.play();
                    })
                    .fail(function (data) {
                        //
                    });

                this.reloadTasks();
            }
        });
    }

    editTask(id) {
        $($errorsWrapper).hide();
        this.clearForm();
        $($btnSave).data("id", id);
        $($btnSave).data("action", "edit");

        $.ajax({
            method: "GET",
            url: this.apiUrl + "/" + id,
            headers: this.httpHeaders,
            async: true,
        })
            .done(function (data) {
                $($tashTitle).val(data.title);
                $($taskDescription).val(data.description);

                $('input:radio[name="' + taskClassName + '"]')
                    .filter('[value="' + data.priority + '"]')
                    .prop("checked", true);

                console.log(data.priority);
                $($editModal).modal("show");
            })
            .fail(function (data) {
                //
            });
    }

    validateEditInputs(title, description, priority) {
        let errors = [];
        $($formControl).removeClass("is-invalid");

        if (title.length == "") {
            errors.push("The name is required!");
            $($tashTitle).addClass("is-invalid");
        }

        if (title.length > 255) {
            errors.push("The name is too long !");
        }

        if (description.length > 1024) {
            errors.push("The description is to long!");
        }

        if (!priority) {
            errors.push("The priority is required!");
        }

        if (priority <= 0 || priority > 3) {
            errors.push("Bad priority value!");
        }

        return errors;
    }

    hideErrors() {
        $($errorsWrapper).hide();
        $($errorsWrapper).text("");
    }

    clearForm() {
        this.hideErrors();
        $($tashTitle).val("");
        $($taskDescription).val("");
        $('input:radio[name="' + taskClassName + '"]').prop("checked", false);
        $($btnSave).data("id", 0);
        $($btnSave).data("action", "");
        $($formControl).removeClass("is-invalid");
        $($searchInput).val("");
        $($btnSave).prop("disabled", false);
    }

    add() {
        this.clearForm();
        $($btnSave).data("action", "add");
        $($editModal).modal("show");
    }

    save() {
        let id = $($btnSave).data("id");
        let action = $($btnSave).data("action");
        let httpMethod;

        if (this.allowedSaveAction.indexOf(action) != -1) {
            if (action == "edit") {
                httpMethod = "PUT";
            } else if (action == "add") {
                httpMethod = "POST";
            }

            let title = $($tashTitle).val();
            let description = $($taskDescription).val();
            let priority = $("input[name=" + taskClassName + "]:checked").val();

            let errors = this.validateEditInputs(title, description, priority);

            if (errors.length > 0) {
                this.hideErrors();
                $(errors).each(function (index, message) {
                    $($errorsWrapper).append(message + "<br>");
                    $($errorsWrapper).show();
                });
            } else {
                this.hideErrors();
                $($btnSave).prop("disabled", true);

                var thisClass = this;
                $.ajax({
                    method: httpMethod,
                    url: this.apiUrl,
                    headers: this.httpHeaders,
                    data: {
                        id: id,
                        title: title,
                        description: description,
                        priority: priority,
                    },
                    async: false,
                })
                    .done(function (data) {
                        thisClass.reloadTasks();
                        $($editModal).modal("hide");
                        thisClass.clearForm();
                    })
                    .fail(function (data) {
                        let errors = [];
                        $(data.responseJSON.errors).each(function (
                            index,
                            element
                        ) {
                            var unkownKey = Object.keys(element)[0];
                            errors.push(element[unkownKey][0]);
                        });

                        Swal.fire("Problem!", errors[0], "error");
                    })
                    .always(function () {
                        $($btnSave).removeAttr("disabled");
                    });
            }
        }
    }
}

task = new Task();
task.reloadTasks();
