var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<form class="row"><div class="col-sm-3"><div class="form-group"><input type="text" class="form-control" id="name" name="name" placeholder="Name"></div></div><div class="col-sm-2"> <div class="form-group"> <input type="text" class="form-control" id="short_description" name="short_description" placeholder="Short Description"> </div></div><div class="col-sm-2"> <div class="form-group"> <input type="text" class="form-control" id="description" name="description" placeholder="Description"> </div></div>  <div class="col-sm-2"> <div class="form-group"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button> </div></div></form>';

    objTo.appendChild(divtest)
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}
