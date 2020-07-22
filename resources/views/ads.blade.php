@extends('layout.layout')
@section('style')
<style type="text/css">
.desabled {
    pointer-events: none;
}
</style>
@endsection
@section('content')
<div class="" style="padding:0px 10px;">
    <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage Advertisements</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a data-target="#add-modal" class="btn btn-success newads" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>New Ads</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead style="color: #566787;">
                    <tr>
                        <th>Advertiser</th>
                        <th>Email</th>
                        <th>Ads Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Image</th>
                        <th>Linked Url</th>
                        <th style="width: 85px;">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                            
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add Modal -->
<div id="add-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addUser" class="" method="POST" action="">
                <div class="modal-header">                      
                    <h4 class="modal-title">Add Advertisers</h4>
                    <button type="button" class="close add-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="advertiser_name" class="col-md-12 col-form-label">Advertiser Name</label>
                        <input id="advertiser_name" type="text" class="form-control" name="advertiser_name" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="advertiser_email" class="col-md-12 col-form-label">Advertiser Email</label>
                        <select name="advertiser_email" id="advertiser_email" onchange="change_emails()">
                        <!-- <option value="ordinateur">Ordinateur</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ads_name" class="col-md-12 col-form-label">Ads Name</label>
                        <input id="ads_name" type="text" class="form-control" name="ads_name" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="start_date" class="col-md-12 col-form-label">Start Date</label>
                        <input id="start_date" type="date" class="form-control" name="start_date" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="col-md-12 col-form-label">End Date</label>
                        <input id="end_date" type="date" class="form-control" name="end_date" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="img" class="col-md-12 col-form-label">Image(e.g: http://anr.gwl.mybluehost.me/depanneur_fibrotech.png)</label>
                        <!-- <input id="img" type="file" class="form-control" name="img" value="" accept="image/*" required autofocus> -->
                        <input id="img" type="text" class="form-control" name="img" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="linked_url" class="col-md-12 col-form-label">Linked Url(e.g: http://www.google.com)</label>
                        <input id="linked_url" type="text" class="form-control" name="linked_url" value="" required autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default add-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success desabled" id="submitUser">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Model -->
<form action="" method="POST" class="users-remove-record-model">
    <div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Ads</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Ads?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default remove-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger deleteMatchRecord">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Ads</h4>                    
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="updateBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default update-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-info updateUserRecord">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script type="text/javascript">
var file = null;
function uploadImage(e) {
    if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
      alert('The File APIs are not fully supported in this browser.');
      return;
    }
    file = e.target.files[0];
    if(!file) {
        alert("Error for uploading image.");
    }
};
// Initialize Firebase
var config = {
    apiKey: "AIzaSyDoAjhMLWRtJT62MhtNPxcGugVdLFKjMFU",
    authDomain: "tina-project-a9ad6.firebaseapp.com",
    databaseURL: "https://tina-project-a9ad6.firebaseio.com",
    projectId: "tina-project-a9ad6",
    storageBucket: "tina-project-a9ad6.appspot.com",
    messagingSenderId: "431985002265",
    appId: "1:431985002265:web:256faf035b4d6ae8b16788",
    measurementId: "G-Q0E2KQMXPK"
};
firebase.initializeApp(config);

// Get Data
firebase.database().ref('advertisements/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    if (value != null){
        $.each(value, function(index, value){
            if(value) {
                var advertiser_name = '';
                var advertiser_email = '';
                var advertiser_id = null;
                advertiser_id = value.advertiser_id;
                firebase.database().ref('advertisers/'+advertiser_id).on('value', function(snapshot) {
                    var advertiser_value = snapshot.val();
                    advertiser_name = advertiser_value.first_name + ' ' + advertiser_value.last_name;
                    advertiser_email = advertiser_value.email;
                    htmls.push('<tr>\
                        <td>'+ advertiser_name + ' '  +'</td>\
                        <td>'+ advertiser_email +'</td>\
                        <td>'+ value.name +'</td>\
                        <td>'+ value.start_date +'</td>\
                        <td>'+ value.end_date +'</td>\
                        <td><img style="width:50px;" src="'+value.image+'"/></td>\
                        <td>'+ value.linked_url +'</td>\
                        <td><a data-toggle="modal" data-target="#update-modal" class="edit updateData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>\
                        <a data-toggle="modal" data-target="#remove-modal" class="delete removeData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>\
                    </tr>');
                    $('#tbody').html(htmls);
                });
            }
        });
    }
    $("#submitUser").removeClass('desabled');
});

//Add Data
var advertiser_emails = [];
var advertiser_names = [];
var advertiser_ids = [];
var ind = 0;
firebase.database().ref('advertisers/').on('value', function(snapshot) {
    var advertiser_value = snapshot.val();
    if (advertiser_value != null){
        $.each(advertiser_value, function(index, value){
            if(value) {
                advertiser_emails[ind] = value.email;
                advertiser_names[ind] = value.first_name+' '+value.last_name;
                advertiser_ids[ind] = index;
                ind++;
            }
        });
    }
});
var sel_index = null;
function change_emails() {
    sel_index = $("#advertiser_email").prop('selectedIndex');
    var sel_name = advertiser_names[sel_index];
    $('#advertiser_name').val(sel_name);
}
$('body').on('click', '.newads', function() {
    var email_htmls = [];
    for (var i = 0; i < ind; i++) {
        email_htmls.push('<option value="'+advertiser_emails[i]+'">'+advertiser_emails[i]+'</option>');
    };
    $('#advertiser_email').html(email_htmls);    
    $('#advertiser_name').val(advertiser_names[0]);
    $('#advertiser_emails').value = advertiser_emails[0];
    sel_index = 0;
    // $('body').on('change', '#img', function(e) { uploadImage(e); });
});

$('#submitUser').on('click', function(){
    var values = $("#addUser").serializeArray();
    var ads_id = firebase.database().ref('advertisements').push().key;
    if(sel_index != null){
        firebase.database().ref('advertisements/'+ads_id).set({
            advertiser_id: advertiser_ids[sel_index],
            name: values[2].value,
            start_date: values[3].value,
            end_date: values[4].value,
            image: values[5].value,
            linked_url: values[6].value,
            // linked_url: values[5].value,
        }, function(error) {
            if(error)
                alert(error);
        });
        // if(!file){
        //     var storageRef = firebase.storage().ref('advertisements/'+ads_id+'/image/'+file.name);
        //     storageRef.put(file);
        // }
        $("#addUser input").val("");
        $("#add-modal").modal('hide');
    } else {
        alert("Please select a advertiser.");
    }

});

// Update Data
var updateID = 0;
$('body').on('click', '.updateData', function() {
    updateID = $(this).attr('data-id');
    firebase.database().ref('advertisements/' + updateID).on('value', function(snapshot) {
        var values = snapshot.val();
        var updateData = '<div class="form-group">\
                <label for="ads_name">Ads Name</label>\
                <input id="ads_name" type="text" class="form-control" name="ads_name" value="'+values.name+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="start_date">Start Date</label>\
                <input id="start_date" type="date" class="form-control" name="start_date" value="'+values.start_date+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="end_date">End Date</label>\
                <input id="end_date" type="date" class="form-control" name="end_date" value="'+values.end_date+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="img">Image(e.g: http://anr.gwl.mybluehost.me/depanneur_fibrotech.png)</label>\
                <input id="img" type="text" class="form-control" name="img" value="'+values.image+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="linked_url">Linked Url(e.g: http://www.google.com)</label>\
                <input id="linked_url" type="text" class="form-control" name="linked_url" value="'+values.linked_url+'" required autofocus>\
            </div>';
        $('#updateBody').html(updateData);
        // $('body').on('change', '#img', function(e) { uploadImage(e); });
    });
});

$('.updateUserRecord').on('click', function() {
    var values = $(".users-update-record-model").serializeArray();
    firebase.database().ref('advertisements/'+updateID+'/name').set(values[0].value);
    firebase.database().ref('advertisements/'+updateID+'/start_date').set(values[1].value);
    firebase.database().ref('advertisements/'+updateID+'/end_date').set(values[2].value);
    firebase.database().ref('advertisements/'+updateID+'/image').set(values[3].value);
    firebase.database().ref('advertisements/'+updateID+'/linked_url').set(values[4].value);
    // firebase.database().ref('advertisements/'+updateID+'/linked_url').set(values[3].value);
    // if(!file){
    //     var storageRef = firebase.storage().ref('advertisements/'+updateID+'/image/'+file.name);
    //     storageRef.put(file);
    // }
    $("#update-modal").modal('hide');
});


// Remove Data
$("body").on('click', '.removeData', function() {
    var id = $(this).attr('data-id');
    $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
});

$('.deleteMatchRecord').on('click', function(){
    var values = $(".users-remove-record-model").serializeArray();
    var id = values[0].value;
    firebase.database().ref('advertisements/' + id).remove();
    $('body').find('.users-remove-record-model').find( "input" ).remove();
    $("#remove-modal").modal('hide');
});
</script>
@endsection