$(document).ready(function() {
    $("#example").append(
        $('<tfoot/>').append( $("#example thead tr").clone() )
    );

    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#example').DataTable({

        responsive: {
            details: {
                renderer: $.fn.dataTable.Responsive.renderer.tableAll(),
            }
        },
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
} );

// // Event listener
// document.getElementById("form").onsubmit = validate;
//
// // Validate the form function
// function validate() {
//   clearErrors();
//
//   let valid = true;
//   let facilityName = document.getElementById("facilityName").value;
//   let city = document.getElementById("city").value;
//   let state = document.getElementById("state").value;
//   let recordsPhone = document.getElementById("recordsPhone").value;
//   let recordsFax = document.getElementById("recordsFax").value;
//   let libraryPhone = document.getElementById("libraryPhone").value;
//   let libraryFax = document.getElementById("libraryFax").value;
//
//   if (facilityName == "") {
//     document.getElementById("facilityNameError").style.display = "block";
//     valid = false;
//   }
//
//   if (city == "") {
//     document.getElementById("cityError").style.display = "block";
//     valid = false;
//   }
//
//   if (state == "") {
//     document.getElementById("stateError").style.display = "block";
//     valid = false;
//   }
//
//   if (recordsPhone == "" && libraryPhone == "") {
//     document.getElementById("recordsPhoneError").style.display = "block";
//     document.getElementById("libraryPhoneError").style.display = "block";
//     valid = false;
//   }
//
//   if (!recordsPhone == "") {
//     // if (recordsPhone.length != 10) {
//     //   document.getElementById("recordsPhoneNotTen").style.display = "block";
//     // }
//
//     if (recordsFax == "") {
//       document.getElementById("recordsFaxError").style.display = "block";
//       valid = false;
//     }
//   }
//
//   if (!libraryPhone == "") {
//     if (libraryFax == "") {
//       document.getElementById("libraryFaxError").style.display = "block";
//       valid = false;
//     }
//   }
//
//   let scans = document.getElementsByName("scans[]");
//   let scansChecked = 0;
//
//   for (let i = 0; i < scans.length; i++) {
//     if (scans[i].checked) {
//       scansChecked++;
//     }
//   }
//
//   if (scansChecked < 1) {
//     document.getElementById("scansError").style.display = "block";
//     valid = false;
//   }
//
//   let push = document.getElementsByClassName("pushCheck");
//   let pushChecked = 0;
//
//   for (let i = 0; i < push.length; i++) {
//     if (push[i].checked) {
//       pushChecked++;
//     }
//   }
//
//   if (pushChecked < 1) {
//     document.getElementById("pushError").style.display = "block";
//     valid = false;
//   }
//
//   return valid;
// }
//
// function clearErrors() {
//   let errors = $(".error");
//   for (let i = 0; i < errors.length; i++) {
//     errors[i].style.display = "none";
//   }
// }
