<div class="task task-id-@{{id}} task-@{{priority}} animate__animated @{{animation}}">\
    {{-- animate__animated animate__bounceIn --}}\
    <div class="round">\
        <input class="checkbox-done" type="checkbox" id="checkbox-@{{id}}" data-id="@{{id}}" @{{checked}}>\
        <label for="checkbox-@{{id}}"></label>\
    </div>\
    <div class="desc desc-@{{id}} @{{special_css_class}}">\
        <div class="title">@{{title}}</div>\
        <div>@{{description}}</div>\
    </div>\
    <div class="time time-@{{id}} @{{time_area}}">\
        <button class="btn btn-success btn-sm btn-action" data-id="@{{id}}" data-action="edit"><i class="fas fa-edit"></i></button>\
        <button class="btn btn-danger btn-sm btn-action" data-id="@{{id}}" data-action="delete"><i class="fas fa-trash-alt"></i></button>\
    </div>\
</div>