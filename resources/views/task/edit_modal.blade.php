<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit task</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="task-title">Title</label>
                    <input type="text" class="form-control" id="task-title" placeholder="Enter task title"
                        maxlength="255">
                </div>

                <div class="form-group">
                    <label for="task-description">Description</label>
                    <textarea class="form-control" id="task-description" rows="4" maxlength="1024"></textarea>
                </div>

                <div>
                    <p>Task priority</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="task-priority" id="priority-1" value="1">
                        <label class="form-check-label" for="priority-1">
                            <span class="badge badge-danger priority-edit-badge">High priority</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="task-priority" id="priority-2" value="2">
                        <label class="form-check-label" for="priority-2">
                            <span class="badge badge-warning priority-edit-badge">Medium priority</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="task-priority" id="priority-3" value="3">
                        <label class="form-check-label" for="priority-3">
                            <span class="badge badge-success priority-edit-badge">Low priority</span>
                        </label>
                    </div>
                </div>

                <div id="task-edit-errors" class="alert alert-danger">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                <button id="btn-save" type="button" class="btn btn-success" data-action="" data-id="">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>
