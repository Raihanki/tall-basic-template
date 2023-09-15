<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('show-confirm-alert', (next) => {
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
                        if (next.data) {
                            @this.call('destroy', next.data);
                        }
                    }
                })
            });
    });
</script>
