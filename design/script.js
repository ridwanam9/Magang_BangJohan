// var id='';
// var nama='';
// var alamat='';

// // When the user scrolls the page, execute myFunction
// window.onscroll = function() {myFunction()};

// // Get the header
// var header = document.getElementById("myHeader");

// // Get the offset position of the navbar
// var sticky = header.offsetTop;

// // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
// function myFunction() {
//   if (window.pageYOffset > sticky) {
//     header.classList.add("sticky");
//   } else {
//     header.classList.remove("sticky");
//   }
// }

//Plus Minus Input Counter

// const plus = document.querySelector(".plus"),
//   minus = document.querySelector(".plus"),
//   hitung = document.querySelector(".hitung");

//   let a = 0;

//   plus.addEventListener("click", () => {
//     a++;
//     a = (a < 10) ? "0" + a : a;
//     hitung.innerHTML = a;
//     console.log(a);
//   })

//   minus.addEventListener("click", () => {
//     if (a > 0) {
//     a--;
//     a = (a < 10) ? "0" + a : a;
//     hitung.innerHTML = a;
//    }
//   })

// $(document).ready(function() {
//   $('.minus').click(function () {
//     var $hitung = $(this).parent().find('input');
//     var count = parseInt($hitung.val()) - 1;
//     count = count < 1 ? 1 : count;
//     $hitung.val(count);
//     $hitung.change();
//     return false;
//   });
//   $('.plus').click(function () {
//     var $hitung = $(this).parent().find('input');
//     $hitung.val(parseInt($hitung.val()) + 1);
//     $hitung.change();
//     return false;
//   });
// });

// function find() {
//   let url = 'http://localhost:37912/PendudukNegeri/webresources/entity.penduduk/';
//   let id = document.getElementById("find");
//   let show = document.getElementById("result")
//   let valueid = id.elements[0].value;
//   url+=valueid;
// //    alert(url);
//   $.ajax({
//       url: url,
//       method: 'GET',
//       success: function (xml) {
//           let row = xml.getElementsByTagName('penduduk');
//           let id = xml.getElementsByTagName('id')[0].childNodes[0].nodeValue;
//           let name = xml.getElementsByTagName('nama')[0].childNodes[0].nodeValue;
//           let nohp = xml.getElementsByTagName('nohp')[0].childNodes[0].nodeValue;
//           let tglLahir = xml.getElementsByTagName('tgllahir')[0].childNodes[0].nodeValue;
//           show.innerHTML = id + " | " + name + " | " + nohp + " | " + tglLahir;
//       },
//       fail: function (e) {alert('error');}
//   })

// }
