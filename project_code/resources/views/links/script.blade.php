{{-- --------- BOOTSTRAP -------- --}}
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

{{-- --------- JQUERY ------------ --}}
<script src="{{ asset('assets/js/jquery.js') }}"></script>

{{-- --------- BOXICON ------------- --}}
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

{{-- ----------- AOS ---------------- --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

{{-- ---------- SWEETALERT ------------ --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    AOS.init();
</script>


{{-- ------------ ALERT NOTIFICATION ---------- --}}
@if (session('status'))
    <script>
        Swal.fire({
            title: "{{ session('status') }}",
            text: "{{ session('text') }}",
            icon: "{{ session('type') }}"
        });
    </script>
@endif
