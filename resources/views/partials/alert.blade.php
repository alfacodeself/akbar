<script>
    @if (session('info'))
        Lobibox.notify('info', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-info-circle',
            msg: '{{ session('info') }}'
        });
    @elseif (session('success'))
        Lobibox.notify('success', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-check-circle',
            msg: '{{ session('success') }}'
        });
    @elseif (session('warning'))
        Lobibox.notify('warning', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-error',
            msg: '{{ session('warning') }}'
        });
    @elseif (session('error'))
        Lobibox.notify('error', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-x-circle',
            msg: '{{ session('error') }}'
        });
    @endif
</script>
