alert("updateFidle");
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

// function downloadfile(datafile){
//     console.log(datafile)
//     var rowObj = JSON.parse(datafile);
//     console.log(rowObj)

//     var jsonData = JSON.stringify(rowObj);
//   $.ajax({
//     type: 'POST',
//     url: 'downloadfile.php',
//     data: {json: jsonData},
//     success: function(data) {
//       alert(data);
//     }
//   });

// }

function deleteReq(datafile){
  var rowObj = JSON.parse(datafile);
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
    document.getElementById("par4").innerHTML = rowObj['UnitNumber'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par5").innerHTML = rowObj['FloorNumber'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par6").innerHTML = rowObj['DateContract'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par7").innerHTML = rowObj['TypeRequest'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par8").innerHTML = rowObj['Description'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par9").innerHTML = rowObj['Status'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    // document.getElementById("selectedOption").innerHTML = rowObj['Status'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"

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



/*
function handlingRegister(datafile){
  var rowObj = JSON.parse(datafile);

  var jsonData = JSON.stringify(rowObj);

$.ajax({
  type: 'POST',
  url: 'handlingLoginAdmin.php',
  data: {json: jsonData,
         submitType:"register" 
  },
  // beforeSend: function() {
  //   $('#Myform').find('button').text('جاري الإرسال...');
  // },
  success: function(data) {
    alert(data);

    // $('form#Myform')[0].reset();
    // $('#Myform').find('button').text('إنشاء');
    // alert(data);
  }
});
}


*/


function handlingRegister(event,datafile){
  $('#Myform').click(function(event) {
    event.preventDefault(); // منع السلوك الافتراضي للنقر
    // القيام بأي شيء آخر تحتاج إلى القيام به هنا
  var rowObj = JSON.parse(datafile);
  var jsonData = JSON.stringify(rowObj);
  console.log(jsonData)
  console.log( typeof(jsonData))
  console.log( typeof(rowObj))
  console.log( rowObj)
$.ajax({
  type: 'POST',
  url: 'handlingLoginAdmin.php',
  data: {json: jsonData},
  success: function(data) {
    // window.location.href = 'dashboard_admin.php';
    alert(data);
  },
});

});

}


//downloadfile

function generatePDF(dataArray) {
  // Clear the output buffer
  // ob_clean(); 

  // Set the path where the file should be saved
  var folder_path = '/home/abood/Downloads/';

  // Get the file extension
  var file_extension = "pdf";

  // Generate a new random file name
  var new_file_name = $.now() + '.' + file_extension;

  // Set the full path for the new file
  var new_file_path = folder_path + new_file_name;

  // Create ProgressBar.js object
  var progress = new ProgressBar.Line('#progress-bar', { color: '#aaa' });

  // Start the progress bar
  progress.animate(0.1);

  // Send AJAX request to generate PDF
  return new Promise(function(resolve, reject) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'pdf_functions.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.responseType = 'blob';

      // Set the progress bar value
      xhr.upload.onprogress = function(e) {
          var progress_value = e.loaded / e.total;
          progress.animate(progress_value);
      };

      xhr.onload = function() {
          // Stop the progress bar
          progress.animate(1);

          // Create a new Blob object from the response data
          var blob = new Blob([xhr.response], { type: 'application/pdf' });

          // Create a new URL object for the Blob data
          var url = URL.createObjectURL(blob);

          // Create a new link element for file download
          var link = document.createElement('a');
          link.href = url;
          link.download = new_file_name;
          link.style.display = 'none';

          // Add link element to DOM and click it to trigger file download
          document.body.appendChild(link);
          link.click();

          // Clean up the URL object and link element
          URL.revokeObjectURL(url);
          document.body.removeChild(link);

          // Resolve the Promise with the file name
          resolve(new_file_name);
      };

      xhr.onerror = function() {
          console.log('Error generating file');

          // Reject the Promise with the error message
          reject('Error generating file');
      };

      // Send the AJAX request
      xhr.send('data=' + JSON.stringify(dataArray));
  });
}

function downloadfile(datafile) {
  console.log(datafile);
  var rowObj = JSON.parse(datafile);
  console.log(rowObj);

  // Call generatePDF() to generate the PDF file
  generatePDF(rowObj).then(function(new_file_name) {
      console.log('File downloaded: ' + new_file_name);
      // Display a success message to the user
     
      alert('File downloaded successfully: ' + new_file_name);
  }).catch(function(error) {
      console.log('Error generating file: ' + error);
      // Display an error message to the user
      alert('Error generating file: ' + error);
  });
}