$(document).ready(function() {
    $('.salon_records').DataTable({
        "ajax": "../../ajax/salon.ajax.php", 
        "deferRender": true,
        "retrieve": true,
        "processing": true
    });

    $('.customer_records').DataTable({
        "ajax": "../../ajax/customer.ajax.php", 
        "deferRender": true,
        "retrieve": true,
        "processing": true
    });
});

function add_service(){
    swal.fire({
        title: 'Add a Service',
        html: `<select id="category" class="swal2-input">
                    <option value="" hidden>Category</option>
                    <option value="Hair Styling">Hair Styling</option>
                    <option value="Hair Treatment">Hair Treatment</option>
                    <option value="Additional Service">Additional Service</option>
                </select>
                <input type="text" id="service" class="swal2-input" placeholder="Service">
                <input type="text" id="fee" class="swal2-input" placeholder="Fee">
                <input type="text" id="duration" class="swal2-input" placeholder="Duration">
                <select id="promo" class="swal2-input">
                    <option value="" hidden>Promo</option>
                    <option value="active">Active</option>
                    <option value="none">None</option>
                </select>`,
        showCancelButton: true,
        confirmButtonColor: '#49657B',
        confirmButtonText: 'Confirm',
        focusConfirm: false,
        preConfirm: () => {
            const category = Swal.getPopup().querySelector('#category').value
            const service = Swal.getPopup().querySelector('#service').value
            const fee = Swal.getPopup().querySelector('#fee').value
            const duration = Swal.getPopup().querySelector('#duration').value
            const promo = Swal.getPopup().querySelector('#promo').value
            if (!category || !service || !fee || !duration || !promo) {
              swal.showValidationMessage(`Please enter all details.`)
            }
            return { category: category, service: service, fee: fee, duration: duration, promo: promo}
          }
    }).then((result) => {
        swal.fire({
            title: 'Confirm Details',
            html: `Category: ${result.value.category} <br>
                Service: ${result.value.service} <br>
                Fee: ${result.value.fee} <br>
                Duration: ${result.value.duration} <br>
                Promo: ${result.value.promo}`,
            confirmButtonColor: '#49657B',
            confirmButtonText: 'Confirm',
            focusConfirm: false,
            showLoaderOnConfirm: true,
            showDenyButton: true,
            denyButtonText: 'Cancel',
            preConfirm: () => {
                const category = result.value.category
                const service = result.value.service
                const fee = result.value.fee
                const duration = result.value.duration
                const promo = result.value.promo

                return { category: category, service: service, fee: fee, duration: duration, promo: promo}
              }
        }).then((result) => {
            if (result.isConfirmed){
                var category = result.value.category;
                var service = result.value.service;
                var fee = result.value.fee;
                var duration = result.value.duration;
                var promo = result.value.promo;

                var salonService = new FormData();
                salonService.append("category", category);
                salonService.append("service", service);
                salonService.append("fee", fee); 
                salonService.append("duration", duration); 
                salonService.append("promo", promo); 

                $.ajax({
                    url:"../../ajax/add_service.ajax.php",
                    method: "POST",
                    data: salonService,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:"text",
                    success:function(){
                        swal.fire('Saved!', '', 'success');
                        location.reload();
                    }, error:function(){
                        swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                })
            } else if (result.isDenied) {
                swal.fire('Cancelled!', '', 'info')
            }
          })
      })
}

function add_customer(){
    swal.fire({
        title: 'Add a Customer',
        html: `<input type="text" id="lname" class="swal2-input" placeholder="Last Name">
                <input type="text" id="fname" class="swal2-input" placeholder="First Name">
                <input type="text" id="service" class="swal2-input" placeholder="Service">
                <input type="date" id="date" class="swal2-input" placeholder="Date">
                <input type="time" id="time" class="swal2-input" placeholder="Time">`,
        showCancelButton: true,
        confirmButtonColor: '#49657B',
        confirmButtonText: 'Confirm',
        focusConfirm: false,
        preConfirm: () => {
            const lname = Swal.getPopup().querySelector('#lname').value
            const fname = Swal.getPopup().querySelector('#fname').value
            const service = Swal.getPopup().querySelector('#service').value
            const date = Swal.getPopup().querySelector('#date').value
            const time = Swal.getPopup().querySelector('#time').value
            if (!lname || !fname || !service || !date || !time) {
              swal.showValidationMessage(`Please enter all details.`)
            }
            return { lname: lname, fname: fname, service: service, date: date, time: time}
          }
    }).then((result) => {
        swal.fire({
            title: 'Confirm Details',
            html: `Last Name: ${result.value.lname} <br>
                First Name: ${result.value.fname} <br>
                Service: ${result.value.service} <br>
                Date: ${result.value.date} <br>
                Time: ${result.value.time}`,
            confirmButtonColor: '#49657B',
            confirmButtonText: 'Confirm',
            focusConfirm: false,
            showLoaderOnConfirm: true,
            showDenyButton: true,
            denyButtonText: 'Cancel',
            preConfirm: () => {
                const lname = result.value.lname
                const fname = result.value.fname
                const service = result.value.service
                const date = result.value.date
                const time = result.value.time

                return { lname: lname, fname: fname, service: service, date: date, time: time}
              }
        }).then((result) => {
            if (result.isConfirmed){
                var lname = result.value.lname
                var fname = result.value.fname
                var service = result.value.service
                var date = result.value.date
                var time = result.value.time

                var salonCustomer = new FormData();
                salonCustomer.append("lname", lname);
                salonCustomer.append("fname", fname);
                salonCustomer.append("service", service); 
                salonCustomer.append("date", date); 
                salonCustomer.append("time", time); 

                $.ajax({
                    url:"../../ajax/add_customer.ajax.php",
                    method: "POST",
                    data: salonCustomer,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:"text",
                    success:function(){
                        swal.fire('Saved!', '', 'success');
                        location.reload();
                    }, error:function(){
                        swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                })
            } else if (result.isDenied) {
                swal.fire('Cancelled!', '', 'info')
            }
          })
      })
}