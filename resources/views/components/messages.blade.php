@if (session()->has('message'))
    <div class="toast z-[3]" id="toast">
      <div class="alert alert-info">
        <span>{{session('message')}}</span>
      </div>
    </div>
    {{-- <script>
      const toast = document.querySelector('#toast');
      setTimeout(function() {
        toast.classList.add('hidden');
      }, 2000);
    </script> --}}
@endif