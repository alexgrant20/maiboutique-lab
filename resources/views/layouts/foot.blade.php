<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

@yield('js-extra')

@if ($errors->any())
   <script>
      let errorMessages = {
         @foreach ($errors->keys() as $error)
            @error($error)
               '{{ $error }}': '{{ $message }}',
            @enderror
         @endforeach
      };
      Object.keys(errorMessages).forEach(inputName => {
         $(`[name="${inputName}"]`).addClass("is-invalid");
         let errMessageElement = `<div class='invalid-feedback'>${errorMessages[inputName]}</div>`;
         $(errMessageElement).insertAfter(`[name="${inputName}"]`);
      });
   </script>
@endif
