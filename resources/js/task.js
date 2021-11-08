$renderTasksWrapper = $("#render-tasks-wrapper");

class Task {
    // config
    apiUrl = "/api/tasks";
    httpHeaders = { "X-Authorization": API_KEY };
    data = {};

    //Method
    reloadTasks() {
        $.ajax({
            method: "GET",
            url: this.apiUrl,
            headers: this.httpHeaders,
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
                    };

                    if (priority != task.priority) {
                        html =
                            html + handlebarsTemplatePriorityBadge(injectData);
                        priority = task.priority;
                    }

                    html = html + handlebarsTemplateItem(injectData);
                });

                $($renderTasksWrapper).empty();
                $($renderTasksWrapper).append(html);
                console.log("Reload tasks...");
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
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: this.apiUrl + "/" + id,
                    headers: this.httpHeaders,
                })
                    .done(this.reloadTasks())
                    .fail(function (data) {
                        //
                    });

                this.reloadTasks();
            }
        });
    }
}

task = new Task();
task.reloadTasks();

// setInterval(function () {
//     task.reloadTasks();
// }, 10000);

// Swal.fire("Good job!", "You clicked the button!", "success");
