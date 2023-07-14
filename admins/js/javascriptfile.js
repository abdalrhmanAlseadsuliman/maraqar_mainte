alert("updateFile");
/*!
* Start Bootstrap - Simple Sidebar v6.0.6 (https://startbootstrap.com/template/simple-sidebar)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
*/
// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


// popup js  Abood add
function downloadfile(datafile){
    console.log(datafile)
    var rowObj = JSON.parse(datafile);
    console.log(rowObj)

    var jsonData = JSON.stringify(rowObj);
  $.ajax({
    type: 'POST',
    url: 'downloadfile.php',
    data: {json: jsonData},
    success: function(data) {
      alert(data);
    }
  });

}

function deleteReq(datafile){
  // console.log(datafile)
  var rowObj = JSON.parse(datafile);
  console.log(rowObj)
 
  var jsonData = JSON.stringify(rowObj);
$.ajax({
  type: 'POST',
  url: 'deleteR.php',
  data: {json: jsonData},
  success: function(data) {
    window.location.href = 'dashboard_admin.php';
    alert(data);
  }
});
}

function updateReq(datafile){
  // console.log(datafile)
  var rowObj = JSON.parse(datafile);
  console.log(rowObj)
  var statusField = $('#status');
  var statusValue = statusField.val();
  console.log(statusValue);
  var jsonData = JSON.stringify(rowObj);
$.ajax({
  type: 'POST',
  url: 'updateR.php',
  data: {json: jsonData,
    status: statusValue
  },
  success: function(data) {
    // var statusField = ;
    document.getElementById("par9").innerHTML = statusValue // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("selectedOption").innerHTML =  statusValue
    alert(data);
  }
});
}

function openPopup(text) {
    // alert(text);
    var rowObj = JSON.parse(text);
    // document.getElementById("selectedOption").selectedOption // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    console.log(rowObj)
    document.getElementById("popup").style.display = "block";
    document.getElementById("par1").innerHTML = rowObj['ProjectName'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par2").innerHTML = rowObj['Neighborhood'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par3").innerHTML = rowObj['PieceNumber'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par4").innerHTML = rowObj['UnitNumber	'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par5").innerHTML = rowObj['FloorNumber'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par6").innerHTML = rowObj['DateContract'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par7").innerHTML = rowObj['TypeRequest'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par8").innerHTML = rowObj['Description'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par9").innerHTML = rowObj['Status'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("selectedOption").innerHTML = rowObj['Status'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"

    document.getElementById("par10").innerHTML = rowObj['RequestDate'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par11").innerHTML = rowObj['FirstName'] + " " + rowObj['LastName'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par12").innerHTML = rowObj['NationalNumber'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par13").innerHTML = rowObj['Phone'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par14").innerHTML = rowObj['Email'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par16").innerHTML = rowObj['visit'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    
    
    // selectedOption
    document.getElementById("par15").onclick =  function() {
      updateReq(text);

    };
    
    
    // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    
    var images = rowObj['Img'].split(",");
    var imagesDiv = document.getElementById("img12"); // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    imagesDiv.innerHTML = "";
    for (var i = 0; i < images.length; i++) {
    var img = document.createElement("img");
    img.src = "../users/uploads/" + images[i];
    img.alt = "صورة رقم " + (i + 1); // يمكن تعديل النص البديل وفقًا للاحتياجات
    imagesDiv.appendChild(img);
    }
    // document.getElementById("img12").innerHTML = rowObj['Img'];
}

function closePopup() {
    document.getElementById("popup").style.display = "none";
}


