
@extends('admin.layout.app');

@section('firstLinkName')
Dashboard
@endsection



@section('mainbody')
<!-- boostrap employee model -->
<div class="modal fade" id="hotel-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="HotelForm" name="HotelForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="hotel_form_mode">
                    <input type="hidden" name="id" id="hotel_form_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="hotel_form_name" name="name" placeholder="Enter Name" maxlength="255" required>
                        </div>
                    </div>  
                    <div class="form-group pt-4">
                        <label for="name" class="col-sm-2 control-label">Location</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="hotel_form_location" name="location" placeholder="Enter Location" maxlength="255" required>
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
                <div class="d-flex flex-row align-items-center justify-content-between">
                    <h5 class="card-title fw-semibold mb-4">{{$heading}}</h5>
                    <button class="btn btn-primary" onclick="add()">Add Hotel</button>
                </div>
                <div class="table table-responsive">
                  <table id="hotels_table" class="table text-nowrap mb-0 align-middle stripe">
                    <thead class="text-dark fs-4" style="border-bottom: 1px solid #ccc">
                      <tr>
                        <!-- <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th> -->
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Location</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Rating</h6>
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
                        @foreach($hotels as $key => $hotel)  
                        <tr id="hotelrow_{{$hotel->id}}">
                            <!-- <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$key+1}}</p>
                            </td> -->
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1" id="column_{{$hotel->id}}_name">{{$hotel->name}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal" id="column_{{$hotel->id}}_location">{{$hotel->location}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal" id="column_{{$hotel->id}}_rating">{{$hotel->rating}}</p>
                            </td>
                            <td class="border-bottom-0" colspan="2">
                                <button id="edit_{{$hotel->id}}" class="btn btn-primary" onclick="editHotel('{{$hotel->id}}')" class="mb-0 fw-normal">Edit</button>
                                <button id="delete_{{$hotel->id}}" class="btn btn-danger"  onclick="deleteHotel('{{$hotel->id}}')" class="mb-0 fw-normal">Delete</button>
                            </td>
                        </tr> 
                        @endforeach                      
                    </tbody>
                  </table>
                </div>
                <!-- <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-12 mb-sm-0">
                    <h5 class="card-title fw-semibold">{{$heading}}</h5>
                  </div>
                  
                </div> -->
                <!-- <div id="chart"></div> -->
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
});

function add(){
    $('#HotelForm').trigger("reset");
    $('#modalTitle').html("Add Hotel");
    $('#hotel-modal').modal('show');
    $('#hotel_form_id').val('');
    $('#hotel_form_mode').val('new');
}   
     
function editHotel(id){
    $.ajax({
        type:"POST",
        url: "{{ route('edit.hotel') }}",
        data: { id },
        dataType: 'json',
        success: function(res){
            $('#modalTitle').html("Edit Hotel");
            $('#hotel-modal').modal('show');
            $('#hotel_form_mode').val('edit');
            $('#hotel_form_id').val(res.id);
            $('#hotel_form_name').val(res.name);
            $('#hotel_form_location').val(res.location);
        }
    });
}  
 
function deleteHotel(id){
    if (confirm("Delete Record?")) {
        var id = id;
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('delete.hotel') }}",
            data: { id },
            dataType: 'json',
            success: function(res){
                debugger;
                document.getElementById('hotelrow_'+id).remove()
            }
        });
    }
}

const createTableRow = (data) => {
    debugger;
    var rowHTML = `<tr id="hotelrow_${data.id}">
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">${data.name}</h6>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">${data.location}</p>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">${data.rating}</p>
                        </td>
                        <td class="border-bottom-0" colspan="2">
                            <button class="btn btn-primary" onclick="editHotel(${data.id})" class="mb-0 fw-normal">Edit</button>
                            <button class="btn btn-danger"  onclick="deleteHotel(${data.id})" class="mb-0 fw-normal">Delete</button>
                        </td>
                    </tr> `;
    $('#hotels_table tbody').append(rowHTML);
}

const updateTableRow = (data) => {
    debugger;
    document.getElementById(`column_${data.id}_name`).innerHTML = data.name;
    document.getElementById(`column_${data.id}_location`).innerHTML = data.location;
    document.getElementById(`column_${data.id}_rating`).innerHTML = data.rating;
}

$('#HotelForm').submit(function(e) {
    e.preventDefault();
    // $("#btn-save"). attr("disabled", true);
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: "{{ route('save.hotel') }}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            $("#hotel-modal").modal('hide');
            if($('#hotel_form_mode').val() == 'new'){
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