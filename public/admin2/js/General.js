$(document).ready(function () {

$(document).on('click','.are_you_shur',function (e) {

var res=confirm('هل انت متاكد')
    if(!res){
        return false;
    }
});
});
