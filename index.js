$("#btnenviar").click(function() { 
    ajax();
});

function ajax(){
  var prog = $("#txtprog").val();
  var misdatos;
  var text = '{ "Nombre":"John" , "pass":"Doe" }' 
$.ajax({
    type: "GET",
    url: "https://kgarzaortiz.000webhostapp.com/Usuarios",
    //data: text,
    //dataType: "application/json;charset=utf-8",
    success: function (data) {
        var json = JSON.parse(data);
        console.log(json);
    }
});
}