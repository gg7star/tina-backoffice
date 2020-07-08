<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BackOffice - My IT resolutions</title>
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
        <div class="col-md-8">
            <label for="category">Choose a category:</label>
            <select name="category" id="category">
              <option value="ordinateur">Ordinateur</option>
            </select>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-3">
    		<div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <strong>Add Question</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form id="addQuestion" class="" method="POST" action="">
                    	<div class="form-group">
                            <label for="q_title" class="col-md-12 col-form-label">Title</label>

                            <div class="col-md-12">
                                <input id="q_title" type="text" class="form-control" name="q_title" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="yid" class="col-md-12 col-form-label">Yes ID</label>

                            <div class="col-md-12">
                                <input id="yid" type="text" class="form-control" name="yid" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nid" class="col-md-12 col-form-label">No ID</label>
                            <div class="col-md-12">
                                <input id="nid" type="text" class="form-control" name="nid" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="did" class="col-md-12 col-form-label">Don't Know ID</label>
                            <div class="col-md-12">
                                <input id="did" type="text" class="form-control" name="did" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-block desabled" id="submitQuestion">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <strong>Add Solution</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form id="addSolution" class="" method="POST" action="">
                        <div class="form-group">
                            <label for="s_title" class="col-md-12 col-form-label">Solution</label>

                            <div class="col-md-12">
                                <input id="s_title" type="text" class="form-control" name="s_title" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-block desabled" id="submitSolution">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    	</div>
        <div class="col-md-9">
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <strong>All Q/A Listing</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Question ID</th>
                            <th>Yes ID</th>
                            <th>No ID</th>
                            <th>Don't Know ID</th>
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
var selected_cate = document.getElementById('category').value;
firebase.database().ref('maps/'+selected_cate+'/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    if (value != null){
        $.each(value, function(index, value){
            if(value) {
                if(value.solution != null){
                    htmls.push('<tr>\
                        <td>'+ value.solution +'</td>\
                        <td>'+ index +'</td>\
                        <td>'+ '' +'</td>\
                        <td>'+ '' +'</td>\
                        <td>'+ '' +'</td>\
                        <td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success updateData" data-id="'+index+'">Update</a>\
                        <a data-toggle="modal" data-target="#remove-modal" class="btn btn-outline-danger removeData" data-id="'+index+'">Delete</a></td>\
                    </tr>');    
                } else {
                    htmls.push('<tr>\
                        <td>'+ value.title +'</td>\
                        <td>'+ value.qid +'</td>\
                        <td>'+ value.yid +'</td>\
                        <td>'+ value.nid +'</td>\
                        <td>'+ value.did +'</td>\
                        <td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success updateData" data-id="'+index+'">Update</a>\
                        <a data-toggle="modal" data-target="#remove-modal" class="btn btn-outline-danger removeData" data-id="'+index+'">Delete</a></td>\
                    </tr>');
                }
            }       
            lastIndex = index;
        });
    }
    $('#tbody').html(htmls);
    $("#submitQuestion").removeClass('desabled');
    $("#submitSolution").removeClass('desabled');
});


// Add Data
$('#submitQuestion').on('click', function(){
    var values = $("#addQuestion").serializeArray();
    var title = values[0].value;
    var yid = values[1].value;
    var nid = values[2].value;
    var did = values[3].value;
    if((title != null) && (yid != null) && (nid != null) && (did != null)){
        var new_question_key = firebase.database().ref('maps/'+selected_cate+'/').push().key;
        firebase.database().ref('maps/' + selected_cate + '/' + new_question_key+'/').update({
            title: title,
            qid: new_question_key,
            yid: yid,
            nid: nid,
            did: did
        });
        // Reassign lastID value
        // lastIndex = userID;
        $("#addQuestion input").val("");
    }
});
$('#submitSolution').on('click', function(){
    var values = $("#addSolution").serializeArray();
    var solution = values[0].value;
    if(solution != null){
        var new_question_key = firebase.database().ref('maps/'+selected_cate+'/').push().key;
        firebase.database().ref('maps/' + selected_cate + '/' + new_question_key).update({
            solution: solution
        });
        // Reassign lastID value
        // lastIndex = userID;
        $("#addSolution input").val("");
    }
});

// Update Data
var updateID = 0;
$('body').on('click', '.updateData', function() {
    updateID = $(this).attr('data-id');
    firebase.database().ref('maps/' + selected_cate + '/' + updateID).on('value', function(snapshot) {
        var values = snapshot.val();
        if (values.solution != null){
            var updateData = '<div class="form-group">\
                <label for="s_title" class="col-md-12 col-form-label">Solution Title</label>\
                <div class="col-md-12">\
                    <input id="s_title" type="text" class="form-control" name="s_title" value="'+values.solution+'" required autofocus>\
                </div>\
            </div>';
        } else {

            var updateData = '<div class="form-group">\
                <label for="q_title" class="col-md-12 col-form-label">Question Title</label>\
                <div class="col-md-12">\
                    <input id="q_title" type="text" class="form-control" name="q_title" value="'+values.title+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="yid" class="col-md-12 col-form-label">Yes ID</label>\
                <div class="col-md-12">\
                    <input id="yid" type="text" class="form-control" name="yid" value="'+values.yid+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="nid" class="col-md-12 col-form-label">No ID</label>\
                <div class="col-md-12">\
                    <input id="nid" type="text" class="form-control" name="nid" value="'+values.nid+'" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="did" class="col-md-12 col-form-label">Do not Know ID</label>\
                <div class="col-md-12">\
                    <input id="did" type="text" class="form-control" name="did" value="'+values.did+'" required autofocus>\
                </div>\
            </div>';
        }

            $('#updateBody').html(updateData);
    });
});

$('.updateUserRecord').on('click', function() {
    var values = $(".users-update-record-model").serializeArray();
    if(values.length > 1) {
        var postData = {
            title : values[0].value,
            yid : values[1].value,
            nid : values[2].value,
            did : values[3].value
        };
    } else {
        var postData = {
            solution : values[0].value
        };
    }
    
    var updates = {};
    updates['/maps/' + selected_cate + '/' + updateID] = postData;

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
    firebase.database().ref('maps/' + selected_cate + '/' + id).remove();
    $('body').find('.remove-record-model').find( "input" ).remove();
    $("#remove-modal").modal('hide');
});
$('.remove-data-from-delete-form').click(function() {
    $('body').find('.remove-record-model').find( "input" ).remove();
});
</script>