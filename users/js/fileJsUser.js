alert("test");
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
  
    document.getElementById("par16").innerHTML = rowObj['visit'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    document.getElementById("par21").innerHTML = rowObj['codeRequest'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    
    document.getElementById("par22").innerHTML = rowObj['messageReject'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"

  
    var images = rowObj['Img'].split(",");
    var imagesDiv = document.getElementById("img12"); // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
    imagesDiv.innerHTML = "";
    for (var i = 0; i < images.length; i++) {
    var img = document.createElement("img");
    img.src = "../users/uploads/" + images[i];
    img.className = "imgMainte"
   
    img.alt = "صورة رقم " + (i + 1); // يمكن تعديل النص البديل وفقًا للاحتياجات
    imagesDiv.appendChild(img);
    img.addEventListener("click", function() {
     showPopupimage(this.getAttribute("src"));
    });
    } // 
    // document.getElementById("img12").innerHTML = rowObj['Img'];
}

function closePopup() {
    document.getElementById("popup").style.display = "none";
}

function closePopupRating() {
  document.getElementById("popupRating").style.display = "none";
}


function closePopupRatingShow() {
  document.getElementById("popupRatingShow").style.display = "none";

}


function openPopupRating(text) {
  
  document.getElementById("popupRating").style.display = "block";
document.getElementById("btnRating").addEventListener("click", function(event) {
  event.preventDefault();
  handlingRating(text)
});

}


function openPopupRatingShow(dataRating) {
  var rowObjRating = JSON.parse(dataRating);
  // console.log(row)
  document.getElementById("popupRatingShow").style.display = "block";
  console.log(rowObjRating['ResponseSpeed']);
  document.getElementById("response_speed_Show").innerHTML = rowObjRating['ResponseSpeed'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
  document.getElementById("maitenance_behavior_Show").innerHTML = rowObjRating['MainteTechnician'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
  document.getElementById("maitenance_service_speed_Show").innerHTML = rowObjRating['QualityService'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
  document.getElementById("maitenance_service_execution_speed_Show").innerHTML = rowObjRating['SpeedService'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
  document.getElementById("service_and_request").innerHTML = rowObjRating['ServiceCorresponds'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
  document.getElementById("opinionAreaShow").innerHTML = rowObjRating['MessageRating'] // افتراضياً يجب تعيين ID العنصر الذي يحتوي على الصور إلى "images"
   
}

function showPopupimage(src) {
    var popup = document.getElementById("popup1");
    var popupImage = document.getElementById("popupImage");
    var closeBtn = document.getElementById("closeBtn");
    
    popup.style.display = "block";
    popupImage.src = src;
    
    // عمل تكبير على الصورة عند فتح ال popup
    popupImage.style.transform = "scale(1.2)";
    
    // تحديد الدالة المنفذة عند النقر على أيقونة الإغلاق (X)
    closeBtn.onclick = function() {
      popup.style.display = "none";
    }
}

// إغلاق popup عند النقر على أي مكان خارج popup
window.onclick = function(event) {
  var popup = document.getElementById("popup1");
  if (event.target == popup) {
    popup.style.display = "none";
  }
  
  // إخفاء الصورة عند النقر على أيقونة الإغلاق (X)
  var closeBtn = document.getElementById("closeBtn");
  if (event.target == closeBtn) {
    popup.style.display = "none";
  }
}

// إعادة تصغير الصورة عند إغلاق popup

document.getElementById("popup1").addEventListener("transitionend", function() {
  var popupImage = document.getElementById("popupImage");
  popupImage.style.transform = "scale(1)";
});



function handlingRating(dataMinte){  
var rowObjRating = JSON.parse(dataMinte);
  
const formData = new FormData(document.getElementById("MyRating"));
formData.append("ProjectIdMainte", rowObjRating["ProjectId"]);

const data = {};

formData.forEach((value, key) => {
  data[key] = value;
});
 
var dataString = JSON.stringify(data);
  // console.log(rowMainte['ProjectId'])
  console.log(dataString)
 
$.ajax({
  type: 'POST',
  url: 'handlingRating.php',
  data: {
    jsonRating: dataString,
  },
  success: function(data) {
    if(data == "شكرا لقد تلقينا رسالتك")
    {
      alert(data);
      window.location.href = 'user_dashboard.php';
    }else{
      alert(data);

    }
  },
});

}





function downloadhtmlnew(datahtml) {
  var rowObj = JSON.parse(datahtml);
  console.log(rowObj);

  const pdfName = 'file.pdf';

  const htmlContent = `
    <div style="text-align: right; direction: rtl;margin-rigth:20px;">
      <h1>المستند الخاص بي من HTML إلى PDF</h1>
      <div>
        ${Object.keys(rowObj).map((prop) => {
          const translation = arabicTranslation(prop);
          const value = rowObj[prop];
          if (translation && value) {
            return `<div style="margin-rigth:20px;">${translation}  &nbsp; : ${value}</div>`;
          } else {
            return '';
          }
        }).join('')}
      </div>
      <div>
        ${rowObj.Img.split(',').map((imgName) => `<img src="../users/uploads/${imgName}" style="width: 200px; height=200px;" />`).join('')}
      </div>
    </div>
  `;
  
  // استخدام Promise.all() للانتظار حتى يتم تحميل جميع الصور بالكامل قبل البدء في تحويل الصفحة HTML إلى PDF
  const promises = rowObj.Img.split(',').map((imgName) => {
    return new Promise((resolve, reject) => {
      const img = new Image();
      img.onload = () => resolve();
      img.onerror = () => reject();
      img.src = `../users/uploads/${imgName}`;
    });
  });

  Promise.all(promises).then(() => {
    // تحويل الصفحة إلى PDF باستخدام html2pdf
    html2pdf().from(htmlContent).set({
      margin: [0.5, 0.5, 0.5, 0.5],
      filename: pdfName,
      image: { type: 'jpeg', quality: 1 },
      html2canvas: { scale: 2, timeout: 3000 },
      jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    }).save();
  }).catch((err) => {
    console.error(err);
  });
}

// دالة تترجم الكلمات الانجليزية الى العربية
function arabicTranslation(word) {
  const translations = {
    "Email": "الايميل",
    "ProjectId": "رقم المشروع",
    "ProjectName": "اسم المشروع",
    "Neighborhood": "الحي",
    "PieceNumber": "رقم القطعة",
    "UnitNumber": "رقم الوحدة",
    "FloorNumber": "رقم الطابق",
    "DateContract": "التاريخ",
    "TypeRequest": "نوع الطلب",
    "Description": "الوصف",
    "Status": "الحالة",
    "RequestDate": "تاريخ ارسال الطلب",
    "FirstName": "الاسم الاول",
    "LastName": "الاسم الاخير",
    "NationalNumber": "الرقم الوطني",
    "Phone": "الجوال"
   
    // يجب تعريف الترجمات الأخرى هنا
  };

  return translations[word] || '';
}