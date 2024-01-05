{{-- SweetAlert2 Delete --}}
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        //button create post event
        $('body').on('click', '#btn-delete-post', function() {

            let post_id = $(this).data('id');
            let token = $("meta[name='csrf-token']").attr("content");

            console.log(post_id);

            Swal.fire({
                title: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'TIDAK',
                confirmButtonText: 'YA, HAPUS!'
            }).then((result) => {
                if (result.isConfirmed) {

                    console.log('berhasil');

                    //fetch to delete data
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/letters-pemberitahuan/${post_id}`,
                        type: "DELETE",
                        cache: false,
                        data: {
                            "_token": token
                        },
                        success: function(response) {

                            //show success message
                            Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: `${response.message}`,
                                showConfirmButton: false,
                                timer: 1500
                            });

                            // redirect to users page
                            setTimeout(function() {
                                window.location.href = "/letters-pemberitahuan";
                            }, 1500);
                        }
                    });

                }
            })

        });
    </script>
@endpush