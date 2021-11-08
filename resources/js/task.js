$renderTasksWrapper = $("#render-tasks-wrapper");
$tashTitle = $("#task-title");

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
                        description: task.description,
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
                    .done()
                    .fail(function (data) {
                        //
                    });

                this.reloadTasks();
            }
        });
    }

    editTask(id) {
        $("#task-edit-errors").hide();
        this.clearForm();
        $("#btn-save").data("id", id);
        $("#btn-save").data("action", "edit");

        $.ajax({
            method: "GET",
            url: this.apiUrl + "/" + id,
            headers: this.httpHeaders,
            async: true,
        })
            .done(function (data) {
                $($tashTitle).val(data.title);
                $("#task-description").val(data.description);

                $('input:radio[name="task-priority"]')
                    .filter('[value="' + data.priority + '"]')
                    .prop("checked", true);

                console.log(data.priority);
                $("#exampleModalCenter").modal("show");
            })
            .fail(function (data) {
                //
            });
    }

    validateEditInputs(title, description, priority) {
        let errors = [];
        if (title.length == "") {
            errors.push("The name is required!");
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

    clearForm() {
        $("#task-edit-errors").hide();
        $($tashTitle).val("");
        $("#task-description").val("");
        $('input:radio[name="task-priority"]').prop("checked", false);
        $("#btn-save").data("id", 0);
        $("#btn-save").data("action", "");
    }

    add() {
        this.clearForm();
        $("#btn-save").data("action", "add");
        $("#exampleModalCenter").modal("show");
    }

    save() {
        let id = $("#btn-save").data("id");
        let action = $("#btn-save").data("action");
        let httpMethod;

        if (this.allowedSaveAction.indexOf(action) != -1) {
            if (action == "edit") {
                httpMethod = "PUT";
            } else if (action == "add") {
                httpMethod = "POST";
            }

            let title = $($tashTitle).val();
            let description = $("#task-description").val();
            let priority = $("input[name=task-priority]:checked").val();

            let errors = this.validateEditInputs(title, description, priority);

            if (errors.length > 0) {
                $("#task-edit-errors").text("");
                $(errors).each(function (index, message) {
                    $("#task-edit-errors").append(message + "<br>");
                    $("#task-edit-errors").show();
                });
            } else {
                $("#task-edit-errors").hide();
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
                        $($tashTitle).val("");
                        $("#task-description").val("");
                        $("#exampleModalCenter").modal("hide");
                    })
                    .fail(function (data) {
                        //
                    });

                this.reloadTasks();
                this.clearForm();
            }
        }
    }
}

task = new Task();
task.reloadTasks();

// setInterval(function () {
//     task.reloadTasks();
// }, 3000);

// Swal.fire("Good job!", "You clicked the button!", "success");
