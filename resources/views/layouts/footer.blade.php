</div>



</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script src="{{ asset('public/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('public/assets/js/app.js') }}"></script>
<script src="{{ asset('public/assets/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('public/assets/js/photoPreview.js') }}"></script>
<script src="{{ asset('public/assets/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('public/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('public/assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('public/assets/js/datatables.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jQuery.print.min.js') }}"></script>
<script src="{{ asset('public/assets/js/main.js') }}"></script>
<script>
    //toaster message
    @if (Session::has('message'))
        toastr.success("{{ session('message') }}")
    @endif
    @if (Session::has('error'))
        toastr.error("{{ session('error') }}")
    @endif
    //datatable
    $(document).ready(function() {
        $('#myTable').DataTable({
            // ordering:  false
        });
    });
    //select dropdown
    $(document).ready(function() {
        $('.select-item').select2({
            theme: "classic"
        });
    });

    //delete confirm sweet alert
    $('.delete-confirm').on('click', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    });

    function dueCalculate() {
        var total = document.getElementById("totalpay").value;
        total = total.split(',').join('')
        var pay = document.getElementById('pay');
        var due = document.getElementById('due');
        var totaldue = total - pay.value;
        due.value = totaldue;
    }

    function myprintelement() {
        $("#printelement").print();
    }
</script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".count").each(function() {
            $(this)
            .prop("Counter", 0)
            .animate({
                Counter: $(this).text(),
            }, {
                duration: 3000,
                easing: "swing",
                step: function(now) {
                    now = Number(Math.ceil(now)).toLocaleString('en');
                    $(this).text(now);
                },
            });
        });
    });
</script>
</body>

</html>
