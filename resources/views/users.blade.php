<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BackOffice - My users</title>
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
                            <strong>Add User</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form id="addUser" class="" method="POST" action="">
                    	<div class="form-group">
                            <label for="first_name" class="col-md-12 col-form-label">First Name</label>

                            <div class="col-md-12">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-md-12 col-form-label">Last Name</label>

                            <div class="col-md-12">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_addr" class="col-md-12 col-form-label">Email</label>

                            <div class="col-md-12">
                                <input id="email_addr" type="text" class="form-control" name="email_addr" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass_word" class="col-md-12 col-form-label">Password (at least 6 chars)</label>
                            <div class="col-md-12">
                                <input id="pass_word" type="text" class="form-control" name="pass_word" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zipe_code" class="col-md-12 col-form-label">Zip Code</label>

                            <div class="col-md-12">
                                <input id="zipe_code" type="text" class="form-control" name="zipe_code" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-block desabled" id="submitUser">
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
                            <strong>All Users Listing</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Zip Code</th>
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
<form action="" method="POST" class="users-remove-record-model">
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
firebase.database().ref('users/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    if (value != null){
        $.each(value, function(index, value){
            if(value) {
                htmls.push('<tr>\
                    <td>'+ value.firstname +'</td>\
                    <td>'+ value.lastname +'</td>\
                    <td>'+ value.email +'</td>\
                    <td>'+ value.zipcode +'</td>\
                    <td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success updateData" data-id="'+index+'">Update</a>\
                    <a data-toggle="modal" data-target="#remove-modal" class="btn btn-outline-danger removeData" data-id="'+index+'">Delete</a></td>\
                </tr>');
            }       
            lastIndex = index;
        });
    }
    $('#tbody').html(htmls);
    $("#submitUser").removeClass('desabled');
});


// Add Data
$('#submitUser').on('click', function(){
    var values = $("#addUser").serializeArray();
    var first_name = values[0].value;
    var last_name = values[1].value;
    var email = values[2].value;
    var password = values[3].value;
    var zip_code = values[4].value;
    if (password.length >= 6) {
        firebase.auth().createUserWithEmailAndPassword(email, password).then(function(user){
          var userID = user.uid;
            firebase.database().ref('users/' + userID).set({
                firstname: first_name,
                lastname: last_name,
                email: email,
                zipcode: zip_code,
            });

          //Here if you want you can sign in the user
        }).catch(function(error) {
            //Handle error
        });
    }
    // Reassign lastID value
    // lastIndex = userID;
    $("#addUser input").val("");
});

// Update Data
var updateID = 0;
$('body').on('click', '.updateData', function() {
    updateID = $(this).attr('data-id');
    firebase.database().ref('users/' + updateID).on('value', function(snapshot) {
        var values = snapshot.val();
        var updateData = '<div class="form-group">\
                <label for="first_name" class="col-md-12 col-form-label">First Name</label>\
                <div class="col-md-12">\
                    <input id="first_name" type="text" class="form-control" name="first_name" value="'+values.firstname+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="last_name" class="col-md-12 col-form-label">Last Name</label>\
                <div class="col-md-12">\
                    <input id="last_name" type="text" class="form-control" name="last_name" value="'+values.lastname+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="email_addr" class="col-md-12 col-form-label">Email</label>\
                <div class="col-md-12">\
                    <input id="email_addr" type="text" class="form-control" name="email_addr" value="'+values.email+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="zip_code" class="col-md-12 col-form-label">Zip Code</label>\
                <div class="col-md-12">\
                    <input id="zip_code" type="text" class="form-control" name="zip_code" value="'+values.email+'" required autofocus>\
                </div>\
            </div>';

            $('#updateBody').html(updateData);
    });
});

$('.updateUserRecord').on('click', function() {
    var values = $(".users-update-record-model").serializeArray();
    var postData = {
        firstname : values[0].value,
        lastname : values[1].value,
        email : values[2].value,
        zipcode : values[3].value,
    };

    var updates = {};
    updates['/users/' + updateID] = postData;

    firebase.database().ref().update(updates);

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
    firebase.database().ref('users/' + id).remove();
    $('body').find('.users-remove-record-model').find( "input" ).remove();
    $("#remove-modal").modal('hide');
});
$('.remove-data-from-delete-form').click(function() {
    $('body').find('.users-remove-record-model').find( "input" ).remove();
});
</script>