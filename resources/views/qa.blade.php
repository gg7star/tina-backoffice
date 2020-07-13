<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BackOffice - QA</title>
<link rel="stylesheet" href="{{ secure_asset('css/navbar.css') }}">
<link rel="shortcut icon" href="{{ secure_asset('favicon.png') }}">
<link rel="stylesheet" href="{{ secure_asset('css/custom.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ secure_asset('css/qa.css') }}">

<style type="text/css">
.desabled {
	pointer-events: none;    
}
.my_tree ul {
  list-style-type: none !important;
  padding-left: 23px;
}
a.edit {
  color: #FFC107;
  cursor: pointer;
}
a.edit i{
    font-size: 20px;
}
</style>
</head>
<body>
@include('partials.navbar')
<div class="" style="padding:0px 10px;">
    <div class="table-wrapper" style="margin-bottom: 0px; padding-bottom: 5px;">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage Computer Resolution</b></h2>
                </div>
                <div class="col-sm-6" style="display:none">
                    <a data-target="#add-modal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>New User</span></a>
                </div>
            </div>            
        </div>
    </div>
</div>
<div class="row" style="margin-left: 8px; color: #566787;">
    <div class="col-md-8">
        <label for="category">Choose a category:</label>
        <select name="category" id="category">
          <option value="ordinateur">Ordinateur</option>
        </select>
    </div>
</div>
<div id="qa_tree" class="my_tree">
    <div id="root">
    </div>
</div>
<!-- Update Model -->
<form action="" method="POST" class="update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>                    
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="updateBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default update-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <!-- <input type="button" class="btn btn-default update-data-from-delete-form" data-dismiss="modal" value="Cancel"> -->
                    <button type="button" class="btn btn-info updateRecord">Update</button>
                    <!-- <input type="submit" class="btn btn-info updateUserRecord" value="Update"> -->
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
var sel_cate = document.getElementById('category').value;
// Get Data
firebase.database().ref('maps/'+sel_cate+'/root/').on('value', function(snapshot) {
    var value = snapshot.val();
    draw_node('root',value.title,null,value.yid,value.nid,value.did);
});
function draw_node(index, title, solution, yid, nid, did){
    var sub_htmls = [];
    if(solution == null){
        if((yid != null) || (nid != null) || (did != null)){
            sub_htmls.push('<ul><li><span><a>'+title+'</a><a data-toggle="modal" data-target="#update-modal" class="edit updateData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></span></li></ul><div id="ynd_'+lastIndex+'"></div>');
            $('#'+index).html(sub_htmls.join(""));
            get_child_node(yid, nid, did);
        }
    } else {
        sub_htmls.push('<ul><li><span><a>Solution:'+solution+'</a><a data-toggle="modal" data-target="#update-modal" class="edit updateData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></span></li></ul>');
        $('#'+index).html(sub_htmls.join(""));
    }
}
function get_child_node(yid, nid, did){
    var ynd_htmls = [];
    ynd_htmls.push('<ul><li><span><a>Yes</a></li><div id="'+yid+'"></div>\
        <li><span><a>No</a></li><div id="'+nid+'"></div>\
        <li><span><a>I do not know</a></li><div id="'+did+'"></div></ul>');
    $('#ynd_'+lastIndex).html(ynd_htmls.join(""));
    lastIndex ++;
    firebase.database().ref('maps/'+sel_cate+'/'+yid+'/').on('value', function(snapshot) {
        var y_value = snapshot.val();
        if(y_value.solution != null){
            draw_node(yid,null,y_value.solution,null,null,null);
        } else {
            draw_node(yid,y_value.title,null,y_value.yid,y_value.nid,y_value.did);
        }        
    });
    firebase.database().ref('maps/'+sel_cate+'/'+nid+'/').on('value', function(snapshot) {
        var n_value = snapshot.val();
        if(n_value.solution != null){
            draw_node(nid,null,n_value.solution,null,null,null);
        } else {
            draw_node(nid,n_value.title,null,n_value.yid,n_value.nid,n_value.did);
        }        
    });
    firebase.database().ref('maps/'+sel_cate+'/'+did+'/').on('value', function(snapshot) {
        var d_value = snapshot.val();
        if(d_value.solution != null){
            draw_node(did,null,d_value.solution,null,null,null);
        } else {
            draw_node(did,d_value.title,null,d_value.yid,d_value.nid,d_value.did);
        }        
    });
}
// Update Data
var updateID = 0;
var update_solution = null;
$('body').on('click', '.updateData', function() {
    updateID = $(this).attr('data-id');
    firebase.database().ref('maps/'+sel_cate+'/'+updateID+'/').on('value', function(snapshot) {
        var values = snapshot.val();
        update_solution = values.solution;
        if(update_solution == null){
            var updateData = '<div class="form-group">\
                    <label for="title">Title</label>\
                    <input id="title" type="text" class="form-control" name="title" value="'+values.title+'" required autofocus>\
                    <input style="display:none" id="qid" type="text" class="form-control" name="qid" value="'+values.qid+'" readonly>\
                    <input style="display:none" id="yid" type="text" class="form-control" name="yid" value="'+values.yid+'" readonly>\
                    <input style="display:none" id="nid" type="text" class="form-control" name="nid" value="'+values.nid+'" readonly>\
                    <input style="display:none" id="did" type="text" class="form-control" name="did" value="'+values.did+'" readonly>\
                </div>';
            $('#updateBody').html(updateData);
        } else {
            var updateData = '<div class="form-group">\
                    <label for="solution">Solution</label>\
                    <input id="solution" type="text" class="form-control" name="solution" value="'+values.solution+'" required autofocus>\
                </div>';
            $('#updateBody').html(updateData);
        }
    });
});
$('.updateRecord').on('click', function() {
    var values = $(".update-record-model").serializeArray();
    if(values.length < 2){
        var postData = {
            solution : values[0].value
        };
    } else {
        var postData = {
            title : values[0].value,
            qid : values[1].value,
            yid : values[2].value,
            nid : values[3].value,
            did : values[4].value
        };
    }
    var updates = {};
    updates['maps/'+sel_cate+'/'+updateID] = postData;
    firebase.database().ref().update(updates);
    $("#update-modal").modal('hide');
});
</script>