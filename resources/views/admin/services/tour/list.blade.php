
@extends('admin.layout.app');

@section('firstLinkName')
Dashboard
@endsection



@section('mainbody')
<!-- boostrap employee model -->
<div class="modal fade" id="{{$tablename}}-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="modalTitle">Tour</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="{{$tablename}}Form" name="{{$tablename}}Form" class="row form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="{{$tablename}}_form_mode">
                    <input type="hidden" name="id" id="{{$tablename}}_form_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="{{$tablename}}_form_name" name="name" placeholder="Enter Name" maxlength="255" required>
                        </div>
                    </div>  
                    <div class="col-md-6 form-group pt-4">
                        <label for="name" class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-12">
                            <select type="text" class="form-control" id="{{$tablename}}_form_category" name="category" placeholder="Enter Categpry" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 form-group pt-4">
                        <label for="name" class="col-sm-2 control-label">Amount</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="{{$tablename}}_form_amount" name="amount" placeholder="Enter Amount" maxlength="255" required>
                        </div>
                    </div>
                    <div class="form-group pt-4">
                        <label for="name" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-12">
                            <textarea class="form-control" id="{{$tablename}}_form_description" name="description" placeholder="Enter Description" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10"><br/>
                        <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
  <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-flex flex-row align-items-center justify-content-between" style="height: 60px">
                    <h5 class="card-title fw-semibold text-capitalize">{{$tablename_plural}} {{--  - {{ app('request')->input('name') }} --}}</h5>
                    <button class="btn btn-dark text-capitalize" onclick="add()">Add {{$tablename}}</button>
                </div>
                <div class="table-responsive">
                  <table id="{{$tablename_plural}}_table" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4" style="border-bottom: 1px solid #ccc">
                      <tr>
                        <!-- <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th> -->
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Category</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Amount</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Actions</h6>
                        </th>
                        <!-- <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Priority</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Budget</h6>
                        </th> -->
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($tours as $key => $tour)  
                        <tr id="{{$tablename}}row_{{$tour->id}}">
                            <!-- <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$key+1}}</p>
                            </td> -->
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1" id="column_{{$tour->id}}_name">{{$tour->name}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal" id="column_{{$tour->id}}_category">{{$tour->category}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal" id="column_{{$tour->id}}_amount">{{$tour->amount}}</p>
                            </td>
                            <td class="border-bottom-0" colspan="2">
                                <button id="edit_{{$tour->id}}" class="btn btn-primary" onclick="editTour('{{$tour->id}}')" class="mb-0 fw-normal">Edit</button>
                                <button id="delete_{{$tour->id}}" class="btn btn-danger"  onclick="deleteTour('{{$tour->id}}')" class="mb-0 fw-normal">Delete</button>
                            </td>
                        </tr> 
                        @endforeach                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // $('#{{$tablename_plural}}_table').DataTable({
    //     scrollY: 350,
    //     info: false
    // });
});

function add(){
    $('#{{$tablename}}Form').trigger("reset");
    $('#modalTitle').html("Add {{$tablename}}s");
    $('#{{$tablename}}-modal').modal('show');
    $('#{{$tablename}}_form_id').val('');
    $('#{{$tablename}}_form_mode').val('new');
}   
     
function editTour(id){
    $.ajax({
        type:"POST",
        url: "{{ route('edit.tour') }}",
        data: { id },
        dataType: 'json',
        success: function(res){
            console.log(res);
            $('#modalTitle').html("Edit {{$tablename}}");
            $('#{{$tablename}}-modal').modal('show');
            $('#{{$tablename}}_form_mode').val('edit');
            $('#{{$tablename}}_form_id').val(res.id);
            $('#{{$tablename}}_form_name').val(res.name);
            $('#{{$tablename}}_form_amount').val(res.amount);
            $('#{{$tablename}}_form_description').val(res.description);
            $('#{{$tablename}}_form_category').val(res.category);
        }
    });
}  
 
function deleteTour(id){
    if (confirm("Delete Record?")) {
        var id = id;
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('delete.tour') }}",
            data: { id },
            dataType: 'json',
            success: function(res){
                console.log(res);
                document.getElementById('{{$tablename}}row_'+id).remove()
            }
        });
    }
}

const createTableRow = (data) => {
    var rowHTML = `<tr id="{{$tablename}}row_${data.id}">
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1" id="column_${data.id}_name">${data.name}</h6>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal" id="column_${data.id}_category">${data.category}</p>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal" id="column_${data.id}_amount">${(data.amount == null) ? '' : data.amount}</p>
                        </td>
                        <td class="border-bottom-0" colspan="2">
                            <button class="btn btn-primary" onclick="editTour('${data.id}')" class="mb-0 fw-normal">Edit</button>
                            <button class="btn btn-danger"  onclick="deleteTour('${data.id}')" class="mb-0 fw-normal">Delete</button>
                        </td>
                    </tr> `;
    $('#{{$tablename_plural}}_table tbody').append(rowHTML);
}

const updateTableRow = (data) => {
    document.getElementById(`column_${data.id}_name`).innerHTML = data.name;
    document.getElementById(`column_${data.id}_category`).innerHTML = data.category;
    document.getElementById(`column_${data.id}_amount`).innerHTML = data.amount;
}

$('#{{$tablename}}Form').submit(function(e) {
    e.preventDefault();
    // $("#btn-save"). attr("disabled", true);
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: "{{ route('save.tour') }}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            console.log(data);
            $("#{{$tablename}}-modal").modal('hide');
            if($('#{{$tablename}}_form_mode').val() == 'new'){
                createTableRow(data)
            }
            else{
                updateTableRow(data)    
            }
            // $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
        },
        error: function(data){
            console.log(data);
        }
    });
});
</script>
@endsection