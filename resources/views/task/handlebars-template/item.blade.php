<div class="task task-@{{priority}}">\
    <div class="round">\
        <input type="checkbox" id="checkbox-@{{id}}">\
        <label for="checkbox-@{{id}}"></label>\
    </div>\
    <div class="desc">\
        <div class="title">@{{title}}</div>\
        <div>@{{description}}</div>\
    </div>\
    <div class="time">\
        <button class="btn btn-success btn-sm btn-action" data-id="@{{id}}" data-action="edit"><i class="fas fa-edit"></i></button>\
        <button class="btn btn-danger btn-sm btn-action" data-id="@{{id}}" data-action="delete"><i class="fas fa-trash-alt"></i></button>\
    </div>\
</div>