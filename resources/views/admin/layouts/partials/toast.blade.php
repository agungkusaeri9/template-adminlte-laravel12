@push('styles')
    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
@endpush
@push('scripts')
    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}', 'Success')
        </script>
    @endif
    @if (session('error'))
        <script>
            toastr.error('{{ session('error') }}', 'Error')
        </script>
    @endif
@endpush
