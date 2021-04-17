<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@stack('scripts')

<script src="{{asset('assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
<script>
    @if(Session::has('success'))
        iziToast.success({
        title: '{{ session('success') }}',
        position: 'topRight'
    });
    @endif
    @if(Session::has('error'))
        iziToast.error({
        title: '{{ session('error') }}',
        position: 'topRight'
    });
    @endif
</script>
