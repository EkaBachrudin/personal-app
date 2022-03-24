{{-- MODAL CREATE --}}
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title modal-title" id="modalAddLabel">Create Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="create">
            <div class="form-group mb-2">
                <label for="task-from">Task From</label>
                <input type="text" name="task-from" id="task-from" class="form-control" autocomplete="off" />
            </div>
            <div class="form-group mb-2">
                <label for="title">Title Task</label>
                <input type="text" name="title" id="title" class="form-control" autocomplete="off"/>
            </div>
            <div class="form-group mb-2">
                <label for="task">Task</label>
                <textarea name="task" id="task" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="submitCreate()">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  {{-- MODAL EDIT --}}
  <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title modal-title" id="modalEditLabel">Edit Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="edit">
            <div class="form-group mb-2">
                <label for="task-from">Task From</label>
                <input type="text" name="task-from" id="task-from" class="form-control" autocomplete="off" />
            </div>
            <div class="form-group mb-2">
                <label for="title">Title Task</label>
                <input type="text" name="title" id="title" class="form-control" autocomplete="off"/>
            </div>
            <div class="form-group mb-2">
                <label for="task">Task</label>
                <textarea name="task" id="task" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <div>
            <a href="#" class="ti ti-checkbox text-success" style="font-size: 30px" onclick=""></a>
            <a href="#" class="ti ti-trash-off text-danger" style="font-size: 30px" onclick=""></a>
          </div>
          <div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>