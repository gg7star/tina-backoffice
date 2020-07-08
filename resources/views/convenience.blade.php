<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BackOffice - My convenience stores</title>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />


<style type="text/css">
.desabled {
	pointer-events: none;
}
</style>

</head>
<body>

<!-- <h1>Welcome to My Awesome App</h1>
<div id="firebaseui-auth-container"></div>
<div id="loader">Loading...</div> -->

<div class="container">
    <div class="row" style="text-align:right">
        <a href="/">Go to Home</a>
    </div>
    <div class="row">
    	<div class="col-md-4">
    		<div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <strong>Add Store</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form id="addStore" class="" method="POST" action="">
                    	<div class="form-group">
                            <label for="title" class="col-md-12 col-form-label">Store Name</label>

                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control" name="title" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="col-md-12 col-form-label">Phone Number</label>

                            <div class="col-md-12">
                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_addr" class="col-md-12 col-form-label">Email</label>

                            <div class="col-md-12">
                                <input id="email_addr" type="text" class="form-control" name="email_addr" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="latitude" class="col-md-12 col-form-label">Latitude</label>

                            <div class="col-md-12">
                                <input id="latitude" type="text" class="form-control" name="latitude" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="latitude" class="col-md-12 col-form-label">Longitude</label>

                            <div class="col-md-12">
                                <input id="longitude" type="text" class="form-control" name="longitude" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="addr" class="col-md-12 col-form-label">Address</label>

                            <div class="col-md-12">
                                <input id="addr" type="text" class="form-control" name="addr" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img" class="col-md-12 col-form-label">Image (e.g: http://anr.gwl.mybluehost.me/depanneur_fibrotech.png)</label>
                            <div class="col-md-12">
                                <input id="img" type="text" class="form-control" name="img" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-block desabled" id="submitStore">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    	</div>
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <strong>All Stores Listing</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Store Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th width="180" class="text-center">Action</th>
                        </tr>
                        <tbody id="tbody">
                        	
                        </tbody>	
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Model -->
<form action="" method="POST" class="remove-record-model">
    <div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h4>You Want You Sure Delete This Record?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light deleteMatchRecord">Delete</button>
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
                    <h4 class="modal-title" id="custom-width-modalLabel">Update Record</h4>
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" id="updateBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect update-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success waves-effect waves-light updateUserRecord">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>


<script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
<script>

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

var database = firebase.database();


var lastIndex = 0;

// Get Data
firebase.database().ref('stores/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    if (value != null){
        $.each(value, function(index, value){
            if(value) {
                htmls.push('<tr>\
                    <td>'+ value.title +'</td>\
                    <td>'+ value.phone +'</td>\
                    <td>'+ value.email +'</td>\
                    <td>'+ value.latitude +'</td>\
                    <td>'+ value.longitude +'</td>\
                    <td>'+ value.address +'</td>\
                    <td>'+ value.image +'</td>\
                    <td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success updateData" data-id="'+index+'">Update</a>\
                    <a data-toggle="modal" data-target="#remove-modal" class="btn btn-outline-danger removeData" data-id="'+index+'">Delete</a></td>\
                </tr>');
            }       
            lastIndex = index;
        });
    }
    $('#tbody').html(htmls);
    $("#submitStore").removeClass('desabled');
});


// Add Data
$('#submitStore').on('click', function(){
    var values = $("#addStore").serializeArray();
    var store_name = values[0].value;
    var phone_number = values[1].value;
    var email_addr = values[2].value;
    var latitude = values[3].value;
    var longitude = values[4].value;
    var addr = values[5].value;
    var img = values[6].value;
    var store_id = firebase.database().ref('stores/').push().key;
    firebase.database().ref('stores/' + store_id + '/').update({
        title: store_name,
        phone: phone_number,
        email: email_addr,
        latitude: latitude,
        longitude: longitude,
        address: addr,
        image: img
    });
    // Reassign lastID value
    // lastIndex = userID;
    $("#addStore input").val("");
});

// Update Data
var updateID = 0;
$('body').on('click', '.updateData', function() {
    updateID = $(this).attr('data-id');
    firebase.database().ref('users/' + updateID).on('value', function(snapshot) {
        var values = snapshot.val();
        var updateData = '<div class="form-group">\
                <label for="store_name" class="col-md-12 col-form-label">Store Name</label>\
                <div class="col-md-12">\
                    <input id="store_name" type="text" class="form-control" name="store_name" value="'+values.title+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="phone_number" class="col-md-12 col-form-label">Phone Number</label>\
                <div class="col-md-12">\
                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="'+values.phone+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="email_addr" class="col-md-12 col-form-label">Email</label>\
                <div class="col-md-12">\
                    <input id="email_addr" type="text" class="form-control" name="email_addr" value="'+values.email+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="latitude" class="col-md-12 col-form-label">Latitude</label>\
                <div class="col-md-12">\
                    <input id="latitude" type="text" class="form-control" name="latitude" value="'+values.latitude+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="longitude" class="col-md-12 col-form-label">Longitude</label>\
                <div class="col-md-12">\
                    <input id="longitude" type="text" class="form-control" name="longitude" value="'+values.longitude+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="addr" class="col-md-12 col-form-label">Address</label>\
                <div class="col-md-12">\
                    <input id="addr" type="text" class="form-control" name="addr" value="'+values.address+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="img" class="col-md-12 col-form-label">Image</label>\
                <div class="col-md-12">\
                    <input id="img" type="text" class="form-control" name="img" value="'+values.image+'" required autofocus>\
                </div>\
            </div>';

            $('#updateBody').html(updateData);
    });
});

$('.updateUserRecord').on('click', function() {
    var values = $(".users-update-record-model").serializeArray();
    var postData = {
        title : values[0].value,
        phone : values[1].value,
        email : values[2].value,
        latitude : values[3].value,
        longitude : values[4].value,
        address : values[5].value,
        image : values[6].value,
    };

    var updates = {};
    updates['/stores/' + updateID] = postData;

    firebase.database().ref().update(updates);

    $("#update-modal").modal('hide');
});


// Remove Data
$("body").on('click', '.removeData', function() {
    var id = $(this).attr('data-id');
    $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
});

$('.deleteMatchRecord').on('click', function(){
    var values = $(".remove-record-model").serializeArray();
    var id = values[0].value;
    firebase.database().ref('stores/' + id).remove();
    $('body').find('.remove-record-model').find( "input" ).remove();
    $("#remove-modal").modal('hide');
});
$('.remove-data-from-delete-form').click(function() {
    $('body').find('.remove-record-model').find( "input" ).remove();
});
</script>