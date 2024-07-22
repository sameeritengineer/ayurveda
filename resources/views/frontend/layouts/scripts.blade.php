<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('submit', '.shopping-cart-form', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                method: 'POST',
                data: formData,
                url: "{{ route('add-to-cart') }}",
                success: function(data) {
                    //console.log(data);
                    if(data.status === 'success'){
                        showToast('success',data.message);
                        getCartCount();
                    }else if (data.status === 'error'){
                        showToast('error', data.message);
                    }
                },
                error: function(data) {

                }
            });
        });

        //Cart Count
        function getCartCount() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart-count') }}",
                success: function(data) {
                    $('.cart-count').text(data);
                },
                error: function(data) {

                }
            })
        }    
        
    });


</script>            