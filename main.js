$(document).ready(init);

function init() {
  getPagamenti();
}


function getPagamenti() {

  $.ajax({
    url:"pagamenti.php",
    method: "GET",
    success: function (data) {
      console.log(data);

      for (var paganti of data) {
        $("#lista").append("<li>" + paganti + "</li>");
      }

    },
    error: function (err) {
      console.error(err);
    }
  });
}
