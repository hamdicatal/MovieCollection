var previewPoster = function(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('img-thumbnail');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
};
